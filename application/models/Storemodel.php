<?php

class StoreModel extends CI_Model{

	private $failedStock = array();

	function __construct(){

		parent::__construct();
		$this->load->dbforge();
	}

	function createNewStoreSchema($primaryKey){

		$tableName = "store_".$primaryKey."_stock";
		$this->db->query("CREATE TABLE IF NOT EXISTS ".$tableName." (
							id INT( 50 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
							store_id INT( 50 ) NOT NULL ,
							item_bar_code VARCHAR(100) NOT NULL ,
							item_category INT( 50 ) NOT NULL,
							item_name VARCHAR( 100 ) NOT NULL ,
							item_desc TEXT NOT NULL ,
							item_qty FLOAT( 50 ) NOT NULL ,
							item_sale_price FLOAT( 50 ) NOT NULL ,
							item_mrp FLOAT( 50 ) NOT NULL ,
							item_unit VARCHAR( 50 ) NOT NULL ,
							free_item_barcode DOUBLE NOT NULL ,
							free_item_name VARCHAR( 50 ) NOT NULL ,
							free_item_qty INT( 50 ) NOT NULL ,
							expiry_date DATE NOT NULL ,
							item_sku INT NOT NULL ,
							last_updated TIMESTAMP NOT NULL ,
							cteated_at TIMESTAMP NOT NULL
							)");
		/*$sql = file_get_contents("./assets/StoreDump/StoreDump.sql");
		$sql = str_replace('table-name', $tableName, $sql);
		$sql = str_replace('store_id_invoice', $primaryKey, $sql);
		$sqls = explode(';', $sql);
		array_pop($sqls);

		foreach($sqls as $statement){
		    $statment = $statement . ";";
		    $this->db->query($statement);   
		}*/

		return true;
	}

	function checkUsername($username){

		$Query = $this->db->get_where('stores_list',array('store_username'=>$username));

		if($Query->num_rows()>=1){

			return true;
		}else{

			return false;
		}
	}

	function getAllStores(){

		$Query = $this->db->get('stores_list');
		return $Query->result();
	}

	function getDataByBarcode($barcode)
	{			
		$Query = $this->db->get_where('retail_purchase',array('item_bar_code'=>$barcode));

		if($Query->num_rows()>=1){

			$arrayData = array('status'=>'true','data'=>$Query->result());
			json($arrayData);
		}else{
			$arrayData = array('status'=>'false');
			json($arrayData);
		}
		
	}

	function getAllProducts(){

		$Query = $this->db->get('retail_purchase');
		$this->session->set_userdata(array('products'=>$Query->result()));
	}


	function SaveStoreTransferData(){

		$data = $this->session->userdata('StoreTransferItem');

		foreach($data as $key => $value){

			$this->checkOldEntriesOfItem($value);
		}
	}

	private function checkOldEntriesOfItem($rawData_Session){

		$table = 'store_'.$rawData_Session['transferStore'].'_stock';

		$Query = $this->db->get_where($table,array('item_bar_code'=>$rawData_Session['barcode']));

		if($Query->num_rows() >= 1){

			$this->saveTransferInExcel($rawData_Session);
			$this->saveOldEntries($Query->result(), $table);
			$this->updateCurrentProductDetails($rawData_Session, $table);
			$this->lessQtyFromPurchaseTable($rawData_Session);

			$this->removeSessionData();

		}else{

			$this->saveTransferInExcel($rawData_Session);
			$this->addNewProductEntry($rawData_Session, $table);
			$this->lessQtyFromPurchaseTable($rawData_Session);

			$this->removeSessionData();
		}
	}

	private function removeSessionData(){

		$this->session->set_userdata(array('StoreTransferItem'=>''));
	}



	public function getLastInvoiceNumAndUpdate($rawData){
		$Query = $this->db->get('invoice_num');
		$result = $Query->row();
		$invoiceNum = $result->invoice_num;
		$this->db->set('invoice_num','invoice_num+1',FALSE)->update('invoice_num',array('last_invoice_to'=>$rawData['transferStore'],'last_updated'=>date('Y-m-d H:i:s')));
		return $invoiceNum;
	}

	private function lessQtyFromPurchaseTable($rawData){

		$Query = $this->db->where('item_bar_code',$rawData['barcode'])->set('item_qty','item_qty-'.$rawData['qty'], FALSE)->update('retail_purchase');
		if($Query){

			return true;
		}else{

			return false;
		}
	}

	private function saveOldEntries($rawData_QueryResult, $tableName){

		 $filepath = APPPATH . 'logs/StoreEntriesLog/'.$tableName.'-'. date('Y-m-d') . '.csv';
		 if(!file_exists($filepath)){

		 	$handle = fopen($filepath, "a+"); // Open the file

		 	$line = array('Store Id','Item Code','Item Category','Item Name','Item Desc','Item Qty','Sale Price','MRP','UNIT','Free Item Barcode','Free Item Name','Free Item Qty','Expiry Date','Item SKU','Last Update','Update Date');
		 	fputcsv($handle, $line, ',');
		 }else{

		 	$handle = fopen($filepath, "a+"); // Open the file
		 }


		$line = array();
	 	foreach($rawData_QueryResult as $key=>$value){

	 		$line[] = $value->store_id;
	 		$line[] = $value->item_bar_code;
	 		$line[] = $value->item_category;
	 		$line[] = $value->item_name;
	 		$line[] = $value->item_desc;
	 		$line[] = $value->item_qty;
	 		$line[] = $value->item_sale_price;
	 		$line[] = $value->item_mrp;
	 		$line[] = $value->item_unit;
	 		$line[] = $value->free_item_barcode;
	 		$line[] = $value->free_item_name;
	 		$line[] = $value->free_item_qty;
	 		$line[] = $value->expiry_date;
	 		$line[] = $value->item_sku;
	 		$line[] = $value->last_updated;
	 		$line[] = date('Y-m-d');
	 	}

	 	fputcsv($handle, $line, ',');
		 


		fclose($handle); // Close the file
	}

	private function saveTransferInExcel($rawData_Session){

		$filepath = APPPATH . 'logs/StoreEntriesLog/StoreTransfer-'.$tableName.'-'. date('Y-m-d') . '.csv';
		 if(!file_exists($filepath)){

		 	$handle = fopen($filepath, "a+"); // Open the file

		 	$line = array('Transfer To','Item Code','Item Category','Item Name','Item Qty','Item Desc','Sale Price','MRP','Item Unit','Free Item Barcode','Free Item Name','Free Item Qty','Item Expiry','Item SKU', 'Date');
		 	fputcsv($handle, $line, ',');
		 }else{

		 	$handle = fopen($filepath, "a+"); // Open the file
		 }


		$line = array();
	 	
			$line[] = $rawData_Session['transferStore'];
			$line[] = $rawData_Session['barcode'];
			$line[] = $rawData_Session['category'];
			$line[] = $rawData_Session['prodName'];
			$line[] = $rawData_Session['qty'];
			$line[] = $rawData_Session['item_desc'];
			$line[] = $rawData_Session['sale_price'];
			$line[] = $rawData_Session['mrp'];
			$line[] = $rawData_Session['item_unit'];
			$line[] = $rawData_Session['free_item_barcode'];
			$line[] = $rawData_Session['free_item_name'];
			$line[] = $rawData_Session['free_item_qty'];
			$line[] = $rawData_Session['item_expiry'];
			$line[] = $rawData_Session['item_sku'];
			$line[] = date('Y-m-d');
	 	

	 	fputcsv($handle, $line, ',');
		 


		fclose($handle); // Close the file
	}

	private function updateCurrentProductDetails($rawData_Session, $tableName){

		$updateData = array(
						 		'store_id'			=>	$rawData_Session['transferStore'],
						 		'item_bar_code'		=>	$rawData_Session['barcode'],
						 		'item_category'		=>	$rawData_Session['category'],
						 		'item_name'			=>	$rawData_Session['prodName'],
						 		'item_desc'			=>	$rawData_Session['item_desc'],
						 		'item_sale_price'	=>	$rawData_Session['sale_price'],
						 		'item_mrp'			=>	$rawData_Session['mrp'],
						 		'item_unit'			=>	$rawData_Session['item_unit'],
						 		'free_item_barcode'	=>	$rawData_Session['free_item_barcode'],
						 		'free_item_name'	=>	$rawData_Session['free_item_name'],
						 		'free_item_qty'		=>	$rawData_Session['free_item_qty'],
						 		'expiry_date'		=>	$rawData_Session['item_expiry'],
						 		'item_sku'			=>	$rawData_Session['item_sku'],
						 		'last_updated'		=>	date('Y-m-d')
						   );

		$Query = $this->db->where('item_bar_code',$rawData_Session['barcode'])->set('item_qty','item_qty+'.$rawData_Session['qty'], FALSE)->update($tableName, $updateData);

		if($Query){

			return true;
		}else{

			return false;
		}
	}

	private function addNewProductEntry($rawData, $tableName){

		$insertData = array(
								'store_id'				=>  $rawData['transferStore'],
								'item_bar_code'			=>  $rawData['barcode'],
								'item_category'			=>  $rawData['item_category'],
								'item_name'				=>  $rawData['prodName'],
								'item_desc'				=>  $rawData['item_desc'],
								'item_qty'				=>  $rawData['qty'],
								'item_sale_price'		=>  $rawData['sale_price'],
								'item_mrp'				=>  $rawData['mrp'],
								'item_unit'				=>  $rawData['item_unit'],
								'free_item_barcode'		=>  $rawData['free_item_barcode'],
								'free_item_name'		=>  $rawData['free_item_name'],
								'expiry_date'			=>  $rawData['item_expiry'],
								'item_sku'				=>  $rawData['item_sku'],
								'cteated_at'			=>  date('Y-m-d'),
						   );
		$Query = $this->db->insert($tableName, $insertData);

		if($Query){

			return true;
		}else{
			return false;
		}	
	}


	function getStoreInformation($storeId){

		$Query = $this->db->get_where('stores_list',array('id'=>$storeId));

		return $Query->row();
	}

	function getStreStockAmount(){

		//SELECT SUM(`item_qty`*`item_sale_price`) as total from store_30_stock
		$userid = $this->session->userdata('userid');
		$Query = $this->db->select('SUM(item_qty*item_sale_price) as total')->get('store_'.$userid.'_stock');
		return $Query->row()->total;
	}


	function uploadStoreStockByCSV(){

			$config['upload_path']          = './assets/storeStockUpload/';
            $config['allowed_types']        = 'csv';

            $this->load->library('upload', $config);

            $this->upload->do_upload('storeStockList');

            $data = $this->upload->data();

            $result = $this->csvreader->parse_file('./assets/storeStockUpload/'.$data['file_name']);

            foreach($result as $key => $value){

            	$this->UpdateUploadedStoreStock($value);
            }
            $this->failedStock[] = array('Item br code','Item qty','Item mrp','Item sale price','Expiry date');
            if(count($this->failedStock)>1){
            	$this->array_to_csv_download($this->failedStock);
            }
	}

	function UpdateUploadedStoreStock($rawData){
			$updateData = array();
			$userid = $this->session->userdata('userid');

			$updateData['item_qty'] 	= $rawData['Item qty'];
			$date = explode('-',$rawData['Expiry date']);
			$genDate = $date[2]."-".$date[1]."-".$date[0];
			$updateData['expiry_date'] 	= $genDate;
			$updateData['item_mrp'] = $rawData['Item mrp'];
			$updateData['item_sale_price'] = $rawData['Item sale price'];

			$Query = $this->db->where('item_bar_code',$rawData['Item bar code'])->update('store_'.$userid.'_stock',$updateData);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				$updateData['item_barcode'] = $rawData['Item bar code'];
				$this->failedStock[] = $updateData;
			}
	}

	function array_to_csv_download($array, $filename = "failedUpdate.csv", $delimiter=",") {
	    
	    $f = fopen('php://memory', 'w'); 
	    
	    foreach ($array as $line) { 
	       
	        fputcsv($f, $line, $delimiter); 
	    }
	    
	    fseek($f, 0);
	    
	    header('Content-Type: application/csv');
	    
	    header('Content-Disposition: attachment; filename="'.$filename.'";');
	    
	    fpassthru($f);
	}

	function getDistinctStoreOrders(){

		$Query = $this->db->select('rps_orders.id as orderid, rps_orders.*, stores_list.*')->group_by('rps_orders.order_date')->join('stores_list','rps_orders.store_id = stores_list.id','LEFT')->get('rps_orders');

		return $Query->result();
	}

	function getPLacedOrderDetails($id){

		$Query = $this->db->get_where('rps_orders',array('id'=>$id));
		$result = $Query->row();
		$storeID = $result->store_id;
		$orderDate = $result->order_date;
		$QueryGetOrder = $this->db->get_where('rps_orders', array('order_date'=>$orderDate,'store_id'=>$storeID));
		return $QueryGetOrder->result();
	}

	function updateDelvStats(){

		$store_id = $this->input->post('store_id');
		$orderDate = $this->input->post('order_date');
		$Query = $this->db->where(array('store_id'=>$store_id, 'order_date'=>$orderDate))->update('rps_orders',array('delv_status'=>1));
		return true;
	}

	
}