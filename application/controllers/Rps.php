<?php

class Rps extends CI_Controller{


	function __construct(){

		parent::__construct();
		if($this->session->userdata('userid') == ''){
			redirect('login/');
			exit;
		}
		$this->datagrid->setMultiply(array(3,7));

	}


	function saleProducts(){

		$userid = $this->session->userdata('userid');
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('store_'.$userid.'_stock');
		$crud->columns('item_bar_code','item_name','item_sale_price');
		
		$crud->unset_print();
		$crud->unset_export();
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_read();
		$crud->unset_delete();
		$output = $crud->render();
		$data = array(
						'content' => 'rps/rps_sale',
						'output' => $output
					 );
		$this->load->view('template',$data);
	}

	function getMemberDetails(){

		$MemberId = $this->input->post('member_id', true);
		$result = $this->rpsmodel->memberDetails($MemberId);

		json(array('name'=>$result));
	}

	function getProductDetals(){

		$barCode = $this->input->post('barCode', true);
		$result = $this->rpsmodel->getProductDetailByBarcode($barCode);
		json($result);
	}


	function insertToRpsGrid(){

		$insertArray = array(
									'memberid'   =>  $this->input->post('memberid'),	
									'barcode'   =>  $this->input->post('sbarcode'),	
									'prodName'   =>  $this->input->post('prodName'),	
									'qty'   =>  $this->input->post('qty'),	
									'item_desc'   =>  $this->input->post('item_desc'),	
									'item_expiry'   =>  $this->input->post('item_expiry'),	
									'mrp'   =>  $this->input->post('mrp'),	
									'sale_price'   =>  $this->input->post('sale_price'),
									'free_item_barcode'   =>  $this->input->post('free_item_barcode'),	
									'free_item_name'   =>  $this->input->post('free_item_name'),	
									'free_item_qty'   =>  $this->input->post('free_item_qty'),
									'item_category'   =>  $this->input->post('item_category'),
									'item_unit'   =>  $this->input->post('item_unit'),
									'item_sku'	  =>  $this->input->post('item_sku')
								);

			$this->datagrid->insert('RPSSaleItems',$insertArray);

			$this->datagrid->output('RPSSaleItems');

	}


	function getTotalItemsRPS(){

		json(array('total'=>$this->datagrid->DGtotal('RPSSaleItems')));
	}

	function getSalePriceAndMrpRPSandTotal(){

		$salePrice = $this->datagrid->multiplyTotal('RPSSaleItems',array(3,7));
		$mrpPrice = $this->datagrid->multiplyTotal('RPSSaleItems',array(3,6));
		$totalItems = $this->datagrid->DGtotal('RPSSaleItems');
		$result = array($salePrice, $mrpPrice, $totalItems);
		json($result);
	}

	function dropList(){

		$this->datagrid->drop('RPSSaleItems');
	}

	function displayRPSItems(){

		$this->datagrid->output('RPSSaleItems');
	}

	function deleteGridTableRowRPS(){

		$this->datagrid->delbyindex('RPSSaleItems', $this->input->post('index'));

		$this->datagrid->output('RPSSaleItems');
	}

	function printbill(){

		$this->load->view('print/salebill');
		// $this->load->library('pdf');
		// $this->pdf->load_view('print/salebill');
		// $this->pdf->render();
		// $this->pdf->stream("bill.pdf");
	}


	function saveRPSSaleProducts(){

		$this->rpsmodel->saveRPSSaleData();

		$this->rpsmodel->removeSessionData('RPSSaleItems');
	}

	function searchProduct($title){

		$result = $this->rpsmodel->getProductDetails($title);
		echo json_encode($result);
	}
	
}