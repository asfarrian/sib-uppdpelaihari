<?php
	include_once(APPPATH.'controllers/Controller.php');

	class Barangdimusnahkan extends Controller
	{
		function __construct()
		{
			parent::__construct();

			if ($this->session->userdata('status') != 'login')
				redirect('Login');

			$this->load->model(array('barangdimusnahkan_model', 'ruangan_model', 'instansi_model', 'tahunanggaran_model'));
		}

		public function index()
		{
			$tahun_anggaran = $this->input->get('id_tahun', TRUE);

			if ($tahun_anggaran) {
				$data['barangdimusnahkan'] = $this->barangdimusnahkan_model->cari($tahun_anggaran);
				$data['selected_pemusnahan'] = $tahun_anggaran;
			} else {
				$data['barangdimusnahkan']=$this->barangdimusnahkan_model;
			}
			$data['tahunanggaran'] = $this->tahunanggaran_model->get_data();
			$this->load->view('template/sidebar');
			$this->load->view('template/header');
			$this->load->view('barangdimusnahkan/view_data', $data);
			$this->load->view('template/footer');
		}

		public function ubah($id){
			if(isset($_POST['ubah'])){
				$this->barangdimusnahkan_model->update_data($id);
				redirect('barangdimusnahkan');
			}else{
				$data['barangdimusnahkan'] = $this->barangdimusnahkan_model->get_data($id);
				$data['tahunanggaran'] = $this->tahunanggaran_model->get_data();
				$data['cara_pemusnahan'] = ["Dibakar", "Ditimbun"];
				$this->load->view('template/sidebar');
				$this->load->view('template/header');
				$this->load->view('barangdimusnahkan/update_data', $data);
				$this->load->view('template/footer');
			}
		}


		public function laporan_pdf($id_tahun)
		{
			$data['pemusnahan'] = $this->barangdimusnahkan_model->cari($id_tahun);
			$this->load->library('pdf');
			$this->pdf->setPaper('Folio', 'landscape');

			$this->pdf->loadHTML("img src='https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Coat_of_arms_of_South_Kalimantan.svg/800px-Coat_of_arms_of_South_Kalimantan.svg'");
			$this->pdf->filename = "berita-acara-pemusnahan.pdf";

			$this->pdf->load_view('Barangdimusnahkan/laporan_pdf', $data);
		}

	}
