<?php

class Dashboard extends CI_Controller{


	function __construct(){

		parent::__construct();
		if($this->session->userdata('userid') == ''){
			redirect('login/');
		}
		$this->load->model('storemodel');
		$this->datagrid->setMultiply(array(2,6));
		
	}

	function index(){
		$data = array(
						'content' => 'dashboard/index'
					 );
		$this->load->view('template',$data);
	}


	function test(){
		echo "Working";
		$this->load->library('dompdf_gen');
		$this->dompdf_gen->load_view('pdf');
		$this->dompdf_gen->render();
		$this->dompdf_gen->stream("welcome.pdf");
	}
}