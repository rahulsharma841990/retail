<style type="text/css">
	*{
		margin:0 0 0 0;
	}
	input{
		height: 25px;
		width:100%;
	}
	

  input[type=text]{

      height: 23px !important;
      width: 95% !important;
  }
  
   select{

      height: 26px !important;
      width: 97% !important;
  }

  textarea{

      width: 95% !important;
  }
	
	
</style>
<table width="100%" border="0" cellpadding="0" cellspacing="0"  class="main-table">
  <tbody>
    <tr>
      <td colspan="2" align="center" style="text-align:center;"><h3>Enter Bill Details</h3></td>
      <td colspan="2" align="center" style="text-align:center;"><h3>Enter Product Details</h3></td>
      <td width="12%"><strong>Select Category: </strong></td>
      <td width="25%">
      	<select name="category">
        	<option>Select Category</option>
        	<?php
				foreach($categories as $key => $value):
			?>
        	<option value="<?=$value->id?>"><?=$value->category_name?></option>
            <?php
				endforeach;
			?>
      	</select>
      </td>
    </tr>
    <tr>
      <td width="9%" height="38"><strong>Enter Bill Number*</strong></td>
      <td width="20%">
        <input name="billnum" type="text" tabindex="1" value="" id="billnum" />
      </td>
      <td><strong>Item Code</strong></td>
      <td>
        <input name="barCode" class="ShowHide itembarcode" type="text" tabindex="5" value="" id="barCode" style="width:100% !important" />
      </td>
      <td><strong>Enter Sale Price:</strong></td>
      <td><input name="salePrice" type="text" class="ShowHide" tabindex="12" value="" id="salePrice" /></td>
    </tr>
    <tr>
      <td height="38"><strong>Select Vandor:*</strong></td>
      <td>
        <select name="vendor"  style="height:30px;" tabindex="2" id="vendor">
          <option>Select Vendor</option>
          <?php
							foreach($vendors as $key => $value):
						?>
          <option value="<?=$value->id?>">
            <?=$value->vendor_name?>
          </option>
          <?php
							endforeach;
						?>
        </select>
      </td>
      <td><strong>Enter Product Name:</strong></td>
      <td>
        <input name="prodName" class="ShowHide" type="text" tabindex="6" value="" id="prodName" />
      </td>
      <td><strong>Enter Purchase Price:</strong></td>
      <td><input name="purchasePrice" class="ShowHide" type="text" tabindex="13" value="" id="purchasePrice" /></td>
    </tr>
    <tr>
      <td height="34"><strong>Bill Date:*</strong></td>
      <td>
        <input name="billDate" type="text" id="datepicker" tabindex="3" value="" />
      </td>
      <td><strong>Enter Product Desc:</strong></td>
      <td>
        <input name="prodDesc" class="ShowHide" type="text" tabindex="6" value="" id="prodDesc" />
      </td>
      <td><strong>Enter Qty:</strong></td>
      <td><input name="qty" type="text" class="ShowHide" tabindex="14" value="" id="qty" /></td>
    </tr>
    <tr>
      <td height="38">&nbsp;</td>
      <td><input name="startAddItem" type="submit" tabindex="4" value="Enter Items" /></td>
      <td width="10%"><strong>Enter MRP:</strong></td>
      <td width="24%">
        <input name="mrp" class="ShowHide" type="text" tabindex="8" value="" id="mrp" />
      </td>
      <td><strong>Free Item Barcode:</strong></td>
      <td><input name="FreeItemCode" class="ShowHide" type="text" tabindex="15" value="" id="FreeItemCode" /></td>
    </tr>
    <tr>
      <td height="36">&nbsp;</td>
      <td>&nbsp;</td>
      <td><strong>Item SKU:</strong></td>
      <td>
        <input name="sku" class="ShowHide" type="text" tabindex="9" value="" id="sku" />
      </td>
      <td><strong>Free Item Name:</strong></td>
      <td><input name="FreeItemName" class="ShowHide" type="text" tabindex="16" value="" id="FreeItemName" /></td>
    </tr>
    <tr>
      <td height="29">&nbsp;</td>
      <td><strong>Total Bill Amount:</strong><strong id="totalPricePurchase" style="color:red;"></strong></td>
      <td><strong>Product Unit</strong></td>
      <td>
        <select name="unit" class="ShowHide" style="width:45%;" tabindex="10" id="unit">
          <option>Select Unit</option>
          <option value="gm">GM</option>
          <option value="kg">KG</option>
          <option value="ltr">LTR</option>
          <option value="gm">PCS</option>
        </select>
      </td>
      <td><strong>Free Item Qty</strong></td>
      <td><input name="FreeQty" class="ShowHide" type="text" tabindex="17" value="" id="FreeQty" /></td>
    </tr>
    <tr>
      <td height="30" colspan="2" align="center">
      	
                <img src="img/spin.gif" style="width:10%; vertical-align:center; display:none;" id="saveSpinner" />
                <input type="submit" name="savePurchaseList" value="Save Bill" style="width:40%;" />
                <input type="submit" name="deletBill" value="Delete Bill" style="width:40%;" />
            
      </td>
      <td><strong>Enter Expiry:</strong></td>
      <td>
        <input name="expiryDate" class="ShowHide" type="text" id="datepickerExp" tabindex="11" value="" />
      </td>
      <td><strong>Free Item MRP:</strong></td>
      <td><input name="freeMrp" class="ShowHide" type="text" tabindex="18" value="" id="freeMrp" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2" align="right">
      		<input name="addToList" type="submit" style="width:20%;" tabindex="19" value="Add To List" />
			<input name="resetData" type="submit" style="width:20%;" tabindex="20" value="Reset Data"/>
&nbsp;      </td>
    </tr>
  </tbody>
</table>
<script type="text/javascript">
	
	var picker = new Pikaday(
	    {
	        field: document.getElementById('datepicker'),
	        firstDay: 1,
	        minDate: new Date(2014,12,31),
	        format: 'YYYY-MM-DD',
	        maxDate: new Date(2020, 12, 31),
	        yearRange: [2000,2020]
	    });

		var picker = new Pikaday(
	    {
	        field: document.getElementById('datepickerExp'),
	        firstDay: 1,
	        minDate: new Date(2014,12,31),
	        format: 'YYYY-MM-DD',
	        maxDate: new Date(2020, 12, 31),
	        yearRange: [2000,2020]
	    });
</script>

<div style="width:100%; float:left; height:300px !important; overflow-x: scroll; overflow-y: scroll !important;" id="tableData">
			
		</div>


<style type="text/css">
	input{
		font-size: 12px;
	}
</style>

<script type="text/javascript">
	$(document).ready(function(e) {
        $('.ShowHide').attr('disabled','disabled');
    });
</script>

<script src="<?=base_url()?>assets/js/typeahead.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var base_url = '<?=base_url()?>';
    $('.itembarcode').typeahead({
          name: 'barCode',
          remote:base_url+'index.php/purchase/getItemName/%QUERY',
          limit : 20
      });
  });
</script>
<style type="text/css">
.twitter-typeahead{
	width:95.5%;
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
.main-table{

	font-family: arial;
	font-size: 13px;
	margin-top: 1%;
}
b, label, strong{

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