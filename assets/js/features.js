$(document).ready(function(){
	
	var picker = new Pikaday(
    {
        field: document.getElementById('sr_datepicker'),
        firstDay: 1,
        minDate: new Date(2014,12,31),
        format: 'YYYY-MM-DD',
        maxDate: new Date(2020, 12, 31),
        yearRange: [2000,2020]
    });


    $('input[name=Updatebarcode]').keyup(function(e){

    	  if(e.keyCode == 13){

    	  		$.ajax({
    	  			type:'POST',
    	  			url: base_url+'index.php/features/details',
    	  			data: {barcode:$(this).val()},
    	  			success: function(result){
                                         
    	  				var jsonData = $.parseJSON(result);
    	  				$('input[name=sr_itemname]').val(jsonData.item_name);
    	  				$('textarea[name=sr_itemdesc]').val(jsonData.item_desc);
                $('input[name=sr_itemmrp]').val(jsonData.item_mrp);
    	  				$('input[name=sr_purchaseprice]').val(jsonData.item_purchase_price);
    	  				$('input[name=sr_unit]').val(jsonData.item_unit);
    	  				$('input[name=sr_saleprice]').val(jsonData.item_sale_price);
    	  				$('input[name=sr_qty]').val(jsonData.item_qty);
    	  				$('input[name=sr_expiry]').val(jsonData.item_expiry);
    	  				$('input[name=sr_freebarcode]').val(jsonData.free_item_barcode);
    	  				$('input[name=sr_freename]').val(jsonData.free_item_name);
    	  				$('input[name=sr_freeqty]').val(jsonData.free_item_qty);
    	  				$('input[name=sr_freemrp]').val(jsonData.free_item_mrp);
    	  				$('input[name=sr_id]').val(jsonData.id);
    	  			}
    	  		});
    	  }
    });

    $('select[name=selectUpdatebarcode]').change(function(){

    	$.ajax({
  			type:'POST',
  			url: base_url+'index.php/features/details',
  			data: {barcode:$(this).val()},
  			success: function(result){

  				var jsonData = $.parseJSON(result);
  				$('input[name=sr_itemname]').val(jsonData.item_name);
  				$('textarea[name=sr_itemdesc]').val(jsonData.item_desc);
  				$('input[name=sr_itemmrp]').val(jsonData.item_mrp);
          $('input[name=sr_purchaseprice]').val(jsonData.item_purchase_price);
  				$('input[name=sr_unit]').val(jsonData.item_unit);
  				$('input[name=sr_saleprice]').val(jsonData.item_sale_price);
  				$('input[name=sr_qty]').val(jsonData.item_qty);
  				$('input[name=sr_expiry]').val(jsonData.item_expiry);
  				$('input[name=sr_freebarcode]').val(jsonData.free_item_barcode);
  				$('input[name=sr_freename]').val(jsonData.free_item_name);
  				$('input[name=sr_freeqty]').val(jsonData.free_item_qty);
  				$('input[name=sr_freemrp]').val(jsonData.free_item_mrp);
  				$('input[name=sr_id]').val(jsonData.id);
  			}
  		});
    });

    $('input[name=searchBy]').click(function(){

    	if($(this).val() == 'barcode'){

    		$('select[name=selectUpdatebarcode]').hide();
    		$('input[name=Updatebarcode]').show();
    	}else{
    		$('input[name=Updatebarcode]').hide();
    		$('select[name=selectUpdatebarcode]').show();
    	}
    });

    $('input[name=UpdateDetails]').click(function(){

    		if(confirm('Are you sure to save that details?')){

    			var SendData = {};
				$('input, select, textarea').each(function(index){

					var input = $(this);
					SendData[input.attr('name')] = input.val();
				});
				$.ajax({
					type:'POST',
					url: base_url+'index.php/features/saveDetails',
					data: SendData,
					success: function(result){

						$('input[name=sr_itemname]').val('');
		  				$('textarea[name=sr_itemdesc]').val('');
		  				$('input[name=sr_itemmrp]').val('');
		  				$('input[name=sr_unit]').val('');
		  				$('input[name=sr_saleprice]').val('');
		  				$('input[name=sr_qty]').val('');
		  				$('input[name=sr_expiry]').val('');
		  				$('input[name=sr_freebarcode]').val('');
		  				$('input[name=sr_freename]').val('');
		  				$('input[name=sr_freeqty]').val('');
		  				$('input[name=sr_freemrp]').val('');
		  				$('input[name=sr_id]').val('');
					}
				});
    			
    		}
    });




    if (typeof target.onselectstart!="undefined") //IE route
            target.onselectstart=function(){return false}
        else if (typeof target.style.MozUserSelect!="undefined") //Firefox route
            target.style.MozUserSelect="none"
        else //All other route (ie: Opera)
            target.onmousedown=function(e){if(e && e.target && e.target.tagName){if(/^(input|select|textarea)$/i.test(e.target.tagName)){return true;}}return false;}
        target.style.cursor = "default"

});