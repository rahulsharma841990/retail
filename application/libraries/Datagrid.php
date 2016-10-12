<?php

class Datagrid{

	protected $CI;

	private $MultiplyCol = array();

	function __construct(){

		$this->CI = & get_instance();
	}

	function insert($SessionName, $DataArray){
		$arrayInsert = array();
		if($this->CI->session->userdata($SessionName) == ''){

			$arrayInsert[$SessionName][0] = $DataArray;

			$this->CI->session->set_userdata($arrayInsert);

		}else{
			$PrevData = $this->CI->session->userdata($SessionName);
			foreach($PrevData as $key => $value){

				$arrayInsert[$SessionName][] = $value;
			}
			$arrayInsert[$SessionName][] = $DataArray;

			$this->CI->session->set_userdata($arrayInsert);
		}
	}

	function viewitems($SessionName){

		return $this->CI->session->userdata($SessionName);
	}


	function output($SessionName, $CountColumns = array()){

		$this->CI->load->view('datagrid/gridTable',array('sessionName'=>$SessionName,'countColumns'=>$CountColumns, 'totalCols'=>$this->MultiplyCol));
	}

	function delete($SessionName, $uniqueColumn, $uniqueValue){

		$dataArray = $this->CI->session->userdata($SessionName);


		for($i = 0; $i<count($dataArray); $i++){

			if($dataArray[$i][$uniqueColumn] == $uniqueValue){

				unset($dataArray[$i]);
			}
		}


		$dataArray = array_values($dataArray);

		$this->CI->session->set_userdata(array($SessionName=>$dataArray));

		return true;
	}

	function drop($SessionName){

		$this->CI->session->set_userdata(array($SessionName=>''));

		return true;
	}

	function DGtotal($SessionName){

		if( $this->CI->session->userdata($SessionName) == ''){

			return 0;
		}else{
			$totalItems = count($this->CI->session->userdata($SessionName));
			return $totalItems;
		}
	}

	function DGcount($SessionName, $indexArray){

		$data = $this->CI->session->userdata($SessionName);
		if(!empty($data)){
			for($i=0;$i<count($indexArray); $i++){
				$countVar[$i] = 0;
				foreach($data as $key=>$value){
					$index = 0;
					foreach($value as $iKey=>$iValue){
						
						if($indexArray[$i] == $index){
								
							$countVar[$i] = $countVar[$i]+$iValue;
						}
						$index++;
					}
				}
			}
			$returnArray = array();
			for($i=0;$i<count($indexArray); $i++){
				$returnArray[] = $countVar[$i];
			}
			return $returnArray;
		}
	}

	function multiplyTotal($SessionName, $mulCustom = array()){

		if(empty($mulCustom)){

			$multiply = $this->MultiplyCol;
		}else{

			$multiply = $mulCustom;
		}
		

		$data = $this->CI->session->userdata($SessionName);
		if(!empty($data)){
			$allMulValues = array();
			foreach($data as $key => $value){
				$index = 0;
				$oneMulValue = array();
				foreach($value as $ky => $vls){
					if(in_array($index, $multiply)){

						array_push($oneMulValue, $vls);
					}
					$index++;
				}
				$multip = $oneMulValue[0]*$oneMulValue[1];
				array_push($allMulValues, $multip);
			}
			$total = 0;
			foreach ($allMulValues as $key => $value) {
				$total = $total + $value;
			}

			return $total;
		}
	}

	function delbyindex($SessionName, $index){

		$dataArray = $this->CI->session->userdata($SessionName);
		for($i = 0; $i<count($dataArray); $i++){

			if($i == $index){

				unset($dataArray[$i]);
			}
		}

		$dataArray = array_values($dataArray);

		$this->CI->session->set_userdata(array($SessionName=>$dataArray));

		return true;
		
	}

	function setMultiply($arrayVar){

		$this->MultiplyCol = $arrayVar;
	}

}