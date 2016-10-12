<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome To Store Portal</title>
	 <base href="<?=url()?>assets/" />
		
	<script src="js/jquery-latest.min.js"></script>
	<script src="js/jquery.menu.js"></script>
    <link href="css/menu.css" rel="stylesheet" type="text/css" />
    <link href="css/col.css" rel="stylesheet" type="text/css" />
	
    <link rel="stylesheet" href="css/pickday/pikaday.css">
	<script src="js/moment.min.js"></script>
	<script src="js/pikaday.js"></script>
	<script type="text/javascript">
		
		window.base_url = '<?=url()?>';
	</script>
	
	<?php
		if($content == 'rps/rps_sale'):
	?>

	<script type="text/javascript" src="js/rps.js?ref=<?=rand(5,10000)?>"></script>

	<?php
		elseif($content == 'stores/transfer' || $content == 'purchase/add'):
	?>
    <script type="text/javascript" src="js/software.js?ref=<?=rand(5,10000)?>"></script>
    <?php
    	endif;
    ?>
    <style type="text/css">
		#menu-bar
		{
			font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			font-size: 13px;
			font-weight: normal; 
		}
		
	</style>
</head>
<body style="width:100%; margin: 0;" >
	<?php
		$this->load->view('popup/popupbox');
	?>
	<?php
		if(!in_array($content, array('vendor/vendors','stores/list','members/'))):
	?>
	<!---  Alert Box -->
	<!-- <link href="css/custom-alert.min.css" rel="stylesheet" type="text/css" />
	<script src="js/custom-alert.js"></script> -->
	<?php
		endif;
	?>
	<?php
		$this->load->view('inc/menu');
	?>
	<?php
		if(isset($content) && $content != null){

			$this->load->view($content);
		}else{

			$this->load->view('dashboard/index');
		}
	?>
	
</body>
<script type="text/javascript">
	$(document).ready(function(){

		$('.submitPop').click(function(){

				$('.loaderPop').fadeIn(300);
		});
	});
</script>
</html>