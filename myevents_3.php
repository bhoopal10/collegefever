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
  <div class="ticket-tab">
  	<ul>
		<li <?php if($_REQUEST['type']!="past") { echo 'class="sel"';} ?>><a href="myevents_3.php" >Current and Upcoming Events</a><div class="drop_arrow"></div></li><li <?php if($_REQUEST['type']=="past") { echo 'class="sel"';} ?>><a href="myevents_3.php?type=past">Past Events</a><div class="drop_arrow"></div></li><li><a href="myevents_4.php">Transactions</a></li>
	</ul>
  </div>
  <?php if($_REQUEST['addevent']=='yes') { ?>
  <p class="red-txt" align="center">New event has been successfully published</p>
  <?php } ?>
  <div class="myevent-main">
  <?php
  if($_REQUEST['type']=='past')
  {
  	$cnd1="where edate<'".date('Y-m-d')."'";
  }
  else
  {
  	$cnd1="where edate>='".date('Y-m-d')."'";
  }
  $getevnt=mysql_query("select * from event ".$cnd1." and uid='".$_SESSION['uid']."' order by sdate desc");
  $ev=0;
  if(mysql_num_rows($getevnt)<=0)
  {
  	?><p class="red-txt" style="padding:10px;">There are no events added yet</p><?php
  }
  else
  {
  while($getevnt1=mysql_fetch_object($getevnt))
  {
  $ev++;
  ?>
  <div class="myevent-list <?php if($ev%2==0) { echo 'mywhite'; } ?> myevent-list1">
  	<ul>
		<li class="head"><?php echo $getevnt1->name; ?></li><li>Event ID: <?php echo $getevnt1->id; ?></li><li>
		<?php if($_REQUEST['type']!='past') { ?>
		Starts <?php  echo date('M j Y', strtotime($getevnt1->sdate)); ?>
		<?php }else{ ?>
		Ended <?php  echo date('M j Y', strtotime($getevnt1->edate)); ?>
		<?php } ?>
		</li><li><?php if($getevnt1->publish=='Yes') { echo 'Published'; } else { echo 'Unpublished';} ?></li><li class="view-ticket">
		<?php if($getevnt1->publish=='Yes') { ?>
		<a href="myevents_4.php?page=myevents&evtid=<?php echo $getevnt1->id; ?>">View&nbsp;Transactions</a>
		<?php }else { ?>
		<a href="create_events_1.php?pubev=Yes&evid=<?php echo $getevnt1->id; ?>">Complete and Publish Now</a>
		<?php } ?>
		</li>
	</ul>
	<div class="bottom1"><a href="event_detail_view.php?eid=<?php echo $getevnt1->id; ?>">Preview Event</a><a href="myevents_3_email_att.php?eid=<?php echo $getevnt1->id; ?>">Email Attendees</a></div>
	</div>
  <?php
  }
  }
  ?>
  
  </div>
</div>
<?php include('includes/social-main.php'); ?>
<?php include('includes/footer.php'); ?>
</body>
</html>
