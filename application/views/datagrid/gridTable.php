<!-- <link href="css/table.css" rel="stylesheet" type="text/css" /> -->
<?php
	$SessionData = $this->session->userdata($sessionName);

	if(!empty($SessionData)):
?>
<div class="tbDatagrid_<?=$sessionName?>">
<table class="table-fill" cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		<?php
			$tableIndex = 0;
			$columnName = array();
			if($SessionData == ''){

				$SessionData = array(array());
			}
			foreach($SessionData[0] as $key => $value):
				if(in_array($tableIndex, $countColumns)){

					array_push($columnName, $key);
				}
				$key = str_replace('_', ' ', $key);
				$key = ucwords($key);
				
		?>	
			<th class="text-left"><?=$key?></th>
		<?php
			$tableIndex++;
			endforeach;
			if(!empty($totalCols)):
		?>
		<th>Total</th>
		<?php
			endif;
		?>
	</tr>
	</thead>
	<tbody class="table-hover">
		<?php
			
			$totalItems = 0;
			$columnValue = array();
			
			foreach($SessionData as $row => $rowValue):
				$tableIndex = 0;
				$oneRowValue = array();
				$mulArray = array();
		?>
			<tr>
				<?php
					foreach($rowValue as $colKey => $colValue):
						if(in_array($tableIndex, $countColumns)){

							array_push($oneRowValue, $colValue);
						}
						if(!empty($totalCols) && in_array($tableIndex, $totalCols)){
							array_push($mulArray, $colValue);
						}
				?>
					<td class="text-left"><?=$colValue?></td>
				<?php
					$tableIndex++;
					endforeach;
					if(!empty($totalCols)):
				?>
				<td>
						<?=$mulArray[0]*$mulArray[1]?>
				</td>
					<?php
						endif;
					?>
			</tr>
		<?php
			$totalItems++;
			array_push($columnValue, $oneRowValue);
			endforeach;
		?>
	</tbody>
</table>

<div style="float:left;">
	<?php
		if(!empty($SessionData[0])):
	?>
	<h4>Total Items: <span style='color:red;'><?=$totalItems?></span></h4>
	<?php
		foreach ($columnName as $key => $ColName) {
			$ColName = str_replace('_', ' ', $ColName);
			echo "<h4 style='margin-top:1%;'> Total ".ucwords($ColName).": ";
			$total = 0;
			foreach($columnValue as $ky => $ColVal){

				$total = $total + $ColVal[$key];
			}

			echo "<span style='color:red;'>".$total."</span></h4>";
		}
	endif;
	?>

</div>
<?php
	endif;
?>
</div>
<style type="text/css">
	

	.table-fill th{

		
		font-size: 12px;
		font-family: arial;
	
		 
	}

	.table-fill td{
		border-bottom: 1px solid #000;
		border-right: 1px solid #000;
		/*text-align: center;*/
		font-family: arial;
		font-size: 12px;
		text-align: center;
		width: 100px;
	}


	.table-fill {
	  border-collapse: separate;
	  border-spacing: 0;
	  color: #4a4a4d;
	  font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
	}
	.table-fill th,
	td {
	  padding: 0 0 0 5px;
	  /* vertical-align: middle; */
	}
	.table-fill thead {
	  background: #395870;
	  color: #fff;

	}
	
	.table-fill th {
	  font-weight: bold;
	  text-align: center;

	}
	.table-fill th:first-child {
	  text-align: left;
	}
	.table-fill tbody tr:nth-child(even) {
	  background: #f0f0f2;
	}
	.table-fill tbody tr:nth-child(odd) {
	  background: #FFF;
	}
	.table-fill td {
	  border-bottom: 1px solid #cecfd5;
	  border-right: 1px solid #cecfd5;
	}
	.table-fill td:first-child {
	  border-left: 1px solid #cecfd5;
	}
</style>

<script type="text/javascript">
	$(document).ready(function(){

		/*$('.table-fill th').each(function(index){

			$(this).html(start_and_end($(this).html()));
		});

		function start_and_end(str) {
		  if (str.length > 3) {
		    return str.substr(0, 10) + '...';
		  }
		  return str;
		}*/
	});
</script>

