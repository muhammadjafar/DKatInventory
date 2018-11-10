<?php
 class M_inventory extends CI_Model{
 	public function login($usern, $passw){
			$query=$this->db->get_where('user',array('us_username'=>$usern,
			'us_password'=>$passw));
			return $query->result();
		}
	function baca_detail_user($table, $where){
 		return $this->db->get_where($table,$where);
 	}
 	function getData($table){
 		return $this->db->get($table);
 	}
 	function getBarang(){
 		//$query = $this->db->query('select * from barang_kategori_detail');
		//return $query;
 	}

 }
?>