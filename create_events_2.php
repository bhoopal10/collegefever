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
		
	</div><div class="sel">
		<div class="no-txt">2</div>
		<p><a href="create_events_2.php">Venue Details</a></p>
		<div class="drop_arrow"></div>
	</div><div>
		<div class="no-txt">3</div>
		<p><a href="create_events_3.php">Contact Details</a></p>
	</div><div>
		<div class="no-txt">4</div>
		<p><a href="create_events_4.php">Ticket and Payment Details</a></p>
	</div>
  </div>
  <div class="event-form">
  	<ul class="main">
		<li class="first">Venue Name <span class="red-txt">*</span></li><li class="second"><input name="" type="text" class="width100"></li>
	</ul>
	<ul class="main">
		<li class="first">Address Line 1 <span class="red-txt">*</span></li><li class="second"><input name="" type="text" class="width100"></li>
	</ul>
	<ul class="main">
		<li class="first">Address Line 2</li><li class="second"><input name="" type="text" class="width100"></li>
	</ul>
	<ul class="main">
		<li class="first">City <span class="red-txt">*</span></li><li class="second"><ul><li class="in50"><input name="" type="text" class="width100"></li><li class="in25 txt-right"><span class="start-time">Pincode <span class="red-txt">*</span></span></li><li class="in25"><input name="" type="text" class="width100"></li></ul>
		</li>
	</ul>
	<ul class="main">
      <li class="first">Country <span class="red-txt">*</span></li><li class="second">
	    <ul>
	      <li class="in50">
	        <select class="width100"></select>
          </li>
		  </ul>
      </li>
    </ul>
	<ul class="main">
      <li class="first">State <span class="red-txt">*</span></li><li class="second">
	    <ul>
	      <li class="in50">
	        <select class="width100"></select>
          </li>
		  </ul>
      </li>
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
