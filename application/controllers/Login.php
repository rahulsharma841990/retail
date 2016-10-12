<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	
	function __construct(){

		parent::__construct();
		$this->load->model(array('storeloginmodel'));
		/*if($this->getBrowser() != '41.0.2272.76'){

			echo "You are not authorize to access this page!";
			exit;
		}*/
	}

	function getBrowser() 
	{ 
	    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
	    $bname = 'Unknown';
	    $platform = 'Unknown';
	    $version= "";

	   $ub = '';
	  if(preg_match('/Chrome/i',$u_agent)) 
	    { 
	        $bname = 'Google Chrome'; 
	        $ub = "Chrome"; 
	    } 

	    // finally get the correct version number
	    $known = array('Version', $ub, 'other');
	    $pattern = '#(?<browser>' . join('|', $known) .
	    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	    if (!preg_match_all($pattern, $u_agent, $matches)) {
	        // we have no matching number just continue
	    }

	    // see how many we have
	    $i = count($matches['browser']);
	    if ($i != 1) {
	        //we will have two since we are not using 'other' argument yet
	        //see if version is before or after the name
	        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
	            $version= $matches['version'][0];
	        }
	        else {
	            $version= $matches['version'][1];
	        }
	    }
	    else {
	        $version= $matches['version'][0];
	    }

	    // check if we have a number
	    if ($version==null || $version=="") {$version="?";}

	    return  $version;
	}

	public function index()
	{
		$this->load->view('login/index');
	}

	function doLogin(){
		$result = $this->storeloginmodel->storeLogin();

		if($result['status'] == 'true'){
			$this->session->set_userdata(array('userid'=>$result['userPrid'],'usertype'=>$this->input->post('usertype')));
			$response = array(
								'status'=>'true', 
								'user'=>$this->input->post('username'),
								'redirect' => 'index.php/dashboard/'
							  );
			redirect('dashboard/');

		}else{
			$this->session->set_flashdata(array('error'=>'Wrong user details!'));
			redirect('login');
			//$response = array('status'=>'false');
		}

		//json($response);
	}

	function logout(){

		$this->session->set_userdata(array('userid'=>'','usertype'=>''));
		redirect('login/');
	}
}
