<script src="<?=base_url()?>assets/js/jquery-latest.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/printThis.js"></script>
<?php
	$allData = $this->session->userdata('RPSSaleItems');
	$invoiceNum = $this->rpsmodel->getAndUpdateCurrentInvoiceNum();
	$memberId = $allData[0]['memberid'];
?>
<div style="margin:0 auto;" id="printInvoice">
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bill</title>
    <style>
	*{
		margin:0;
		font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
		font-size:15px;
	}
    </style>
</head>
<body>
<table width="364" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:0 auto; border:1px dotted #000;">
  <tbody>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5" align="center"><strong style="font-size:12px;">Sales Invoice</strong></td>
    </tr>
    <tr>
      <td width="29">&nbsp;</td>
      <td width="51">&nbsp;</td>
      <td width="148">&nbsp;</td>
      <td width="47">&nbsp;</td>
      <td width="87">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5" style="text-align:center;"><h3>New Right Price Shop</h3>
      <p>---------------------------------------------</p></td>
    </tr>
    <tr>
      <td colspan="5" style="text-align:center;">Thanks For Shopping</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="30" colspan="2">&nbsp;&nbsp;Invoice No:</td>
      <td><strong style="font-size:14px;"><?=$invoiceNum?></strong></td>
      <td>Date: </td>
      <td><?=date('Y-m-d')?></td>
    </tr>
    <tr>
      <td colspan="2" style="font-size:13px;">&nbsp;&nbsp;Member ID:</td>
      <td><strong style="font-size:14px;"><?=($memberId == '')?'Non-Member':$memberId?></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="21" colspan="2" style="font-size:13px;">&nbsp;&nbsp;Pyt. Type:</td>
      <td style="font-size:13px;">Cash</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5" style="text-align:center;">------------------------------------------------------------------------------</td>
    </tr>
    <tr>
      <td colspan="5" style="text-align:center;"><strong>Items List</strong></td>
    </tr>
    <tr>
      <td colspan="5">-------------------------------------------------------------------------------</td>
    </tr>
    <tr>
      <td colspan="5"><table width="364" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td width="13">&nbsp;</td>
            <td width="168" style="border-right:1px dotted #000; font-size:13px;">Item Name</td>
            <td width="66" style="text-align:center;border-right:1px dotted #000;font-size:13px;">MRP</td>
            <td width="66" style="text-align:center;border-right:1px dotted #000font-size:13px;;"> &nbsp;Qty</td>
            <td width="73" style="text-align:center;border-right:1px dotted #000;font-size:13px;">Amount</td>
            <td width="80" style="text-align:center;">Total</td>
          </tr>
          <tr>
            <td colspan="6" valign="top">-------------------------------------------------------------------------------</td>
            </tr>
           
     	<?php
			$totalMRP = 0;
			$totalAmount = 0;
			foreach($allData as $key => $value):
		?> 
            
          <tr>
            <td height="23" style="border-bottom:1px dotted #000;">&nbsp;</td>
            <td style="border-bottom:1px dotted #000; border-right:1px dotted #000;font-size:12px !important;"><?=$value['prodName']?></td>
            <td style="text-align:center; border-right:1px dotted #000;border-bottom:1px dotted #000;font-size:13px !important;"><?=$value['mrp']?></td>
            <td style="text-align:center; border-right:1px dotted #000;border-bottom:1px dotted #000;font-size:13px !important;"><?=$value['qty']?></td>
            <td style="text-align:center; border-right:1px dotted #000;border-bottom:1px dotted #000;font-size:13px !important;"><?=$value['sale_price']?>/-</td>
            <td style="text-align:center;border-bottom:1px dotted #000;font-size:13px !important;"><?=$value['qty']*$value['sale_price']?>/-</td>
          </tr>
          
          
        <?php
			$totalMRP = $totalMRP+($value['mrp']*$value['qty']);
			$totalAmount = $totalAmount+($value['sale_price']*$value['qty']);
			endforeach;
		
		?>
          
         
          
          
          <tr>
            <td height="28">&nbsp;</td>
            <td style="font-size:13px;">Total Mrp:</td>
            <td style="text-align:center;"><?=$totalMRP?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="19">&nbsp;</td>
            <td><strong style="font-size:12px !important;">You Saved:</strong></td>
            <td align="center"><strong style="font-size:12px !important;"><?=$totalMRP-$totalAmount?></strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td style="text-align:right;">&nbsp;</td>
            <td colspan="3" style="text-align:right;"><strong>Total:</strong></td>
            <td>&nbsp;&nbsp;<?=$totalAmount?>/-</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td colspan="5" style="text-align:right; font-size:13px;">(inclusive all tax)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5" style="text-align:center;">--Thank--You--</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
	
</body>
</html>
</div>
<script type="text/javascript">
  $(document).ready(function(){

      $('#printInvoice').printThis();
  });
</script>