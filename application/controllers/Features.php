<?php

class Features extends CI_Controller{


	function __construct(){

		parent::__construct();
		$this->load->model('featuresmodel');
		
	}


	function updateProdDetails(){

		//$data['content'] = 'features/update_det';
		$data['prods'] = $this->featuresmodel->getWhereNull();
		$this->load->view('features/update_det',$data);
	}

	function details(){

		$barCode = $this->input->post('barcode');

		$result = $this->featuresmodel->getProductDetails($barCode);

		json($result);
	}

	function saveDetails(){

		$result = $this->featuresmodel->saveAndUpdateDetails();
		if($result){

			json(array('status'=>'success'));
		}else{
			json(array('status'=>'failed'));
		}
	}

	function uploadStock(){
		
		$this->featuresmodel->uploadRetailStockData();
	}
}