<?php

	class Controller extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		}

		protected function template($view, $data)
		{
			$this->load->view('template/sidebar');
			$this->load->view('template/header');
			$this->load->view($view, $data);
			$this->load->view('template/footer');
		}
	}
