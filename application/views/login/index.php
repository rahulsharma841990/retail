<!DOCTYPE html>
<html oncontextmenu="return false">

<head>

  <meta charset="UTF-8">

  <title>Welcome To Store Login</title>
  <base href="<?=url()?>assets/">
  <link rel='stylesheet' href='css/jquery-ui.css'>

  

</head>

<body style="background-image: url('images/login_bg.jpg'); background-size: 100%" >
<?php
  $this->load->view('popup/popupbox');
?>
<form method="POST" action="<?=base_url()?>index.php/login/doLogin" id="loginNow" autocomplete="off">
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td width="20%">&nbsp;</td>
      <td width="31%">&nbsp;</td>
      <td width="8%">&nbsp;</td>
      <td width="29%">&nbsp;</td>
      <td width="12%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
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
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
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
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
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
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
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
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
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
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><label>Login Type:</label></td>
      <td><select name="usertype">
      	<option value="">Select Store Type</option>
        <option value="rps">RPS</option>
        <option value="gd">Godown</option>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="25">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><label>Username:</label> </td>
      <td><input name="username" value="" type="text" class="input" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="27">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><label>Password:</label> </td>
      <td><input name="password" value="" type="password" class="input" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><a href="javascript:;">Forget Password?</a></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><label class="error"><?=($this->session->flashdata('error')!='')?$this->session->flashdata('error'):''?></label></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="login" value="Login Now" class="button button-primary" /></td>
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
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
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
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
</form>
<style>
	label{
		font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
		font-size:14px;
		color:#FFF;
	}
	.input{
		width:80%;
		color:#000;
		height:24px;
	}
	a{
		color:#FFF;
		font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
		font-size:12px;
		text-decoration:none;
	}
	a:hover{
		text-decoration:underline;
	}
	select{
		width:81.7%;
		height:30px;
	}
	.button,
	.button-primary,
	.button-secondary {
		display: inline-block;
		text-decoration: none;
		font-size: 13px;
		line-height: 26px;
		height: 35px;
		margin: 0;
		width:80%;
		padding: 0 10px 1px;
		cursor: pointer;
		border-width: 1px;
		border-style: solid;
		-webkit-appearance: none;
		-webkit-border-radius: 3px;
		border-radius: 3px;
		white-space: nowrap;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}
	.button-primary {
		background: #2ea2cc;
		border-color: #0074a2;
		-webkit-box-shadow: inset 0 1px 0 rgba(120,200,230,0.5), 0 1px 0 rgba(0,0,0,.15);
		box-shadow: inset 0 1px 0 rgba(120,200,230,0.5), 0 1px 0 rgba(0,0,0,.15);
		color: #fff;
		text-decoration: none;
	}
	.button-primary:hover,
	.button-primary:focus {
		background: #1e8cbe;
		border-color: #0074a2;
		-webkit-box-shadow: inset 0 1px 0 rgba(120,200,230,0.6);
		box-shadow: inset 0 1px 0 rgba(120,200,230,0.6);
		color: #fff;
	}
	
	.button-primary:focus {
		border-color: #0e3950;
		-webkit-box-shadow: inset 0 1px 0 rgba(120,200,230,0.6), 1px 1px 2px rgba(0,0,0,0.4);
		box-shadow: inset 0 1px 0 rgba(120,200,230,0.6), 1px 1px 2px rgba(0,0,0,0.4);
	}
	
	.button-primary:active {
		background: #1b7aa6;
		border-color: #005684;
		color: rgba(255,255,255,0.95);
		-webkit-box-shadow: inset 0 1px 0 rgba(0,0,0,0.1);
		box-shadow: inset 0 1px 0 rgba(0,0,0,0.1);
		vertical-align: top;
	}
	.error{
		color:red;
		font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
		font-size:12px;
	}
</style>

<script src='js/jquery_and_jqueryui.js'></script>
<script>
    window.base_url = '<?=base_url()?>';
  </script>
  <!-- <script type="text/javascript" src="assets/js/custom.js"></script> -->
<script type="text/javascript">
    $(document).ready(function(){

      $('#wind').click(function(){

          window.open('http://futurewebs.in/retail/index.php');
      });

      $('#loginNow').on('submit',function(){

          $('.loaderPop').fadeIn(300);
      });
    });
  </script>

</body>

</html>