<?php
require('admin/sql.php');
session_start();
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="fav.ico">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">

</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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

<body onLoad="getevents('All','All');">
<?php include('includes/header.php'); ?>
<div class="banner-main">
	<div class="container">
		<div class="b-content">
			<h2>NEVER MISS OUT</h2>
			<p>Hundreds of events are happening on colleges.<br>What are you doing?</p>
		</div>
	</div>
	<div class="container1">
		<div class="search-area">
		  <input name="textfield" type="text" size="30" placeholder="college name/event name/category">
		  <input name="textfield" type="text" size="10" placeholder="city">
		  <input name="textfield2" type="text" size="10" placeholder="from">
		  <input name="textfield3" type="text" size="10" placeholder="to">
		  <input type="image" src="images/inp-sub.png" class="subm">
		</div>
	</div>
	<div class="b-heads">
		<div class="container">
			<h2>UPCOMING EVENTS</h2>
		</div>
	</div>
</div>
<div class="subnav-main">
	<div class="container">
		<div class="subnav">
			<ul>
				<li class="sel" id="etli1">
				<a href="javascript:void(0)" onClick="seletype('All','1');"><span class="icon-area"><img src="images/sn-1.png"></span><span class="txt-area">All<br>Events</span></a>
				<div class="drop_bottom"></div><div class="drop_arrow"></div>
				</li><li class="e2" id="etli2">
				<a href="javascript:void(0)" onClick="seletype('Cultural Events','2');"><span class="icon-area"><img src="images/sn-2.png"></span>
					<span class="txt-area">Cultural<br>Events</span>
				</a>
				<div class="drop_bottom"></div><div class="drop_arrow"></div>	
				</li><li class="e3" id="etli3">
				<a href="javascript:void(0)" onClick="seletype('Technical Events','3');">
					<span class="icon-area"><img src="images/sn-3.png"></span>
					<span class="txt-area">Technical<br>Events</span>
				</a>	
				<div class="drop_bottom"></div><div class="drop_arrow"></div>
				</li><li class="e4" id="etli4">
				<a href="javascript:void(0)" onClick="seletype('Management Events','4');">
					<span class="icon-area"><img src="images/sn-4.png"></span>
					<span class="txt-area">Management<br>Events</span>
				</a>	
				<div class="drop_bottom"></div><div class="drop_arrow"></div>
				</li><li class="e5" id="etli5">
				<a href="javascript:void(0)" onClick="seletype('Sporting Events','5');">
					<span class="icon-area"><img src="images/sn-5.png"></span>
					<span class="txt-area">Sporting<br>Events</span>
				</a>
				<div class="drop_bottom"></div><div class="drop_arrow"></div>	
				</li><li class="e6" id="etli6">
				<a href="javascript:void(0)" onClick="seletype('Fun and Other','6');">
					<span class="icon-area"><img src="images/sn-6.png" width="35" height="35"></span>
					<span class="txt-area">Fun and Other<br>
				Events</span>
				</a>
				<div class="drop_bottom"></div><div class="drop_arrow"></div>	
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="container">
	<div class="find-events">
		<a href="index.php" class="sel">Find events with filters<div class="drop_arrow"></div></a><a href="index_calenderview.php">Find events with calendar</a>
	</div>
</div>
<div class="container">	
	<div class="filters">
		<ul>
			<li class="sel"><a href="#">All</a></li>
			<li><a href="#">Today</a></li>
			<li><a href="#">Tomorrow</a></li>
			<li><a href="#">This Week</a></li>
			<li><a href="#">This Weekend</a></li>
			<li><a href="#">This Month</a></li>
			<li><a href="#">Next Month</a></li>
		</ul>
	</div>
	<div class="city-drop">
		<a href="javascript:void(0)">City</a>
	</div>
</div>
<div class="container">
<input type="hidden" name="noofev" id="noofev" value="5">
<input type="hidden" name="etype" id="etype" value="All">
<input type="hidden" name="ecity" id="ecity" value="All">
  <div class="events-main" id="loadevents">
  
	</div>
	
	
</div>
<?php include('includes/hosting.php'); ?>
<?php include('includes/social-main.php'); ?>
<?php include('includes/footer.php'); ?>
</body>
</html>
