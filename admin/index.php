<?php
	session_start();
	if($_SESSION['pmadminid']=="")
	{		 
	echo "<script>location.replace('adminlogin.php')</script>";
	}
	require ("sql.php");	
	?>
	<script>location.replace('clients.php');</script>
	<?php
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>::: Scott Digital Ad :::</title>
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
			<table border="0" cellpadding="0" cellspacing="0" width="100%" >
				<tr>	
					<td width="15%" class="admintr" align="left">
						<?php include("leftmenu.php");?>
					</td>				
					<td width="85%">
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								
							</tr>	
						</table>
					</td>
					
				</tr>
			</table>	
		</td>
	</tr>
</table>
</body>
</html>

