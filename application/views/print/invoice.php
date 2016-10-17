<script src="<?=base_url()?>assets/js/jquery-latest.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/printThis.js"></script>

<div style="margin:0 auto;" id="printInvoice">
<style>
*{
  margin:0 0 0 0;
  font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size:15px;

}

.itemsTable td{
  border:1px solid #CCCCCC;
  
}
</style>

<?php
  $invoiceData = $this->session->userdata('StoreTransferItem');
  $storeData = $this->storemodel->getStoreInformation($invoiceData[0]['transferStore']);
?>

<center>
  <table width="800" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #000; padding:10px;">
    <tbody>
      <tr>
        <td colspan="2"><table width="800" border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td width="227" rowspan="2"><img src="<?=base_url()?>assets/images/rps_logo.jpg" style="width:100%; height:100px;" /></td>
              <td width="305">&nbsp;</td>
              <td width="268">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" align="right" valign="top"><table width="550" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                  <tr>
                    <td width="66" height="32">&nbsp;</td>
                    <td colspan="2" align="right" style="font-size:28px;"><strong style="font-size:22px;">New RPS (Right price shop)&nbsp;&nbsp;</strong></td>
                    </tr>
                  <tr>
                    <td height="20">&nbsp;</td>
                    <td colspan="2" align="right">Head Office Bogpur Road, Punjab National Bank&nbsp;&nbsp;</td>
                    </tr>
                  <tr>
                    <td height="26">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="right">Ground Floor, Bhullowal Distt-Hsp&nbsp;&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="26">&nbsp;</td>
                    <td width="66">&nbsp;</td>
                    <td width="160" align="right">Ph: 8725991100, 7087701112&nbsp;&nbsp;</td>
                  </tr>
                </tbody>
              </table></td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3"><hr/></td>
              </tr>
          </tbody>
        </table></td>
        </tr>
      <tr>
        <td height="89" colspan="2" valign="top"><table width="800" border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td width="41" height="28">&nbsp;</td>
              <td width="279" valign="bottom"><strong>Invoice: <?=$invoiceNum?></strong></td>
              <td width="160">&nbsp;</td>
              <td colspan="2" valign="bottom"><strong>Billed To: <?=$storeData->store_name?></strong></td>
            </tr>
            <tr>
              <td height="27">&nbsp;</td>
              <td><strong>Invoice Date:</strong> <?=date('Y-m-d')?></td>
              <td>&nbsp;</td>
              <td colspan="2"><?=strip_tags($storeData->store_address)?></td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="2">&nbsp;</td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td width="160">&nbsp;</td>
              <td width="160">&nbsp;</td>
            </tr>
          </tbody>
        </table>
          <p>&nbsp;</p></td>
        </tr>
      <tr>
        <td colspan="2"><hr/></td>
        </tr>
      <tr>
        <td width="493">&nbsp;</td>
        <td width="307">&nbsp;</td>
      </tr>
      <tr>
        <td height="113" colspan="2"><table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="itemsTable">
          <tbody>
            <tr style="background-color:#1E1818; color:#FFFFFF;">
              <td width="148" align="center"><strong>Bar Code</strong></td>
              <td width="346" height="32" align="left"><strong>&nbsp;Product Name</strong></td>
              <td width="67" align="center"><strong>Qty</strong></td>
              <td width="82" align="center"><strong>Sale Price</strong></td>
              <td width="78" align="center"><strong>MRP</strong></td>
              <td width="79" align="center"><strong>Amount</strong></td>
              </tr>
          
<?php
  $totalQty = 0;
  $totalSalePrice = 0;
  $totalMrp = 0;
  $TotalOfTotal = 0;
  foreach($invoiceData as $key => $value):
?>
              
            <tr>
              <td align="center" style="font-size:14px;"><?=$value['barcode']?></td>
              <td height="37" style="font-size:14px;">
              	&nbsp;<?=$value['prodName']?>
                <?php
                  if($value['free_item_barcode'] !=''):
                ?>
                <p style="font-size:12px;">&nbsp;&nbsp;&nbsp;<?=$value['free_item_name']?></p>
                <?php
                  endif;
                ?>
              </td>
              <td align="center" style="font-size:13px;"><?=$value['qty']?></td>
              <td align="center" style="font-size:13px;"><?=$value['sale_price']?>/-</td>
              <td align="center" style="font-size:13px;"><?=$value['mrp']?>/-</td>
              <td align="center" style="font-size:13px;"><?=($value['qty']*$value['sale_price'])?>/-</td>
            </tr>
            
<?php
  $totalQty = $totalQty + $value['qty'];
  $totalSalePrice = $totalSalePrice + $value['sale_price'];
  $totalMrp = $totalMrp + $value['mrp'];
  $TotalOfTotal = $TotalOfTotal + ($value['qty']*$value['sale_price']);
  endforeach;
?>
            
            <tr style="background-color:#1E1818; color:#FFFFFF;">
              <td align="center">&nbsp;</td>
              <td height="28" align="center"><strong style="font-size:13px;">Total</strong></td>
              <td align="center"><strong style="font-size:13px;"><?=$totalQty?></strong></td>
              <td align="center"><strong style="font-size:13px;"><?=$totalSalePrice ?>/-</strong></td>
              <td align="center"><strong style="font-size:13px;"><?=$totalMrp?>/-</strong></td>
              <td align="center"><strong style="font-size:13px;"><?=$TotalOfTotal?>/-</strong></td>
             </tr>
          </tbody>
        </table></td>
        </tr>
      <tr>
        <td valign="top"><table width="480" border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td width="10">&nbsp;</td>
              <td width="25">&nbsp;</td>
              <td width="445" style="font-size:13px; text-align:justify;">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td height="28" colspan="2"><strong style="font-family:arial;font-size:14px;">Terms and Conditions:</strong></td>
              </tr>
            <tr>
              <td height="58">&nbsp;</td>
              <td align="center" valign="top" style="font-size:11px; text-align:center; font-family:arial;">1)</td>
              <td valign="top" style="font-size:11px; text-align:justify; font-family:arial;">Certified that the particulars givern above are true and correct and the amount indicated represents price actully charges and that there is no additional consideration flowing, directly from the buyer.</td>
              </tr>
            <tr>
              <td height="26">&nbsp;</td>
              <td align="center" valign="top" style="font-size:11px; text-align:center; font-family:arial;">2)</td>
              <td valign="top" style="font-size:11px; text-align:justify; font-family:arial;">Goods once sold cannot be returned and/or exchanged.</td>
            </tr>
            <tr>
              <td height="44">&nbsp;</td>
              <td align="center" valign="top" style="font-size:11px; text-align:center; font-family:arial;">3)</td>
              <td valign="top" style="font-size:11px; text-align:justify; font-family:arial;">We reserved to ourselves the right to demand payment of this bill any time before due date.</td>
              </tr>
            <tr>
              <td height="28">&nbsp;</td>
              <td align="center" valign="top" style="font-size:11px; text-align:center; font-family:arial;">4)</td>
              <td valign="top" style="font-size:11px; text-align:justify; font-family:arial;">Payment are to be made at our office by a/c payee's cheque.</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="center" valign="top" style="font-size:13px; text-align:center; font-family:arial;">&nbsp;</td>
              <td style="font-size:13px; text-align:justify; font-family:arial;">&nbsp;</td>
            </tr>
            </tbody>
        </table></td>
        <td valign="top"><table width="282" border="0" align="right" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td width="99"><strong style="font-size:13px;">Total Total:</strong></td>
              <td width="123" align="right"><strong style="font-size:13px;"><?=$TotalOfTotal?>/-</strong></td>
              <td width="28">&nbsp;</td>
            </tr>
            <?php
              $tax = ($TotalOfTotal * 15)/100;
            ?>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><strong style="font-family:arial;font-size:13px;">Signature:</strong></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="19" colspan="3" valign="top">----------------------------------------------</td>
            </tr>
            <tr>
              <td height="48" colspan="3">&nbsp;</td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
    </tbody>
  </table>
</center>
</div>

<script type="text/javascript">
  $(document).ready(function(){

      $('#printInvoice').printThis();
  });
</script>