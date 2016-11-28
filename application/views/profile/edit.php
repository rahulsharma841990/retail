<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
td{
	font-family: arial;
	font-size:14px;
}
input{
	width:100%;	
}
input[type=submit]{

	border:1px solid #2B7FF5;
	border-radius: 4px;
	height: 35px;
	color: #FFF;
	cursor: pointer;
	background-color: #297AEA;
	width:80%;
	margin-bottom:5%;
}
</style>
<form method="POST" action="<?=base_url()?>index.php/profile/update">
  <input type="hidden" value="<?=$userData->id?>" name="userid">
  <table width="40%" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#FFF;border-radius:5px;margin-top:2%;">
    <tbody>
      <tr>
        <td width="7%">&nbsp;</td>
        <td colspan="3" align="center"><h2>Edit Profile</h2></td>
        <td width="7%">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td width="19%">&nbsp;</td>
        <td width="39%">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Store Name:</td>
        <td><input type="text" name="store_name" value="<?=$userData->store_name?>" /></td>
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
        <td>Email ID:</td>
        <td><input type="text" name="emailid" value="<?=$userData->email_id?>" /></td>
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
        <td>Username:</td>
        <td><input type="text" name="username" value="<?=$userData->store_username?>" /></td>
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
        <td>Password:</td>
        <td><input type="password" name="password" value="" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td style="font-size:10px;">(leave blank fi don't want to change)</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Mobile:</td>
        <td><input type="text" name="mobile" value="<?=$userData->mobile?>" /></td>
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
        <td colspan="2" style="color:green;"><strong><?=$this->session->flashdata('update');?></strong></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="center"><input type="submit" name="save_profile" value="Save Profile" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>
</form>
