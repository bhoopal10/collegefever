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
<h2>Main Page Links</h2>
  <ul>
    <li><a href="events_search.php">Event Search </a></li>
	<li><a href="create_events_1.php">Create Events Screen 1</a></li>
	<li><a href="create_events_2.php">Create Events Screen 2 </a></li>
	<li><a href="create_events_3.php">Create Events Screen 3</a></li>
	<li><a href="create_events_4.php">Create Events Screen 4 custom </a></li>
	<li><a href="create_events_4_ex.php">Create Events Screen 4 existing</a></li>
	<li><a href="event_detail_1.php">Event Details Screen1</a></li>
	<li><a href="event_detail_1_join.php">Event Details Screen1 Join</a></li>
	<li><a href="event_register_1.php">Event Register Screen 1</a> </li>
	<li><a href="event_register_2.php">Event Register Screen 2 </a></li>
	<li><a href="index_calenderview.php">Index - not signed in - calender view</a></li>
	<li><a href="index_filterview.php">Index - not signed in - filter view</a></li>
	<li><a href="index_calenderview_loggedin.php">Index - logged in - calender view</a></li>
	<li><a href="index_filterview_loggedin.php">Index - logged in - filter view</a></li>
    <li><a href="login.php">Login</a></li>
    <li><a href="myevents_1.php">My event screen 1</a> </li>
    <li><a href="myevents_2.php">My event screen 2</a> </li>
    <li><a href="myevents_3.php">My event screen 3 </a> </li>
    <li><a href="myevents_4.php">My event screen 4 </a></li>
    <li><a href="signup.php">Sign Up</a> </li>
  </ul>
</div>
<?php include('includes/social-main.php'); ?>
<?php include('includes/footer.php'); ?>
</body>
</html>
