<?php


class Reportsmodel extends CI_Model{

	function __construct(){

		parent::__construct();
	}

	function getTotalAmount(){

		$userid = $this->session->userdata('userid');
		$Query = $this->db->distinct()
						  ->select('total_bill_amount, invoice_number')
						  ->where('date(order_date) between "'.$this->input->post('from').'" and "'.$this->input->post('to').'" and store_id ='.$userid)
						  ->get('store_sales');

		$totalAmount = 0;		
		foreach($Query->result() as $key => $value){

			$totalAmount = $totalAmount + $value->total_bill_amount;
		}
		return $totalAmount;
	}


	function getTotalSale(){

		$userid = $this->session->userdata('userid');
		$Query = $this->db->distinct()
						  ->select('total_bill_amount, invoice_number')
						  ->where('store_id ='.$userid)
						  ->get('store_sales');

		$totalAmount = 0;		
		foreach($Query->result() as $key => $value){

			$totalAmount = $totalAmount + $value->total_bill_amount;
		}
		return $totalAmount;
	}
}