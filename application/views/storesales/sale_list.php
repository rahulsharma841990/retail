<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/b-1.2.2/b-html5-1.2.2/b-print-1.2.2/fh-3.1.2/se-1.2.0/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/b-1.2.2/b-html5-1.2.2/b-print-1.2.2/fh-3.1.2/se-1.2.0/datatables.min.js"></script>
<style type="text/css">
	#datatables_wrapper{

		width: 98%;
		margin: 0 auto;
		margin-top: 3% !important;
		font-family: arial;
		font-size: 12px;
		margin-bottom: 3%;;
	}
	table{
		border-color: 1px solid #6db3f2 !important;
	}

	th{
		background: #6db3f2 !important;
	
		background: -webkit-linear-gradient(#6db3f2 0%, #54a3ee 50%, #3690f0 51%, #1e69de 100%)!important;
		background: -o-linear-gradient(#6db3f2 0%, #54a3ee 50%, #3690f0 51%, #1e69de 100%)!important;
		background: linear-gradient(#6db3f2 0%, #54a3ee 50%, #3690f0 51%, #1e69de 100%)!important;
	
	}

	#datatables_filter{
		margin-bottom: 1%;
	}

	
</style>


<script type="text/javascript">
$(document).ready(function() {
    $('#datatables').DataTable( {
    	 /* dom: 'Bfrtip',
    		
	      buttons: [
	          'copy', 'csv', 'excel', 'pdf', 'print'
	      ],*/
	    "fixedHeader": true,
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "ajax": {
            "url": "<?=base_url()?>index.php/storesales/getdata",
            "type": "POST",
            "data": function(b){

            	b.test = 'Hello World!'
            }
        },

        "columnDefs":[
        				{
        					"targets": 4,
				            "data": null,
				            "defaultContent": "<button>Click!</button>"
        				}
        			]

    });
} );
</script>
<form method="post" action="<?=base_url()?>index.php/" style="font-family:arial;">
    <table width="320" border="0" cellspacing="0" cellpadding="0">
      <tbody>
        <tr>
          <td height="29" colspan="2" style="font-size:13px !important;"><strong>Select Store:</strong></td>
          <td width="160">
          	<select name="store" style="width:100%;">
            	<option>Select Store</option>
            	<option>Store One</option>
                <option>Store Two</option>
            </select>
          </td>
          <td width="28">&nbsp;</td>
          <td width="33">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" style="font-size:13px !important;"><strong>From Date: </strong></td>
          <td><input type="text" name="from_date" value="" style="width:100%;" /></td>
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
        <tr>
          <td colspan="2" style="font-size:13px !important;"><strong>To Date: </strong></td>
          <td><input type="text" name="to_date" value="" style="width:100%;" /></td>
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
        <tr>
          <td width="65">&nbsp;</td>
          <td width="34">&nbsp;</td>
          <td><input type="submit" name="show_sale" value="Show Sale" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
</form>
<table id="datatables" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Item Barcode</th>
                <th>Item name</th>
                <th>Item MRP</th>
                <th>Item Sale Price</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Item Barcode</th>
                <th>Item name</th>
                <th>Item MRP</th>
                <th>Item Sale Price</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>