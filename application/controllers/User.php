<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Selamat Datang di Sistem Informasi Nasi Goreng Delivery';

		$this->load->view('template/user/header', $data);
		$this->load->view('template/user/navbar');
		$this->load->view('pages/user/home');
		$this->load->view('template/user/footer');
	}

	public function menu()
	{
		$data = [
			'title' => 'Silahkan pesan makanan sesuai selera!',
			'menus' => $this->db->get('menu')
		];

		$this->load->view('template/user/header', $data);
		$this->load->view('template/user/navbar');
		$this->load->view('pages/user/menu_order');
		$this->load->view('template/user/footer');
	}

	public function transaction($id)
	{
		$this->form_validation->set_rules('nmpembeli', 'Nama Pembeli', 'required', ['required' => 'Nama pembeli harus diisi!']);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Alamat harus diisi!']);
		$this->form_validation->set_rules('notelp', 'No Telephone', 'required', ['required' => 'NoHp harus diisi!']);
		$this->form_validation->set_rules('total_bayar', 'Total Bayar', 'required', ['required' => 'Total bayar harus diisi!']);

		
		if ($this->form_validation->run() == FALSE)
        {
        	$data = [
				'title' => 'Silahkan pesan makanan sesuai selera!',
				'products' => $this->db->get_where('menu', ['id' => $id])
			];

			$this->load->view('template/user/header', $data);
			$this->load->view('template/user/navbar');
			$this->load->view('pages/user/transaction', $data);
			$this->load->view('template/user/footer');
		}else{
			$data = [
				'kdtransaksi' => rand(1, 1000000),
				'tgltransaksi' => date('d F Y'),
				'nmpembeli' => $this->input->post('nmpembeli'),
				'alamat' => $this->input->post('alamat'),
				'notelp' => $this->input->post('notelp'),
				'total_bayar' => $this->input->post('total_bayar'),
			];

			$this->db->insert('transaksi', $data);
			$this->session->set_userdata('berhasil', 'Kamu berhasil memasukkan data!');
			return redirect('user/menu');
		}
	}

}
