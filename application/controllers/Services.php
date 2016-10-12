<?php

class Services extends CI_Controller{


	function __construct(){

		parent::__construct();

	}

	function pushPurchase(){
		$data = file_get_contents(APPPATH . 'logs/PurchaseMigrate/PurchaseQuery-' . date('Y-m-d') . '.sql');
		$encripData = base64_encode($data);

		$filename = 'PurchaseQuery-' . date('Y-m-d') . '.sql';

		$fields = array(
		    'content'    =>   $encripData,
		    'name'       =>   $filename,
		);

		$fieldsQueryString = http_build_query($fields);

		// you should have curl library install here
		$ch = curl_init("http://localhost/sumit_poorv_server/index.php/Push/getPurchaseFile");
		curl_setopt($ch, CURLOPT_POST, count($fields));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldsQueryString);

		$response = curl_exec($ch);

		echo "<pre/>";
		unlink(APPPATH . 'logs/PurchaseMigrate/PurchaseQuery-' . date('Y-m-d') . '.sql');
		print_r($response);
	}
}
