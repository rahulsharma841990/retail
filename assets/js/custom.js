$(document).ready(function(){

	$('#errorLab').hide();
	

	$('#loginBut').click(function(){

		if($('#username').val().trim() != '' || $('#password').val().trim() != ''){

			$('#errorLab').html('<img src="img/spin.gif" />');
			$('#errorLab').show();
			var username = $('#username').val().trim();
			var password = $('#password').val().trim();
			var usertype = $('select[name=usertype]').val();
			var result = ajaxCall('login/doLogin',{'username':username,'password':password, 'usertype':usertype});
			$('#errorLab').hide();
			if(result.status == 'true'){
				window.location.href = base_url+''+result.redirect;
			}else{

				$('#errorLab').html('Wrong user details!').css('color','red').css('font-size','13px');
				$('#errorLab').show();
			}
			
		}else{

			$('#errorLab').html('Please fill details!').css('color','red').css('font-size','13px');
			$('#errorLab').show();
		}
	});

	$('#username, #password').click(function(){

		$('#errorLab').hide();
	});


	function ajaxCall(ctrlFunc, jsonData){

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

			return $.parseJSON(finalResult);
	}
	
});

