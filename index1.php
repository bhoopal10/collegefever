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
<div class="header-main">
	<div class="container">
		<div class="logo-area">
			<img src="images/logo.png">
		</div><div class="navs-area">
			<ul>
				<li><a href="#">All Events</a>
				</li><li><a href="#"><strong>Create Event</strong></a>
				</li><li><a href="#">Login | <strong>Sign Up</strong></a></li>
			</ul>
		</div>
	</div>	
</div>
<div class="container">
<h2>Main Page Links</h2>
  <ul>
    <li><a href="events_search.php">Event Search </a></li>
	<li><a href="create_events_1.html">Create Events Screen 1</a></li>
	<li><a href="create_events_2.php">Create Events Screen 2 </a></li>
	<li><a href="create_events_3.php">Create Events Screen 3</a></li>
	<li><a href="create_events_4.php">Create Events Screen 4 custom </a></li>
	<li><a href="create_events_4_ex.php">Create Events Screen 4 existing</a></li>
	<li><a href="event_detail_1.php">Event Details Screen1</a></li>
	<li><a href="event_detail_1_join.php">Event Details Screen1 Join</a></li>
	<li><a href="event_register_1.php">Event Register Screen 1</a> </li>
	<li><a href="index_filterview.php">Index - not signed in - filter view</a></li>
	<li><a href="index_calenderview.php">Index - not signed in - calender view</a></li>
    <li><a href="index_filterview_loggedin.php">Index - logged in - filter view</a></li>
    <li><a href="index_calenderview_loggedin.php">Index - logged in - calender view</a></li>
    <li><a href="login.php">Login</a></li>
    <li><a href="signup.php">Sign Up</a> </li>
  </ul>
</div>
<div class="social-main">
	<div class="container">
		<div class="connect">
			<ul>
				<li>Connect with The College Fever to know what’s new and happening!</li><li class="img-li">
				<a href="#"><img src="images/sc1.png"></a><a href="#"><img src="images/sc2.png"></a><a href="#"><img src="images/sc3.png"></a><a href="#"><img src="images/sc4.png"></a><a href="#"><img src="images/sc5.png"></a>
				</li>
			</ul>
		</div>
		<div class="newsletter">
			<ul>
				<li>Subscribe to our newsletter</li><li class="input">
				  <input name="textfield4" type="text" size="60" placeholder="enter your email here">
				</li>
			</ul>
	  </div>
	</div>
</div>
<div class="footer-main">
	<div class="container">
		<div class="f-content">
			<ul>
				<li>
					<h2>How it Works</h2>
					<p>Lorem ipsum dolor sit amet, consectetur
adipiscing elit. Nunc feugiat et erat sed
bibendum.</p>
<p>1. Lorem ipsum dolor sit amet, consectetur</p>
<p>2. Nulla ac dolor in mi tempor aliquet ac id
    tellus.</p>
<p>3. Cras faucibus mi sit amet mauris dictum
    fringilla.</p>	
				</li><li>
                  <h2>FAQs</h2>
			      <p>Lorem ipsum dolor sit amet, consectetur
			        adipiscing elit. Nunc feugiat et erat sed
			        bibendum.</p>
			      <p>1. Lorem ipsum dolor sit amet, consectetur</p>
			      <p>2. Nulla ac dolor in mi tempor aliquet ac id
			        tellus.</p>
			      <p>3. Cras faucibus mi sit amet mauris dictum
			        fringilla.</p>
					<p><a href="#">See all FAQ's</a></p>
		      </li><li class="last">
                  <h2>Tweets <span class="blue-txt">@thecollegefever</span></h2>
			      <p><span class="blue-txt">@loremipsum</span> dolor sit amet, consectetur<br>
			        adipiscing elit. Nunc feugiat et erat sed<br>
	            bibendum <span class="orange-txt">#thecollegefever</span></p>
			      <p align="right">24 minutes ago</p>
				  <p><span class="blue-txt">@loremipsum</span> dolor sit amet, consectetur<br>
			        adipiscing elit. Nunc feugiat et erat sed<br>
	            bibendum <span class="orange-txt">#thecollegefever</span></p>
			      <p align="right">2 hours ago</p>
		      </li>
			</ul>
	  </div>
	  <div class="f-bottom">
	  	Copyright The College Fever, 2014. All rights reserved.
	  </div>
	</div>
</div>
</body>
</html>
