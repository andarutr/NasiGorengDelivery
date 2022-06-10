<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function dashboard()
	{
		$transaksi = $this->db->get('transaksi');
		$menu = $this->db->get('menu');
		
		$data = [
			'title' => 'Dashboard Admin - NasiGoreng Delivery',
			'total_transaksi' => $transaksi->num_rows(),
			'total_menu' => $menu->num_rows(),
		];

		$this->load->view('template/panel/header', $data);
		$this->load->view('template/panel/navbar');
		$this->load->view('template/panel/sidebar');
		$this->load->view('pages/panel/dashboard', $data);
		$this->load->view('template/panel/footer');
	}

	public function menu()
	{
		$data = [
			'title' => 'Menu Admin - NasiGoreng Delivery',
			'menus' => $this->db->get('menu'),
		];

		$this->load->view('template/panel/header', $data);
		$this->load->view('template/panel/navbar');
		$this->load->view('template/panel/sidebar');
		$this->load->view('pages/panel/menu/list', $data);
		$this->load->view('template/panel/footer');
	}

	public function menu_add()
	{
		$data = [
			'title' => 'Menambahkan Menu Makanan - NasiGoreng Delivery',
		];

		$this->form_validation->set_rules('kdmenu', 'Kode Menu', 'required', ['required' => 'Kode menu harus diisi!']);
		$this->form_validation->set_rules('nmmenu', 'Nama Menu', 'required', ['required' => 'Nama menu harus diisi!']);
		$this->form_validation->set_rules('harga', 'Harga Menu', 'required', ['required' => 'Harga menu harus diisi!']);

		
		if ($this->form_validation->run() == FALSE)
        {
			$this->load->view('template/panel/header', $data);
			$this->load->view('template/panel/navbar');
			$this->load->view('template/panel/sidebar');
			$this->load->view('pages/panel/menu/create', $data);
			$this->load->view('template/panel/footer');
		}else{
			$config['upload_path'] = './assets/img/produk/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size'] = 250;
			$config['max_width'] = 1024;
			$config['max_height'] = 768;

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('gambar')){
				$this->session->set_userdata('gagal', 'Gagal input gambar!');
				redirect('admin/menu');
			}else{
				$data = [
					'kdmenu' => $this->input->post('kdmenu'),
					'nmmenu' => $this->input->post('nmmenu'),
					'harga' => $this->input->post('harga'),
					'gambar' => $this->upload->data('client_name'),
				];

				$this->db->insert('menu', $data);
				$this->session->set_userdata('berhasil_tambah_menu', 'Berhasil tambah menu!');
				redirect('admin/menu');
			}
		}
	}

	public function menu_update($id)
	{
		$data = [
			'title' => 'Memperbarui Menu Makanan - NasiGoreng Delivery',
		];

		$this->form_validation->set_rules('kdmenu', 'Kode Menu', 'required', ['required' => 'Kode menu harus diisi!']);
		$this->form_validation->set_rules('nmmenu', 'Nama Menu', 'required', ['required' => 'Nama menu harus diisi!']);
		$this->form_validation->set_rules('harga', 'Harga Menu', 'required', ['required' => 'Harga menu harus diisi!']);

		
		if ($this->form_validation->run() == FALSE)
        {
        	$data['menus'] = $this->db->get_where('menu', ['id' => $id]);
			$this->load->view('template/panel/header', $data);
			$this->load->view('template/panel/navbar');
			$this->load->view('template/panel/sidebar');
			$this->load->view('pages/panel/menu/update', $data);
			$this->load->view('template/panel/footer');
		}else{
			$config['upload_path'] = './assets/img/produk/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size'] = 250;
			$config['max_width'] = 1024;
			$config['max_height'] = 768;

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('gambar')){
				$data = [
					'kdmenu' => $this->input->post('kdmenu'),
					'nmmenu' => $this->input->post('nmmenu'),
					'harga' => $this->input->post('harga'),
				];

				$this->db->where('id', $id);
				$this->db->update('menu', $data);
				$this->session->set_userdata('berhasil_perbarui_menu', 'Berhasil perbarui menu!');
				redirect('admin/menu');
			}else{
				$data = [
					'kdmenu' => $this->input->post('kdmenu'),
					'nmmenu' => $this->input->post('nmmenu'),
					'harga' => $this->input->post('harga'),
					'gambar' => $this->upload->data('client_name'),
				];

				$this->db->where('id', $id);
				$this->db->update('menu', $data);
				$this->session->set_userdata('berhasil_perbarui_menu', 'Berhasil perbarui menu!');
				redirect('admin/menu');
			}
		}
	}

	public function menu_delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('menu');
		$this->session->set_userdata('berhasil_delete_menu', 'Berhasil menghapus menu!');
		redirect('admin/menu');
	}

	public function transaction()
	{
		$data = [
			'title' => 'Transaksi Pengguna - NasiGoreng Delivery',
			'transactions' => $this->db->get('transaksi'),
		];

		$this->load->view('template/panel/header', $data);
		$this->load->view('template/panel/navbar');
		$this->load->view('template/panel/sidebar');
		$this->load->view('pages/panel/transaksi/list', $data);
		$this->load->view('template/panel/footer');
	}

	public function transaction_add()
	{
		$data = [
			'title' => 'Menambahkan Daftar Transaksi - NasiGoreng Delivery',
		];

		$this->form_validation->set_rules('kdtransaksi', 'Kode Transaksi', 'required', ['required' => 'Kode transaksi harus diisi!']);
		$this->form_validation->set_rules('tgltransaksi', 'Tanggal Transaksi', 'required', ['required' => 'Tanggal transaksi harus diisi!']);
		$this->form_validation->set_rules('nmpembeli', 'Nama Pembeli', 'required', ['required' => 'Nama Pembeli harus diisi!']);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Alamat harus diisi!']);
		$this->form_validation->set_rules('notelp', 'No Telephone', 'required', ['required' => 'No Telephone harus diisi!']);
		$this->form_validation->set_rules('total_bayar', 'Total Bayar', 'required', ['required' => 'Total Bayar harus diisi!']);

		
		if ($this->form_validation->run() == FALSE)
        {
			$this->load->view('template/panel/header', $data);
			$this->load->view('template/panel/navbar');
			$this->load->view('template/panel/sidebar');
			$this->load->view('pages/panel/transaksi/create', $data);
			$this->load->view('template/panel/footer');
		}else{
			
			$data = [
				'kdtransaksi' => $this->input->post('kdtransaksi'),
				'tgltransaksi' => $this->input->post('tgltransaksi'),
				'nmpembeli' => $this->input->post('nmpembeli'),
				'alamat' => $this->input->post('alamat'),
				'notelp' => $this->input->post('notelp'),
				'total_bayar' => $this->input->post('total_bayar'),
			];

			$this->db->insert('transaksi', $data);
			$this->session->set_userdata('berhasil_tambah_transaksi', 'Berhasil tambah transaksi!');
			redirect('admin/transaction');
		}
	}

	public function transaction_update($id)
	{
		$data = [
			'title' => 'Menambahkan Daftar Transaksi - NasiGoreng Delivery',
		];

		$this->form_validation->set_rules('kdtransaksi', 'Kode Transaksi', 'required', ['required' => 'Kode transaksi harus diisi!']);
		$this->form_validation->set_rules('tgltransaksi', 'Tanggal Transaksi', 'required', ['required' => 'Tanggal transaksi harus diisi!']);
		$this->form_validation->set_rules('nmpembeli', 'Nama Pembeli', 'required', ['required' => 'Nama Pembeli harus diisi!']);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Alamat harus diisi!']);
		$this->form_validation->set_rules('notelp', 'No Telephone', 'required', ['required' => 'No Telephone harus diisi!']);
		$this->form_validation->set_rules('total_bayar', 'Total Bayar', 'required', ['required' => 'Total Bayar harus diisi!']);

		
		if ($this->form_validation->run() == FALSE)
        {
        	$data['transactions'] = $this->db->get_where('transaksi', ['id' => $id]);

			$this->load->view('template/panel/header', $data);
			$this->load->view('template/panel/navbar');
			$this->load->view('template/panel/sidebar');
			$this->load->view('pages/panel/transaksi/update', $data);
			$this->load->view('template/panel/footer');
		}else{
			
			$data = [
				'kdtransaksi' => $this->input->post('kdtransaksi'),
				'tgltransaksi' => $this->input->post('tgltransaksi'),
				'nmpembeli' => $this->input->post('nmpembeli'),
				'alamat' => $this->input->post('alamat'),
				'notelp' => $this->input->post('notelp'),
				'total_bayar' => $this->input->post('total_bayar'),
			];

			$this->db->where('id', $id);
			$this->db->update('transaksi', $data);
			$this->session->set_userdata('berhasil_perbarui_transaksi', 'Berhasil perbarui transaksi!');
			redirect('admin/transaction');
		}
	}

	public function transaction_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('transaksi');
		$this->session->set_userdata('berhasil_delete_transaksi', 'Berhasil hapus transaksi!');
			redirect('admin/transaction');
	}
}
