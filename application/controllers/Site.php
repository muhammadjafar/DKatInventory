<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	function __construct(){
	parent::__construct();
	$this->load->database();
	$this->load->library('session');
	//$this->load->model('M_nabung');
	$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('Home');
	}
	public function login()
	{
		$this->load->view('Login');
	}
	public function login_proses(){
			$usern =$_POST['usern'];
			$passw = MD5Crypt($this->input->post('passw'));
			$row = $this->M_inventory->login($nim, $pass);
			if($row==TRUE){
				$where = array('us_username' => $usern);
				$profil = $this->M_inventory->baca_detail_user('user',$where)->result();
				foreach ($profil as $p) {
					$this->session->set_userdata('us_sess',$p->us_username);
					$this->session->set_userdata('id_sess',$p->us_nama);
				}
				redirect(base_url());
				
			}else{
				$this->session->set_flashdata("pesan", " <div class='alert alert-danger alert-dismissable'>
													        <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
													        <strong>Gagal Masuk!</strong> Periksa kembali nim dan passwordmu
													      </div>");
				redirect(base_url());
			}
	}
}
