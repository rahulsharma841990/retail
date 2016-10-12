<link href="css/table.css" rel="stylesheet" type="text/css" />
<?php
	$SessionData = $this->session->userdata($sessionName);

	if(!empty($SessionData)):
?>
<div class="tbDatagrid_<?=$sessionName?>">
<table class="table-fill">
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