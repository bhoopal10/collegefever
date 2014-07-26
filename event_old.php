<?php
require('admin/sql.php');
session_start();
$getevfurl=mysql_fetch_object(mysql_query("select * from event where url='".$_REQUEST['url']."'"));
if($getevfurl->id=="")
{
	?><script>alert('Invalid URL'); location.replace('index.php');</script><?php
}
$_REQUEST['page']='nosel';
$_SESSION['edetid']=$getevfurl->id;
if(isset($_POST['buyticket']))
{
	$buyt=mysql_query("insert into buyticket(uid,eid,tcount,ttlprice,pay,pdate) values('".$_SESSION['uid']."','".$_SESSION['edetid']."','".$_REQUEST['tcount']."','".$_REQUEST['tlprice']."','Pending','".date('Y-m-d H:i:s')."')");
	
	$_SESSION['buyins']=mysql_insert_id();
	$getticket=mysql_fetch_object(mysql_query("select * from buyticket where id='".$_SESSION['buyins']."'"));
	$getevdet=mysql_fetch_object(mysql_query("select * from event where id='".$_SESSION['edetid']."'"));
	$getregdet=mysql_fetch_object(mysql_query("select * from register where id='".$_SESSION['uid']."'"));
	if($getevdet->vaddress2!="")
	{
		$vadd2=''.$getevdet->vaddress2.',<br>';
	}
	$geturem=mysql_fetch_object(mysql_query("select * from register where id='".$_SESSION['uid']."'"));
	$strTo=''.$geturem->email.'';
			$strSubject='Ticket from College Fever' ;
			$message = '
			<table width="500" border="0" cellspacing="3" cellpadding="5" bgcolor="#F16439" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000;" align="center" >
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td align="center" valign="top"><span style="color:#fff; font-size:20px; text-transform:uppercase;">'.$getevdet->name.'</span><br />
            <span style="color:#fff; font-size:14px; text-transform:uppercase;">'.$getevdet->vname.'</span></td>
          </tr>
      </table></td>
  </tr>
  <tr>
    <td width="59%" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="0" bgcolor="#CCCCCC" class="evtable">
      <tr>
        <td width="43%" bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;border-right:solid 1px #ccc;"><strong>Event Address: </strong></td>
        <td width="57%" bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;">
		'.$getevdet->vaddress1.',<br />
		'.$vadd2.'
          '.$getevdet->vstate.',<br />
          '.$getevdet->vcity.' - '.$getevdet->vpincode.' </td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;border-right:solid 1px #ccc;"><strong>No of Tickets: </strong></td>
        <td bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;">'.$getticket->tcount.'</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" style="border-right:solid 1px #ccc;"><strong>Total Price: </strong></td>
        <td bgcolor="#FFFFFF" class="last">Rs. '.$getticket->ttlprice.'</td>
      </tr>
    </table></td>
    <td width="41%" rowspan="2" align="center" valign="top" bgcolor="#FFFFFF"><img src="http://thecollegefever.com/upfile/'.$getevdet->pic2.'"  style="max-width:190px; height:auto;" /></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="0" bgcolor="#CCCCCC" class="evtable">

      <tr>
        <td width="43%" bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;border-right:solid 1px #ccc;"><strong>Ticket No : </strong></td>
        <td width="57%" bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;">'.$getticket->id.''.$getticket->eid.''.$getticket->uid.'</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;border-right:solid 1px #ccc;"><strong>Paid By: </strong></td>
        <td bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;">'.$getregdet->name.'</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" style="border-bottom:solid 0px #ccc;border-right:solid 1px #ccc;"><strong>Paid On: </strong></td>
        <td bgcolor="#FFFFFF" class="last">'.date('M j, Y @ g:i a', strtotime($getticket->pdate)).'</td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="79%"><table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr>
            <td><strong>This is your ticket<br />            
              Print and present it at the event</strong></td>
          </tr>
        </table></td>
        <td width="21%" align="right"><img src="http://thecollegefever.com/images/logotic.png" width="78" height="40" /></td>
      </tr>
      
    </table></td>
    </tr>
</table>
';
$headers  = "From: info@thecollegefever.com \n";
$headers .= "MIME-version: 1.0\n";
$headers .= "Content-type: text/html; charset= iso-8859-1\n"; 
$headers1=$headers;
//$result2 = mail($strTo,$strSubject,$message,$headers1);
	if($buyt)
	{
		?><script>location.replace('event_detail_1_pay.php');</script><?php
	}
}
$getevdet=mysql_fetch_object(mysql_query("select * from event where id='".$_SESSION['edetid']."'"));
$gtkcount=mysql_fetch_object(mysql_query("select sum(tcount) as tcount from buyticket where eid='".$_SESSION['edetid']."' and pay='Paid'"));
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="fav.ico">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
<script src="http://thecollegefever.com/js/jused.js" type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<link href="http://thecollegefever.com/css/common.css" rel="stylesheet" type="text/css">
<link href="http://thecollegefever.com/css/mobile_style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>::: thecollegefever.com :::</title>
</head>

<body>
<?php include('includes/header.php'); ?>
<div class="container">
  <h1 style="text-transform:capitalize"><?php echo $getevdet->name; ?> </h1>
  <div class="ev-banner">
  	<p align="center"><img src="http://thecollegefever.com/upfile/<?php echo $getevdet->pic1; ?>" width="960" height="450"></p>
  </div>
  <div class="evnt-det-main">
  	<ul>
		<li><div class="ev1"><strong><?php echo $getevdet->vname; ?></strong>,<br>
<?php echo $getevdet->vaddress1; ?>,<br>
<?php if($getevdet->vaddress2!="") { ?>
<?php echo $getevdet->vaddress2; ?>,<br>
<?php } ?>
<?php echo $getevdet->vcity; ?>,<br>
<?php echo $getevdet->vstate; ?> - <?php echo $getevdet->vpincode; ?></div></li><li>
<div  class="ev2"><strong><?php echo date('M j', strtotime($getevdet->sdate)); ?> - <?php echo date('M j, Y', strtotime($getevdet->edate)); ?></strong><br>
<?php  echo date('g:i a', strtotime($getevdet->stime)); ?> to <?php  echo date('g:i a', strtotime($getevdet->etime)); ?><br><br>
<!--<a href="#"><strong>Add to my calendar</strong></a>--></div></li><?php if($getevdet->evtype!="Free") { ?><li class="ev3">
<p><strong>Ticket Price: Rs. <?php echo $getevdet->slprice; ?></strong></p>
<p>
<?php 
$now = strtotime(date('Y-m-d')); // or your date as well
$slsdate = strtotime($getevdet->slsdate);
$datediff1 = $now - $slsdate;
$datediff11 = floor($datediff1/(60*60*24));
//echo ''.$datediff11.', '.$getevdet->slsdate.'';

$sledate = strtotime($getevdet->sledate);
$datediff2 = $sledate - $now;
$datediff21 = floor($datediff2/(60*60*24));
//echo '<br>'.$datediff21.', '.$getevdet->sledate.'';
if($getevdet->uid!=$_SESSION['uid'])
{
if($datediff11>=0)
{
if($datediff21>=0)
{
if(($gtkcount->tcount<$getevdet->maxreg)) 
{  
if($_SESSION['uid']!="") 
{ 
?><a href="javascript:void(0)" id="joinev"><strong>Join the event</strong></a>
<?php } else { ?>
<a href="http://thecollegefever.com/login.php?page=login&type=joinevent"><strong>Join the event</strong></a><?php 
}
}
else
{ 
	?><span class="red-button">Tickets are sold out</span><?php 
}
}
else
{ 
	?><span class="red-txt">Ticket selling ended on <?php echo date('M j, Y', strtotime($getevdet->sledate)); ?></span><?php 
}
}
else
{ 
	?><span class="red-txt">Ticket selling starts only on <?php echo date('M j, Y', strtotime($getevdet->slsdate)); ?></span><?php 
}
}
?>
</p>
</li><?php } ?>
	</ul>
	<?php if($getevdet->uid!="0") { ?>
	<form action="" method="post">
	<div id="joinevdet">
	<?php $tlp=$getevdet->minorder*$getevdet->slprice; ?>
	<input type="hidden" name="tlprice" id="tlprice" value="<?php echo $tlp; ?>">
	<div class="join-tab scrollbar-our-definition">	
<table border="0" cellspacing="0" cellpadding="8">
  <tr>
    <td class="td-head"><strong>Ticket Category </strong></td>
    <td class="td-head"><strong>Price (Rs) </strong></td>
    <td align="left" class="td-head"><strong>Quantity</strong></td>
    <td class="td-head"><strong>Amount (Rs.) </strong></td>
  </tr>
  <tr>
    <td><strong>Online Payment </strong></td>
    <td align="center"><strong><?php echo $getevdet->slprice; ?></strong></td>
    <td align="left"><select name="tcount" id="tcount" onChange="calprice('<?php echo $getevdet->slprice; ?>')">
		<?php 
		$tickleft=$getevdet->maxreg-$gtkcount->tcount;
		if($tickleft<$getevdet->maxorder)
		{
			$ticklast=$tickleft;
		}
		else
		{
			$ticklast=$getevdet->maxorder;
		}
		for($i=$getevdet->minorder;$i<=$ticklast;$i++) { ?>
      		<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
	  	<?php } ?>
    </select>
	
	</td>
    <td align="right"><strong><span id="tprice1"><?php  echo $tlp; ?></span></strong></td>
  </tr>
  <tr>
    <td colspan="3" class="orange-txt">&nbsp;</td>
    <td align="right"><strong>TOTAL (Rs.)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="tprice2"><?php echo $tlp; ?></span></strong> </td>
  </tr>
</table>
</div>
<div class="book-now"><input type="submit" name="buyticket" id="buyticket"></div>
</div>
</form>
<?php } ?>
  </div>
  
  <div class="evnt-m-desc">
  	<div class="evnt-desc-l">
		<p><strong>Event Description</strong></p>
		<?php echo $getevdet->description; ?>
		
  	</div><div class="evnt-desc-r">
		<div class="contact-info">
		<div class="head">Contact The College Fever</div>
		<div class="tel-det">
			<ul><li class="first"><img src="http://thecollegefever.com/images/cn-1.png"></li>
			<li>+91 7760001802 </li>
			</ul>
			<ul><li class="first"><img src="http://thecollegefever.com/images/cn-2.png"></li><li><a href="mailto:info@thecollegefever.com">info@thecollegefever.com</a></li>
			</ul>
		</div>
		</div>
		<div class="contact-info">
		<div class="head">Contact The host</div>
		<div class="tel-det">
		<ul><li style="text-transform:capitalize"><strong><?php echo $getevdet->oname1; ?></strong></li></ul>
			<?php if($getevdet->ophone1!="") { ?>
			<ul><li class="first"><img src="http://thecollegefever.com/images/cn-1.png"></li><li><?php echo $getevdet->ophone1; ?></li></ul>
			<?php }?>
			<?php if($getevdet->oemail1!="") { ?>
			<ul><li class="first"><img src="http://thecollegefever.com/images/cn-2.png"></li><li><a href="mailto:<?php echo $getevdet->oemail1; ?>"><?php echo $getevdet->oemail1; ?></a></li></ul>
			<?php } ?>
			<?php if($getevdet->oname2!="") { ?>
			<ul><li style="text-transform:capitalize"><strong><?php echo $getevdet->oname1; ?></strong></li></ul>
			<?php } ?>
			<?php if($getevdet->ophone2!="") { ?>
			<ul><li class="first"><img src="http://thecollegefever.com/images/cn-1.png"></li><li><?php echo $getevdet->ophone2; ?></li></ul>
			<?php } ?>
			<?php if($getevdet->oemail2!="") { ?>
			<ul><li class="first"><img src="http://thecollegefever.com/images/cn-2.png"></li><li><a href="mailto:<?php echo $getevdet->oemail2; ?>"><?php echo $getevdet->oemail1; ?></a></li></ul>
			<?php }?>
		</div>
		</div>
		<div class="contact-info share">
		<div class="head">Share the event</div>
		<div class="share-ic">
		<ul>
			<li><a href="<?php echo $getevdet->efacebook; ?>"><img src="http://thecollegefever.com/images/csc1.png"></a></li><li><a href="<?php echo $getevdet->etwitter; ?>"><img src="http://thecollegefever.com/images/csc2.png"></a></li><li><a href="<?php echo $getevdet->egoogle; ?>"><img src="http://thecollegefever.com/images/csc3.png"></a></li><li><a href="#"><img src="http://thecollegefever.com/images/csc4.png"></a></li><li class="last"><a href="#"><img src="http://thecollegefever.com/images/csc5.png"></a></li>
		</ul>
		</div>
		</div>
	</div>
  </div>
</div>
<?php include('includes/hosting.php'); ?>
<?php include('includes/social-main.php'); ?>
<?php include('includes/footer.php'); ?>
</body>
</html>
