<?php
	session_start();
//	require ("fileupload-class.php");
if($_SESSION['pmadminid']=="")
{		 
echo "<script>location.replace('adminlogin.php')</script>";
}
require ("sql.php");	
$task = $_REQUEST['task'];
if($task == "del")
{
	$sql =" delete from newsletter where id = ".$_REQUEST['id'];
	mysql_query($sql);
}
else if($task == "edit")
{
$sql ="update college set 
name = '".addslashes($_REQUEST['name'])."'
where id='".$_REQUEST['id']."'";
$qwe=mysql_query($sql);	
}
else if($task == "add")
{
$sql ="insert into college (name) values 
	  ('".addslashes($_REQUEST['name'])."')";
	mysql_query($sql);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
					<br />
					<br /><br /><br />
					<span style="padding-left:20px;">
					<h2>Newsletter Emails </h2>
					</span>
					<h3><span class="disprecordmsg"><strong>All emails in a row</strong></span> </h3>
					<?php 
					$geteml=mysql_query("select * from newsletter order by id desc");
					$emc=0;
					while($geteml1=mysql_fetch_object($geteml))
					{
						$emc++;
						if($emc==1)
						{
							$emtxt=$geteml1->email;
						}
						else
						{
							$emtxt=''.$emtxt.','.$geteml1->email.'';
						}
					}
					?>
					<P><?php echo $emtxt; ?></P>
					<P>&nbsp;</P>
					<h3><span class="disprecordmsg"><strong>All emails in table </strong></span><br />
				    
				      <?php 
					$sql = "Select * from newsletter order by id desc";
					$result = mysql_query($sql);
					if(mysql_num_rows($result)> 0)
					{?>
                      </h3>
					<table width="100%" cellpadding="6" cellspacing="1" bgcolor="#CCCCCC" class="tablegrid" >
                      <tr>
                        <th width="6%" align="center" bgcolor="#E2E2E2">S.No</th>
                        <th width="61%" align="left" bgcolor="#E2E2E2">Email</th>
                        <th width="25%" align="left" bgcolor="#E2E2E2">Subscribed Date </th>
                        <th width="8%" align="left" bgcolor="#E2E2E2">Options</th>
                      </tr>
                      <?php
							$i=1;
							 while($row = mysql_fetch_array($result))
								 {	?>
                      <tr>
                        <td align="center" bgcolor="#FFFFFF"><?php echo $i++;?> </td>
                        <td align="left" bgcolor="#FFFFFF"><?php echo $row['email'];?></td>
                        <td align="left" bgcolor="#FFFFFF"><?php echo $row['sdate'];?></td>
                        <td align="left" bgcolor="#FFFFFF"><a href="newsletter.php?task=del&amp;id=<?php echo $row['id'];?>"><img src="images/cross.png" width="24" height="24" /></a></td>
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