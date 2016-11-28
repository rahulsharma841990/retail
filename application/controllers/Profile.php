<?php


class Profile extends CI_Controller{

	function __construct(){

		parent::__construct();
		$this->load->model('profilemodel');
		$this->auth->checkUserAuthGodown();
		include APPPATH . 'third_party/way2sms/way2sms-api.php';
		$this->config->load('email_config');
	}

	function index(){

		redirect('profile/edit');
	}

	function edit(){
		
		$otpStatus = $this->profilemodel->checkOTP();
		if($otpStatus == false){
			redirect('profile/otp');
		}
		$userData = $this->profilemodel->getUserDetails();
		$data = ['content' => 'profile/edit','userData'=>$userData];

		$this->load->view('template', $data);
	}

	function update(){

		if($this->input->server('REQUEST_METHOD') == 'POST'){
			
			$result = $this->profilemodel->updateProfile();

			if(is_array($result)){
				if($result['pass'] == 'true'){

					$this->session->set_userdata(array('userid'=>'','usertype'=>''));
					redirect('login');
				}else{
					$this->session->set_flashdata(array('update'=>'Profile update successfully!!'));
					redirect('dashboard');
				}
			}else{

				$this->session->set_flashdata(array('update'=>'Unable to update your profile!!'));
				redirect('profile/edit');
			}

		}else{

			redirect('profile/edit');
		}
	}

	function otp(){

		$data = [

				'content' => 'profile/otp'
		];
		$this->load->view('template',$data);
	}

	function sendOTP(){

			$otp = $this->profilemodel->updateOTP();
			$emailTemplate = $this->load->view('profile/email',array('otp'=>$otp),true);
			$userDetails = $this->profilemodel->getUserDetails();
    		$config = $this->config->item('mail_config');
			$this->email->initialize($config);
			$this->email->from($config['smtp_user'],'New RPS');
			$this->email->to($userDetails->email_id);
			$this->email->subject('Profile Update OTP');
			$this->email->message($emailTemplate);
			$this->email->send();
			$sms_user = $this->config->item('sms_user');
			$sms_pass = $this->config->item('sms_pass');
			sendWay2SMS($sms_user, $sms_pass, $userDetails->mobile, 'Your OTP: '.$otp);

			$this->session->set_flashdata(array('otp'=>'OTP sent on your email and mobile!'));
			redirect('profile/otp');
	}

	function authOTP(){

		if($this->input->server('REQUEST_METHOD') == 'POST'){

			$result = $this->profilemodel->validateOTP($this->input->post('otp',true));

			if($result){

				redirect('profile/edit');
			}else{

				$this->session->set_flashdata(array('otp'=>'Wrong OTP entered!'));
				redirect('profile/otp');
			}
		}
	}

}