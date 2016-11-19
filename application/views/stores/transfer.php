
<table width="100%" cellspacing="0" cellpadding="0" class="main-table">

<input type="hidden" name="item_desc" value="" />
<input type="hidden" name="item_sku" value="" />
<input type="hidden" name="item_expiry" value="" />
<input type="hidden" name="item_category" value="" />
<input type="hidden" name="item_unit" value="" />


	<tr height="30">
		<td width="128"><b>Select Store:</b> </td>
		<td width="298">
			<select style="width:86%; height:28px;" name="transferStore">
				<option>Select Store</option>
				<?php
					foreach ($stores as $key => $value) {
				?>
					<option value="<?=$value->id?>"><?=$value->store_name?></option>
				<?php
					}
				?>
			</select>
		</td>
		<td width="574" colspan="4" rowspan="14" valign="bottom">
        
        <div style="width:100%; height:500px; overflow-x:hidden;overflow-y:scroll; vertical-align:top" class="transferGrid">
	
			</div>
        
        <table width="525" border="0" align="left" cellpadding="0" cellspacing="0">
		  <tr>
		    <td width="115" height="30" style="font-size:12px;"><label><strong>Total Sale Price</strong>:</label></td>
		    <td width="410"><strong style="color:red;" id="totalSale"></strong></td>
	      </tr>
		  <tr>
		    <td height="20" style="font-size:12px;"><label><strong>Total MRP</strong>:</label></td>
		    <td><strong style="color:red;" id="totalMrp"></strong></td>
	      </tr>
		  <tr>
		    <td height="26" colspan="2" style="font-size:12px;"><strong>Transfering To: <span id="blink" style="color:red;"></span></strong></td>
	      </tr>
		  <tr>
		    <td colspan="2" style="font-size:12px;"><strong>Total Items: <span style="color:red;" id="totalItm"></span></strong></td>
	      </tr>
	    </table></td>
	</tr>
	<tr>
		<td height="24"><b>Enter Barcode:</b> </td>
		<td><input type="text" name="barcode" class="itembarcode" value="" style="width:85% !important" />
        <img src="<?=base_url()?>assets/img/spin.gif" style="width:2%; position: absolute; float:left; left:30%; display:none;" class="spinLoader"></td>
	</tr>

	<tr>
		<td height="24"><b>Product Name:</b> </td>
	  <td><input type="text" name="prodName" value="" style="width:85%;" readonly disabled /></td>
	</tr>

	<tr>
		<td height="24"><b>Current Qty:</b> </td>
	  <td><input type="text" name="cqty" value="" style="width:85%;" readonly disabled /></td>
	</tr>

	<tr>
	  <td height="24"><b>Category:</b></td>
	  <td><input type="text" name="category" value="" style="width:85%;" readonly disabled /></td>
  </tr>
	<tr>
		<td height="21"><b>Item Expiry:</b> </td>
	  <td><lable style="color:red;"><b class="expDate" style="font-size:11px;">YYYY-MM-DD</b> <span style="color:red; font-size:10px;font-family:arial; font-weight:700;" class="expryLabel"></span></lable></td>
	</tr>

	<tr>
	  <td height="24"><b>Enter Qty:</b></td>
	  <td><input type="text" name="qty" value="" style="width:85%;" /></td>
  </tr>
	<tr>
	  <td width="128" height="24"><b>Free Item Code:</b></td>
	  <td width="298"><input type="text" name="free_item_barcode" value="" style="width:85%;" readonly disabled="disabled" /></td>
  </tr>
	<tr>
	  <td height="24"><b>Free Item Name:</b></td>
	  <td><input type="text" name="free_item_name" value="" style="width:85%;" readonly disabled="disabled" /></td>
  </tr>
	<tr>
	  <td height="24"><b>Free Item Qty:</b></td>
	  <td><input type="text" name="free_item_qty" value="" style="width:85%;" readonly disabled="disabled" /></td>
  </tr>
	<tr>
	  <td height="24"><b>MRP:</b></td>
	  <td><input type="text" name="mrp" value="" style="width:85%;" readonly disabled="disabled" /></td>
  </tr>
	<tr>
	  <td height="24"><b>Unit:</b></td>
	  <td><input type="text" name="unit" value="" style="width:85%;" readonly disabled="disabled" /></td>
  </tr>
	<tr>
	  <td height="24"><b>Sale Price:</b></td>
	  <td><input type="text" name="sale_price" value="" style="width:85%;" readonly disabled="disabled" /></td>
    </tr>

	<tr>
	  <td height="130" colspan="2"><input type="submit" name="addToTransferList" value="Add To List" />
        <input type="submit" name="cancelTransfer" value="Cancel Transfer" />
        <input type="submit" name="changeStore" value="Change Store" />
      <input type="submit" name="SaveTransfer" value="Save Transfer" /></td>
  </tr>
</table>



<script src="<?=base_url()?>assets/js/typeahead.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var base_url = '<?=base_url()?>';
    $('.itembarcode').typeahead({
          name: 'barcode',
          remote:base_url+'index.php/purchase/getItemName/%QUERY',
          limit : 20
      });
  });
</script>
<style type="text/css">
.twitter-typeahead{
	width:100%;
}

.typeahead {
  background-color: #FFFFFF;
}
.typeahead:focus {
  border: 2px solid #0097CF;
}
.tt-query {
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
  color: #999999;
 	background: transparent !important;
}
.itembarcode{
  border: none !important;
  border: 1px solid #CCC !important;
  background-color: #FFF !important;
}
.tt-dropdown-menu {
  background-color: #FFFFFF;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 4px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  padding: 5px 0;
  width: 260px;
}
.tt-suggestion {
  font-size: 13px;
  line-height: 15px;
  padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
  background-color: #0097CF;
  color: #FFFFFF;
}
.tt-suggestion p {
  margin: 0;
}
input{
		height: 25px;
	}
.main-table{

	font-family: arial;
	font-size: 13px;
	margin-top: 1%;
}
body{

	background-image: url('images/transfer.jpg');
}

b, label{

	color: #FFF;;
}

input[type=submit]{

	border:1px solid #2B7FF5;
	border-radius: 4px;
	height: 35px;
	color: #FFF;
	cursor: pointer;
	background-color: #297AEA;
}

</style>
