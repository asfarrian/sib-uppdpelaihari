<?php
	include_once(APPPATH.'controllers/Controller.php');
	class Tahunanggaran extends Controller
	{
		function __construct()
		{
			parent::__construct();

			if ($this->session->userdata('status') != 'login')
				redirect('Login');

			$this->load->model('tahunanggaran_model');
		}

		public function index()
		{//localhost/simon_pkl/dashboard
			$data['tahunanggaran']=$this->tahunanggaran_model->get_data();

			$this->template('tahunanggaran/view_data', $data);
		}

		public function tambah(){
			if(isset($_POST['simpan'])){
				$this->tahunanggaran_model->insert_data();
				redirect('tahunanggaran');
			}else{
                $data['tahunanggaran'] = $this->tahunanggaran_model->get_data();

				$this->template('tahunanggaran/insert_data', $data);
			}
		}

		public function ubah($id){
			if(isset($_POST['ubah'])){
				$this->tahunanggaran_model->update_data($id);
				redirect('tahunanggaran');
			}else{
				$data['tahunanggaran'] = $this->tahunanggaran_model->get_data_byid($id);

				$this->template('tahunanggaran/update_data', $data);
			}
		}

		public function hapus($id){
			if(!isset($id)){
				redirect('tahunanggaran');
			}else{
				$this->tahunanggaran_model->delete_data($id);
				redirect('tahunanggaran');
			}
		}
	}
