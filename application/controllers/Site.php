<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->model('M_inventory');
		$this->load->model('mdata');
		$this->load->helper('url');
		/*if (isset($_SESSION['us_sess']) == 0) {
			redirect('login');
		}*/
		$_SESSION['menu'] = 'home';
	}

	public function index()
	{
		$data['list'] = $this->mdata->cek_list()->result();
		$this->load->view('header');
		$this->load->view('beranda', $data);
		$this->load->view('footer');
	}
	public function barang()
	{
		$data['kategori'] = $this->M_inventory->getData('barang_kategori')->result();
		$this->load->view('header', $data);
		$this->load->view('barang');
		$this->load->view('footer');
	}
	public function notif_stok()
	{
		$this->load->view('header');
		$this->load->view('notif_stok');
		$this->load->view('footer');
	}
	public function detail_permintaan()
	{
		$this->load->view('header');
		$this->load->view('detail_permintaan');
		$this->load->view('footer');
	}
}
