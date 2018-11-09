<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analisis extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
		$_SESSION['menu'] = 'analisis';
	}

	public function index(){
		$data['page_title'] = 'Analisa';
		$this->load->view('header');
		$this->load->view('analisis');
		$this->load->view('footer');
	}
}
