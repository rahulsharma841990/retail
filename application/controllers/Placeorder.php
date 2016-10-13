<?php

class Placeorder extends CI_Controller{

	function __construct(){

		parent::__construct();
		$this->load->model('storemodel');
		$this->auth->checkUserAuthGodown();
	}

	function placeorder(){

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
		$data['content'] = 'placeorder/order';
		$data['output'] = $output;
		$this->load->view('template',$data);
	}

	function insertToOrderGrid(){

		$insertArray = array(
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

			$this->datagrid->insert('RPSOrderitems',$insertArray);

			$this->datagrid->output('RPSOrderitems');

	}

	function getTotalItemsOrder(){

		json(array('total'=>$this->datagrid->DGtotal('RPSOrderitems')));
	}

	function displayRPSOrderItems(){

		$this->datagrid->output('RPSOrderitems');
	}

	function getSalePriceAndMrpRPSOrder(){

		$salePrice = $this->datagrid->multiplyTotal('RPSOrderitems',array(2,6));
		$mrpPrice = $this->datagrid->multiplyTotal('RPSOrderitems',array(2,5));
		$result = array($salePrice, $mrpPrice);
		json($result);
	}

	function deleteGridTableRowRPSOrder(){

		$this->datagrid->delbyindex('RPSOrderitems', $this->input->post('index'));

		$this->datagrid->output('RPSOrderitems');
	}

	function saveRPSPlaceOrder(){

		$this->rpsmodel->placeRPSOrder();

		$this->rpsmodel->removeSessionData('RPSOrderitems');
	}

	function list_orders(){

		$data['content'] = 'placeorder/list_orders';
		$data['orders'] = $this->storemodel->getDistinctStoreOrders();

		$this->load->view('template',$data);
	}

	function viewOrder(){

		if($this->input->post('viewdetails')){

			$data = $this->storemodel->getPLacedOrderDetails($this->input->post('orderID'));
			$content['list'] = $data;
			$content['content'] = 'placeorder/view_details';
			$this->load->view('template',$content);
		}else{
			
			redirect('placeorder/list_orders');
		}
	}

	function updateDelvStatus(){

		if($this->input->post('develv')){

			$this->storemodel->updateDelvStats();
		}
		
		redirect('placeorder/list_orders');
	}
}