<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function admin()
	{
		$this->load->view('template/auth/header');
		$this->load->view('pages/auth/login');
		$this->load->view('template/auth/footer');
	}

	public function login()
	{
		$nmadmin = htmlspecialchars($this->input->post('nmadmin', TRUE));
		$password = $this->input->post('password');
		$admin = $this->db->get_where('admin', ['nmadmin' => $nmadmin])->row_array();

		if($admin)
		{
			if(password_verify($password, $admin['password']))
			{
				$data = [
					'nmadmin' => $admin['nmadmin'],
					'notelp' => $admin['notelp'],
				];

				// Save Session
				$this->session->set_userdata($data);

				redirect('admin/dashboard');
			}else{
				$this->session->set_userdata('gagal', 'Username dan password salah!');
				redirect('auth/admin');
			}
		}else{
			$this->session->set_userdata('gagal', 'Username dan password salah!');
			redirect('auth/admin');
		}
	}

}
