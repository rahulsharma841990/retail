<?php

class Storepercent extends CI_Controller{

	function __construct(){

		parent::__construct();
	}

	function precent(){

		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
			$crud->set_table('product_percent');
			$crud->set_subject('Percent');
			$crud->columns('bar_code', 'item_name', 'sale_price', 'purchase_price','store_percent','admin_percent');
			$crud->unset_add();
			$crud->unset_delete();
			$output = $crud->render();
		$data = array(
						'content' => 'storepercent/list',
						'output' => $output
					 );
		$this->load->view('template',$data);
	}

}