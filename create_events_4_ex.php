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
		
	</div><div>
		<div class="no-txt">3</div>
		<p><a href="create_events_3.php">Contact Details</a></p>
	</div><div class="sel">
		<div class="no-txt">4</div>
		<p><a href="create_events_4.php">Ticket and Payment Details</a></p>
		<div class="drop_arrow"></div>
	</div>
  </div>
  <div class="ticket-tab">
  	<ul>
		<li><a href="create_events_4.php">Make Custom Ticket/Pass</a></li><li class="sel"><a href="create_events_4_ex.php">Upload Existing Ticket/Pass</a><div class="drop_arrow"></div></li>
	</ul>
  </div>
  <div class="evnt-d-form">
  <ul>
  	<li class="first">Ticket/Pass Image <span class="red-txt">*</span></li><li class="img-field"><input name="Input" type="file" class="imgfield">
        <div class="img-desc">
          <ul>
            <li><strong>Image Format:</strong><br>
              JPG, PNG, GIF</li>
            <li><strong>File Size:</strong><br>
              Not more than 2 MB</li>
            <li class="last"><strong>Image Dimensions:</strong><br>
              960px x 300 px; Images greater than this will be cropped.<br>
              Images smaller than this will not be supported.</li>
          </ul>
        </div></li>
  </ul>
  <ul>
  	<li class="first">Sale Start Date <span class="red-txt">*</span> </li><li><input name="" type="text" placeholder="DD-MM-YYYY"></li><li class="first">Sale End Date<span class="red-txt"> *</span></li><li><input name="" type="text" placeholder="DD-MM-YYYY"></li>
  </ul>
  <ul>
  	<li class="first">Price per ticket<span class="red-txt"> *</span></li><li><input name="" type="text" placeholder="Enter price in INR"></li>
  </ul>
  <ul>
  	<li class="first">Maximum Registrations <span class="red-txt">*</span></li><li><input name="" type="text"></li>
  </ul>
  <ul>
  	<li class="first">Minimum Order at a Time <span class="red-txt">*</span></li><li><input name="" type="text"></li>
  </ul>
  <ul>
  	<li class="first">Maximum Order at a Time <span class="red-txt">*</span></li><li><input name="" type="text"></li>
  </ul>
  </div>
  <div class="event-form">
  <div class="ev-cr-submit">
		<input name="" type="button" value="Save Draft"><input name="" type="button" value="Previous" class="prev"><input name="" type="button" value="Publish" class="last">
	</div>
  </div>
</div>
<?php include('includes/social-main.php'); ?>
<?php include('includes/footer.php'); ?>
</body>
</html>
