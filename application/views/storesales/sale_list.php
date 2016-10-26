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


	
</style>


<script type="text/javascript">
$(document).ready(function() {
    $('#datatables').DataTable( {
    	  dom: 'Bfrtip',
    		
	      buttons: [
	          'copy', 'csv', 'excel', 'pdf', 'print'
	      ],
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