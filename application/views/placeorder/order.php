<script type="text/javascript" src="js/placeorder.js?ref=<?=rand(5,10000)?>"></script>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>

<table border="0" width="100%" class="main-table" cellpadding="0" cellspacing="0">

<input type="hidden" name="item_desc" value="" />
<input type="hidden" name="item_sku" value="" />
<input type="hidden" name="item_expiry" value="" />
<input type="hidden" name="item_category" value="" />
<input type="hidden" name="item_unit" value="" />


	<tr>
	  <td width="128" height="41"><b>Enter Barcode:</b></td>
	  <td width="280"><input type="text" name="sbarcode" class="psbarcode" value="" style="width:85% !important;" />
	    <img src="<?=base_url()?>assets/img/spin.gif" style="width:7%; vertical-align: center; display:none;" class="spinLoader"></td>
		<td width="592" colspan="4" rowspan="13" valign="top">
			<div style="width:100%; height:500px; overflow-x:hidden;overflow-y:scroll;" class="transferGrid">
	
</div>
		</td>
	</tr>
	<tr>
	  <td height="43"><b>Product Name:</b></td>
	  <td><input type="text" name="prodName" value="" style="width:85%;" readonly disabled /></td>
	</tr>

	<tr>
	  <td height="41"><b>Current Qty:</b></td>
	  <td><input type="text" name="cqty" value="" style="width:85%;" readonly disabled /></td>
	</tr>

	<tr>
	  <td height="36"><b>Category:</b></td>
	  <td><input type="text" name="category" value="" style="width:85%;" readonly disabled /></td>
	</tr>

	<tr>
	  <td height="38"><b>Enter Qty:</b></td>
	  <td><input type="text" name="qty" value="" style="width:85%;" onkeypress="return isNumberKey(event);" /></td>
  </tr>
	<tr>
	  <td width="128" height="39"><b>Free Item Code:</b></td>
	  <td width="280"><input type="text" name="free_item_barcode" value="" style="width:85%;" readonly disabled="disabled" /></td>
  </tr>
	<tr>
	  <td height="39"><b>Free Item Name:</b></td>
	  <td><input type="text" name="free_item_name" value="" style="width:85%;" readonly disabled="disabled" /></td>
  </tr>
	<tr>
	  <td height="40"><b>Free Item Qty:</b></td>
	  <td><input type="text" name="free_item_qty" value="" style="width:85%;" readonly disabled="disabled" /></td>
  </tr>
	<tr>
	  <td height="37"><b>MRP:</b></td>
	  <td><input type="text" name="mrp" value="" style="width:85%;" readonly disabled="disabled" /></td>
  </tr>
	<tr>
	  <td height="40"><b>Unit:</b></td>
	  <td><input type="text" name="unit" value="" style="width:85%;" readonly disabled="disabled" /></td>
  </tr>
	<tr>
	  <td height="38"><b>Sale Price:</b></td>
	  <td><input type="text" name="sale_price" value="" style="width:85%;" readonly disabled="disabled" /></td>
    </tr>

	<tr>
	  <td>&nbsp;</td>
	  <td><input type="submit" name="addToSaleList" value="Add To List" />
      <input type="submit" name="SaveOrder" value="Place Order" /></td>
	</tr>

	<tr>
		<td height="78" colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#FFF; margin-top:3%; border-radius:5px;">
		  <tr>
		    <td width="182" height="25"><strong>Total Order Price</strong>:</td>
		    <td width="170"><strong style="color:red;" id="totalSale"></strong></td>
	      </tr>
		  <tr>
		    <td height="26"><strong>Total MRP</strong>:</td>
		    <td><strong style="color:red;" id="totalMrp"></strong></td>
	      </tr>
		  <tr>
		    <td height="23"><strong>Total Items:</strong></td>
            <td height="23"><strong><span style="color:red;" id="totalItm"></span></strong></td>
	      </tr>
      </table></td>
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
		$('input.psbarcode').typeahead({
	        name: 'sbarcode',
	        remote:base_url+'index.php/rps/searchProduct/%QUERY',
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
  background-color:#FFF !important;
}
.tt-hint {
  color: #999999;
 	background: #FFF !important;
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
.sbarcode{
	width:175% !important;
	height: 22px;
	border: 1px solid #CCC !important;
	background-color: none !important;
}
.sbarcode:hover{
	background-color: none !important;
}
input{
		height: 22px;
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

	color: #FFF;
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