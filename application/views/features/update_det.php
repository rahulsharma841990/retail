<script>window.base_url = '<?=base_url()?>'</script>
<script src="<?=base_url()?>assets/js/jquery-latest.min.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/css/pickday/pikaday.css">
<script src="<?=base_url()?>assets/js/moment.min.js"></script>
<script src="<?=base_url()?>assets/js/pikaday.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/features.js?r=<?=rand(2,6)?>"></script>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<title>Update Product Details</title>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="5%">&nbsp;</td>
      <td width="12%">&nbsp;</td>
      <td width="21%"><input type="hidden" name="sr_id" value="" id="sr_id" /></td>
      <td width="5%">&nbsp;</td>
      <td width="13%">&nbsp;</td>
      <td width="30%">&nbsp;</td>
      <td width="14%">&nbsp;</td>
    </tr>
    <tr>
      <td height="49">&nbsp;</td>
      <td valign="top">Prod Search By:</td>
      <td ><label ><input type="radio" name="searchBy" value="barcode" checked /> Enter Barcode</label>
      <br/>
      	<label><input type="radio" name="searchBy" value="dropdown" /> By Select Product</label>
      </td>
      <td>&nbsp;</td>
      <td>Free Item Name:</td>
      <td><input name="sr_freename" type="text" id="sr_freename" tabindex="10" value="" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="27">&nbsp;</td>
      <td>Enter Barcode: </td>
      <td>
      	<input name="Updatebarcode" type="text" tabindex="1" value="" id="byBarcode" />
        <select name="selectUpdatebarcode" style="width:60%; display:none;">
        	<option value="">Select Product</option>
       	  <?php
				foreach($prods as $key => $value):
			?>
            	<option value="<?=$value->item_bar_code?>"><?=$value->item_name?> | <?=$value->item_bar_code?></option>
            <?php
				endforeach;
			?>
        </select>
      </td>
      <td>&nbsp;</td>
      <td>Free Item Qty:</td>
      <td><input name="sr_freeqty" type="text" id="sr_freeqty" tabindex="11" value="" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="34">&nbsp;</td>
      <td>Item Name:</td>
      <td><input name="sr_itemname" type="text" disabled="disabled" id="sr_itemname" tabindex="2" value="" readonly /></td>
      <td>&nbsp;</td>
      <td>Free Item MRP</td>
      <td><input name="sr_freemrp" type="text" id="sr_freemrp" tabindex="12" value="" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="42">&nbsp;</td>
      <td>Item desc:</td>
      <td><textarea name="sr_itemdesc" disabled="disabled" readonly id="sr_itemdesc" tabindex="3"></textarea></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="28">&nbsp;</td>
      <td>Item MRP:</td>
      <td><input name="sr_itemmrp" type="text"  id="sr_itemmrp" tabindex="4" value="" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input name="UpdateDetails" type="submit" tabindex="13" value="Update & Save" id="UpdateDetails" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="32">&nbsp;</td>
      <td>Item Unit</td>
      <td><input name="sr_unit" type="text" disabled="disabled" id="sr_unit" tabindex="5" value="" readonly="readonly" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="27">&nbsp;</td>
      <td>Item Sale Price:</td>
      <td><input name="sr_saleprice" type="text" id="sr_saleprice" tabindex="6" value="" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="27">&nbsp;</td>
      <td>Item Purchase Price:</td>
      <td><input name="sr_purchaseprice" type="text" id="sr_purchaseprice" tabindex="6" value="" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="28">&nbsp;</td>
      <td>Item Qty</td>
      <td><input name="sr_qty" type="text" id="sr_qty" tabindex="7" value="" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="30">&nbsp;</td>
      <td>Item Expirry:</td>
      <td><input name="sr_expiry" type="text" id="sr_datepicker" tabindex="8" value="" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Free Item Code:</td>
      <td><input name="sr_freebarcode" type="text" id="sr_freebarcode" tabindex="9" value="" /></td>
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
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
