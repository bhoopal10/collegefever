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
	$sql =" delete from event where id = ".$_REQUEST['id'];
	mysql_query($sql);
}
else if($task == "evfree")
{
	mysql_query("update event set evtype='Free' where id='".$_REQUEST['id']."'");
}
else if($task == "evpaid")
{
	mysql_query("update event set evtype='Paid' where id='".$_REQUEST['id']."'");
}
else if($task == "edit")
{
echo $_REQUEST['id'];
		$doc1=$_SESSION['rsvevpic1'];
		$doc2=$_SESSION['rsvevpic2'];
		
		$my_uploader = new uploader('en');
		$my_uploader->upload("pic", "", "");
		$mode = 2;
		$my_uploader->save_file("../upfile/", $mode);
		if ($my_uploader->error)
		{
		}
		else
		{
			$doc1 = $my_uploader->file['name'];
		}
		
		$my_uploader = new uploader('en');
		$my_uploader->upload("pic1", "", "");
		$mode = 2;
		$my_uploader->save_file("../upfile/", $mode);
		if ($my_uploader->error)
		{
		}
		else
		{
			$doc2 = $my_uploader->file['name'];
		}
		
		$my_uploader = new uploader('en');
		$my_uploader->upload("tpic", "", "");
		$mode = 2;
		$my_uploader->save_file("../upfile/", $mode);
		if ($my_uploader->error)
		{
		}
		else
		{
			$doc3 = $my_uploader->file['name'];
		}

$sql ="update event set 
		name='".addslashes($_REQUEST['name'])."',
		category='".addslashes($_REQUEST['category'])."',
		url='".$_REQUEST['url']."',
		sdate='".date('Y-m-d', strtotime($_REQUEST['sdate']))."',
		stime='".$_REQUEST['stime1'].":".$_REQUEST['stime2']."',
		edate='".date('Y-m-d', strtotime($_REQUEST['edate']))."',
		etime='".$_REQUEST['etime1'].":".$_REQUEST['etime2']."',
		description='".addslashes($_REQUEST['description'])."',
		pic1='".$doc1."',
		pic2='".$doc2."',
		vname='".$_REQUEST['vname']."',
		vaddress1='".$_REQUEST['vaddress1']."',
		vaddress2='".$_REQUEST['vaddress2']."',
		vcity='".$_REQUEST['vcity']."',
		vpincode='".$_REQUEST['vpincode']."',
		vcountry='".$_REQUEST['vcountry']."',
		vstate='".$_REQUEST['vstate']."',
		ewebsite='".$_REQUEST['ewebsite']."',
		efacebook='".$_REQUEST['efacebook']."',
		etwitter='".$_REQUEST['etwitter']."',
		egoogle='".$_REQUEST['egoogle']."',
		slsdate='".date('Y-m-d', strtotime($_REQUEST['slsdate']))."',
		sledate='".date('Y-m-d', strtotime($_REQUEST['sledate']))."',
		slprice='".$_REQUEST['slprice']."',
		maxreg='".$_REQUEST['maxreg']."',
		minorder='".$_REQUEST['minorder']."',
		maxorder='".$_REQUEST['maxorder']."',
		oname1='".$_REQUEST['oname1']."',
		oemail1='".$_REQUEST['oemail1']."',
		ophone1='".$_REQUEST['ophone1']."',
		oname2='".$_REQUEST['oname2']."',
		oemail2='".$_REQUEST['oemail2']."',
		ophone2='".$_REQUEST['ophone2']."',
		ewebsite='".$_REQUEST['ewebsite']."',
		efacebook='".$_REQUEST['efacebook']."',
		etwitter='".$_REQUEST['etwitter']."',
		egoogle='".$_REQUEST['egoogle']."',
		slsdate='".$_REQUEST['slsdate']."',
		sledate='".$_REQUEST['sledate']."',
		slprice='".$_REQUEST['slprice']."',
		maxreg='".$_REQUEST['maxreg']."',
		minorder='".$_REQUEST['minorder']."',
		maxorder='".$_REQUEST['maxorder']."',
		publish='".$_REQUEST['publish']."',
		priority='".$_REQUEST['priority']."',
		ticketno='".$_REQUEST['ticketno']."',
		tinfo='".addslashes($_REQUEST['tinfo'])."'
where id='".$_REQUEST['id']."'";
$qwe=mysql_query($sql);	
if($qwe)
{
	echo 'yes';
}
else
{
	echo 'no';
}
}
else if($task == "add")
{
$sql ="insert into event (name) values 
	  ('".addslashes($_REQUEST['name'])."')";
	mysql_query($sql);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">
function gethmdetl1()
{
var xmlhttp;    
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtCar").innerHTML=xmlhttp.responseText;
    }
  else
  {
  	document.getElementById("txtCar").innerHTML='Loading City';
  }	
  }
var qwe11="getcity.php?state="+document.getElementById('vstate').value;
xmlhttp.open("GET",qwe11,true);
xmlhttp.send();
}
</script>
<script language="JavaScript" src="../js/calendar_us1.js"></script>
<link rel="stylesheet" href="../css/calendar1.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../js/jused.js" type="text/javascript"></script>
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
					<h2>Event</h2>
					<br /><!--<a href="eventedit.php?task=add"><img src="images/add_new.gif" border="0" alt="Add New Content" title="Add New Content" /></a>--><br />
					<br /></span>
					<?php 
					$sql = "Select * from event order by priority desc,id desc";
					$result = mysql_query($sql);
					if(mysql_num_rows($result)> 0)
					{?>
					<table width="100%" cellpadding="6" cellspacing="1" bgcolor="#CCCCCC" class="tablegrid" >
                      <tr>
                        <th width="6%" align="center" bgcolor="#E2E2E2">S.No</th>
                        <th width="84%" align="left" bgcolor="#E2E2E2">Event Details </th>
                        <th width="84%" align="left" bgcolor="#E2E2E2">Pics</th>
                        <th width="84%" align="left" bgcolor="#E2E2E2">User</th>
                        <th width="84%" align="left" bgcolor="#E2E2E2">Publish</th>
                        <th width="84%" align="left" bgcolor="#E2E2E2">Priority</th>
                        <th width="84%" align="left" bgcolor="#E2E2E2">Type</th>
                        <th width="10%" align="left" bgcolor="#E2E2E2">Options</th>
                      </tr>
                      <?php
							$i=1;
							 while($row = mysql_fetch_array($result))
								 {	?>
                      <tr>
                        <td align="center" bgcolor="#FFFFFF"><?php echo $i++;?> </td>
                        <td align="left" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#F2F2F2">
                          <tr>
                            <td width="13%" bgcolor="#FFFFFF">Name:</td>
                            <td width="87%" bgcolor="#FFFFFF"><?php echo $row['name'];?></td>
                          </tr>
                          <tr>
                            <td bgcolor="#FFFFFF">Category:</td>
                            <td bgcolor="#FFFFFF"><?php echo $row['category'];?></td>
                          </tr>
                          <tr>
                            <td bgcolor="#FFFFFF">Venue:</td>
                            <td bgcolor="#FFFFFF">
							<?php echo $row['vname'];?> , <?php echo $row['vaddress1'];?> , <?php echo $row['vaddress2'];?> , <?php echo $row['vstate'];?> , <?php echo $row['vcity'];?> , <?php echo $row['vpincode'];?>							</td>
                          </tr>
                          <tr>
                            <td bgcolor="#FFFFFF">Dates:</td>
                            <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>Start - <?php echo $row['sdate'];?> @ <?php echo $row['stime'];?></td>
                                </tr>
                                <tr>
                                  <td> End - <?php echo $row['edate'];?> @ <?php echo $row['etime'];?> </td>
                                </tr>
                              </table></td>
                          </tr>
                          <tr>
                            <td bgcolor="#FFFFFF">Contact:</td>
                            <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td colspan="2"><?php echo $row['oname1'];?></td>
                              </tr>
                              <tr>
                                <td width="50%">Email: <?php echo $row['oemail1'];?></td>
                                <td width="50%">Phone: <?php echo $row['ophone1'];?></td>
                              </tr>
							  <tr>
                                <td colspan="2"><?php echo $row['oname2'];?></td>
                              </tr>
                              <tr>
                                <td width="50%">Email: <?php echo $row['oemail2'];?></td>
                                <td width="50%">Phone: <?php echo $row['ophone2'];?></td>
                              </tr>
                            </table></td>
                          </tr>
						  <?php if($row['evtype']!="Free") {?>
                          <tr>
                            <td bgcolor="#FFFFFF">Ticket:</td>
                            <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="50%">Sale Start Date: <?php echo $row['slsdate'];?></td>
                                <td width="50%">Sale End Date: <?php echo $row['sledate'];?></td>
                              </tr>
                              <tr>
                                <td>Max Reg: <?php echo $row['maxreg'];?></td>
                                <td>Price: Rs <?php echo $row['price'];?></td>
                              </tr>
                              <tr>
                                <td>Min Order: <?php echo $row['minorder'];?></td>
                                <td>Max Order: <?php echo $row['maxorder'];?></td>
                              </tr>
                            </table></td>
                          </tr>
						  <?php } ?>
                        </table></td>
                        <td align="left" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#F2F2F2">
                          <tr>
                            <td bgcolor="#FFFFFF">Large</td>
                          </tr>
                          <tr>
                            <td bgcolor="#FFFFFF"><img src="../upfile/<?php echo $row['pic1'];?>" style="width:200px;"/></td>
                          </tr>
                          <tr>
                            <td bgcolor="#FFFFFF">Thumbnail</td>
                          </tr>
                          <tr>
                            <td bgcolor="#FFFFFF"><img src="../upfile/<?php echo $row['pic2'];?>" style="width:200px;"/>d</td>
                          </tr>
                        </table></td>
                        <td align="left" bgcolor="#FFFFFF"><?php 
						//echo $row['uid'];
						$getusr=mysql_fetch_object(mysql_query("select * from register where id='".$row['uid']."'"));
						?>
                          <table width="100%" border="0" cellspacing="0" cellpadding="3">
                            <tr>
                              <td>Name</td>
                              <td><?php echo $getusr->name; ?></td>
                            </tr>
                            <tr>
                              <td>Email</td>
                              <td><?php echo $getusr->email; ?></td>
                            </tr>
                            <tr>
                              <td>College</td>
                              <td><?php echo $getusr->college; ?></td>
                            </tr>
                            <tr>
                              <td>Degree</td>
                              <td><?php echo $getusr->degree; ?></td>
                            </tr>
                            <tr>
                              <td>City</td>
                              <td><?php echo $getusr->city; ?></td>
                            </tr>
                          </table></td>
                        <td align="left" bgcolor="#FFFFFF"><?php echo $row['publish'];?></td>
                        <td align="left" bgcolor="#FFFFFF">
						<?php 
						echo $row['priority'];
						?></td>
                        <td align="left" bgcolor="#FFFFFF"><?php 
						echo $row['evtype'];
						?>
						<?php if($row['evtype']!='Free') { ?>
						<a href="event.php?id=<?php echo $row['id'];?>&amp;task=evfree">Change to Free</a>
						<?php }else{ ?>
						<a href="event.php?id=<?php echo $row['id'];?>&amp;task=evpaid">Change to Paid</a>
						<?php } ?>
						</td>
                        <td align="left" bgcolor="#FFFFFF"><a href="eventedit.php?id=<?php echo $row['id'];?>&amp;task=edit"> <img src="images/edit.png" border="0" alt="Edit" title="Edit" height="20px" width="20px"/> </a> <a href="event.php?task=del&amp;id=<?php echo $row['id'];?>"><img src="images/cross.png" width="24" height="24" /></a><br />
<?php if($row['evtype']!='Free') { ?>
<a href="tickets.php?eid=<?php echo $row['id'];?>">View Tickets</a>
<?php } ?>
</td>
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