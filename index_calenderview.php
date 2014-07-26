<?php
require('admin/sql.php');
session_start();
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="fav.ico">
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
				<li class="sel">
				<a href="#"><span class="icon-area"><img src="images/sn-1.png"></span><span class="txt-area">All<br>Events</span></a>
				<div class="drop_bottom"></div><div class="drop_arrow"></div>
				</li>
				<li class="second">
				<a href="#"><span class="icon-area"><img src="images/sn-2.png"></span>
					<span class="txt-area">Cultural<br>Events</span>
				</a>
				<div class="drop_bottom"></div><div class="drop_arrow"></div>	
				</li><li class="third">
				<a href="#">
					<span class="icon-area"><img src="images/sn-3.png"></span>
					<span class="txt-area">Technical<br>Events</span>
				</a>	
				<div class="drop_bottom"></div><div class="drop_arrow"></div>
				</li>
				<li class="fourth">
				<a href="#">
					<span class="icon-area"><img src="images/sn-4.png"></span>
					<span class="txt-area">Management<br>Events</span>
				</a>	
				<div class="drop_bottom"></div><div class="drop_arrow"></div>
				</li><li class="fifth">
				<a href="#">
					<span class="icon-area"><img src="images/sn-5.png"></span>
					<span class="txt-area">Sporting<br>Events</span>
				</a>
				<div class="drop_bottom"></div><div class="drop_arrow"></div>	
				</li><li class="sixth">
				<a href="#">
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
		<a href="index.php">Find events with filters</a><a href="index_calenderview.php"  class="sel">Find events with calendar<div class="drop_arrow"></div></a>
	</div>
</div>
<div class="container">	
	<div class="f-calender">
		<div class="f-tab">
			<div class="f-cell page2"><a href="#">&lt;&lt;</a></div>
			<div class="f-cell page1"><a href="#">&lt;</a></div>
			<div class="f-cell"><a href="#">ALL<br>
			<span class="small-txt">Events</span></a></div>
			<div class="f-cell sel"><a href="#">28<br><span class="small-txt">March</span></a></div>
			<div class="f-cell"><a href="#">29<br><span class="small-txt">March</span></a></div>
			<div class="f-cell"><a href="#">30<br><span class="small-txt">March</span></a></div>
			<div class="f-cell"><a href="#">31<br><span class="small-txt">March</span></a></div>
			<div class="f-cell"><a href="#">01<br><span class="small-txt">April</span></a></div>
			<div class="f-cell"><a href="#">02<br><span class="small-txt">April</span></a></div>
			<div class="f-cell"><a href="#">03<br><span class="small-txt">April</span></a></div>
			<div class="f-cell page1"><a href="#">&gt;</a></div>
			<div class="f-cell page2"><a href="#">&gt;&gt;</a></div>
		</div>
	</div>
	<div class="city-drop">
		<a href="#">City</a>
	</div>
</div>
<div class="container">
  <div class="events-main">
  
  
  
		<div class="events">
			<div class="contents">
				<div class="img-area"><img src="images/ep1.png"></div>
				<div class="cont-area"><strong class="head">Event Name</strong><br>
				  Fun and Other<br>
<br>
Christ College<br>
<strong>Bangalore</strong><br>
<br>
March 22 - March 24<br>
10:00 am onwards</div>
			</div>
		</div><div class="events second e2">
          <div class="contents">
            <div class="img-area"><img src="images/ep2.png"></div>
            <div class="cont-area"><strong class="head">Event Name</strong><br>
              Fun and Other<br>
              <br>
              Christ College<br>
              <strong>Bangalore</strong><br>
              <br>
              March 22 - March 24<br>
              10:00 am onwards</div>
          </div>
    </div>
	
	<div class="events e3">
			<div class="contents">
				<div class="img-area"><img src="images/ep3.png"></div>
				<div class="cont-area"><strong class="head">Event Name</strong><br>
				  Technical<br>
<br>
Christ College<br>
<strong>Bangalore</strong><br>
<br>
March 22 - March 24<br>
10:00 am onwards</div>
			</div>
		</div><div class="events second e4">
          <div class="contents">
            <div class="img-area"><img src="images/ep4.png"></div>
            <div class="cont-area"><strong class="head">Event Name</strong><br>
              Management<br>
              <br>
              Christ College<br>
              <strong>Bangalore</strong><br>
              <br>
              March 22 - March 24<br>
              10:00 am onwards</div>
          </div>
    </div>
	
	
	<div class="events e5">
			<div class="contents">
				<div class="img-area"><img src="images/ep5.png"></div>
				<div class="cont-area"><strong class="head">Event Name</strong><br>
				  Sporting<br>
<br>
Christ College<br>
<strong>Bangalore</strong><br>
<br>
March 22 - March 24<br>
10:00 am onwards</div>
			</div>
		</div><div class="events second e6">
          <div class="contents">
            <div class="img-area"><img src="images/ep6.png"></div>
            <div class="cont-area"><strong class="head">Event Name</strong><br>
              Cultural<br>
              <br>
              Christ College<br>
              <strong>Bangalore</strong><br>
              <br>
              March 22 - March 24<br>
              10:00 am onwards</div>
          </div>
    </div>
	
	
	<div class="events e7">
			<div class="contents">
				<div class="img-area"><img src="images/ep7.png"></div>
				<div class="cont-area"><strong class="head">Event Name</strong><br>
				  Fun and Other<br>
<br>
Christ College<br>
<strong>Bangalore</strong><br>
<br>
March 22 - March 24<br>
10:00 am onwards</div>
			</div>
		</div><div class="events second e8">
          <div class="contents">
            <div class="img-area"><img src="images/ep8.png"></div>
            <div class="cont-area"><strong class="head">Event Name</strong><br>
              Management<br>
              <br>
              Christ College<br>
              <strong>Bangalore</strong><br>
              <br>
              March 22 - March 24<br>
              10:00 am onwards</div>
          </div>
    </div>
	
	
	
	</div>
	
	<div class="load-more">
		<a href="#">Load more events</a>
	</div>
</div>
<?php include('includes/hosting.php'); ?>
<?php include('includes/social-main.php'); ?>
<?php include('includes/footer.php'); ?>
</body>
</html>
