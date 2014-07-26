<?php
require('admin/sql.php');
session_start();
if($_REQUEST['eid']!="")
{
	$_SESSION['edetid']=$_REQUEST['eid'];
}
if(isset($_POST['buyticket']))
{
	$buyt=mysql_query("insert into buyticket(uid,eid,tcount,ttlprice,pay,pdate) values('".$_SESSION['uid']."','".$_SESSION['edetid']."','".$_REQUEST['tcount']."','".$_REQUEST['tlprice']."','Paid','".date('Y-m-d H:i:s')."')");
	if($buyt)
	{
		?><script>location.replace('myevents_1.php?page=myevents&newev=paid');</script><?php
	}
}
$getevdet=mysql_fetch_object(mysql_query("select * from event where id='".$_SESSION['edetid']."'"));
$gtkcount=mysql_fetch_object(mysql_query("select sum(tcount) as tcount from buyticket where eid='".$_SESSION['edetid']."'"));
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
  <h1 style="text-transform:capitalize"><?php echo $getevdet->name; ?> </h1>
  <div class="ev-banner">
  	<p align="center"><img src="upfile/<?php echo $getevdet->pic1; ?>" width="960" height="450"></p>
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
<?php  echo date('g:i a', strtotime($getevdet->stime)); ?> to <?php  echo date('g:i a', strtotime($getevdet->etime)); ?>
<br><br>
</div>
</li>
	</ul>
  </div>
  
  <div class="evnt-m-desc">
  	<div class="evnt-desc-l">
		<p><strong>Event Description</strong></p>
		<?php echo $getevdet->description; ?>
		
  	</div><div class="evnt-desc-r">
		<div class="contact-info">
		<div class="head">Contact The College Fever</div>
		<div class="tel-det">
			<ul><li class="first"><img src="images/cn-1.png"></li><li>+91 7760001802</li></ul>
			<ul><li class="first"><img src="images/cn-2.png"></li><li><a href="mailto:info@thecollegefever.com">info@<br>thecollegefever.com</a></li></ul>
		</div>
		</div>
		<div class="contact-info">
		<div class="head">Contact The host</div>
		<div class="tel-det">
		<ul><li style="text-transform:capitalize"><strong><?php echo $getevdet->oname1; ?></strong></li></ul>
			<?php if($getevdet->ophone1!="") { ?>
			<ul><li class="first"><img src="images/cn-1.png"></li><li><?php echo $getevdet->ophone1; ?></li></ul>
			<?php }?>
			<?php if($getevdet->oemail1!="") { ?>
			<ul><li class="first"><img src="images/cn-2.png"></li><li><a href="mailto:<?php echo $getevdet->oemail1; ?>"><?php echo $getevdet->oemail1; ?></a></li></ul>
			<?php } ?>
			<?php if($getevdet->oname2!="") { ?>
			<ul><li style="text-transform:capitalize"><strong><?php echo $getevdet->oname1; ?></strong></li></ul>
			<?php } ?>
			<?php if($getevdet->ophone2!="") { ?>
			<ul><li class="first"><img src="images/cn-1.png"></li><li><?php echo $getevdet->ophone2; ?></li></ul>
			<?php } ?>
			<?php if($getevdet->oemail2!="") { ?>
			<ul><li class="first"><img src="images/cn-2.png"></li><li><a href="mailto:<?php echo $getevdet->oemail2; ?>"><?php echo $getevdet->oemail1; ?></a></li></ul>
			<?php }?>
		</div>
		</div>
		<div class="contact-info share">
		<div class="head">Share the event</div>
		<div class="share-ic">
		<ul>
			<li><a href="<?php echo $getevdet->efacebook; ?>"><img src="images/csc1.png"></a></li><li><a href="<?php echo $getevdet->etwitter; ?>"><img src="images/csc2.png"></a></li><li><a href="<?php echo $getevdet->egoogle; ?>"><img src="images/csc3.png"></a></li><li><a href="#"><img src="images/csc4.png"></a></li><li class="last"><a href="#"><img src="images/csc5.png"></a></li>
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
