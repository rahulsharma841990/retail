<link href="css/table.css" rel="stylesheet" type="text/css" />
<style type="text/css">
	input{
		height: 25px;
	}
	td{
		height: 20px;
	}
	tr:nth-child(odd) td {
	  background:#EBEBEB !important;
	}
	 
	tr:nth-child(odd):hover td {
	  background:#EBEBEB !important;
	}
	tr:hover td {
	  background:#EBEBEB !important;
	  color:#666B85 !important;
	  border-top: none !important;
  	  border-bottom: none !important;
	}
	.table-fill{
		width: 100% !important;
		font-family: arial;
		font-size: 10px !important;
	}
	.newTab tr:hover td{

		background-color: #4E5066 !important;
		color: #FFF !important;
	}
	.pDiv{

		display: none !important;
	}
	#search_clear{
		display: none !important;
	}
	#filtering_form{
		position: absolute;
		top: 5%;
	}
</style>
<table border="1" width="100%" class="table-fill">

<input type="hidden" name="item_desc" value="" />
<input type="hidden" name="item_sku" value="" />
<input type="hidden" name="item_expiry" value="" />
<input type="hidden" name="item_category" value="" />
<input type="hidden" name="item_unit" value="" />


	<tr>
		<td width="128"><b>Select Store:</b> </td>
		<td width="337">
			<select style="width:85%;" name="transferStore">
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
		<td colspan="4" rowspan="15" align="left" valign="top">
        	<div style="width:100%; height:600px; overflow-x:scroll;overflow-y:scroll; vertical-align:top" class="transferGrid">
	
			</div>
        </td>
	</tr>
	<tr>
		<td><b>Enter Barcode:</b> </td>
		<td><input type="text" name="barcode" class="itembarcode" value="" style="width:100% !important" /><img src="<?=base_url()?>assets/img/spin.gif" style="width:5%; vertical-align: center; display:none;" class="spinLoader"></td>
	</tr>

	<tr>
		<td><b>Product Name:</b> </td>
		<td><input type="text" name="prodName" value="" style="width:85%;" readonly disabled /></td>
	</tr>

	<tr>
		<td><b>Current Qty:</b> </td>
		<td><input type="text" name="cqty" value="" style="width:85%;" readonly disabled /></td>
	</tr>

	<tr>
	  <td><b>Category:</b></td>
	  <td><input type="text" name="category" value="" style="width:85%;" readonly disabled /></td>
  </tr>
	<tr>
		<td><b>Item Exipy:</b> </td>
		<td><lable style="color:red;"><b class="expDate">YYYY-MM-DD</b> <span style="color:red; font-size:11px;font-family:arial; font-weight:700;" class="expryLabel"></span></lable></td>
	</tr>

	<tr>
	  <td><b>Enter Qty:</b></td>
	  <td><input type="text" name="qty" value="" style="width:85%;" /></td>
  </tr>
	<tr>
	  <td width="128"><b>Free Item Code:</b></td>
	  <td width="337"><input type="text" name="free_item_barcode" value="" style="width:85%;" readonly disabled="disabled" /></td>
  </tr>
	<tr>
	  <td><b>Free Item Name:</b></td>
	  <td><input type="text" name="free_item_name" value="" style="width:85%;" readonly disabled="disabled" /></td>
  </tr>
	<tr>
	  <td><b>Free Item Qty:</b></td>
	  <td><input type="text" name="free_item_qty" value="" style="width:85%;" readonly disabled="disabled" /></td>
  </tr>
	<tr>
	  <td><b>MRP:</b></td>
	  <td><input type="text" name="mrp" value="" style="width:85%;" readonly disabled="disabled" /></td>
  </tr>
	<tr>
	  <td><b>Unit:</b></td>
	  <td><input type="text" name="unit" value="" style="width:85%;" readonly disabled="disabled" /></td>
  </tr>
	<tr>
	  <td><b>Sale Price:</b></td>
	  <td><input type="text" name="sale_price" value="" style="width:85%;" readonly disabled="disabled" /></td>
    </tr>

	<tr>
	  <td colspan="2"><table width="365" border="0" cellpadding="0" cellspacing="0">
	    <tr>
	      <td width="182"><label><strong>Total Sale Price</strong>:</label></td>
	      <td width="183"><strong style="color:red;" id="totalSale"></strong></td>
        </tr>
	    <tr>
	      <td><label><strong>Total MRP</strong>:</label></td>
	      <td><strong style="color:red;" id="totalMrp"></strong></td>
        </tr>
	    <tr>
	      <td colspan="2"><strong>Transfering To: <span id="blink" style="color:red;"></span></strong></td>
        </tr>
	    <tr>
	      <td colspan="2"><strong>Total Items: <span style="color:red;" id="totalItm"></span></strong></td>
        </tr>
      </table></td>
  </tr>
	<tr>
	  <td colspan="2"><input type="submit" name="addToTransferList" value="Add To List" />
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
}
.tt-dropdown-menu {
  background-color: #FFFFFF;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 4px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  padding: 5px 0;
  width: 300px;
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

</style>