<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
	parent::__construct();
	$this->load->database();
	$this->load->library('session');
	$this->load->model('M_inventory');
	$this->load->helper('url');
	}
	public function index()
	{
		$this->load->view('Login');
	}
	public function login_proses(){
			$usern =$_POST['usern'];
			$passw = MD5($this->input->post('passw'));
			$row = $this->M_inventory->login($usern, $passw);
			if($row==TRUE){
				$where = array('us_username' => $usern);
				$profil = $this->M_inventory->baca_detail_user('user',$where)->result();
				foreach ($profil as $p) {
					$this->session->set_userdata('us_sess',$p->us_username);
					$this->session->set_userdata('nm_sess',$p->us_nama);
					$this->session->set_userdata('id_sess',$p->us_id);
				}
				redirect(base_url());
				
			}else{
				$this->session->set_flashdata("pesan", " <div class='alert alert-icon alert-danger' role='alert'>
            <i class='fe fe-alert-triangle mr-2' aria-hidden='true'></i> Cek Kembali Username dan Passwordmu !!!
          </div>");
				redirect(base_url('site/login'));
			}
	}
	public function logout(){
			if($this->session->has_userdata('us_sess')){
				$this->session->sess_destroy();
				redirect('login');
			}
		}

}