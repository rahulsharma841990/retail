<?php


 class StoreLoginModel extends CI_Model{


		function __construct(){

			parent::__construct();
			$this->load->database();
		}

		function storeLogin(){

			
			$CheckArray = array(
									'store_username' => $this->input->post('username',true),
									'store_password' => md5($this->input->post('password', true))
							   );
			
			if($this->input->post('usertype') == 'gd'){
				$Query = $this->db->get_where('godown_login',$CheckArray);
				if($Query->num_rows() == 1){
					$userDet = $Query->row();
					return array('status'=>'true','userPrid'=>$userDet->id);
				}else{

					return array('status'=>'false');
				}
			}else{

				$Query = $this->db->get_where('stores_list',$CheckArray);
				if($Query->num_rows() == 1){
					$userDet = $Query->row();
					return array('status'=>'true','userPrid'=>$userDet->id);
				}else{

					return array('status'=>'false');
				}
			}
			
		}
 }