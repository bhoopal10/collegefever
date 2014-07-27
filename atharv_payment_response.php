<?php
require('admin/sql.php');
session_start();
unset($_SESSION['ltype']);
if($_SESSION['uid']=="")
{
	?><script>location.replace('index.php');</script><?php
}
if($_REQUEST['deltic']=='yes')
{
	$delticket=mysql_query("delete from buyticket where id='".$_REQUEST['btid']."'");
	if($delticket)
	{
		$deltxt='<p class="red-txt" align="center">Ticket registration has been successfully cancelled</p>';
	}
}
if($_REQUEST['dld']=="pdf")
{
	include("pdfs/downloadpdf.php");
}
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="fav.ico">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42927084-1', 'auto');
  ga('send', 'pageview');

</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
<script src="js/jused.js" type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<link href="css/common.css" rel="stylesheet" type="text/css">
<link href="css/mobile_style.css" rel="stylesheet" type="text/css" />
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
  <div class="myevent-tab">
  	<ul>
		<li><a href="myevents_3.php">My Events as an Organiser</a></li><li class="sel"><a href="myevents_1.php">My Events as an Attendee</a>
	  <div class="drop_arrow"></div></li><li><a href="#">Support</a></li>
	</ul>
  </div>
  <div class="ticket-tab my-subtab">
  	<ul>
		<li <?php if($_REQUEST['type']!="past") { echo 'class="sel"';} ?>><a href="myevents_1.php" >Current and Upcoming Events</a><div class="drop_arrow"></div></li><li <?php if($_REQUEST['type']=="past") { echo 'class="sel"';} ?>><a href="myevents_1.php?type=past">Past Events</a><div class="drop_arrow"></div></li><li><a href="myevents_2.php">Payments</a></li>
	</ul>
  </div>
  <?php echo $deltxt; ?>
  <?php if($_REQUEST['newev']=="paid") { 
  	mysql_query("update buyticket set pay='Paid' where id='".$_SESSION['buyins']."'");
	mysql_query("update buyt set pay='Paid' where bid='".$_SESSION['buyins']."'");
	$getticket=mysql_fetch_object(mysql_query("select * from buyticket where id='".$_SESSION['buyins']."'"));
	$getevdet=mysql_fetch_object(mysql_query("select * from event where id='".$_SESSION['edetid']."'"));
	$getregdet=mysql_fetch_object(mysql_query("select * from register where id='".$_SESSION['uid']."'"));
	if($getevdet->vaddress2!="")
	{
		$vadd2=''.$getevdet->vaddress2.',<br>';
	}
	$getbtS=mysql_fetch_object(mysql_query("select SUM(tcount) as tcnt from buyt where bid='".$getticket->id."'"));
	$geturem=mysql_fetch_object(mysql_query("select * from register where id='".$_SESSION['uid']."'"));
	$ticdata='<table width="100%" border="0" cellspacing="0" cellpadding="2">';
	
	?>
	
		<?php 
		
			$getbt=mysql_query("select * from buyt where bid='".$getticket->id."'");
			while($getbt1=mysql_fetch_object($getbt))
			{
				$gettcnm=mysql_fetch_object(mysql_query("select * from tickets where id='".$getbt1->tid."'"));
				$ticinfo=''.$ticinfo.'<tr>
            	<td width="25%">'.$gettcnm->name.'</td>
            	<td width="11%">:</td>
            	<td width="64%">'.$getbt1->tcount.'</td>
          		</tr>';
		  	}
		  ?>
          
	<?php
	$ticdata=''.$ticdata.''.$ticinfo.'';
	$ticdata=''.$ticdata.'<tr>
            <td style="border-top:solid 1px #000;"><strong>Total</strong></td>
            <td style="border-top:solid 1px #000;"><strong>:</strong></td>
            <td style="border-top:solid 1px #000;"><strong>'.$getbtS->tcnt.'</strong></td>
          </tr>
        </table>';
	//	echo $ticdata;
	$strTo=''.$getregdet->email.'';
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
        <td bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;">'.$ticdata.'</td>
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
$result2 = mail($strTo,$strSubject,$message,$headers1);
  ?>
  <p align="center" class="red-txt">The ticket for the new event has been successfully bought</p>
  <?php } ?>
  <?php if($_REQUEST['newev']=="failed") { 
  ?>
  <p align="center" class="red-txt">The ticket payment failed , try again please</p>
  <?php } ?>
  <div class="myevent-main">
  <?php
  if($_REQUEST['type']=='past')
  {
  	$cnd1="and event.edate<'".date('Y-m-d')."'";
  }
  else
  {
  	$cnd1="and event.edate>='".date('Y-m-d')."'";
  }
  $gettick=mysql_query("select 
  event.name evname,
  event.id evid,
  event.sdate evsdate,
  event.oname1 eoname1,
  event.oname2 eoname2,
  event.oemail1 eoemail1,
  event.oemail2 eoemail2,
  event.ophone1 eophone1,
  event.ophone2 eophone2,
  buyticket.id btid,
  buyticket.tcount btcount,
  buyticket.ttlprice bttlprice,
  buyticket.pay bpay
  from buyticket
  left join event on buyticket.eid=event.id 
  where buyticket.uid='".$_SESSION['uid']."' and buyticket.pay='Paid' ".$cnd1." order by buyticket.id desc");
  $ev=0;
  ?><input type="hidden" name="mevno" id="mevno" value="<?php echo mysql_num_rows($gettick); ?>"><?php
  if(mysql_num_rows($gettick)<=0)
  {
  	?><p class="red-txt" style="padding:10px;">There are no tickets bought</p><?php
  }
  else
  {
  while($gettick1=mysql_fetch_object($gettick))
  {
  $getevnt1=mysql_fetch_object(mysql_query("select * from event where id='".$gettick1->eid."'"));
  $getctl=mysql_fetch_object(mysql_query("select SUM(tcount) as tct from buyt where bid='".$gettick1->btid."'"));
  $ev++;
  ?>
  	<div class="myevent-list <?php if($ev%2==0) { echo 'mywhite'; } ?> myevent-list1">
	<ul>
		<li class="head"><?php echo $gettick1->evname; ?></li><li>Event ID: <?php echo $gettick1->evid; ?></li><li>Starts <?php  echo date('M j, Y', strtotime($gettick1->evsdate)); ?></li><li class="view-ticket">
		<a href="vticket.php?btid=<?php echo $gettick1->btid; ?>" target="_blank">View Ticket</a>
		</li>
	</ul>
	<div class="bottom2">
	<ul>
		<li><a href="#" onClick="confrimfunc('myevents_1.php?page=myevents&deltic=yes&btid=<?php echo $gettick1->btid; ?>');">Cancel Registration</a></li><li><a href="javascript:void(0)" id="evco<?php echo $ev; ?>">Contact Organisers<div class="down" id="evco<?php echo $ev; ?>dw"></div><div class="up"id="evco<?php echo $ev; ?>up"></div></a>
		
		<div class="det-drop" id="evco<?php echo $ev; ?>c">
	<ul>
		<li><strong><?php echo $gettick1->eoname1; ?></strong></li><li>Phone: <?php echo $gettick1->eophone1; ?><br>Email: <?php echo $gettick1->eoemail1; ?></li><?php if($gettick1->eoname2!="") { ?><li><strong> <?php echo $gettick1->eoname2; ?></strong></li><li>
		<?php if($gettick1->eophone2!="" || $gettick1->eoemail2!="") { ?>Phone: <?php echo $gettick1->eophone2; ?><br>Email: <?php echo $gettick1->eoemail2; ?><?php } ?></li><?php } ?>
	</ul>
	</div>
		</li><li><a href="javascript:void(0)" id="evpd<?php echo $ev; ?>">Payment Details<div class="down" id="evpd<?php echo $ev; ?>dw"></div><div class="up"id="evpd<?php echo $ev; ?>up"></div></a>
		
		<div class="det-drop" id="evpd<?php echo $ev; ?>c">
	<ul>
		<li>Ticket Count: <?php echo $getctl->tct; ?></li><li>Total Price: Rs. <?php echo $gettick1->bttlprice; ?></li><li>Payment: <?php echo $gettick1->bpay; ?></li>
	</ul>
	</div>
		</li>
		</ul>
	</div>
	</div>
	
	
	<?php } }?>
  </div>
</div>
<?php include('includes/social-main.php'); ?>
<?php include('includes/footer.php'); ?>
</body>
</html>
