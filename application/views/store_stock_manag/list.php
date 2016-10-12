<?php
foreach($output->css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($output->js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<div style="width:100%; margin: 0 auto; font-size: 12px; font-family: arial;">
	<?php
		echo $output->output;
	?>
</div>

<h3>Total Stock Amount: <span style="color: red;"><?=$total?></span></h3>

<style type="text/css">
.groceryCrudTable tfoot {

  display: none !important;
}
</style>