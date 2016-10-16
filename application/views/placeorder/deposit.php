<div style="width: 100%; text-align: center;">
	<h3>Enter Deposits</h3>
</div>
<?php
foreach($output->css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($output->js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<div style="width:99%; margin: 0 auto; font-size: 12px; font-family: arial; border: 1px solid #CCC;">
	<?php
		echo $output->output;
	?>
</div>

