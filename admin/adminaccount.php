<?php
	session_start();
	if($_SESSION['pmadminid']=="")
	{		 
	echo "<script>location.replace('adminlogin.php')</script>";
	}
	require ("sql.php");	
	
	$task = $_REQUEST['task'];
	
	if($task == "edit")
	{
		$sql = "update user set firstname = '".$_REQUEST['firstname']."',
								lastname = '".$_REQUEST['lastname']."',
								username = '".$_REQUEST['username']."',
								password  = '".$_REQUEST['password']."',
								admin_email = '".$_REQUEST['admin_email']."',
								contactss_email = '".$_REQUEST['contactss_email']."',
								info_center_email = '".$_REQUEST['info_center_email']."',
								forgot_pass_email1 = '".$_REQUEST['forgot_pass_email1']."',
								forgot_pass_email2 = '".$_REQUEST['forgot_pass_email2']."',
								phone1 = '".$_REQUEST['phone1']."',
								phone2 = '".$_REQUEST['phone2']."'
							where account_type = 'Administrator'";	
		$result = mysql_query($sql);
		$msg = "Information has been updated.";		
	}

	$sql ="select *  from user where account_type = 'Administrator'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>::: Indian Pages - Admin :::</title>
  <LINK href="css/general.css" type=text/css rel=stylesheet>
  <LINK href="css/layout.css" type=text/css rel=stylesheet>
  <link href="css/content.css" rel="stylesheet" type="text/css" />
  <link href="css/word.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript">
function dovalidation()
{ 
	if(document.getElementById("firstname").value=="")
	{
		alert("Please enter your First Name");
		document.getElementById("firstname").focus;
		return false;
	}
	if(document.getElementById("lastname").value=="")
	{
		alert("Please enter your Last Name");
		document.getElementById("lastname").focus;
		return false;
	}	
	if(document.getElementById("username").value=="")
	{
		alert("Please enter Username");
		document.getElementById("username").focus;
		return false;
	}
	if(document.getElementById("password").value=="")
	{
		alert("Please enter password");
		document.getElementById("password").focus;
		return false;
	}
	if(document.getElementById("password").value!=document.getElementById("repassword").value)
	{
		alert("Please retype password correctly");
		document.getElementById("repassword").focus;
		return false;
	}
	else if(document.getElementById("admin_email").value == "")
	{
		alert("Please enter Admin Email ID");
		document.getElementById("admin_email").focus();	
		return false;	
	}
	else if(!checkMail(document.getElementById("admin_email")))
    {
		document.getElementById("admin_email").focus();
		document.getElementById("admin_email").value="";
		return false;
	}
	else if(document.getElementById("contactss_email").value == "")
	{
		alert("Please enter Contact Email ID");
		document.getElementById("contactss_email").focus();	
		return false;	
	}
	else if(!checkMail(document.getElementById("contactss_email")))
    {
		document.getElementById("contactss_email").focus();
		document.getElementById("contactss_email").value="";
		return false;
	}
	else if(document.getElementById("info_center_email").value == "")
	{
		alert("Please enter Information Center Email ID");
		document.getElementById("info_center_email").focus();	
		return false;	
	}
	else if(!checkMail(document.getElementById("info_center_email")))
    {
		document.getElementById("info_center_email").focus();
		document.getElementById("info_center_email").value="";
		return false;
	}
	else if(document.getElementById("forgot_pass_email1").value == "")
	{
		alert("Please enter Password Recovery Email ID - 1");
		document.getElementById("forgot_pass_email1").focus();	
		return false;	
	}
	else if(!checkMail(document.getElementById("forgot_pass_email1")))
    {
		document.getElementById("forgot_pass_email1").focus();
		document.getElementById("forgot_pass_email1").value="";
		return false;
	}
	else if(document.getElementById("forgot_pass_email2").value == "")
	{
		alert("Please enter Password Recovery Email ID - 2");
		document.getElementById("forgot_pass_email2").focus();	
		return false;	
	}
	else if(!checkMail(document.getElementById("forgot_pass_email2")))
    {
		document.getElementById("forgot_pass_email2").focus();
		document.getElementById("forgot_pass_email2").value="";
		return false;
	}
	else if(document.getElementById("phone1").value == "")
	{
		alert("Please enter Phone Number - 1");
		document.getElementById("phone1").focus();	
		return false;	
	}
	else if (!IsNumeric(document.getElementById("phone1").value))
    {
        alert("Please enter only numbers in Phone Number.");
        document.getElementById("phone1").focus();
        document.getElementById("phone1").value="";
        return false;
    }
	else if(document.getElementById("phone1").value.length <10)
	{
		alert("Phone number should of 10 digit");
		document.getElementById("phone1").focus();	
		return false;	
	}
	else if(document.getElementById("phone2").value == "")
	{
		alert("Please enter Phone Number - 2");
		document.getElementById("phone2").focus();	
		return false;	
	}
	else if (!IsNumeric(document.getElementById("phone2").value))
    {
        alert("Please enter only numbers in Phone Number.");
        document.getElementById("phone2").focus();
        document.getElementById("phone2").value="";
        return false;
    }
	else if(document.getElementById("phone2").value.length <10)
	{
		alert("Phone number should of 10 digit");
		document.getElementById("phone2").focus();	
		return false;	
	}
}
function checkMail(mf)
{
	   
	if(mf.value.indexOf('\@') < 0)
	{
		alert("Please type E-MAIL address in E-mail field.");
		return false;
	}
	var k=mf.value.lastIndexOf('.');
	if(k < 0)
	{
		alert("'"+mf.value+"' is a wrong address. Please type INTERNET E-MAIL ADDRESS in E-mail field.");
		return false;
	}
	var l=mf.value.length-k-1;
	if(l<2 || l>3 )
	{
  	    alert("Please type Real Email address in E-mail field.");
		return false;
	}
	return true;
}
function IsNumeric(sText)
{
   var ValidChars = "0123456789";
   var IsNumber=true;
   var Char;
   for (i = 0; i < sText.length && IsNumber == true; i++)
	  {
	  Char = sText.charAt(i);
	  if (ValidChars.indexOf(Char) == -1)
		 {
		 IsNumber = false;
		 }
	  }
   return IsNumber;
}
</script>
</head>
<body >
<table cellSpacing=0 cellPadding=0 width="100%" border=0 >
     <tr>
    	<td>
	 	 <?php include("top.php");?>
		</td>
	</tr>
	<tr >
		<td >
			<table border="0" cellpadding="0" cellspacing="0" width="100%" height="450px">
				<tr>
					<td width="15%" class="admintr" align="left">
						<?php include("leftmenu.php");?>
					</td>
					<td width="85%" align="center"><br /><br />
						<form name="frmuser" id="frmuser" method="post" action="" onsubmit="return dovalidation();">
						<table border="0" cellpadding="0" cellspacing="0" width="80%">
                        	<tr>
                            	<td>
                                	<b><?php echo $msg;?></b>
                                </td>
                            </tr>
                            <tr>
                            	<td>&nbsp;</td>
                            </tr>
							<tr align="center">
								<td>
								<fieldset>
									<legend>Edit Admin Details</legend>
									<table border="0" cellpadding="3	" cellspacing="3" width="100%">
										
										<tr>
											<td width="30%" align="left">First Name</td>
											<td width="2%" align="center">:</td>
											<td colspan="3" align="left">
											<input type="text" name="firstname" id="firstname" value="<?php echo $row['firstname'];?>" size="30"/>											</td>
										</tr>
										<tr>
											<td width="30%" align="left">Last Name</td>
											<td width="2%" align="center">:</td>
											<td colspan="3" align="left">
											<input type="text" name="lastname" id="lastname" value="<?php echo $row['lastname'];?>" size="30"/>											</td>
										</tr>
										<tr>
											<td width="30%" align="left">Username</td>
											<td width="2%" align="center">:</td>
											<td colspan="3" align="left">
											<input type="text" name="username" id="username" value="<?php echo $row['username'];?>" size="30" />											</td>
										</tr>
										<tr>
											<td width="30%" align="left">Password</td>
											<td width="2%" align="center">:</td>
											<td colspan="3" align="left">
											<input type="password" name="password" id="password" value="<?php echo $row['password'];?>" size="30"/>											</td>
										</tr>
										<tr>
											<td width="30%" align="left">Retype Password</td>
											<td width="2%" align="center">:</td>
											<td colspan="3" align="left">
											<input type="password" name="repassword" id="repassword" value="<?php echo $row['password'];?>" size="30"/>											</td>
										</tr>
										<tr align="left">
											<td colspan="5"><h2>Contact Details</h2> <span class="footertxt">(To add mutliple email id's seperate them with " , ")</span></td>											
										</tr>
										<tr>
											<td width="30%" align="left">Admin Email ID</td>
											<td width="2%" align="center">:</td>
											<td colspan="3" align="left">
											<input type="text" name="admin_email" id="admin_email" value="<?php echo $row['admin_email'];?>" size="30" />											</td>
										</tr>
										<tr>
											<td width="30%" align="left">Contact Email ID</td>
											<td width="2%" align="center">:</td>
											<td colspan="3" align="left">
											<input type="text" name="contactss_email" id="contactss_email" value="<?php echo $row['contactss_email'];?>" size="30" />											</td>
										</tr>
										<tr>
											<td width="30%" align="left">Information Center Email ID</td>
											<td width="2%" align="center">:</td>
											<td colspan="3" align="left">
											<input type="text" name="info_center_email" id="info_center_email" value="<?php echo $row['info_center_email'];?>"  size="30"/>											</td>
										</tr>
										<tr>
											<td width="30%" align="left">Password Recovery Email ID</td>
											<td width="2%" align="center">:</td>
											<td width="19%" align="left">
											<input type="text" name="forgot_pass_email1" id="forgot_pass_email1" value="<?php echo $row['forgot_pass_email1'];?>" size="30"/>											</td>
										    <td width="2%" align="left">,</td>
										    <td width="47%" align="left"><input type="text" name="forgot_pass_email2" id="forgot_pass_email2" value="<?php echo $row['forgot_pass_email2'];?>" size="30"/></td>
										</tr>
										<tr>
											<td width="30%" align="left">Password Recovery Phone Number</td>
											<td width="2%" align="center">:</td>
											<td width="19%" align="left">
											<input type="text" name="phone1" id="phone1" value="<?php echo $row['phone1'];?>" size="30"/>											</td>
										    <td width="2%" align="left">,</td>
										    <td width="47%" align="left"><input type="text" name="phone2" id="phone2" value="<?php echo $row['phone2'];?>" size="30"/></td>
										</tr>
										<tr>
											<td width="30%" align="right">&nbsp;</td>
											<td width="2%" align="center">&nbsp;</td>
											<td colspan="3" align="left">&nbsp;</td>
										</tr>
										<tr>
											<td colspan="5" align="center">
												
												<input type="submit" value="Edit" /></a> &nbsp;&nbsp;
												<input type="button" value="Back" onclick="javascript: history.go(-1)" />											</td>											
										</tr>
										<tr>
											<td colspan="5"> <br /></td>											
										</tr>
									</table>
								</fieldset>
								</td>
							</tr>	
						</table>
							<input type="hidden" name="task" value="edit" />
						</form>
					</td>
				</tr>
			</table>	
		</td>
	</tr>
</table>
</body>
</html>

