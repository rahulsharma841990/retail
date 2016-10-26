<?php


class Storesales extends CI_Controller{


	function __construct(){

		parent::__construct();
	}


	function storesale(){

		

		$data['content'] = 'storesales/sale_list';

		$this->load->view('template',$data);
	}

	function getData(){

		$config['table'] = 'retail_purchase';
		$config['columns'] = array('item_bar_code', 'item_name','item_mrp','item_sale_price');
		$config['searchable'] = array('item_bar_code','item_name');

		$this->load->library('datatables',$config);
		$this->datatables->generate();
		/*echo "<pre/>";
		print_r($this->input->post());*/
	}
}