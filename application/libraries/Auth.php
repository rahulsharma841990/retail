<?php


class auth{

	private $CI;


	function __construct(){

		$this->CI = & get_instance();
	}

	function checkUserAuthGodown(){

		if($this->CI->session->userdata('usertype') == 'gd'){

			return true;
		}else{

			redirect('dashboard/');
		}
	}

	function checkUserLogined(){

		if($this->CI->session->userdata('userid') != ''){

			return true;
		}else{

			redirect('login/');
		}
	}
}