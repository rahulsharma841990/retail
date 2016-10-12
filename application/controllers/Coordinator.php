<?php

class Coordinator extends CI_Controller{


	function __construct(){

		parent::__construct();
		$this->auth->checkUserLogined();
		$this->auth->checkUserAuthGodown();
		
	}

	function coordinator_list(){

		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('list_coordinator');
		$crud->set_subject('Coordinator');
		$crud->columns('coord_name','coord_email','coord_mobile','coord_state','coord_city','coord_address');
		$crud->fields('coord_name','coord_email','coord_mobile','coord_state','coord_city','coord_address');
		$crud->required_fields('coord_name','coord_email','coord_mobile','coord_state','coord_city','coord_address');
		
		$output = $crud->render();

		$data = array(
							'content' => 'coordinator/list',
							'output'  => $output
						 );
		$this->load->view('template',$data);
	}
}