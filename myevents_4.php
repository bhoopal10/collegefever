<?php
require('admin/sql.php');
session_start();
if($_SESSION['uid']=="")
{
	?><script>location.replace('index.php');</script><?php
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
		<li class="sel"><a href="myevents_3.php">My Events as an Organiser</a>
	  <div class="drop_arrow"></div></li><li><a href="myevents_1.php">My Events as an Attendee</a></li><li><a href="#">Support</a></li>
	</ul>
  </div>
  <div class="ticket-tab my-subtab">
  	<ul>
		<li><a href="myevents_3.php">Current and Upcoming Events</a></li><li><a href="myevents_3.php?type=past">Past Events</a></li><li class="sel"><a href="myevents_4.php">Transactions</a><div class="drop_arrow"></div></li>
	</ul>
  </div>
  <div class="myevent-table">
<?php
if($_REQUEST['evtid']!="")
{
	$cnd1="and buyticket.eid='".$_REQUEST['evtid']."'";
	$evdl=mysql_fetch_object(mysql_query("select * from event where id='".$_REQUEST['evtid']."'"));
	?><h2>Transactions on event - '<?php echo $evdl->name; ?>'</h2><?php
}
if($_REQUEST['sort']!="")
{
	$ordtxt="order by ".$_REQUEST['sort']." asc";
}
else
{
	$ordtxt="order by buyticket.id desc";
}
$gettrans=mysql_query("select 
event.name as evname,
buyticket.id as btid,
buyticket.tcount as qty,
buyticket.ttlprice as amt,
buyticket.pay as status,
buyticket.uid as attid
from buyticket
left join event on buyticket.eid=event.id
left join register on event.uid=register.id
where register.id='".$_SESSION['uid']."' ".$cnd1."
".$ordtxt."
");
if(mysql_num_rows($gettrans)>0)
{
?>  
  <div class="join-tab1 scrollbar-our-definition">	
<table border="0" cellspacing="0" cellpadding="8">
  <tr>
    <td align="center" class="td-head"><strong>Sl No </strong></td>
    <td align="center" class="td-head"><strong><a href="myevents_4.php?sort=event.name">Event Name<div class="drop_arrow"></div></a></strong></td>
    <td align="center" class="td-head"><strong>Reg. No. </strong></td>
    <td align="center" class="td-head"><strong>Attendee Name </strong></td>
    <td align="center" class="td-head"><strong>Attendee Contact </strong></td>
    <td align="center" class="td-head"><strong>Transaction. No. </strong></td>
    <td align="center" class="td-head"><strong>Qty</strong></td>
    <td align="center" class="td-head"><strong>Amount (Rs.) </strong></td>
    <td align="center" class="td-head"><strong><a href="myevents_4.php?sort=buyticket.pay">Status<div class="drop_arrow"></div></a></strong></td>
  </tr>
<?php
$tr=0; 
while($gettrans1=mysql_fetch_object($gettrans)) 
{
$tr++; 
$getusr=mysql_fetch_object(mysql_query("select * from register where id='".$gettrans1->attid."'"));
?>  
  <tr <?php if($tr%2==0) { echo 'class="grey"';} ?>>
    <td align="center"><?php echo $tr; ?></td>
    <td align="center"><?php echo $gettrans1->evname; ?></td>
    <td align="center"><?php echo $getusr->id; ?></td>
    <td align="center"><?php echo $getusr->name; ?></td>
    <td align="center"><?php echo $getusr->email; ?></td>
    <td align="center"><?php echo $gettrans1->btid; ?></td>
    <td align="center"><?php echo $gettrans1->qty; ?></td>
    <td align="center"><?php echo $gettrans1->amt; ?></td>
    <td align="center"><?php echo $gettrans1->status; ?></td>
  </tr>
<?php } ?>
</table>
</div>
<?php } else { ?>
<p class="red-txt">There are no transactions done yet</p>
<?php } ?>
  </div>
</div>
<?php include('includes/social-main.php'); ?>
<?php include('includes/footer.php'); ?>
</body>
</html>
