<?php


class Members extends CI_Controller{

	function __construct(){

		parent::__construct();
		if($this->session->userdata('userid') == ''){
			redirect('login/');
		}

		$this->auth->checkUserAuthGodown();
		
	}

	function MembersList(){

		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
			$crud->set_table('members_details');
			$crud->set_subject('Member');
			$crud->columns('member_code', 'member_name', 'member_contact', 'member_email', 'member_address');
			$crud->required_fields('member_code', 'member_name', 'member_contact', 'member_email');
			$output = $crud->render();
		$data = array(
						'content' => 'members/list',
						'output' => $output
					 );
		$this->load->view('template',$data);
	}
}