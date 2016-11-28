<?php

class Profilemodel extends CI_Model{


	function __construct(){

		parent::__construct();
	}

	function getUserDetails(){
		$userID = $this->session->userdata('userid');
		$Query = $this->db->get_where('godown_login',array('id'=>$userID));

		return $Query->row();
	}

	function updateProfile(){
		$updateData = [];
		if($this->input->post('password') != ''){
			$updateData['store_password'] = md5($this->input->post('password'));
		}
		$userID = $this->session->userdata('userid');
		$updateData['store_name'] = $this->input->post('store_name');
		$updateData['email_id'] = $this->input->post('emailid');
		$updateData['store_username'] = $this->input->post('username');
		$updateData['mobile'] = $this->input->post('mobile');
		$updateData['otp_status'] = 0;
		$updateData['otp_code'] = 0;

		$Query = $this->db->where('id',$userID)->update('godown_login',$updateData);

		if($Query){
			if($this->input->post('password') != ''){
				$retrunArray = ['pass'=>'true'];
			}else{
				$retrunArray = ['pass'=>'false'];
			}
			return $retrunArray;
		}else{

			return false;
		}
	}

	function checkOTP(){

		$userID = $this->session->userdata('userid');

		$Query = $this->db->get_where('godown_login',array('id'=>$userID));

		$result = $Query->row();
		
		if($result->otp_status == 1){
			return true;
		}else{

			return false;
		}
	}

	function updateOTP(){

		$otp = rand(2,99999);
		$userID = $this->session->userdata('userid');
		$updateData = ['otp_code'=>$otp];
		$Query = $this->db->where('id',$userID)->update('godown_login',$updateData);

		if($Query){

			return $otp;
		}
	}

	function validateOTP($otp){

		$QueryCheckOTP = $this->db->get_where('godown_login',array('otp_code'=>$otp));

		if($QueryCheckOTP->num_rows() == 1){

			$QueryUpdateStatus = $this->db->where('otp_code',$otp)->update('godown_login',array('otp_status'=>1));
			return true;
		}else{

			return false;
		}
	}
}