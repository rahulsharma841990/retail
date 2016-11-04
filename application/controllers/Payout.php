<?php

class Payout extends CI_Controller{


	function __construct(){

		parent::__construct();
		$this->load->model('payoutmodel');
		$this->auth->checkUserAuthGodown();
	}

	function genpayout(){

		$data['content'] = 'payout/genpayout';
		$this->load->view('template',$data);
	}

	function genratePayout(){

		$fromDate = $this->input->post('fromdate',true);
		$toDate = $this->input->post('todate',true);
		$this->payoutmodel->generateAllPayout($fromDate, $toDate);
	}
}