<?php
	

	class stores extends CI_Controller{


		function __construct(){

			parent::__construct();
			if($this->session->userdata('userid') == ''){
				redirect('login/');
			}
			$this->load->model('storemodel');
			$this->datagrid->setMultiply(array(2,6));
			$this->auth->checkUserAuthGodown();
			$this->auth->checkUserLogined();
			
		}


		function index(){

			$crud = new grocery_CRUD();
			$crud->set_theme('flexigrid');
			$crud->set_table('stores_list');
			$crud->set_subject('Store');
			$crud->columns('coordinate_id','store_name','store_location','store_address','store_email','store_mobile','store_username','store_password');
			$crud->change_field_type('store_password','password');
			$crud->display_as('coordinate_id', 'Coordinate');
			$crud->required_fields('coordinate_id','store_name','store_location','store_address','store_email','store_mobile','store_username','store_password');
			$crud->callback_before_insert(array($this,'encrypt_password_callback'));
			$crud->callback_after_insert(array($this, '_callback_create_new_store'));
			$crud->set_relation('coordinate_id','list_coordinator','coord_name');

			$crud->fields('coordinate_id','store_name','store_location','store_address','store_email','store_mobile','store_username','store_password');
			
			$crud->set_rules('store_username','Username','required|trim|callback_username_check');
			$crud->unset_delete();
			$output = $crud->render();

			$data = array(
							'content' => 'stores/list',
							//''
							'output'  => $output
						 );

			$this->load->view('template',$data);

		}


		function encrypt_password_callback($post_array){

		  $post_array['store_password'] = md5($post_array['store_password']);

		  return $post_array;
		}


		function _callback_create_new_store($post_array, $primary_key){

			$this->storemodel->createNewStoreSchema($primary_key);
		}

		function username_check($str){

			$result = $this->storemodel->checkUsername($str);
			if($result){

				$this->form_validation->set_message('username_check','The username already exists!');
				return false;
			}else{

				return true;
			}
		}

		function transferStock(){
			/*if($this->session->userdata('products') == ''){

				$this->storemodel->getAllProducts();
			}*/

			$crud = new grocery_CRUD();
			$crud->set_theme('flexigrid');
			$crud->set_table('retail_purchase');
			$crud->columns('item_bar_code','item_name','item_sale_price');
			
			$crud->unset_print();
			$crud->unset_export();
			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_read();
			$crud->unset_delete();
			$output = $crud->render();
			$data = array(
							'content' => 'stores/transfer',
							'stores'  => $this->storemodel->getAllStores(),
							'output'  => $output
						 );
			$this->load->view('template',$data);
		}


		function getItemDetails(){
			$barcode = $this->input->post('barcode');
			$this->storemodel->getDataByBarcode($barcode);
			
		}

		function insertToStoreGrid(){
			
			$insertArray = array(
									'barcode'   =>  $this->input->post('barcode'),	
									'prodName'   =>  $this->input->post('prodName'),	
									'qty'   =>  $this->input->post('qty'),	
									'item_desc'   =>  $this->input->post('item_desc'),	
									'item_expiry'   =>  $this->input->post('item_expiry'),	
									'mrp'   =>  $this->input->post('mrp'),	
									'sale_price'   =>  $this->input->post('sale_price'),	
									'transferStore'   =>  $this->input->post('transferStore'),	
									'free_item_barcode'   =>  $this->input->post('free_item_barcode'),	
									'free_item_name'   =>  $this->input->post('free_item_name'),	
									'free_item_qty'   =>  $this->input->post('free_item_qty'),
									'item_category'   =>  $this->input->post('item_category'),
									'item_unit'   =>  $this->input->post('item_unit'),
									'item_sku'	  =>  $this->input->post('item_sku')
								);

			$this->datagrid->insert('StoreTransferItem',$insertArray);

			$this->datagrid->output('StoreTransferItem');
		}

		function displayTransferGrid(){

			$this->datagrid->output('StoreTransferItem');
			//$this->datagrid->drop('StoreTransferItem');
		}

		function getTotalItems(){

			json(array('total'=>$this->datagrid->DGtotal('StoreTransferItem')));
		}

		function getSalePriceAndMrp(){

			$salePrice = $this->datagrid->multiplyTotal('StoreTransferItem');
			$mrpPrice = $this->datagrid->multiplyTotal('StoreTransferItem',array(2,5));
			$result = array($salePrice, $mrpPrice);
			json($result);
		}

		function deleteGridTableRow(){

			$this->datagrid->delbyindex('StoreTransferItem', $this->input->post('index'));

			$this->datagrid->output('StoreTransferItem');
		}

		function viewInvoice(){

			$invoiceData = $this->session->userdata('StoreTransferItem');

			$invoiceNum = $this->storemodel->getLastInvoiceNumAndUpdate($invoiceData[0]);

			$this->load->view('print/invoice',array('invoiceNum'=>$invoiceNum));

			// $html = $this->load->view('print/invoice',array('invoiceNum'=>$invoiceNum), true);

			// $pdfFilePath = "assets/storeTransferInvoices/".$invoiceNum.".pdf";

			// $this->m_pdf->pdf->WriteHTML($html);

			// $this->m_pdf->pdf->Output($pdfFilePath);
		}

		function saveStoreStransfer(){

			$this->storemodel->SaveStoreTransferData();

		}

		
	}

?>