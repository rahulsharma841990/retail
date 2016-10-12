<?php

class vendor extends CI_Controller{


	function __construct(){

		parent::__construct();
		if($this->session->userdata('userid') == ''){
			redirect('login/');
		}
		$this->auth->checkUserAuthGodown();
		
	}

	function index(){

		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
			$crud->set_table('vendors_list');
			$crud->set_subject('Vendors');
			$crud->required_fields('vendor_name','vendor_email','vendor_mobile','vendor_city');
			$crud->columns('vendor_name','vendor_email','vendor_mobile','vendor_city','main_brand','created_date');
			$crud->unset_jquery();
			$output = $crud->render();

		$data = array(
						'content' => 'vendor/vendors',
						'output'  => $output
					 );
		$this->load->view('template',$data);
	}
}