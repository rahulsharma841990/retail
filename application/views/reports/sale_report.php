<script>window.base_url = '<?=base_url()?>'</script>
<script src="<?=base_url()?>assets/js/jquery-latest.min.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/css/pickday/pikaday.css">
<script src="<?=base_url()?>assets/js/moment.min.js"></script>
<script src="<?=base_url()?>assets/js/pikaday.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/reports.js?r=<?=rand(2,6)?>"></script>
<form method="POST" action="<?=base_url()?>index.php/reports/salereport/saleList">
<table width="100%" height="25" style="border: 1px solid #000;">
	<tr>
	  <td colspan="3" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:18px;"><strong>Filter By Date</strong></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
	<tr style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:14px;">
	  <td>From:</td>
	  <td><input type="text" name="from" value="" id="sr_datepicker1" /></td>
	  <td align="center">&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
	<tr style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:14px;">
	  <td align="center">To:</td>
	  <td><input type="text" name="to" value="" id="sr_datepicker2" /></td>
	  <td>&nbsp;</td>
	  <td style="color:red;">Total Amount: <b>
	    <?=$amount?>/-
	  </b></td>
	  <td align="left" style="color:red;">&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
	<tr>
		<td width="48">&nbsp;</td>
		<td width="144"><button name="bydate" type="submit">Filter Sale</button></td>
		<td width="50">&nbsp;</td>
		<td width="122">&nbsp;</td>
		<td width="259">&nbsp;</td>
		<td width="190">&nbsp;</td>
		<td width="194">&nbsp;</td>
	</tr>
</table>
</form>
<?php
foreach($output->css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($output->js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<div style="width:100%; margin: 0 auto; font-size: 12px; font-family: arial;">
	<?php
		echo $output->output;
	?>
</div>



<style type="text/css">
.groceryCrudTable tfoot {

  display: none !important;
}
</style>