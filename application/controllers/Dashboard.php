<?php
	include_once(APPPATH.'controllers/Controller.php');
	class Dashboard extends Controller
	{
		function __construct()
		{
			parent::__construct();

			if ($this->session->userdata('status') != 'login')
				redirect('Login');

			$this->load->model(array('dashboard_model', 'ruangan_model', 'instansi_model', 'tahunanggaran_model'));
		}

		public function index()
		{
			$data['dashboard']=$this->dashboard_model->lihat_dashboard_by_status('Unit Pelayanan Pendapatan Daerah Pelaihari');

			$this->template('dashboard/view_data', $data);
		}


		public function ubah($id){
			if(isset($_POST['ubah'])){
				$this->dashboard_model->update_data($id);
				redirect('dashboard');
			}else{
				$data['dashboard'] = $this->dashboard_model->get_data($id);
				$data['ruangan'] = $this->ruangan_model->get_data();
				$data['kondisi'] = ["Baik", "Rusak Ringan", "Rusak Berat"];

				$this->load->view('template/sidebar');
				$this->load->view('template/header');
				$this->load->view('dashboard/update_data', $data);
				$this->load->view('template/footer');
			}
		}

		public function keluar($id_barang){
			if(isset($_POST['keluar'])){
				$this->dashboard_model->move_data($id_barang);
				redirect('dashboard');
			}else{
				$data['dashboard'] = $this->dashboard_model->get_data($id_barang);
				$data['ruangan'] = $this->ruangan_model->get_data();
				$data['instansi'] = $this->instansi_model->get_data();
				$data['tahunanggaran'] = $this->tahunanggaran_model->get_data();
				$this->load->view('template/sidebar');
				$this->load->view('template/header');
				$this->load->view('dashboard/move_data', $data);
				$this->load->view('template/footer');
			}
		}

		public function laporan_pdf()
		{
			$data['dashboard']=$this->dashboard_model->lihat_dashboard_by_status('Unit Pelayanan Pendapatan Daerah Pelaihari');
			$this->load->library('pdf');
			$this->pdf->setPaper('Folio', 'landscape');
			$this->pdf->filename = "laporan-KIB.pdf";
			$this->pdf->load_view('dashboard/laporan_pdf', $data);
		}

	}
