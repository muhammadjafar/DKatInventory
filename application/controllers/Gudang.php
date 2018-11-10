<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
		$_SESSION['menu'] = 'gudang';
	}

	public function index(){
		$data['page_title'] = 'Warehouse';
		$this->load->view('header');
		$this->load->view('gudang');
		$this->load->view('footer');
	}
}
