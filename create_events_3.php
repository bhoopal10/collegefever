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
<div class="container">
  <h3>Create Event</h3>
  <div class="event-tab">
  	<div>
		<div class="no-txt">1</div>
		<p><a href="create_events_1.php">Events Details</a></p>
		
	</div><div>
		<div class="no-txt">2</div>
		<p><a href="create_events_2.php">Venue Details</a></p>
		
	</div><div class="sel">
		<div class="no-txt">3</div>
		<p><a href="create_events_3.php">Contact Details</a></p>
		<div class="drop_arrow"></div>
	</div><div>
		<div class="no-txt">4</div>
		<p><a href="create_events_4.php">Ticket and Payment Details</a></p>
	</div>
  </div>
  <h4>Contact 1</h4>
  <div class="event-form">
  	<ul class="main">
		<li class="first">Organiser Name <span class="red-txt">*</span></li><li class="second"><input name="" type="text" class="width100"></li>
	</ul>
	<ul class="main">
		<li class="first">Organiser Email <span class="red-txt">*</span></li><li class="second"><input name="" type="text" class="width100"></li>
	</ul>
	<ul class="main">
		<li class="first">Organiser Phone </li><li class="second"><input name="" type="text" class="width100"></li>
	</ul>
	<ul class="main">
		<li class="first"></li><li class="second"><a href="#">Add another contact</a></li>
	</ul>
  </div>
  <h4>Social Links</h4>
  <div class="event-form">
  	<ul class="main">
		<li class="first">Event Website URL</li><li class="second"><input name="" type="text" class="width100"></li>
	</ul>
	<ul class="main">
		<li class="first">Event Facebook Page</li><li class="second"><input name="" type="text" class="width100"></li>
	</ul>
	<ul class="main">
		<li class="first">Event Twitter Handle</li><li class="second"><input name="" type="text" class="width100"></li>
	</ul>
	<ul class="main">
		<li class="first">Event Google+ Page</li><li class="second"><input name="" type="text" class="width100"></li>
	</ul>
	<div class="ev-cr-submit">
		<input name="" type="button" value="Save Draft"><input name="" type="button" value="Previous" class="prev"><input name="" type="button" value="Continue" class="last">
	</div>
  </div>
</div>
<?php include('includes/social-main.php'); ?>
<?php include('includes/footer.php'); ?>
</body>
</html>
