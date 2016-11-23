<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	font-family: arial;
}
.orderItems{
	font-size:13px;
	border: 1px dotted #000;
}
.orderItems th{
	color: #000;
}
.orderItems td{
	border-bottom:1px solid #CCC;
}
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="23" colspan="5" align="center"><strong>List Order Items</strong></td>
    </tr>
    <tr>
      <td width="5%">&nbsp;</td>
      <td width="26%">&nbsp;</td>
      <td width="23%">&nbsp;</td>
      <td width="23%">&nbsp;</td>
      <td width="23%">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="orderItems">
        <tbody>
          <tr>
            <th width="10%" height="25" align="center" bgcolor="#C5C5C5">Sr.No.</th>
            <th width="13%" align="left" bgcolor="#C5C5C5">Barcode</th>
            <th width="19%" align="left" bgcolor="#C5C5C5">Product Name</th>
            <th width="9%" align="center" bgcolor="#C5C5C5">Qty</th>
            <th width="9%" align="center" bgcolor="#C5C5C5">MRP</th>
            <th width="15%" align="center" bgcolor="#C5C5C5">Sale Price</th>
            <th width="15%" align="center" bgcolor="#C5C5C5">Total Amount</th>
            <th width="25%" align="center" bgcolor="#C5C5C5">Delivery Status</th>
          </tr>
          <?php
		  		$index = 1;
				foreach($list as $key => $value):
		  
		  ?>
          <tr>
            <td height="26" align="center"><?=$index?></td>
            <td align="left"><?=$value->barcode?></td>
            <td align="left"><?=$value->prodname?></td>
            <td align="center"><?=$value->qty?></td>
            <td align="center"><?=$value->mrp?></td>
            <td align="center"><?=$value->sale_price?></td>
            <td align="center"><?=($value->sale_price*$value->qty)?></td>
            <td align="center"><?=($value->delv_status == 0)?'false':'true'?></td>
          </tr>
          <?php
		  		$index++;
		  		endforeach;
		  ?>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="goback" value="Go back" onClick="window.location='<?=base_url()?>index.php/placeorder/list_orders'" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
