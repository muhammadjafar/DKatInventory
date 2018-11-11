<?php
 class mdata extends CI_Model{
	function cek_stok(){
	 	$this->db->select('br_now');
		$this->db->from('pemasukan_detail');
		$this->db->where('br_now <=', 170);
		return $this->db->get();
 	}
	function stok(){
		return $this->db->get('pemasukan_detail');
 	}
	function cek_list(){
		$this->db->select('*');
		$this->db->from('pemasukan_detail');
		$this->db->join('pemasukan','pemasukan_detail.pm_id = pemasukan.pm_id');
		$this->db->join('barang','pemasukan_detail.br_id = barang.br_id');
		return $this->db->get();
 	}
	function stok_now(){
		$this->db->select('*, sum(br_now) as total');
		$this->db->from('pemasukan_detail');
		$this->db->join('barang','pemasukan_detail.br_id = barang.br_id');
		$this->db->group_by('pemasukan_detail.br_id');
		return $this->db->get();
 	}
	function stok_suggest(){
		$this->db->select('*, sum(br_now) as total');
		$this->db->from('pemasukan_detail');
		$this->db->join('barang','pemasukan_detail.br_id = barang.br_id');
		$this->db->group_by('pemasukan_detail.br_id');
		return $this->db->get();
 	}
	function chgstatus($id){
		$this->db->where('pm_id', $id);
		$this->db->update('pemasukan', array('pm_status'=>'sampai'));
 	}
	function chgstok($id, $in, $now){
		$sum=$in+$now;
		$this->db->where('pmdet_id', $id);
		$this->db->update('pemasukan_detail', array('br_now'=>$sum));
 	}
 }
 ?>