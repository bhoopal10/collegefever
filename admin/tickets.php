<?php
	session_start();
//	require ("fileupload-class.php");
require ("sql.php");
if($_SESSION['pmadminid']=="")
{		 
echo "<script>location.replace('adminlogin.php')</script>";
}

if($_REQUEST['eid']!="")
{
	$_SESSION['rsetid']=$_REQUEST['eid'];
}

	
$task = $_REQUEST['task'];
if($task == "del")
{
	$sql =" delete from tickets where id = ".$_REQUEST['id'];
	mysql_query($sql);
	$gettcn=mysql_num_rows(mysql_query("select * from tickets where eid='".$_SESSION['rsetid']."'"));
	mysql_query("update event set ticketno='".$gettcn."' where id='".$_SESSION['rsetid']."'");
}
else if($task == "edit")
{
$sql ="update tickets set 
name = '".addslashes($_REQUEST['name'])."',
maxreg = '".addslashes($_REQUEST['maxreg'])."',
minorder = '".addslashes($_REQUEST['minorder'])."',
maxorder = '".addslashes($_REQUEST['maxorder'])."',
slprice = '".addslashes($_REQUEST['slprice'])."',
tdesc = '".addslashes($_REQUEST['tdesc'])."'
where id='".$_REQUEST['id']."'";
$qwe=mysql_query($sql);	
}
else if($task == "add")
{
$sql ="insert into tickets (name,maxreg,minorder,maxorder,slprice,eid,tdesc) values 
	  ('".addslashes($_REQUEST['name'])."','".$_REQUEST['maxreg']."','".$_REQUEST['minorder']."','".$_REQUEST['maxorder']."','".$_REQUEST['slprice']."','".$_SESSION['rsetid']."','".$_REQUEST['tdesc']."')";
	mysql_query($sql);
	$gettcn=mysql_num_rows(mysql_query("select * from tickets where eid='".$_SESSION['rsetid']."'"));
	mysql_query("update event set ticketno='".$gettcn."' where id='".$_SESSION['rsetid']."'");
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
					<br /><br /><br /><br />
					<span style="padding-left:20px;">
					<?php $getedt=mysql_fetch_object(mysql_query("select * from event where id='".$_SESSION['rsetid']."'")); ?>
					<h2>Tickets - '<?php echo $getedt->name; ?>' </h2>
					<br /><a href="ticketsedit.php?task=add"><img src="images/add_new.gif" border="0" alt="Add New Content" title="Add New Content" /></a><br />
					<br /></span>
					<?php 
					$sql = "Select * from tickets where eid='".$_SESSION['rsetid']."' order by name asc";
					$result = mysql_query($sql);
					if(mysql_num_rows($result)> 0)
					{?>
					<table width="100%" cellpadding="6" cellspacing="1" bgcolor="#CCCCCC" class="tablegrid" >
                      <tr>
                        <th width="6%" align="center" bgcolor="#E2E2E2">S.No</th>
                        <th width="17%" align="left" bgcolor="#E2E2E2">Name</th>
                        <th width="18%" align="left" bgcolor="#E2E2E2">Max Reg </th>
                        <th width="16%" align="left" bgcolor="#E2E2E2">Min Order </th>
                        <th width="18%" align="left" bgcolor="#E2E2E2">Max Order </th>
                        <th width="17%" align="left" bgcolor="#E2E2E2">Price</th>
                        <th width="17%" align="left" bgcolor="#E2E2E2">Description</th>
                        <th width="8%" align="left" bgcolor="#E2E2E2">Options</th>
                      </tr>
                      <?php
							$i=1;
							 while($row = mysql_fetch_array($result))
								 {	?>
                      <tr>
                        <td align="center" bgcolor="#FFFFFF"><?php echo $i++;?> </td>
                        <td align="left" bgcolor="#FFFFFF"><?php echo $row['name'];?> </td>
                        <td align="left" bgcolor="#FFFFFF"><?php echo $row['maxreg'];?></td>
                        <td align="left" bgcolor="#FFFFFF"><?php echo $row['minorder'];?></td>
                        <td align="left" bgcolor="#FFFFFF"><?php echo $row['maxorder'];?></td>
                        <td align="left" bgcolor="#FFFFFF"><?php echo $row['slprice'];?></td>
                        <td align="left" bgcolor="#FFFFFF"><?php echo $row['tdesc'];?></td>
                        <td align="left" bgcolor="#FFFFFF"><a href="ticketsedit.php?id=<?php echo $row['id'];?>&amp;task=edit"> <img src="images/edit.png" border="0" alt="Edit" title="Edit" height="20px" width="20px"/> </a> <a href="tickets.php?task=del&amp;id=<?php echo $row['id'];?>"><img src="images/cross.png" width="24" height="24" /></a></td>
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