
<div class="uploadStock">
<form method="POST" action="<?=base_url()?>index.php/storestock/uploadStockByFile" enctype="multipart/form-data">
  <table width="547" border="0" cellspacing="0" cellpadding="0">
    <tbody>
      <tr>
        <td width="69">&nbsp;</td>
        <td width="129">&nbsp;</td>
        <td width="234">&nbsp;</td>
        <td width="115">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Select Excel File:</td>
        <td><input type="file" name="storeStockList" value="" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="uploadStock" value="Upload Stock" class="submitPop" /></td>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>
</form></div>

<style type="text/css">
	.uploadStock{

		width: 100%;
		height: 1000px;
		background-color: #F5F5F5;
		
		font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
	}
	body{
		overflow-y: hidden;
	}
</style>

