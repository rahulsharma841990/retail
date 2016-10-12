<?php

class Salereport extends CI_Controller{


	function __construct(){

		parent::__construct();
		$this->auth->checkUserLogined();
	}

	function saleList(){
		$this->load->model('reportsmodel');
		$storeId = $this->session->userdata('userid');
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('store_sales');
		$whereArray['store_id'] = $storeId;
		$string = '(store_id = '.$storeId;
		$billAmounts = $this->reportsmodel->getTotalSale();
		if($this->input->post('from')){
			$crud->set_theme('datatables');
			$billAmounts = $this->reportsmodel->getTotalAmount();
			$string.= ' and date(order_date) between "'.$this->input->post('from').'" and "'.$this->input->post('from').'"';
		}
			
			$crud->where($string.')', null, FALSE);
			
			
			$crud->set_subject('Store Sale');
			$crud->columns('store_id','member_id','item_code','item_name','item_qty','sale_price','free_item_code','item_category','invoice_number', 'total_bill_amount', 'order_date');

			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();

			$output = $crud->render();
		$data = array(
						'content' => 'reports/sale_report',
						'output' => $output,
						'amount' => $billAmounts
					 );
		$this->load->view('template',$data);
	}
}