<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 00px;
	margin-right: 0px;
	margin-bottom: 0px;
}
body,td,th {
	font-family: arial;
	font-style: normal;
	font-weight: 14;
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
<form action="<?=base_url()?>index.php/profile/authOTP" method="POST">
    <table width="424" height="149" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#FFF;border-radius:5px;margin-top:2%;">
        <tr>
            <td height="57" colspan="4" align="center"><strong>Enter OTP</strong></td>
        </tr>
        <tr>
            <td width="68" height="24"></td>
            <td width="83"></td>
            <td width="174"></td>
            <td width="99"></td>
        </tr>
        <tr>
            <td height="22"></td>
            <td style="font-size:13px;">Enter OTP:</td>
            <td><input type="text" name="otp" value="" style="width:100%; height:23px;" /></td>
            <td><a href="<?=base_url()?>index.php/profile/sendOTP" style="font-size:12px;margin-left:10%;">Send OTP</a></td>
        </tr>
        <tr>
            <td height="23"></td>
            <td></td>
            <td colspan="2" style="font-size:12px; color:green;"><?=$this->session->flashdata('otp');?></td>
        </tr>
        <tr>
            <td height="23"></td>
            <td></td>
            <td><input type="submit" name="save_profile" value="Let Me IN" /></td>
            <td></td>
        </tr>
    </table>
</form>