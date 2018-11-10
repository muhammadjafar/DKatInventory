<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analisis extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('crud');
		$_SESSION['menu'] = 'analisis';
	}

	public function index(){
		$data['page_title'] = 'Analisa';
		$this->load->view('header');
		$this->load->view('apriori');
		$this->load->view('footer');
	}
	public function apriori(){

	}
	public function apriori_proses(){
		# __________________________________APRIORI 4, 1 TIME LOOPING, 5 ITEM SET GENERATED WHILE LOOP AND FILTERED__________________________________ #
		$min_sup = 5;
		$iterate_1_to_2 = false; # untuk mengetahui item set terakhir yang layak digunakan
		$iterate_2_to_3 = false;
		$iterate_3_to_4 = false;
		$iterate_4_to_5 = false;
		$iterate_5_to_6 = false;
		$no = 0;
		$data = array(); #list;
		$data_row = array(); #object;
		$item_set1 = array();
		$item_set2 = array();
		$item_set3 = array();
		$item_set4 = array();
		$item_set5 = array();
		$item_set_temp1 = array();
		$item_set_temp2 = array();
		$item_set_temp3 = array();
		$item_set_temp4 = array();
		$item_set_temp5 = array();
		$support = array();
		$confident = array();
		$tbl_trs1 = $this->crud->getQuery("SELECT det.pg_id, COUNT(det.pg_id) AS jumlah
			FROM pengeluaran_detail det 
			INNER JOIN pengeluaran pg ON det.pg_id = pg.pg_id 
			GROUP BY det.pg_id");
		foreach ($tbl_trs1->result() as $row){
			$no+=1;
			$pg_id = $row->pg_id;
			$dt_trs_1 = $this->crud->getQuery("SELECT br_id, COUNT(br_id) AS jumlah 
				FROM pengeluaran_detail det 
				WHERE pg_id = '$pg_id' GROUP BY br_id");
			$mn = array();
			$mn = null;
			$i = 0;  # increment berada diakhir for rw_trs1
			foreach ($dt_trs_1->result() as $row_mn) {
				# __________________________________1 ITEM SET__________________________________ #
				$mn[] = $row_mn->br_id;
				$br_id = $row_mn->br_id;
				if(array_key_exists($br_id, $item_set_temp1)){
					$frekuen = $item_set_temp1[$br_id] + 1 ;
					$item_set_temp1[$br_id] = $frekuen;
				}else{
					$frekuen = 1;
					$item_set_temp1[$br_id] = $frekuen;
				}
				if($frekuen>=$min_sup){
					$iterate_1_to_2 = true;
					$item_set1[$br_id] = $frekuen;
				}
			}
			// print_r($item_set_temp1);

		    # __________________________________2 ITEM SET__________________________________ #
		    # ________________TIDAK MEMBEDAKAN URUTAN________________#
		    $i = count($mn);
		    // echo 'iii'.$i;
		    if ($i>1){
				$x = $i-1;
				for($i_at=0; $i_at<$x; $i_at++){ # at = 0 -> end
					$at = $mn[$i_at];
					$i_cq = $x;
					$cq = $mn[$i_cq];
					if($mn[$i_at]!=$mn[$i_cq]){
						$frekuen2 = 0;
						$key1 = $at+'-'+$cq;
						$key2 = $cq+'-'+$at;
						$key = $key1;
						if(array_key_exists($key1, $item_set_temp2)){
							$key = $key1;
							$frekuen2 = $item_set_temp2[$key]['frekuen'] + 1;
						}elseif(array_key_exists($key2, $item_set_temp2)){
							$key = $key2;
							$frekuen2 = $item_set_temp2[$key]['frekuen'] + 1;
						}else{
							$frekuen2 = 1;
							$item_set_temp2[$key]['at'] = $at;
							$item_set_temp2[$key]['cq'] = $cq;
							$item_set_temp2[$key]['frekuen'] = $frekuen2;
						}
						echo $frekuen2.'<br>';
						if ($frekuen2>=$min_sup){
							$iterate_2_to_3 = true;
							if(array_key_exists($key, $item_set2)){
								echo 'frekuen 2<br>';
								echo $item_set2[$key]['frekuen'];
								echo $key;
								$item_set2[$key]['frekuen'] = $frekuen2;
							}else{
								echo $key;
								$item_set2[$key]['at'] = $at;
								$item_set2[$key]['cq'] = $cq;
								$item_set2[$key]['frekuen'] = $frekuen2;
							}
						}
					}
				}
			}
		    # i+=1
		  # __________________________________3 ITEM SET__________________________________ #
			if($i>2){
				for($i_at1=0; $i_at1<$i; $i_at1++){ # at1 = 0 -> end
					$at1 = $mn[$i_at1];
					for($i_at2=$i_at1; $i_at2<$i; $i_at2++){ # at2 = current -> end
						$at2 = $mn[$i_at2];
						if ($mn[$i_at1]!=$mn[$i_at2]){
							for($i_cq=0; $i_cq<$i; $i_cq++){ # cq = all except at1 and at2
								if($mn[$i_cq]!=$mn[$i_at1] && $mn[$i_cq]!=$mn[$i_at2]){
									$cq = $mn[$i_cq];
									$key = $at1+','+$at2+'-'+$cq;
									$frekuen3 = 0;
									if(array_key_exists($key, $item_set_temp3)){
										$frekuen3 = $item_set_temp3[$key]['frekuen'] + 1;
										$item_set_temp3[$key]['frekuen'] = $frekuen3;
									}else{
										$frekuen3 = 1;
										// $item_set_temp3[$key] = [];
										$item_set_temp3[$key]['pg_id'] = $pg_id;
										$item_set_temp3[$key]['at1'] = $at1;
										$item_set_temp3[$key]['at2'] = $at2;
										$item_set_temp3[$key]['cq'] = $cq;
										$item_set_temp3[$key]['frekuen'] = $frekuen3;
									}
									if($frekuen3>=$min_sup){
										$iterate_3_to_4 = true;
										if (array_key_exists($key, $item_set3)){
											$item_set3[$key]['frekuen'] = $frekuen3;
										}else{
											// $item_set3[$key] = [];
											$item_set3[$key]['at1'] = $at1;
											$item_set3[$key]['at2'] = $at2;
											$item_set3[$key]['cq'] = $cq;
											$item_set3[$key]['frekuen'] = $frekuen3;
										}
									}
									// print_r($item_set3);
								}
							}
						}
					}
				}
			}
			# __________________________________4 ITEM SET__________________________________ #
			if($i>3){
			    for($i_at1 = 0; $i_at1<$i; $i_at1++){ # at1 = 0 -> end
					$at1 = $mn[$i_at1];
					for($i_at2 = $i_at1; $i_at2<$i; $i_at2++){ # at2 = current -> end
						$at2 = $mn[$i_at2];
						for($i_at3 = $i_at2; $i_at3<$i; $i_at3++){ # at3 = current -> end
							$at3 = $mn[$i_at3];
							if($mn[$i_at1]!=$mn[$i_at2] && $mn[$i_at1]!=$mn[$i_at3] && $mn[$i_at2]!=$mn[$i_at3]){
								for($i_cq = 0; $i_cq<$i; $i_cq++){ # cq = all except at1 && at2 && at3
									if($mn[$i_cq]!=$mn[$i_at1] && $mn[$i_cq]!=$mn[$i_at2] && $mn[$i_cq]!=$mn[$i_at3]){
										$cq = $mn[$i_cq];
										$key = $at1+','+$at2+','+$at3+'-'+$cq;
										$frekuen4 = 0;
										if(array_key_exists($key, $item_set_temp4)){
											// print_r($item_set_temp4[$key]);
											$frekuen4 = $item_set_temp4[$key]['frekuen'] + 1;
											$item_set_temp4[$key]['frekuen'] = $frekuen4;
										}else{
											$frekuen4 = 1;
											// $item_set_temp4[$key] = [];
											$item_set_temp4[$key]['pg_id'] = $pg_id;
											$item_set_temp4[$key]['at1'] = $at1;
											$item_set_temp4[$key]['at2'] = $at2;
											$item_set_temp4[$key]['at3'] = $at3;
											$item_set_temp4[$key]['cq'] = $cq;
											$item_set_temp4[$key]['frekuen'] = $frekuen4;
										}
										if($frekuen4>=$min_sup){
											$iterate_4_to_5 = true;
											if(array_key_exists($key, $item_set4)){
												$item_set4[$key]['frekuen'] = $frekuen4;
											}else{
												// $item_set4[$key] = [];
												$item_set4[$key]['at1'] = $at1;
												$item_set4[$key]['at2'] = $at2;
												$item_set4[$key]['at3'] = $at3;
												$item_set4[$key]['cq'] = $cq;
												$item_set4[$key]['frekuen'] = $frekuen4;
											}
										}
									}
								}
							}
						}
					}
				}
			}
			# __________________________________5 ITEM SET__________________________________ #
			if($i>4){
				for($i_at1=0; $i_at1<$i; $i_at1++){ # at1 = 0 -> end
					$at1 = $mn[$i_at1];
					for($i_at2=$i_at1; $i_at2<$i; $i_at2++){ # at2 = current -> end
						$at2 = $mn[$i_at2];
						for($i_at3=$i_at2; $i_at3<$i; $i_at3++){ # at3 = current -> end
							$at3 = $mn[$i_at3];
							for($i_at4=$i_at3; $i_at4<$i; $i_at4++){ # at4 = current -> end
								$at4 = $mn[$i_at4];
								if($mn[$i_at1]!=$mn[$i_at2] && $mn[$i_at1]!=$mn[$i_at3] && $mn[$i_at1]!=$mn[$i_at4] && $mn[$i_at2]!=$mn[$i_at3] && $mn[$i_at2]!=$mn[$i_at4] && $mn[$i_at3]!=$mn[$i_at4]){
									for($i_cq=0; $i_cq<$i; $i_cq++){ # cq = all except at1 && at2 && at3
										if($mn[$i_cq]!=$mn[$i_at1] && $mn[$i_cq]!=$mn[$i_at2] && $mn[$i_cq]!=$mn[$i_at3] && $mn[$i_cq]!=$mn[$i_at4]){
											$cq = $mn[$i_cq];
											$key = $at1+','+$at2+','+$at3+','+$at4+'-'+$cq;
											$frekuen5 = 0;
											if(array_key_exists($key, $item_set_temp5)){
												$frekuen5 = $item_set_temp5[$key]['frekuen'] + 1;
												$item_set_temp5[$key]['frekuen'] = $frekuen5;
											}else{
												$frekuen5 = 1;
												// $item_set_temp5[$key] = [];
												$item_set_temp5[$key]['pg_id'] = $pg_id;
												$item_set_temp5[$key]['at1'] = $at1;
												$item_set_temp5[$key]['at2'] = $at2;
												$item_set_temp5[$key]['at3'] = $at3;
												$item_set_temp5[$key]['at4'] = $at4;
												$item_set_temp5[$key]['cq'] = $cq;
												$item_set_temp5[$key]['frekuen'] = $frekuen5;
											}
											// echo $frekuen5.'<br>';
											if($frekuen5>=$min_sup){
												$iterate_5_to_6 = true;
												if(array_key_exists($key, $item_set5)){
													$item_set5[$key]['frekuen'] = $frekuen5;
												}else{
													// $item_set5[$key] = [];
													$item_set5[$key]['at1'] = $at1;
													$item_set5[$key]['at2'] = $at2;
													$item_set5[$key]['at3'] = $at3;
													$item_set5[$key]['at4'] = $at4;
													$item_set5[$key]['cq'] = $cq;
													$item_set5[$key]['frekuen'] = $frekuen5;
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}

		  $data[] = array('id' => $pg_id, 'menu' => $mn, 'jumlah' => $row->jumlah);
		}
		# __________________________________COUNT FOR SUPPORT AND CONFIDENT__________________________________ #
		$item_set_temp1=null;
		$item_set_temp2=null;
		$item_set_temp3=null;
		$item_set_temp4=null;
		$item_set_temp5=null;
		if($iterate_5_to_6){
			echo 'ITERATE 5 OK';
		}elseif($iterate_4_to_5){
			echo 'ITERATE 4 OK';
		}elseif($iterate_3_to_4){
			echo 'ITERATE 3 OK';
			foreach ($item_set3 as $key) {
				// print_r($key);
				// $frekuen_sup = $item_set3[$key]['frekuen'];
				// $at1 = $item_set3[$key]['at1'];
				// $at2 = $item_set3[$key]['at2'];
				// $cq = $item_set3[$key]['cq'];
				// $atecedent1 = $at1+'-'+$at2;
				// $atecedent2 = $at2+'-'+$at1;
				// if($frekuen_sup >= $min_sup){
				// 	# print(frekuen_sup)
				// 	if(array_key_exists($atecedent1, $item_set2)){
				// 		$at_sum = $item_set2[$atecedent1]['frekuen'];
				// 	}elseif(array_key_exists($atecedent2, $item_set2)){
				// 		$at_sum = $item_set2[$atecedent2]['frekuen'];
				// 		// $support[$key] = [];
				// 		$support[$key]['sum_frek_item'] = $frekuen_sup;
				// 		$support[$key]['trans_data'] = count($data);
				// 		$support[$key]['value'] = round($frekuen_sup/count($data)*100,2);
				// 		// $confident[$key] = {};
				// 		$confident[$key]['sum_frek_item'] = $frekuen_sup;
				// 		$confident[$key]['at_sum'] = $at_sum;
				// 		$confident[$key]['value'] = round($frekuen_sup/$at_sum*100,2);
				// 	}
				// }
			}
			echo 'SUPPORT';
			print_r($support);
			echo 'CONFIDENT';
			print_r($confident);
		}elseif($iterate_2_to_3){
			echo 'ITERATE 2 OK';
		}elseif($iterate_1_to_2){
			echo 'ITERATE 1 OK';
		}
		#____________________________________________________________#
		print('Data');
		// print(len(data))
		# print(data)
		print('ITEM SET 1');
		print(count($item_set1));
		print('ITEM SET 2');
		print(count($item_set2));
		print('ITEM SET 3');
		print(count($item_set3));
		print('ITEM SET 4');
		print(count($item_set4));
		print('ITEM SET 5');
		print(count($item_set5));
	}
}
