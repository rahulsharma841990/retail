<?php

class Storestock extends CI_Controller{


	function __construct(){

		parent::__construct();
		$this->load->model('storemodel');
	}

	function stockmgmt(){

		$userid = $this->session->userdata('userid');
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
			$crud->set_table('store_'.$userid.'_stock');
			$crud->set_subject('Store Stock');
			$crud->columns('item_bar_code','item_name','item_qty','item_mrp','item_sale_price','expiry_date');
			$crud->fields('item_bar_code','item_name','item_qty','item_mrp','item_sale_price','expiry_date');
			$crud->field_type('item_bar_code','readonly');
			$crud->field_type('item_name','readonly');
			$crud->field_type('item_sale_price','readonly');
			//$crud->unset_add();
			//$crud->unset_edit();
			$crud->unset_delete();
			$output = $crud->render();
		$data = array(
						'content' => 'store_stock_manag/list',
						'output' => $output,
						'total' => $this->storemodel->getStreStockAmount()
					 );
		$this->load->view('template',$data);
	}

	function uploadStock(){

		$data = array(
						'content' => 'store_stock_manag/upload'
					);

		$this->load->view('template', $data);
	}

	function uploadStockByFile(){
		
		$this->storemodel->uploadStoreStockByCSV();

		echo "<h2 style='text-align: center;color:green;'>Stock Uploaded Successfully!</h2>	
					<a href='".base_url()."index.php/storestock/uploadStock'>Go Back</a>
				";
	}
}