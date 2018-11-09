<?php
 class M_inventory extends CI_Model{
 	public function login($usern, $passw){
			$query=$this->db->get_where('user',array('us_username'=>$usern,
			'us_password'=>$passw));
			return $query->result();
		}

 }
?>