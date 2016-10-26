<?php

class Webservices extends Retail_Controller {

	function __construct(){

		parent::__construct();
		$this->load->model('webserv');
	}

	function loginuser(){

		if($this->webserv->checkUserLogin()){

			$data['code'] = 400;
			$data['user'] = $this->input->post('user',true);
			$this->rest->response($data);
		}else{

			$data['code'] = 407;
			$this->rest->response($data);
		}
	}

	function getProducts(){

		$resultData = $this->webserv->productSearch();

		$responseData = [];
		foreach($resultData as $key => $value){

			$oneItem = [];

			$oneItem['bar_code'] = $value->item_bar_code;
			$oneItem['item_name'] = $value->item_name;
			$oneItem['sale_price'] = $value->item_sale_price;
			$oneItem['mrp'] = $value->item_mrp;
			$oneItem['purchase'] = $value->item_purchase_price;

			$responseData[] = $oneItem;
		}

		$data['code'] = 400;
		$data['items'] = $responseData;
		$this->rest->response($data);
	}

	function getSearchedProduct(){

		$barcode = $this->input->post('barcode', true);

		$result = $this->webserv->searchProdByBarcode($barcode);
		$responseData = [];
		foreach($result as $key => $value){

			$oneItem = [];

			$oneItem['bar_code'] = $value->item_bar_code;
			$oneItem['item_name'] = $value->item_name;
			$oneItem['sale_price'] = $value->item_sale_price;
			$oneItem['mrp'] = $value->item_mrp;
			$oneItem['purchase'] = $value->item_purchase_price;

			$responseData[] = $oneItem;
		}
		$data['code'] = 400;
		$data['prod_det'] = $responseData;
		$this->rest->response($data);
	}
}