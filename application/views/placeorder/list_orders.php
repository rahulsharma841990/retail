<style type="text/css">
*{
	margin: 0 0 0 0;
	font-family:arial;
}

.pure-table {
color: #333;
font-family: Helvetica, Arial, sans-serif;
width: 100%;
border-collapse:
collapse; border-spacing: 0;
}

.pure-table td, .pure-table th {
border: 1px solid #CCC; /* No more visible border */
height: 30px;
transition: all 0.3s; /* Simple transition for hover effect */
}

.pure-table th {
background: #DFDFDF; /* Darken header a bit */
font-weight: bold;
}

.pure-table td {
background: #FAFAFA;
text-align: center;
}

/* Cells in even rows (2,4,6...) are one color */
.pure-table tr:nth-child(even) td { background: #F1F1F1; }

/* Cells in odd rows (1,3,5...) are another (excludes header cells) */
.pure-table tr:nth-child(odd) td { background: #FEFEFE; }

.pure-table tr td:hover { background: #666; color: #FFF; } /* Hover cell effect! */
.mybutton {
	-moz-box-shadow:inset 0px 1px 0px 0px #bee2f9;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bee2f9;
	box-shadow:inset 0px 1px 0px 0px #bee2f9;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #63b8ee), color-stop(1, #468ccf) );
	background:-moz-linear-gradient( center top, #63b8ee 5%, #468ccf 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#63b8ee', endColorstr='#468ccf');
	background-color:#63b8ee;
	-webkit-border-top-left-radius:0px;
	-moz-border-radius-topleft:0px;
	border-top-left-radius:0px;
	-webkit-border-top-right-radius:0px;
	-moz-border-radius-topright:0px;
	border-top-right-radius:0px;
	-webkit-border-bottom-right-radius:0px;
	-moz-border-radius-bottomright:0px;
	border-bottom-right-radius:0px;
	-webkit-border-bottom-left-radius:0px;
	-moz-border-radius-bottomleft:0px;
	border-bottom-left-radius:0px;
	text-indent:0;
	border:1px solid #3866a3;
	display:inline-block;
	color:#14396a;
	font-family:Arial;
	font-size:12px;
	font-weight:bold;
	font-style:normal;
	height:35px;
	line-height:35px;
	width:85px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #7cacde;
	margin-top: 2%;
	margin-bottom: 2%;
}
.mybutton:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #468ccf), color-stop(1, #63b8ee) );
	background:-moz-linear-gradient( center top, #468ccf 5%, #63b8ee 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#468ccf', endColorstr='#63b8ee');
	background-color:#468ccf;
}.mybutton:active {
	position:relative;
	top:1px;
}

.no-hover:hover{
	background: none !important;
}
.red {
	-moz-box-shadow:inset 0px 1px 0px 0px #f5978e;
	-webkit-box-shadow:inset 0px 1px 0px 0px #f5978e;
	box-shadow:inset 0px 1px 0px 0px #f5978e;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #f24537), color-stop(1, #c62d1f) );
	background:-moz-linear-gradient( center top, #f24537 5%, #c62d1f 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f24537', endColorstr='#c62d1f');
	background-color:#f24537;
	-webkit-border-top-left-radius:0px;
	-moz-border-radius-topleft:0px;
	border-top-left-radius:0px;
	-webkit-border-top-right-radius:0px;
	-moz-border-radius-topright:0px;
	border-top-right-radius:0px;
	-webkit-border-bottom-right-radius:0px;
	-moz-border-radius-bottomright:0px;
	border-bottom-right-radius:0px;
	-webkit-border-bottom-left-radius:0px;
	-moz-border-radius-bottomleft:0px;
	border-bottom-left-radius:0px;
	text-indent:0;
	border:1px solid #d02718;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:12px;
	font-weight:bold;
	font-style:normal;
	height:35px;
	line-height:35px;
	width:80px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #810e05;
}
.red:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #c62d1f), color-stop(1, #f24537) );
	background:-moz-linear-gradient( center top, #c62d1f 5%, #f24537 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#c62d1f', endColorstr='#f24537');
	background-color:#c62d1f;
}
.disabled{
	opacity:0.5;
	cursor:not-allowed;
}
</style>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="3" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center"><strong><u>List of Placed Ordersss</u></strong></td>
    </tr>
    <tr>
      <td width="6%">&nbsp;</td>
      <td width="88%">&nbsp;</td>
      <td width="6%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="pure-table">
        <tbody>
          <tr>
            <th width="6%">Sr. No.</th>
            <th width="7%">Store id</th>
            <th width="11%">Store Name</th>
            <th width="13%">Total Amount</th>
            <th width="11%">Delv Status</th>
            <th width="18%">Order Date</th>
            <th width="18%">Details</th>
            <th width="16%">Change Status</th>
          </tr>
          <?php
          		$index = 1;
          		foreach($orders as $key => $value):
          ?>
          <tr>
            <td><?=$index?></td>
            <td><?=$value->store_id?></td>
            <td><?=$value->store_name?></td>
            <td><?=$value->total_amount?></td>
            <td><?=$value->delv_status?></td>
            <td><?=$value->order_date?></td>
            <td class="no-hover">
            		<form method="POST" action="<?=base_url()?>index.php/placeorder/viewOrder">
            			<input type="hidden" name="orderID" value="<?=$value->orderid?>" />
            			<input type="submit" class="mybutton submitPop" name="viewdetails" value="View Details" />
            		</form>
            		
            </td>
            <td>	
            		<?php
            			if($value->delv_status == 0):
            		?>
            		<form method="POST" action="<?=base_url()?>index.php/placeorder/updateDelvStatus">
            			<input type="hidden" name="store_id" value="<?=$value->store_id?>" />
            			<input type="hidden" name="order_date" value="<?=$value->order_date?>" />
            			<input type="submit" class="red submitPop" name="develv" value="Delivered" readonly />
            		</form>
            		<?php
            			else:
            		?>
            			<input type="button" class="red disabled" name="develv" value="Delivered" readonly />
            		<?php
            			endif;
            		?>
            </td>
          </tr>
          <?php
          		$index++;
          		endforeach;
          ?>
        </tbody>
      </table></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
