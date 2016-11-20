$(document).ready(function(){

	var ajaxBootup = ajaxCall('rps/displayRPSItems',{});
	$('.transferGrid').html(ajaxBootup);
	var totalData = ajaxCall('rps/getSalePriceAndMrpRPSandTotal',{},'json');
	$('#totalSale').html(totalData[0]+'/-');
	$('#totalMrp').html(totalData[1]+'/-');
	$('#totalItm').html(totalData[2]);

	disableSelection(document.body);

	$('input[name=paidamount]').keyup(function(){
		var totalAmount = parseInt($('#totalSale').html());
		$('#returnAmount').html(parseInt($(this).val())-totalAmount);
	});

	$('input[name=nonmember]').click(function(){

		if($(this).is(':checked')){

			$('input[name=memberid]').attr('disabled','disabled');
		}else{

			$('input[name=memberid]').attr('disabled',false);
		}
	});

	$('#nonMem').click(function(){

		$('input[name=nonmember]').click();
	});


	$('input[name=memberid]').keyup(function(e){

		if(e.keyCode == 13){

			var result = ajaxCall('rps/getMemberDetails',{member_id: $(this).val()},'json');
			if(result.name == '' || result.name == null){

				$('#blink').html('');
				alert('No User Found!');
			}else{

				$('#blink').html(result.name);
				$('input[name=sbarcode]').focus();
			}
		}

	});

	$('input[name=sbarcode]').keyup(function(e){
	
			if(e.keyCode == 13){

				var result = ajaxCall('rps/getProductDetals',{barCode:$(this).val()},'json');
				if(result == null){
					alert('No item found!');
					return false;
				}
				$('input[name=prodName]').val(result.item_name);
				$('input[name=cqty]').val(result.item_qty); 
				$('input[name=sale_price]').val(result.free_item_price); 
				$('input[name=free_item_barcode]').val(result.free_item_barcode); 
				$('input[name=free_item_name]').val(result.free_item_name); 
				$('input[name=free_item_qty]').val(result.free_item_qty); 
				$('input[name=mrp]').val(result.item_mrp); 
				$('input[name=sale_price]').val(result.item_sale_price); 
				$('input[name=item_desc]').val(result.item_desc); 
				$('input[name=item_sku]').val(result.item_sku); 
				$('input[name=item_expiry]').val(result.expiry_date); 
				$('input[name=item_unit]').val(result.item_unit); 
				$('input[name=item_category]').val(result.item_category); 
				$('input[name=category]').val(result.item_category); 
				$('input[name=unit]').val(result.item_unit); 
				$('.expDate').html(result.expiry_date);
				$('.spinLoader').fadeOut(300);
				

				var SqlDate = result.expiry_date;
				var splitedDate = SqlDate.split('-');

				var sDD = splitedDate[2];
				var sMM = splitedDate[1];
				var sYY = splitedDate[0];

				var today = new Date();
				var dd = today.getDate();
				var mm = today.getMonth()+1; //January is 0!
				var yyyy = today.getFullYear();

				var date1 = new Date(dd+'/'+mm+'/'+yyyy);
				var date2 = new Date(sMM+'/'+sDD+'/'+sYY);
				var timeDiff = Math.abs(date2.getTime() - date1.getTime());
				var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 

				if(diffDays<=0){
					$('.expryLabel').html('(Your product has been expired!)');
					$('input[name=qty]').attr('disabled','disabled');
				}else{

					$('.expryLabel').html('(Your product hwill expire in '+diffDays+')');
				}

				$('input[name=qty]').focus();
			}
	});

	$('input[name=qty]').keyup(function(event){

		if(event.keyCode == 13){
			$('input[name=addToSaleList]').click();
		}
	});

	$('input[name=addToSaleList]').click(function(){

		if(parseInt($('input[name=qty]').val()) > parseInt($('input[name=cqty]').val())){

			alert('You cannot enter more than current quantity!!');
			return false;
		}
		if($('input[name=qty]').val().trim() == ''){

			alert('Please eneter qty!');
			$('input[name=qty]').focus();
			return false;
		}
		if($('input[name=sbarcode]').val().trim() == ''){

			alert('Please eneter barcode first!');
			return false;
		}
		if($('input[name=cqty]').val().trim() == ''){

			alert('Details not found! Unable to complete process!');
			return false;
		}

		var SendData = {};
		$('input, select, textarea').each(function(index){

			var input = $(this);
			SendData[input.attr('name')] = input.val();
		});

		var gridTable = ajaxCall('rps/insertToRpsGrid', SendData);
		
		$('.transferGrid').html(gridTable);
		

		$('input, textarea').each(function(index){

			if($(this).attr('type') != 'submit' && $(this).attr('name') != 'memberid'){

				$(this).val('');
			}
		});
		var totalData = ajaxCall('rps/getSalePriceAndMrpRPSandTotal',{},'json');
		$('#totalSale').html(totalData[0]+'/-');
		$('#totalMrp').html(totalData[1]+'/-');
		$('#totalItm').html(totalData[2]);
		$(".transferGrid").animate({ scrollTop: $(document).height() }, 1000);
		$('input[name=sbarcode]').focus();

	});


	$(document).on('dblclick','.tbDatagrid_RPSSaleItems tr', function(){
		var row = $(this);
		if(confirm('Are you sure to delete that row?')){

			
				var barCode = row.children('td:nth-child(1)').html();
				$('input[name=barcode]').val(barCode);
				$('input[name=barcode]').focus();
				var result = ajaxCall('rps/deleteGridTableRowRPS',{'index':row.index()});
				var totalData = ajaxCall('rps/getSalePriceAndMrpRPSandTotal',{},'json');
				/*var totalItems = ajaxCall('rps/getTotalItemsRPS',{},'json');*/
				if(totalData != null){

					$('#totalItm').html(totalData[2]);
					$('#totalSale').html(totalData[0]+'/-');
					$('#totalMrp').html(totalData[1]+'/-');
					$('.tbDatagrid_RPSSaleItems').html(result);
				}else{

					$('#totalItm').html('');
					$('#totalSale').html('');
					$('#totalMrp').html('');
					$('.tbDatagrid_RPSSaleItems').fadeOut(200);
				}
				

				
		}
	});



	

	$(".qsbsearch_fieldox").keyup(function() {
	    $('.crud_search').click();
	});

	$(document).on('dblclick',"#flex1 tr", function(){

		$('input[name=sbarcode]').val($(this).children('td:nth-child(1)').children('div').html());
		$('input[name=sbarcode]').focus();
	});


	$('input[name=SaveTransfer]').click(function(){

		window.open(base_url+'index.php/rps/printbill','winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=800,height=350,left=250,top=150,status=1,directories=1,dialog');
		
		setTimeout(
		  function() 
		  {
		    ajaxCall('rps/saveRPSSaleProducts',{});
		  }, 3000);

    	$('#totalItm').html('');
    	$('#totalMrp').html('');
    	$('#totalItm').html('');
    	$('#blink').html('');
		$('.transferGrid').html('');
	});


/**************************************** Ajax Function Call *********************************************/

	function ajaxCall(ctrlFunc, jsonData, resType){

			var finalResult = '';
			$.ajax({
				type:'POST',
				url: base_url+'index.php/'+ctrlFunc,
				data: jsonData,
				async: false,
				success: function(result){

					finalResult = result;
				}
			});
			if(resType == 'json'){

				return $.parseJSON(finalResult);
			}else{
				return finalResult
			}
	}

	function disableSelection(target){
        if (typeof target.onselectstart!="undefined") //IE route
            target.onselectstart=function(){return false}
        else if (typeof target.style.MozUserSelect!="undefined") //Firefox route
            target.style.MozUserSelect="none"
        else //All other route (ie: Opera)
            target.onmousedown=function(e){if(e && e.target && e.target.tagName){if(/^(input|select|textarea)$/i.test(e.target.tagName)){return true;}}return false;}
        target.style.cursor = "default"
    }


});