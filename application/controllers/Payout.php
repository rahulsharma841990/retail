<?php

class Payout extends CI_Controller{


	function __construct(){

		parent::__construct();
		$this->load->model('payoutmodel');
		$this->auth->checkUserAuthGodown();
	}

	function genpayout(){

		$data['stores'] = $this->payoutmodel->getStoresList();
		$data['content'] = 'payout/genpayout';
		$this->load->view('template',$data);
	}

	function genratePayout(){

		$fromDate = $this->input->post('fromdate',true);
		$toDate = $this->input->post('todate',true);
		$storeID = $this->input->post('store',true);
		$this->payoutmodel->generateAllPayout($fromDate, $toDate, $storeID);
	}

	function payoutList(){

		$data['content'] = 'payout/payout_list';

		$this->load->view('template',$data);
	}
}