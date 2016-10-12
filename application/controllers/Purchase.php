<?php

class Purchase extends Ci_Controller{

	function __construct(){

		parent::__construct();
		if($this->session->userdata('userid') == ''){
			redirect('login/');
		}
		$this->datagrid->setMultiply(array(10,11));
		$this->auth->checkUserLogined();
		$this->auth->checkUserAuthGodown();

	}

	function add(){

		$data = array(
						'content' => 'purchase/add',
						'vendors' => $this->purchasemodel->getVendorsList(),
						'categories' => $this->purchasemodel->getallCategories(),
					 );
		$this->load->view('template',$data);
	}

	function insertIntoGrid(){

		$insertItem = array(
							 'bill_num' 		=> 	$this->input->post('billnum',true),
							 'vendor'  			=> 	$this->input->post('vendor',true),
							 'bill_date' 		=> 	$this->input->post('billDate', true),
							 'bar_code' 		=> 	$this->input->post('barCode',true),
							 'prod_name' 		=>	$this->input->post('prodName',true),
							 'prod_desc' 		=>	$this->input->post('prodDesc',true),
							 'prod_sku' 		=>	$this->input->post('sku',true),
							 'prod_expiry' 		=>	$this->input->post('expiryDate',true),
							 'mrp'				=>	$this->input->post('mrp',true),
							 'sale_price'		=>	$this->input->post('salePrice',true),
							 'pur_price'		=>	$this->input->post('purchasePrice',true),
							 'qty'				=>	$this->input->post('qty',true),
							 'free_itemcode'	=>	$this->input->post('FreeItemCode',true),
							 'free_itemname'	=>	$this->input->post('FreeItemName',true),
							 'free_qty'			=>	$this->input->post('FreeQty',true),
							 'free_mrp'			=>	$this->input->post('freeMrp',true),
							 'unit'				=>	$this->input->post('unit',true),
							 'category'			=>	$this->input->post('category',true)
						   );

		$this->datagrid->insert('PurchaseItem',$insertItem);

		$this->datagrid->output('PurchaseItem');
	}

	function displayItems(){

		$this->datagrid->output('PurchaseItem');
	}

	function savePurchaseList(){

		$this->purchasemodel->insertPurchaseItem();
	}

	function deleteFromList(){

		$this->datagrid->delete('PurchaseItem','bar_code',$this->input->post('barCode'));
		$this->datagrid->output('PurchaseItem');
	}

	function purchaseList(){

		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
			$crud->set_table('retail_purchase');
			$crud->set_subject('Purchase');
			$crud->display_as('bill_num_id','Bill Numb');
			$crud->set_relation('bill_num_id','purchase_bills','bill_number');
			$crud->columns('bill_num_id','item_bar_code','item_name','item_mrp','item_sale_price','item_purchase_price','item_qty','free_item_barcode','free_item_qty','free_item_mrp','last_update');
			//$crud->unset_add();
			//$crud->unset_edit();
			$crud->unset_delete();
			$output = $crud->render();
		$data = array(
						'content' => 'purchase/list',
						'output' => $output
					 );
		$this->load->view('template',$data);
	}

	function categories(){

		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
			$crud->set_table('product_category');
			$crud->set_subject('Category');
			$crud->columns('category_name', 'category_desc', 'created_date');
			$crud->required_fields('category_name', 'category_desc', 'created_date');
			$output = $crud->render();
		$data = array(
						'content' => 'purchase/category',
						'output' => $output
					 );
		$this->load->view('template',$data);
	}

	function getTotalAmount(){
		$salePrice = $this->datagrid->multiplyTotal('PurchaseItem',array(10,11));
		json(array('total'=>$salePrice));
	}


	function uploadpurchase(){

		$data = array(
						'content' => 'purchase/upload'
					 );
		$this->load->view('template',$data);
	}

	function uploadCsv(){

		$this->purchasemodel->insertPurchaseUploadByFile();
	}

	function getItemName($title){

		$result = $this->purchasemodel->getItemHintByTitle($title);
		echo json_encode($result);
	}

	function getItemDetails(){

		$result = $this->purchasemodel->getItemDetails();
		json($result);
	}
}