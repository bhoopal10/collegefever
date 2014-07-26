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
  <h3>Register for Event Name</h3>
  <div class="ev-reg-main">
  	<div class="ev-reg-l">
		<div class="main-txt">Sign in or sign up on The College Fever to proceed</div>
		<div class="sign-main">
			<div class="sign-in">
				<ul>
					<li class="head">Sign In</li>
					<li><div class="error-txt">incorrect email/password</div><input name="" type="text" placeholder="email" class="error"></li>
					<li><input name="" type="text" placeholder="password"><div class="forgot-txt"><a href="#">Forgot Password?</a></div></li>
					<li><input name="" type="button" class="subm" value="Sign In"></li>
				</ul>
			</div>
			<div class="sign-up">
				<ul>
					<li class="head">Sign Up</li>
					<li><div class="error-txt">fields indicated in red are empty!</div><input name="" type="text" placeholder="name"></li>
					<li><input name="" type="text" placeholder="email"></li>
					<li><input name="" type="text" placeholder="password"></li>
					<li><input name="" type="text" placeholder="college"></li>
					<li><input name="" type="button" class="subm" value="Sign Up"></li>
				</ul>
			</div>
		</div>
		<div class="or-area">OR</div>
		<div class="f-connect">
			<ul>
				<li class="first"><a href="#"><img src="images/sc-1.png"></a></li><li><a href="#"><img src="images/sc-2.png"></a></li>
			</ul>
		</div>
	</div><div class="ev-reg-r">
	<p>Event Name Lorem Ipsum</p>
	<div class="img-area"><img src="images/reg-img.png"></div><div class="ev-main">
	<div class="ev1"><strong>Christ University</strong>,<br>
Lorem Ipsum Road,<br>
Bangalore,<br>
Karnataka - 560023</div>
<div  class="ev2"><strong>May 3 - May 6, 2014</strong><br>
9:00 am to 7:00 pm<br><br>
<a href="#"><strong>Add to my calendar</strong></a></div>
</div>
	</div>
  </div>
  <div class="summary-area">
  Summary
  </div>
  <div class="summary-det">
  <div class="join-tab scrollbar-our-definition">
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="td-head"><strong>Ticket Category </strong></td>
        <td class="td-head"><strong>Price (Rs.)</strong></td>
        <td align="left" class="td-head"><strong>Quantity</strong></td>
        <td class="td-head"><strong>Amount (Rs.)</strong></td>
      </tr>

      <tr>
        <td><strong>The College Fever Special Price</strong><br>
          (only for students, college ID required)</td>
        <td align="center"><strong>250</strong></td>
        <td align="left"><select name="select3">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3" selected>3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select></td>
        <td align="right"><strong>750</strong></td>
      </tr>

      <tr>
        <td colspan="3" class="orange-txt">&nbsp;</td>
        <td align="right"><strong>TOTAL (Rs.)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;750</strong> </td>
      </tr>
    </table>
  </div>
  </div>
  <div class="have-ques">
  	<div class="head">Have questions?</div>
	<div class="h-main">
	  <div class="contact-info">
          <div class="head">Contact The College Fever</div>
		  <div class="tel-det">
            <ul>
              <li class="first"><img src="images/cn-1.png"></li>
              <li>+91 7760001802</li>
            </ul>
		    <ul>
		      <li class="first"><img src="images/cn-2.png"></li>
		      <li><a href="mailto:info@<br>thecollegefever.com">info@<br>
		        thecollegefever.com</a></li>
	        </ul>
	    </div>
	  </div><div class="contact-info">
        <div class="head">Contact The host</div>
	    <div class="tel-det">
          <ul>
            <li class="first"><img src="images/cn-1.png"></li>
            <li>+91 7760001802</li>
          </ul>
	      <ul>
	        <li class="first"><img src="images/cn-2.png"></li>
	        <li><a href="mailto:chetan@christuniversity.com">chetan@<br>
	          christuniversity.com</a></li>
          </ul>
        </div>
      </div><div class="contact-info share">
        <div class="head">Share the event</div>
	    <div class="share-ic">
          <ul>
            <li><a href="#"><img src="images/csc1.png"></a></li>
            <li><a href="#"><img src="images/csc2.png"></a></li>
            <li><a href="#"><img src="images/csc3.png"></a></li>
            <li><a href="#"><img src="images/csc4.png"></a></li>
            <li class="last"><a href="#"><img src="images/csc5.png"></a></li>
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
