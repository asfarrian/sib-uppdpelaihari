<?php
	include_once(APPPATH.'controllers/Controller.php');
	class Barangrusakringan extends Controller
	{
		function __construct()
		{
			parent::__construct();

			if ($this->session->userdata('status') != 'login')
				redirect('Login');

			$this->load->model(array('barangrusakringan_model', 'ruangan_model'));
		}

		public function index()
		{
			$data['barangrusakringan']=$this->barangrusakringan_model->lihat_barangrusakringan_by_kondisi('Rusak Ringan', 'Unit Pelayanan Pendapatan Daerah Pelaihari');
			$this->load->view('template/sidebar');
			$this->load->view('template/header');
			$this->load->view('barangrusakringan/view_data', $data);
			$this->load->view('template/footer');
		}


		public function ubah($id){
			if(isset($_POST['ubah'])){
				$this->barangrusakringan_model->update_data($id);
				redirect('barangrusakringan');
			}else{
				$data['barangrusakringan'] = $this->barangrusakringan_model->get_data($id);
				$data['kondisi'] = ["Baik", "Rusak Ringan", "Rusak Berat"];
				$this->load->view('template/sidebar');
				$this->load->view('template/header');
				$this->load->view('barangrusakringan/update_data', $data);
				$this->load->view('template/footer');
			}
		}

		public function laporan_pdf()
		{
			$data['barangrusakringan']=$this->barangrusakringan_model->lihat_barangrusakringan_by_kondisi('Rusak Ringan', 'Unit Pelayanan Pendapatan Daerah Pelaihari');
			$this->load->library('pdf');
			$this->pdf->setPaper('Folio', 'landscape');
			$this->pdf->filename = "laporan-barangrusakringan.pdf";
			$this->pdf->load_view('barangrusakringan/laporan_pdf', $data);
		}


	}
