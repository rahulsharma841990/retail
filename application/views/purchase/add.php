<link href="css/table.css" rel="stylesheet" type="text/css" />
<style type="text/css">
	*{
		margin:0 0 0 0;
	}
	input{
		height: 25px;
		width:100%;
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
	/* select{
    width:100% !important;
    height:40px !important;
  } */

  input[type=text], select{

      height: 23px !important;
      width: 95% !important;
  }

  textarea{

      width: 95% !important;
  }
	
	
</style>
<table width="100%" border="1" cellpadding="0" cellspacing="0" class="table-fill">
  <tbody>
    <tr>
      <td colspan="2" align="center" style="text-align:center;"><h3>Enter Bill Details</h3></td>
      <td colspan="2" align="center" style="text-align:center;"><h3>Enter Product Details</h3></td>
      <td>Select Category: </td>
      <td>
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
      <td width="9%">Enter Bill Number*</td>
      <td width="18%">
        <input name="billnum" type="text" tabindex="1" value="" id="billnum" />
      </td>
      <td>Item Code</td>
      <td>
        <input name="barCode" class="ShowHide itembarcode" type="text" tabindex="5" value="" id="barCode" style="width:192% !important" />
      </td>
      <td>Enter Sale Price:</td>
      <td><input name="salePrice" type="text" class="ShowHide" tabindex="12" value="" id="salePrice" /></td>
    </tr>
    <tr>
      <td>Select Vandor:*</td>
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
      <td>Enter Product Name:</td>
      <td>
        <input name="prodName" class="ShowHide" type="text" tabindex="6" value="" id="prodName" />
      </td>
      <td>Enter Purchase Price:</td>
      <td><input name="purchasePrice" class="ShowHide" type="text" tabindex="13" value="" id="purchasePrice" /></td>
    </tr>
    <tr>
      <td>Bill Date:*</td>
      <td>
        <input name="billDate" type="text" id="datepicker" tabindex="3" value="" />
      </td>
      <td>Enter Product Desc:</td>
      <td>
        <textarea name="prodDesc" class="ShowHide" style="overflow:auto;resize:none; height:60px;width:100%;" tabindex="7" id="prodDesc"></textarea>
      </td>
      <td>Enter Qty:</td>
      <td><input name="qty" type="text" class="ShowHide" tabindex="14" value="" id="qty" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="12%">Enter MRP:</td>
      <td width="23%">
        <input name="mrp" class="ShowHide" type="text" tabindex="8" value="" id="mrp" />
      </td>
      <td>Free Item Barcode:</td>
      <td><input name="FreeItemCode" class="ShowHide" type="text" tabindex="15" value="" id="FreeItemCode" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <input name="startAddItem" type="submit" tabindex="4" value="Enter Items" />
      </td>
      <td>Item SKU:</td>
      <td>
        <input name="sku" class="ShowHide" type="text" tabindex="9" value="" id="sku" />
      </td>
      <td>Free Item Name:</td>
      <td><input name="FreeItemName" class="ShowHide" type="text" tabindex="16" value="" id="FreeItemName" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>Total Bill Amount:</strong> <span style="color:red;"><strong id="totalPricePurchase"></strong></span></td>
      <td>Product Unit</td>
      <td>
        <select name="unit" class="ShowHide" style="width:45%;" tabindex="10" id="unit">
          <option>Select Unit</option>
          <option value="gm">GM</option>
          <option value="kg">KG</option>
          <option value="ltr">LTR</option>
          <option value="gm">PCS</option>
        </select>
      </td>
      <td>Free Item Qty</td>
      <td><input name="FreeQty" class="ShowHide" type="text" tabindex="17" value="" id="FreeQty" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      	
                <img src="img/spin.gif" style="width:10%; vertical-align:center; display:none;" id="saveSpinner" />
                <input type="submit" name="savePurchaseList" value="Save Bill" style="width:40%;" />
                <input type="submit" name="deletBill" value="Delete Bill" style="width:40%;" />
            
      </td>
      <td>Enter Expiry:</td>
      <td>
        <input name="expiryDate" class="ShowHide" type="text" id="datepickerExp" tabindex="11" value="" />
      </td>
      <td>Free Item MRP:</td>
      <td><input name="freeMrp" class="ShowHide" type="text" tabindex="18" value="" id="freeMrp" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">
      		<input name="addToList" type="submit" style="width:20%;" tabindex="19" value="Add To List" />
			<input name="resetData" type="submit" style="width:20%;" tabindex="20" value="Reset Data"/>
      </td>
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

<table width="100%" border="1" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td width="67%">
      
      		
		<div style="width:100%; float:left; height:250px !important; overflow-x: scroll; overflow-y: scroll !important;" id="tableData">
			
		</div>

      </td>
    </tr>
  </tbody>
</table>


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