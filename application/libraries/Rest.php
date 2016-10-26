<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Rest {

	private $CI;

	private $code = array(
							402 => 'Invalid Token',
							403 => 'Token has been expired',
							400 => 'Success',
							405 => 'Invalid request type',
							406 => 'Invalid data',
							407 => 'Wrong user details',
							408 => 'token missing',
							409 => 'user already exist',
							410 => 'user already liked this post',
							411 => 'post should not null'
						 );

	function __construct(){

		$this->CI = & get_instance();
	}

	public function tokenValidate($token = ''){

		if($token == '4028b71c7f65566d9eef6a0b8a229ec9'){

			return true;
		}else{

			$data['code'] = 402;
			$this->response($data);
		}

		$ValidateToken = $this->CI->db->get_where('tokens',array('token'=>$token));
		
		if($ValidateToken->num_rows()==1){

			$TokenData = $ValidateToken->row();

			$to_time = strtotime($TokenData->timestamp);

			$from_time = strtotime(date('Y-m-d H:i:s'));

			$Minuts = round(abs($from_time - $to_time) / 60,2);

			if($Minuts>15){

				$DeleteOldToken = $this->CI->db->where('token',$token)->delete('tokens');

				$data['code'] = 403;

				$this->response($data);

			}else{

				$UpdateTimeStamp = $this->CI->db->where('token',$token)->update('tokens',array('timestamp'=>date('Y-m-d H:i:s')));

				return true;
			}

		}else{ // Token Not Found in Database

			$data['code'] = 402;

			$this->response($data);
		}
	}

	public function response($response = array()){

		if(isset($response['message'])){

			echo json_encode($response);

			exit;
		}else{

			$response['message'] = $this->code[$response['code']];

			echo json_encode($response);

			exit;
		}
	}

	public function getResponse(){

		$postData = $this->CI->input->post();
		return $postData;
	}
}