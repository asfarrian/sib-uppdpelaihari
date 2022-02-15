<?php
	include_once(APPPATH.'controllers/Controller.php');
	class Kir extends Controller
	{
		function __construct()
		{
			parent::__construct();

			if ($this->session->userdata('status') != 'login')
				redirect('Login');

			$this->load->model(array('kir_model', 'ruangan_model'));
		}

		public function index()
		{
			$ruangan = $this->input->get('id_ruangan', TRUE);

			if ($ruangan) {
				$data['kir'] = $this->kir_model->cari($ruangan);
				$data['selected_id_ruangan'] = $ruangan;
			} else {
				$data['kir'] = $this->kir_model;
			}

			$data['ruangan'] = $this->ruangan_model->get_data();
			$this->load->view('template/sidebar');
			$this->load->view('template/header');
			$this->load->view('kir/view_data', $data);
			$this->load->view('template/footer');
		}


		public function ubah($id_barang)
		{
			if(isset($_POST['ubah'])){
				$this->mutasimasuk_model->update_data($id_barang);
				redirect('kir');
			}else{
				$data['kir'] = $this->kir_model->get_data_byid($id_barang);
				$data['ruangan'] = $this->ruangan_model->get_data();
				$this->load->view('template/sidebar');
				$this->load->view('template/header');
				$this->load->view('kir/update_data', $data);
				$this->load->view('template/footer');
			}
		}

		public function laporan_pdf($id_ruangan)
		{
			$groupBy = ['tb_inventaris.nama_barang', 'tb_inventaris.merk', 'tb_inventaris.tahun_pembelian'];

			$data['laporanKir'] = $this->kir_model->cari($id_ruangan, $groupBy);
			$data['ruangan'] = $this->ruangan_model->get_data_by_id($id_ruangan);

			$this->load->library('pdf');

			$this->pdf->setPaper('Folio', 'potrait');
			$this->pdf->filename = "laporan-kir.pdf";
			$this->pdf->load_view('kir/laporan_pdf', $data);
		}

	}
