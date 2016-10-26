<?php

class Retail_Controller extends CI_Controller{

	function __construct(){

		parent::__construct();
		header("Access-Control-Allow-Origin: *");
		
		if($this->input->server('REQUEST_METHOD')!='POST'){

			$data['code'] = 405;
			$this->rest->response($data);
		}
		
		$postData = $this->rest->getResponse();
		
		if(empty($postData)){

			$data['code'] = 411;
			$this->rest->response($data);
		}

		if(array_key_exists('token', $postData) && $postData['token']!=''){

				$this->rest->tokenValidate($postData['token']);

		}else{

			$data['code'] = 408;
			$this->rest->response($data);
		}

	}
}