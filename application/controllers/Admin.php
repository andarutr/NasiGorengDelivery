<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function dashboard()
	{
		$this->load->view('template/panel/header');
		$this->load->view('template/panel/navbar');
		$this->load->view('template/panel/sidebar');
		$this->load->view('pages/panel/dashboard');
		$this->load->view('template/panel/footer');
	}
}
