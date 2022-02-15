<?php
	include_once(APPPATH.'controllers/Controller.php');
	class Ruangan extends Controller
	{
		function __construct()
		{
			parent::__construct();

			if ($this->session->userdata('status') != 'login')
				redirect('Login');

			$this->load->model('ruangan_model');
		}

		public function index()
		{//localhost/simon_pkl/dashboard
			$data['ruangan']=$this->ruangan_model->get_data();

			$this->template('ruangan/view_data', $data);
		}

		public function tambah(){
			if(isset($_POST['simpan'])){
				$this->ruangan_model->insert_data();
				redirect('ruangan');
			}else{
                $data['ruangan'] = $this->ruangan_model->get_data();

				$this->template('ruangan/insert_data', $data);
			}
		}

		public function ubah($id){
			if(isset($_POST['ubah'])){
				$this->ruangan_model->update_data($id);
				redirect('ruangan');
			}else{
				$data['ruangan'] = $this->ruangan_model->get_data_byid($id);

				$this->template('ruangan/update_data', $data);
			}
		}

		public function hapus($id){
			if(!isset($id)){
				redirect('ruangan');
			}else{
				$this->ruangan_model->delete_data($id);
				redirect('ruangan');
			}
		}
	}
