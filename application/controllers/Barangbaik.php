<?php
	include_once(APPPATH.'controllers/Controller.php');
	class Barangbaik extends Controller
	{
		function __construct()
		{
			parent::__construct();

			if ($this->session->userdata('status') != 'login')
				redirect('Login');

			$this->load->model(array('barangbaik_model', 'ruangan_model'));
		}

		public function index()
		{
			$data['barangbaik']=$this->barangbaik_model->lihat_barangbaik_by_kondisi('Baik', 'Unit Pelayanan Pendapatan Daerah Pelaihari');
			$this->load->view('template/sidebar');
			$this->load->view('template/header');
			$this->load->view('barangbaik/view_data', $data);
			$this->load->view('template/footer');
		}


		public function ubah($id){
			if(isset($_POST['ubah'])){
				$this->barangbaik_model->update_data($id);
				redirect('barangbaik');
			}else{
				$data['barangbaik'] = $this->barangbaik_model->get_data($id);
				$data['kondisi'] = ["Baik", "Rusak Ringan", "Rusak Berat"];
				$this->load->view('template/sidebar');
				$this->load->view('template/header');
				$this->load->view('barangbaik/update_data', $data);
				$this->load->view('template/footer');
			}
		}

		public function laporan_pdf()
		{
			$data['barangbaik']=$this->barangbaik_model->lihat_barangbaik_by_kondisi('Baik', 'Unit Pelayanan Pendapatan Daerah Pelaihari');
			$this->load->library('pdf');
			$this->pdf->setPaper('Folio', 'landscape');
			$this->pdf->filename = "laporan-barangbaik.pdf";
			$this->pdf->load_view('barangbaik/laporan_pdf', $data);
		}


	}
