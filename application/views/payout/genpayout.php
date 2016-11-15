<script>window.base_url = '<?=base_url()?>'</script>
<script src="<?=base_url()?>assets/js/jquery-latest.min.js"></script>
<link rel="stylesheet" href="<?=base_url()?>assets/css/pickday/pikaday.css">
<script src="<?=base_url()?>assets/js/moment.min.js"></script>
<script src="<?=base_url()?>assets/js/pikaday.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

		var picker = new Pikaday(

	    {

	        field: document.getElementById('fromdate'),

	        firstDay: 1,

	        minDate: new Date(2014,12,31),

	        format: 'YYYY-MM-DD',

	        maxDate: new Date(2020, 12, 31),

	        yearRange: [2000,2020]

	    });
	    var picker = new Pikaday(

	    {

	        field: document.getElementById('todate'),

	        firstDay: 1,

	        minDate: new Date(2014,12,31),

	        format: 'YYYY-MM-DD',

	        maxDate: new Date(2020, 12, 31),

	        yearRange: [2000,2020]

	    });
	});
</script>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
tr td strong {
}
body,td,th {
	font-family: arial;
}
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="7%">&nbsp;</td>
      <td width="18%">&nbsp;</td>
      <td width="54%">&nbsp;</td>
      <td width="14%">&nbsp;</td>
      <td width="7%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="3" align="center"><strong>Generate Payout</strong></td>
      <td>&nbsp;</td>
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
      <td>&nbsp;</td>
      <td>
      <form method="post" action="<?=base_url()?>index.php/payout/genratePayout">
          <table width="570" border="0" cellspacing="0" cellpadding="0">
            <tbody>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><strong style="font-size:12px;">Select Store:</strong></td>
                <td>
                	<select style="width:89.5%; height:25px;" name="store">
                    	<option>Select Store</option>
                      <?php
                        foreach($stores as $key => $value):
                      ?>
                        <option value="<?=$value->id?>"><?=$value->store_name?></option>
                      <?php
                        endforeach;
                      ?>
                	</select>
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="83">&nbsp;</td>
                <td width="83">&nbsp;</td>
                <td width="164">&nbsp;</td>
                <td width="53">&nbsp;</td>
                <td width="187">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><strong style="font-size:12px;">From Date:</strong></td>
                <td><input type="text" name="fromdate" value="" id="fromdate" /></td>
                <td><strong style="font-size:12px;">To Date:</strong></td>
                <td><input type="text" name="todate" value="" id="todate" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="5" align="center"><input type="submit" name="submitPayout" value="Generate Payout" /></td>
                </tr>
            </tbody>
          </table>
      </form>
      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
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
