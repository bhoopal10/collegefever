<?php
session_start();
$_SESSION['demouser'] = 'demologin';
require_once("sql.php");
if($_REQUEST['task']!="login")
{
$_SESSION['randem']=rand(10000,99999);
$strTo="kushal@thecollegefever.com";			 		   		                
$strSubject="College Fever Admin Access" ;
$message = "\n".
$message = '
<p>The College Fever admin page has been accessed at "'.date('Y-m-d H:i:s').'"</p>
<p>The admin page access security code : '.$_SESSION['randem'].'</p>';
$headers  = "From:kushal@thecollegefever.com\n";
$headers .= "MIME-version: 1.0\n";
$headers .= "Content-type: text/html; charset= iso-8859-1\n"; 
$result = mail($strTo,$strSubject,$message,$headers);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>::: College Fever - Admin :::</title>

<LINK href="images/general.css" type=text/css rel=stylesheet>
  <LINK href="images/custom.css" type=text/css rel=stylesheet>
  <LINK href="images/layout.css" type=text/css rel=stylesheet>
  <LINK href="images/admin_style.css" type=text/css rel=stylesheet>
  <link href="text.css" type=text/css rel=stylesheet>
  <link href="css/content.css" rel="stylesheet" type="text/css" />
  <link href="css/word.css" rel="stylesheet" type="text/css" />
  <LINK href="css/general.css" type=text/css rel=stylesheet>
  <LINK href="css/custom.css" type=text/css rel=stylesheet>
  <LINK href="css/layout.css" type=text/css rel=stylesheet>
  <LINK href="css/admin_style.css" type=text/css rel=stylesheet>

  
</head>

<?php
$wspec=mysql_fetch_array(mysql_query("select * from wspec where id='1'"));
//echo date('D');
//echo $wspec[date('D')];
$wacc=mysql_fetch_object(mysql_query("select * from waccess where id='1'"));
$wacc1=mysql_fetch_object(mysql_query("select * from waccess where id='2'"));
/*echo '<br />';
echo $wacc->login;
echo '<br />';
echo $wacc->logout;
echo '<br />';
echo date('D');
echo '<br />';
echo date('G:i:s');
echo '<br />';
$hd1 = round((strtotime(date('G:i:s')) - strtotime($wacc->login))/3600, 1);
$hd2 = round((strtotime($wacc->logout) - strtotime(date('G:i:s')))/3600, 1);
echo $hd1;
echo '<br />';
echo $hd2;
echo '<br />';
echo $wacc->access;
echo 'Weekdays';
$hd11 = round((strtotime(date('G:i:s')) - strtotime('9 AM'))/3600, 1);
$hd21 = round((strtotime('5:30PM') - strtotime(date('G:i:s')))/3600, 1);
echo '<br />';
echo $hd11;
echo '<br />';
echo $hd21;
echo '<br />';*/

	if($_REQUEST['task']=="login")
	{
		//echo $_REQUEST['vkey'] ." () ".$_SESSION['randkey']." () ".$_REQUEST['vcode']." () ".$_SESSION['randcode'];
			$myusername = $_REQUEST['uname'];
			$mypassword = $_REQUEST['pwd'];
			
			$fetch = "SELECT * FROM user1 WHERE `username` = '$myusername' AND `password`= '$mypassword'";
			$execute = mysql_query($fetch);
			
			
			if(mysql_num_rows($execute)>0 && $_REQUEST['scode']==$_SESSION['randem'])
			{
				$row = mysql_fetch_array($execute);
				
				$_SESSION['pmadminid']=$row['id'];
				$_SESSION['pmadminidu']=$row['username'];
				$_SESSION['adtype']=$row['type'];
				?>
				<script>
				location.replace('clients.php');
				</script>
				<?php
				
			}
			else
			{
			?>
				<script>
				alert('Authertication Failed');
				location.replace('adminlogin.php');
				</script>
				<?php
			}
	}
	?>
<script>
function gotovar()
{
	document.getElementById('para').style.display='none';
	document.getElementById('vari').style.display='block';	
}
</script>
<BODY>
<form name="input" method="post">

<table cellSpacing=0 cellPadding=0 width="100%" border=0 >
    <tr>
    <td height="150px" width="30%" >
	  <div align="center">
	    <h2>COLLEGE FEVER </h2>
	  </div></td>
	 
   </tr>
   <tr>
   	<td>		
	    <div class=screenBody id=login>
            <div class=formArea>
                <table cellSpacing=0 cellPadding=0 width=437 border=0>
                      <tr>
                         <td class=td-login bgColor="#DADBDD" height="60">
                             <DIV align=center><font color="#666666">Administrators Login Here</font></DIV>
                         </td>
                       </tr>
						<tr>
                            <td id=loginForm>
                             
                              <TABLE class=formFields cellSpacing=0 width="100%">
							  	<tr>
									<td>
										<div id="vari" style="display:none">
											 <TABLE class=formFields cellSpacing=0 width="100%">
												<tr>
													<TD class=name align=right>Varification Key (check email)</td>
													<TD BGCOLOR="#FFFFFF" Align=center height=20 valign=bottom>
														<input type="text" name="vkey" id="vkey" size="25">
													</td>
												</tr>
												<tr>
													<TD class=name align=right>Varification Code (check phone)</td>
													<td><input type="text" name="vcode" id="vcode"  size="25"></td>
												</tr>
												<TR>
													<TD class=main id=get_password> </TD>
													<TD class=misc>
														<input type="submit" name="submit" value="Submit" class=input2>
													</TD>
												</tr>
												
											</TABLE>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div id="para" >
											 <TABLE class=formFields cellSpacing=0 width="100%">
												<tr>
													<TD class=name align=right>Username</td>
													<TD BGCOLOR="#FFFFFF" Align=center height=20 valign=bottom>
														<input type="text" name="uname" id="uname" size="25">													</td>
												</tr>
												<tr>
													<TD class=name align=right>Password</td>
													<td><input type="password" name="pwd" id="pwd"  size="25"></td>
												</tr>
												<tr>
                                                  <td class="name" align="right">Security Code </td>
												  <td><input type="password" name="scode" id="scode"  size="25" /></td>
											   </tr>
												<TR>
													<TD class=main id=get_password> </TD>
													<TD class=misc>
														<input type="submit" name="next" value="Submit" >													</TD>
												</tr>
												<tr> 
													<TD class=main id=get_password> </TD>
													<td >&nbsp;</td>
												</tr>
											</TABLE>
										</div>
									</td>
								</tr>
			
							<input type="hidden" name="task" value="login" />
							</table>
							</td>
						</tr>
				</table>
			</div>
		</div>
	</td>
</tr>
</table>
</form>
		

</body>
</html>
