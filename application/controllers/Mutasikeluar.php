<?php
	include_once(APPPATH.'controllers/Controller.php');
	class Mutasikeluar extends Controller
	{
		function __construct()
		{
			parent::__construct();

			if ($this->session->userdata('status') != 'login')
				redirect('Login');

			$this->load->model(array('mutasikeluar_model', 'dashboard_model', 'instansi_model', 'ruangan_model', 'tahunanggaran_model'));
		}

		public function index()
		{
			$tahun_anggaran = $this->input->get('id_tahun', TRUE);

			if ($tahun_anggaran) {
				$data['mutasikeluar'] = $this->mutasikeluar_model->cari($tahun_anggaran);
				$data['selected_mutasi_keluar'] = $tahun_anggaran;
			} else {
				$data['mutasikeluar']=$this->mutasikeluar_model;
			}
			$data['tahunanggaran'] = $this->tahunanggaran_model->get_data();
			$this->load->view('template/sidebar');
			$this->load->view('template/header');
			$this->load->view('mutasikeluar/view_data', $data);
			$this->load->view('template/footer');
		}

		public function ubah($id_barangkeluar)
		{
			if(isset($_POST['edit'])){
				$this->mutasikeluar_model->update_data($id_barangkeluar);
				redirect('mutasikeluar');
			}else{
				$data['mutasikeluar'] = $this->mutasikeluar_model->get_data_byid($id_barangkeluar);
				$data['instansi'] = $this->instansi_model->get_data();
				$data['tahunanggaran'] = $this->tahunanggaran_model->get_data();

				$this->load->view('template/sidebar');
				$this->load->view('template/header');
				$this->load->view('mutasikeluar/update_data', $data);
				$this->load->view('template/footer');
			}
		}

		public function hapus($id_barangkeluar, $id_barang)
		{
			$this->mutasikeluar_model->delete_data($id_barangkeluar, $id_barang);

			redirect('mutasikeluar');
		}

		public function laporan_pdf($id_tahun)
		{
			$data['mutasikeluar'] = $this->mutasikeluar_model->cari($id_tahun);
			$this->load->library('pdf');
			$this->pdf->setPaper('Folio', 'potrait');
			$this->pdf->filename = "laporan-mutasikeluar.pdf";
			$this->pdf->load_view('Mutasikeluar/laporan_pdf', $data);
		}

    }