<?php

class Webserv extends CI_Model{

	function __construct(){

		parent::__construct();
	}

	function checkUserLogin(){

		$Query = $this->db->get_where('app_login',array('username'=>$this->input->post('user',true),'password'=> md5($this->input->post('pass',true))));
		
		if($Query->num_rows() == 1){

			return true;
		}else{

			return false;
		}
	}

	function productSearch(){

		$Query = $this->db->select('*')->from('store_35_stock')->join('retail_purchase','store_35_stock.item_bar_code = retail_purchase.item_bar_code','inner')->group_by('retail_purchase.item_bar_code')->get();

		return $Query->result();
	}

	function searchProdByBarcode($barcode){

		$Query = $this->db->select('*')->from('retail_purchase')->like('item_bar_code', $barcode,'both')->or_like('item_name',$barcode,'both')->get();
		return $Query->result();
	}
}