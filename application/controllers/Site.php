<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->model('M_inventory');
		$this->load->helper('url');
		if (isset($_SESSION['us_sess']) == 0) {
			redirect('login');
		}
		$_SESSION['menu'] = 'home';
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('Home');
		$this->load->view('footer');
	}
	public function barang()
	{
		$data['kategori'] = $this->M_inventory->getData('barang_kategori')->result();
		$this->load->view('header', $data);
		$this->load->view('barang');
		$this->load->view('footer');
	}
	
}
