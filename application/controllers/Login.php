<?php
	include_once(APPPATH.'controllers/Controller.php');
	class Login extends Controller
	{
		function __construct()
		{
			parent::__construct();

			$this->load->model('Login_model');
		}

		public function index()
		{
			$this->load->view('template/sidebarlogin');
            $this->load->view('login/view_data');
            $this->load->view('template/footerlogin');
		}

		public function attempt()
		{
			$nip = $this->input->post('nip');
			$password = $this->input->post('password');

			$this->Login_model->login($nip, $password);
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect('Login');
		}

	}
