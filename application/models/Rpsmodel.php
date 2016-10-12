<?php

class RpsModel extends CI_Model{


	function __construct(){

		parent::__construct();
	}

	function getStoreProducts(){

		$StoreID = $this->session->userdata('userid');
		$Query = $this->db->get('store_'.$StoreID.'_stock');
		$this->session->set_userdata(array('RPSStock'=>$Query->result()));
	}


	function memberDetails($memberId){

		$Query = $this->db->get_where('members_details',array('member_code'=>$memberId));
		$data = $Query->row();

		return $data->member_name;
	}

	function getProductDetailByBarcode($barCode){

		$StoreID = $this->session->userdata('userid');
		$Query = $this->db->get_where('store_'.$StoreID.'_stock',array('item_bar_code'=>$barCode));
		return $Query->row();
	}

	function saveRPSSaleData(){
		
		$SessionData = $this->session->userdata('RPSSaleItems');


		foreach ($SessionData as $key => $value) {
			$this->insertSaleItems($value);
		}

	}

	private function insertSaleItems($rawData){

		$insertData = array(
							  'member_id'  			=>  $rawData['memberid'],
							  'store_id'   			=>  $this->session->userdata('userid'),
							  'item_code'  			=>  $rawData['barcode'],
							  'item_name'  			=>  $rawData['prodName'],
							  'item_qty'   			=>  $rawData['qty'],
							  'sale_price' 			=>  $rawData['sale_price'],
							  'free_item_code'		=>  $rawData['free_item_barcode'],
							  'free_item_name'  	=>  $rawData['free_item_name'],
							  'item_category'		=>	$rawData['item_category'],
							  'item_unit'			=>	$rawData['item_unit'],
							  'invoice_number'		=>	$this->getCurrentInvoiceNum(),
							  'total_bill_amount' 	=> 	$salePrice = $this->datagrid->multiplyTotal('RPSSaleItems',array(3,7))
						   );

		$Query = $this->db->insert('store_sales',$insertData);
		$this->lessStockQty($rawData);

		return true;
	}

	private function getCurrentInvoiceNum(){

		$storeId = $this->session->userdata('userid');

		$Query = $this->db->get_where('store_invoice_nums',array('store_id'=>$storeId));
		$data = $Query->row();

		return $data->invoice_num;
	}

	public function getAndUpdateCurrentInvoiceNum(){

		$storeId = $this->session->userdata('userid');

		$Query = $this->db->get_where('store_invoice_nums',array('store_id'=>$storeId));
		$data = $Query->row();

		$QueryUpdate = $this->db->where('store_id',$storeId)->set('invoice_num','invoice_num+1',FALSE)->update('store_invoice_nums');
		return $data->invoice_num;
	}

	function lessStockQty($rawData){

		$userId = $this->session->userdata('userid');

		$Query = $this->db->where('item_bar_code',$rawData['barcode'])->set('item_qty','item_qty-'.$rawData['qty'],FALSE)->update('store_'.$userId.'_stock');
		if($Query){
			return true;
		}else{

			return false;
		}
	}
	
	function removeSessionData($SessName){

		$this->session->set_userdata(array($SessName =>''));
	}

	function placeRPSOrder(){

		$SessionData = $this->session->userdata('RPSOrderitems');

		foreach($SessionData as $key => $value){

			$this->saveOrderDetails($value);
		}
	}

	private function saveOrderDetails($rawData){

		$insertData = array(
								'barcode' => $rawData['barcode'],
								'prodname' => $rawData['prodName'],
								'qty' => $rawData['qty'],
								'item_desc' => $rawData['item_desc'],
								'item_expiry' => $rawData['item_expiry'],
								'mrp' => $rawData['mrp'],
								'sale_price' => $rawData['sale_price'],
								'free_item_barcode' => $rawData['free_item_barcode'],
								'free_item_name' => $rawData['free_item_name'],
								'free_item_qty' => $rawData['free_item_qty'],
								'item_category' => $rawData['item_category'],
								'item_unit' => $rawData['item_unit'],
								'item_sku' => $rawData['item_sku'],
								'store_id' => $this->session->userdata('userid'),
								'order_date' => date('Y-m-d'),
								'total_amount' => $this->datagrid->multiplyTotal('RPSOrderitems',array(2,6))
						   );
		$Query = $this->db->insert('rps_orders', $insertData);
		return true;
	}


	function getProductDetails($keyWord){

		$returnArray = array();
		$userid = $this->session->userdata('userid');
		$Query = $this->db->select('*')->like('item_bar_code',$keyWord,'both')->get('store_'.$userid.'_stock');
		$result = $Query->result();

		foreach($result as $key => $value){

			$returnArray[] = $value->item_bar_code;
		}

		return $returnArray;

	}


}