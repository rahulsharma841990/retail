<?php


 class PurchaseModel extends CI_Model{


	function __construct(){

		parent::__construct();
	}

	public function insertPurchaseItem(){

		$data = $this->session->userdata('PurchaseItem');

		foreach($data as $key => $value){

			if($this->checkExistance($value['bar_code'])){

				$this->updateItemQty($value);

			}else{

				$this->insertNewitem($value);
			}
		}

		$this->session->set_userdata(array('PurchaseItem'=>''));
		return true;
	}

	private function insertNewitem($itemDet){

		$bill_num_id = $this->insertNewBillDetails($itemDet);

		$insertData = array(	
						'bill_num_id'			=>	$bill_num_id,
						'item_bar_code' 		      => 	$itemDet['bar_code'],
						'item_name'				=>	$itemDet['prod_name'],
						'item_desc'				=>	$itemDet['prod_desc'],
						'item_mrp'				=>	$itemDet['mrp'],
						'item_unit'				=>	$itemDet['unit'],
						'item_sku'				=>	$itemDet['prod_sku'],
						'item_expiry'			=>	$itemDet['prod_expiry'],
						'item_sale_price'		      =>	$itemDet['sale_price'],
						'item_purchase_price'	      =>	$itemDet['pur_price'],
						'item_qty'				=>	$itemDet['qty'],
						'free_item_barcode'		=>	$itemDet['free_itemcode'],
						'free_item_name'		      =>	$itemDet['free_itemname'],
						'free_item_qty'			=>	$itemDet['free_qty'],
						'free_item_mrp'			=>	$itemDet['free_mrp'],
						'last_update'			=>	date('Y-m-d H:i:s'),
						'item_category'			=>	$itemDet['category']
				   );

		$Query = $this->db->insert('retail_purchase',$insertData);

		$this->saveQuery($this->db->last_query());

		if($Query){

			return true;

		}else{

			return false;
		}

	}

	private function updateItemQty($itemDet){

		$bill_num_id = $this->insertNewBillDetails($itemDet);

		$CurrentQty = $this->insertOldPurchase($itemDet['bar_code']);

		$updateData = array(
						'bill_num_id'			=>	$bill_num_id,
						'item_sale_price'		=>	$itemDet['sale_price'],
						'item_purchase_price'	=>	$itemDet['pur_price'],
						'item_sku'				=>	$itemDet['prod_sku'],
						'item_expiry'			=>	$itemDet['prod_expiry'],
						'item_purchase_price'	=>	$itemDet['pur_price'],
						'item_unit'				=>	$itemDet['unit'],
						'item_qty'				=>	$CurrentQty + $itemDet['qty'],
						'free_item_barcode'		=>	$itemDet['free_itemcode'],
						'free_item_name'		=>	$itemDet['free_itemname'],
						'free_item_qty'			=>	$itemDet['free_qty'],
						'free_item_mrp'			=>	$itemDet['free_mrp'],
						'last_update'			=>	date('Y-m-d H:i:s'),
						'item_category'			=>	$itemDet['category']
				     );
		$Query = $this->db->where('item_bar_code',$itemDet['bar_code'])->update('retail_purchase', $updateData);

		$this->saveQuery($this->db->last_query());

		if($Query){

			return true;
		}else{
			return false;
		}
	}


	private function insertOldPurchase($barCode){

		$Query = $this->db->get_where('retail_purchase',array('item_bar_code'=>$barCode));

		$ResultData = $Query->row();

		$insertData = array(
				'bill_num_id' 			=>	$ResultData->bill_num_id,
				'item_bar_code' 		      =>	$ResultData->item_bar_code,
				'item_name' 			=>	$ResultData->item_name,
				'last_purchase_price'	      =>	$ResultData->item_purchase_price,
				'last_sale_price'		      =>	$ResultData->item_sale_price,
				'last_qty'				=>	$ResultData->item_qty,
				'item_sku'				=>	$ResultData->item_qty,
				'item_unit'				=>	$ResultData->item_unit,
				'item_expiry'			=>	$ResultData->item_expiry,
				'free_itemcode'			=>	$ResultData->free_item_barcode,
				'free_itemname'			=>	$ResultData->free_item_name,
				'free_item_qty'			=>	$ResultData->free_item_qty,
				'created_on'			=>	date('Y-m-d H:i:s'),
				'item_category'			=>	$ResultData->item_category
				);

		$QueryInsert = $this->db->insert('old_purchase', $insertData);

		$this->saveQuery($this->db->last_query());

		if($QueryInsert){

			return $ResultData->item_qty;
		}else{

			return false;
		}
	}

	private function insertNewBillDetails($itemDet){

		$data = array(
						'vendor_id'	 	=> 	$itemDet['vendor'],
						'bill_number'	=>	$itemDet['bill_num'],
						'bill_date'		=>	$itemDet['bill_date'],
						'created_date'	=>	date('Y-m-d H:i:s')	
					 );

		$Query = $this->db->insert('purchase_bills', $data);
		$this->saveQuery($this->db->last_query());
		if($Query){

			return $this->db->insert_id();
		}else{
			return false;
		}
	}
	private function checkExistance($itemCode){

		$Query = $this->db->get_where('retail_purchase',array('item_bar_code'=>$itemCode));

		if($Query->num_rows() == 1){

			return true;
		}else{
			return false;
		}
	}


	function getVendorsList(){

		$Query = $this->db->get('vendors_list');

		return $Query->result();
	}



	function saveQuery($lastQuery){

		 $filepath = APPPATH . 'logs/PurchaseMigrate/PurchaseQuery-' . date('Y-m-d') . '.sql';

		 $lastQuery = $lastQuery.';';

		 $handle = fopen($filepath, "a+"); // Open the file

		 fwrite($handle, $lastQuery . "\n\n");

		 fclose($handle); // Close the file
	}


	function getallCategories(){

		$Query = $this->db->get('product_category');

		return $Query->result();
	}

	function insertPurchaseUploadByFile(){

		$config['upload_path']          = './assets/uploadPurchase/';
        $config['allowed_types']        = 'csv';

        $this->load->library('upload', $config);

        $this->upload->do_upload('csvfile');

        $data = $this->upload->data();

        $result = $this->csvreader->parse_file('./assets/uploadPurchase/'.$data['file_name']);
        //echo "<pre/>";
        //print_r($result);

        foreach($result as $key => $value){

        	$this->insertUploadedPurchase($value);
        }
	}


	private function insertUploadedPurchase($data){

		if($this->checkBeforeUpload($data['Item Code'])){
			$insertData['bill_num_id'] 			= 26;
			$insertData['item_category'] 		= $data['Cat Id'];
			$insertData['item_bar_code'] 		= $data['Item Code'];
			$insertData['item_name'] 			= $data['Item Name'];
			$insertData['item_desc'] 			= $data['Item Desc'];
			$insertData['item_mrp'] 			= $data['MRP'];
			$insertData['item_unit'] 			= $data['Unit'];
			$insertData['item_sale_price'] 		= $data['sale price'];
			$insertData['item_purchase_price'] 	= $data['purchase price'];
			$insertData['item_qty'] 			= $data['Qty'];
			$insertData['item_expiry'] 			= $data['Expiry'];
			$insertData['free_item_barcode'] 	= $data['Free Item Code'];
			$insertData['free_item_name'] 		= $data['Free Item Name'];
			$insertData['free_item_qty'] 		= $data['Free Item Qty'];
			$insertData['free_item_mrp'] 		= $data['Free Item MRp'];

			$Query = $this->db->insert('retail_purchase',$insertData);
		}
	}

	private function checkBeforeUpload($barCode){

		$Query = $this->db->get_where('retail_purchase',array('item_bar_code'=>$barCode));

		if($Query->num_rows()>=1){

			return false;
		}else{

			return true;
		}
	}

	function getItemHintByTitle($keyWord){

		$returnArray = array();
		$Query = $this->db->select('*')->like('item_bar_code',$keyWord,'both')->get('retail_purchase');
		$result = $Query->result();

		foreach($result as $key => $value){

			$returnArray[] = $value->item_bar_code;
		}

		return $returnArray;

	}

	function getItemDetails(){

		$Query = $this->db->get_where('retail_purchase',array('item_bar_code'=> $this->input->post('barcode')));

		return $Query->result();
	}

	function uploadPercentageData($data){

		$insertData['bar_code'] = $data['item_code'];
		$insertData['item_name'] = $data['item_name'];
		$insertData['sale_price'] = $data['sale_rate'];
		$insertData['purchase_price'] = $data['purchase_rate'];
		$insertData['store_percent'] = $data['store_per'];
		$insertData['admin_percent'] = $data['sukhjeet_per'];
		$insertData['last_update'] = date('Y-m-d H:i:s');

		$this->db->insert('product_percent', $insertData);
	}
 }