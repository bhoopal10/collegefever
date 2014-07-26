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
	$sql =" delete from city where id = ".$_REQUEST['id'];
	mysql_query($sql);
}
else if($task == "edit")
{
$sql ="update city set 
name = '".addslashes($_REQUEST['name'])."'
where id='".$_REQUEST['id']."'";
$qwe=mysql_query($sql);	
}
else if($task == "add")
{
$sql ="insert into city (name) values 
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
					<br /><br /><br /><br />
					<span style="padding-left:20px;">
					<h2>City</h2>
					<br /><a href="cityedit.php?task=add"><img src="images/add_new.gif" border="0" alt="Add New Content" title="Add New Content" /></a><br />
					<br /></span>
					<?php 
					$sql = "Select * from city order by name asc";
					$result = mysql_query($sql);
					if(mysql_num_rows($result)> 0)
					{?>
					<table width="100%" cellpadding="6" cellspacing="1" bgcolor="#CCCCCC" class="tablegrid" >
                      <tr>
                        <th width="6%" align="center" bgcolor="#E2E2E2">S.No</th>
                        <th width="84%" align="left" bgcolor="#E2E2E2">Name</th>
                        <th width="10%" align="left" bgcolor="#E2E2E2">Options</th>
                      </tr>
                      <?php
							$i=1;
							 while($row = mysql_fetch_array($result))
								 {	?>
                      <tr>
                        <td align="center" bgcolor="#FFFFFF"><?php echo $i++;?> </td>
                        <td align="left" bgcolor="#FFFFFF"><?php echo $row['name'];?> </td>
                        <td align="left" bgcolor="#FFFFFF"><a href="cityedit.php?id=<?php echo $row['id'];?>&amp;task=edit"> <img src="images/edit.png" border="0" alt="Edit" title="Edit" height="20px" width="20px"/> </a> <a href="city.php?task=del&amp;id=<?php echo $row['id'];?>"><img src="images/cross.png" width="24" height="24" /></a></td>
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