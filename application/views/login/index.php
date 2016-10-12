<!DOCTYPE html>
<html oncontextmenu="return false">

<head>

  <meta charset="UTF-8">

  <title>Welcome To Store Login</title>
  <base href="<?=url()?>assets/">
  <link rel='stylesheet' href='css/jquery-ui.css'>

  <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
  

</head>

<body style="background-color: #CCC;" >
<?php
  $this->load->view('popup/popupbox');
?>
<form method="POST" action="<?=base_url()?>index.php/login/doLogin" id="loginNow" autocomplete="off">
  <div class="login-card" style="margin-top: 10%;">
    <h1>Log-in</h1><br>
    <select name="usertype" style="width:100%; font-size: 13px; min-height: 30px; margin-bottom:3.5%;">
      <option>Select User Type</option>
      <option value="rps">RPS</option>
      <option value="gd">Godown</option>
    </select>
    <input type="text" name="username" placeholder="Username" id="username" value="" autocomplete="off">
    <input type="password" name="password" placeholder="Password" id="password" value="" autocomplete="off">
    
    <input type="submit" name="login" class="login login-submit" value="login" id="loginBut">
    <?php
      if(@$this->session->flashdata('error')!=''):
    ?>
    <span id="errorLab" style="margin-left: 30%;color:red;font-size: 13px;"><?=$this->session->flashdata('error')?></span>
    <?php
      endif;
    ?>
  <div class="login-help">
     <a href="#">Forgot Password</a>
     <a href="javascript:;" target="_blank" id="wind">Switch To Online</a>
  </div>
</div>
</form>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->

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