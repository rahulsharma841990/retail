<link href="css/table.css" rel="stylesheet" type="text/css" />
<style type="text/css">
	input{
		height: 19px;
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
	.table-fill tr th, .table-fill tr td{
		font-size:12px;
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
		<td width="116"><b>Enter Member ID:</b> </td>
		<td width="291">
			<input type="text" name="memberid" value="" style="width:85%;" />
		</td>
		<td colspan="2" rowspan="14">
       	  <div style="width:100%; height:500px; overflow-x:scroll;overflow-y:scroll;font-size:10px;" class="transferGrid">
	
</div>
        	<table width="50%" border="0" cellpadding="0" cellspacing="0">
        	  <tr>
        	    <td width="137"><label><strong>Total Sale Price</strong>:</label></td>
        	    <td width="160"><strong style="color:red;" id="totalSale"></strong></td>
      	    </tr>
        	  <tr>
        	    <td><label><strong>Total MRP</strong>:</label></td>
        	    <td><strong style="color:red;" id="totalMrp"></strong></td>
      	    </tr>
        	  <tr>
        	    <td colspan="2"><strong>Member Name: <span id="blink" style="color:red;"></span></strong></td>
      	    </tr>
        	  <tr>
        	    <td colspan="2"><strong>Total Items: <span style="color:red;" id="totalItm"></span></strong></td>
      	    </tr>
      	  </table>
        </td>
	</tr>
	<tr>
		<td><b>Enter Barcode:</b> </td>
		<td><input type="text" name="sbarcode" class="sbarcodes" value=""  /><img src="<?=base_url()?>assets/img/spin.gif" style="width:7%; vertical-align: center; display:none;" class="spinLoader"></td>
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
	  <td width="116"><b>Free Item Code:</b></td>
	  <td width="291"><input type="text" name="free_item_barcode" value="" style="width:85%;" readonly disabled="disabled" /></td>
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
		<td height="628" colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tbody>
		    <tr>
		      <td colspan="2" align="right" style="text-align:right;">Non Member Sale:</td>
		      <td width="91" id="nonMem"><input type="checkbox" name="nonmember" value="" /></td>
		      <td width="159" style="text-align:center;"><strong>Paid Amount</strong></td>
	        </tr>
		    <tr>
		      <td width="80"><input type="submit" name="addToSaleList" value="Add To List" /></td>
		      <td width="83"><input type="submit" name="cancelTransfer" value="Cancel Sale" /></td>
		      <td><input type="submit" name="SaveTransfer" value="Pint & Save" /></td>
		      <td>
              	<input type="text" name="paidamount" value="" style="width:100%;" />
              </td>
	        </tr>
		    <tr>
		      <td>&nbsp;</td>
		      <td>&nbsp;</td>
		      <td style="font-size:12px; font-weight:700;">Return Amount:</td>
		      <td style="color:red;text-align:center;" id="returnAmount"></td>
	        </tr>
	      </tbody>
		  </table>
	    <p>&nbsp;</p></td>
	</tr>
</table>



<script type="text/javascript">
	function isNumberKey(evt){
	    var charCode = (evt.which) ? evt.which : evt.keyCode
	    return !(charCode > 31 && (charCode < 48 || charCode > 57));
	}
</script>

<script src="<?=base_url()?>assets/js/typeahead.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var base_url = '<?=base_url()?>';
		$('input.sbarcodes').typeahead({
	        name: 'sbarcode',
	        remote:base_url+'index.php/rps/searchProduct/%QUERY',
	        limit : 20
	    });
	});
</script>
<style type="text/css">


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
	width: 145% !important;
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
.sbarcodes{
	width:145% !important;
	height: 22px;
	border: 1px solid #CCC !important;
	background-color: none !important;
}
.sbarcodes:hover{
	background-color: none !important;
}
</style>