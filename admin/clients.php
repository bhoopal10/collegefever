<?php
	session_start();
	require ("fileupload-class.php");
if($_SESSION['pmadminid']=="")
{		 
echo "<script>location.replace('adminlogin.php')</script>";
}
require ("sql.php");	
$task = $_REQUEST['task'];
if($task == "del")
{
	$sql =" delete from register where id = ".$_REQUEST['id'];
	mysql_query($sql);
	mysql_query("delete from posts where uid='".$_REQUEST['id']."'");
	mysql_query("delete from comment where uid='".$_REQUEST['id']."'");
}
else if($task == "vemail")
{
$sql ="update register set 
everify = 'Yes'
where id='".$_REQUEST['id']."'";
mysql_query($sql);
}
else if($task == "access")
{
$sql ="update register set 
access = 'Yes'
where id='".$_REQUEST['id']."'";
$qwe=mysql_query($sql);	
$getusrdtls=mysql_fetch_object(mysql_query("select * from register where id='".$_REQUEST['id']."'"));
//echo $getusrdtls->email;
$strTo=$getusrdtls->email;
$strSubject=' Shaadi Care Account Activated' ;
//$message = '\n'.
$message = '
<p>Hello '.$getusrdtls->name.'</p>
<p>Your account has been activated by admin in shaadi care</p>
<p>Your Shaadi Care account Username is '.$getusrdtls->email.' and Password is '.$getusrdtls->password.'</p>
<p>______________________________________</p>
<p style="font-size:10px;line-height:8px;">Shaadi Care Team,</p>

';
$headers  = "From: info@shaadicare.com \n";
$headers .= "MIME-version: 1.0\n";
$headers .= "Content-type: text/html; charset= iso-8859-1\n"; 
$headers1=$headers;
$result2 = mail($strTo,$strSubject,$message,$headers1);
}
else if($task == "daccess")
{
$sql ="update register set 
access = 'No'
where id='".$_REQUEST['id']."'";
$qwe=mysql_query($sql);	
$getusrdtls=mysql_fetch_object(mysql_query("select * from register where id='".$_REQUEST['id']."'"));
$strTo=$getusrdtls->email;
$strSubject=' Shaadi Care Account Deactivated' ;
//$message = '\n'.
$message = '
<p>Hello '.$getusrdtls->name.'</p>
<p>Your account has been deactivated by admin in shaadi care</p>
<p>Contact admin for further details at admin@shaadicare.com</p>
<p>______________________________________</p>
<p style="font-size:10px;line-height:8px;">Shaadi Care Team,</p>
';
$headers  = "From: info@shaadicare.com \n";
$headers .= "MIME-version: 1.0\n";
$headers .= "Content-type: text/html; charset= iso-8859-1\n"; 
$headers1=$headers;
$result2 = mail($strTo,$strSubject,$message,$headers1);
}
else if($task == "add")
{

$sql ="insert into state (state) values 
	  (
	  '".$_REQUEST['state']."' )";
	mysql_query($sql);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
.black_overlay1{
			position: fixed;
			top: 0px;
			left: 0px;
			width: 100%;
			height: 100%;
			background-color: black;
			z-index:5000;
			-moz-opacity: 0.5;
			opacity:.50;
			filter: alpha(opacity=50);

}
.topbox11Q{
	line-height:18px;
	position: absolute;
	left: 50%;
	top: 10%;
	margin:0 0 0 -300px;
	padding: 17px;
	width: 600px;
	z-index: 5102;
	overflow: visible;
	visibility: visible;
	/*background:url(../images/auditions.png) no-repeat;*/
	color:#333333;
	background:#FFFFFF;
	padding:20px;
	border:dashed 3px #CCCCCC;
	}
.close-div
{
	position:absolute; right:20px; top:20px; color:#FF0000; font-size:14px; cursor:pointer;
}
</style>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>::: College Fever - Admin :::</title>
  <LINK href="css/general.css" type=text/css rel=stylesheet>
  <LINK href="css/layout.css" type=text/css rel=stylesheet>
  <link href="css/content.css" rel="stylesheet" type="text/css" />
  <link href="css/word.css" rel="stylesheet" type="text/css" />
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
						<?php include("leftmenu.php");?>					</td>
					<td width="80%" style="padding-left:20px">
					<br /><br /><br /><br />
					<span style="padding-left:20px;">
					<h2>Users</h2>
					<br />
					<br /></span>
					<?php 
					$sql = "Select * from register order by id desc";
					$result = mysql_query($sql);
					if(mysql_num_rows($result)> 0)
					{?>
					<table width="100%" cellpadding="6" cellspacing="1" bgcolor="#CCCCCC" class="tablegrid" >
                      <tr>
                        <th width="5%" align="center" bgcolor="#E2E2E2">S.No</th>
                        <th width="6%" align="left" bgcolor="#E2E2E2">Name</th>
                        <th width="6%" align="left" bgcolor="#E2E2E2">Type</th>
                        <th width="8%" align="left" bgcolor="#E2E2E2">Email</th>
                        <th width="8%" align="left" bgcolor="#E2E2E2">College</th>
                        <th width="8%" align="left" bgcolor="#E2E2E2">City</th>
                        <th width="8%" align="left" bgcolor="#E2E2E2">Degree</th>
                        <th width="10%" align="left" bgcolor="#E2E2E2">Password</th>
                        <th width="14%" align="left" bgcolor="#E2E2E2">Email Verification </th>
                        <th width="15%" align="left" bgcolor="#E2E2E2">Registered Date </th>
                        <th width="8%" align="left" bgcolor="#E2E2E2">Options</th>
                      </tr>
                      <?php
							$i=1;
							 while($row = mysql_fetch_array($result))
								 {	?>
                      <tr>
                        <td align="center" bgcolor="#FFFFFF"><?php echo $i++;?> </td>
                        <td align="left" bgcolor="#FFFFFF"><?php echo $row['name'];?> </td>
                        <td align="left" bgcolor="#FFFFFF"><?php echo $row['ltype'];?></td>
                        <td align="left" bgcolor="#FFFFFF"><?php echo $row['email'];?></td>
                        <td align="left" bgcolor="#FFFFFF"><?php echo $row['college'];?></td>
                        <td align="left" bgcolor="#FFFFFF"><?php echo $row['city'];?></td>
                        <td align="left" bgcolor="#FFFFFF"><?php echo $row['degree'];?></td>
                        <td align="left" bgcolor="#FFFFFF"><?php echo $row['password'];?></td>
                        <td align="left" bgcolor="#FFFFFF">
						<?php 
							echo $row['everify'];
							if($row['everify']=='No')
							{
								?><br /><a href="clients.php?task=vemail&id=<?php echo $row['id'];?>">Verify Email</a><?php
							}
						?>						</td>
                        <td align="left" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><?php echo $row['adate'];?> @ <?php echo $row['atime'];?></td>
                          </tr>
                          <tr></tr>
                        </table></td>
                        <td align="left" bgcolor="#FFFFFF"><div id="cllog<?php echo $row['id'];?>" style="display:none;">
							<div class="black_overlay1"></div>
							<div class="topbox11Q">
								<div class="close-div" onclick="document.getElementById('cllog<?php echo $row['id'];?>').style.display='none'">Close(X)</div>
								<h2 style="text-transform:uppercase">LOGIN DETAiLS OF <?php echo $row['name'];?></h2>
								<?php
  									$getlog=mysql_query("select * from logdet where uid='".$row['id']."' order by ldate desc");
									if(mysql_num_rows($getlog)>0)
									{
  								?>
								<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#ccc">
  <tr>
    <td bgcolor="#F7F7F7">SL No </td>
    <td bgcolor="#F7F7F7">IP Address </td>
    <td bgcolor="#F7F7F7">Login Date &amp; Time </td>
  </tr>
  <?php
  $lcnt=0;
  while($getlog1=mysql_fetch_object($getlog))
  {
  	$lcnt++;
  ?>
  <tr>
    <td bgcolor="#FFFFFF"><?php echo $lcnt; ?></td>
    <td bgcolor="#FFFFFF"><?php echo $getlog1->ipaddr; ?></td>
    <td bgcolor="#FFFFFF"><?php echo $getlog1->ldate; ?></td>
  </tr>
  <?php
  }
  ?>
</table>
<?php
}
else
{
	?><p style="color:#FF0000"><strong>The user has never logged in</strong></p><?php
}
?>
							</div>
						</div>
						<a href="clients.php?task=del&amp;id=<?php echo $row['id'];?>"><img src="images/cross.png" width="24" height="24" /></a></td>
                      </tr>
                      <?php 	}?>
                    </table>
				  <?php }else {
							
							echo "No Records Found !!!";
								}?>                    </td>
				</tr>
			</table>	
		</td>
	</tr>
</table>
</body>
</html>