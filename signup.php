<?php
require('admin/sql.php');
session_start();
?>
<?php
if(isset($_POST['SubmitRG']))
{

$chkem=mysql_num_rows(mysql_query("select * from register where email='".$_REQUEST['email']."'"));
	if($chkem>0)
	{
			?><script>//alert('Registration failed, Email ID given is already registered');</script><?php
			$errtxt='<li class="error">Registration failed, Email ID given is already registered</li>';
			?><script>//location.replace('#err');</script><?php
	}
	else
	{
		$code1=rand(10000,99999);
		$insadv=mysql_query("insert into register(name,email,password,adate,atime,college,city,ltype,degree) values ('".$_REQUEST['name']."','".$_REQUEST['email']."','".$_REQUEST['password']."','".date('Y-m-d')."','".date('H:i:s')."','".$_REQUEST['college']."','".$_REQUEST['city']."','Normal','".$_REQUEST['degree']."')");
		if($insadv)
		{
			$_SESSION['tmpid']=mysql_insert_id();
			$strTo=''.$_REQUEST['email'].'';
			$strSubject='College Fever Registration Details' ;
			$message = '
			<p>Hello '.$_REQUEST['name'].'</p>
<p>Welcome to College Fever , Your College fever account Username is '.$_REQUEST['email'].' and Password is '.$_REQUEST['password'].'</p>
<p><a href="http://thecollegefever.com/everify.php?tuid='.$_SESSION['tmpid'].'">Click here to complete email verification</a></p>
<p>______________________________________</p>
<p style="font-size:10px;line-height:8px;">College Fever Team,</p>

';
$headers  = "From: info@thecollegefever.com \n";
$headers .= "MIME-version: 1.0\n";
$headers .= "Content-type: text/html; charset= iso-8859-1\n"; 
$headers1=$headers;
$result2 = mail($strTo,$strSubject,$message,$headers1);
	?>
	<script>
	//alert('Registration has been successfully completed, You will receive an verification email in your email id');</script><?php
	?><script>location.replace('login.php?reg=yes');
	</script>
	<?php
}
else
{
	?>
	<script>
	//alert('Registration failed, Try again');</script><?php
	$errtxt='<li class="error">Registration failed, Try again</li>';
	?><script>//location.replace('#err');
	</script>
	<?php
}
}
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

<body>
<?php include('includes/header.php'); ?>
<div class="container">
	<div class="login-area">
	<h2 align="center">Sign Up </h2>
	<p align="center">Sign up on The College Fever to get the following benefits!</p>
	<div class="signup-chk">
		<ul>
		<li class="first"><img src="images/sign_chk.png"></li><li>Exclusive student discounts on events</li>
		</ul>
		<ul>
		<li class="first"><img src="images/sign_chk.png"></li><li>Create your college events for free</li>
		</ul>
		<ul>
		<li class="first"><img src="images/sign_chk.png" width="50" height="40"></li>
		<li>Get massive online registrations for your events
with the help of our large database of students</li>
		</ul>
	</div>
	<div class="login-f-area">
	  <div class="social-area v-top">
        <div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js"></script>
		 <script>
      window.fbAsyncInit = function() {
    FB.init({
        appId   : '283803765131019',
        oauth   : true,
        status  : true, // check login status
        cookie  : true, // enable cookies to allow the server to access the session
        xfbml   : true // parse XFBML
    });

  };

function fb_login(){
    FB.login(function(response) {

        if (response.authResponse) {
		location.replace('facetest2.php');
            console.log('Welcome!  Fetching your information.... ');
            //console.log(response); // dump complete info
            access_token = response.authResponse.accessToken; //get access token
            user_id = response.authResponse.userID; //get FB UID
			location.replace('facetest2.php');
            FB.api('/me', function(response) {
               // user_email = response.email; //get user email
			   location.replace('facetest2.php');
          // you can store this data into your database             
            });

        } else {
            //user hit cancel button
            console.log('User cancelled login or did not fully authorize.');

        }
    }, {
        scope: 'email'
    });
}
(function() {
    var e = document.createElement('script');
    e.src = document.location.protocol + 'http://connect.facebook.net/en_US/all.js';
    e.async = true;
    document.getElementById('fb-root').appendChild(e);
}()); 
                                            </script>
	  	<p>
        <a href="#" onClick="fb_login();" class="fb_login"><img src="images/sc-1.png" border="0"></a><br>
<span class="orange-txt">We won't post it on your Facebook Profile</span>
		</p>
	    <!--<p><a href="#"><img src="images/sc-2.png" border="0"></a></p>-->
      </div><div class="or-area v-top">
	 <p>Or</p>
	  </div><div class="f-login">
	  <form action="" name="RegSign" method="post" onSubmit="return CheckRegister11();">
        <ul>
          <li><a name="err"></a>Sign up via email</li>
		  <?php echo $errtxt; ?>
          <li>
		  <div class="err-txt" id="err1"></div>
            <input name="name" type="text" id="name" placeholder="name">
          </li>
          <li>
		  <div class="err-txt" id="err2"></div>
            <input name="email" type="text" id="email" placeholder="email">
          </li>
		  <li>
		  <div class="err-txt" id="err3"></div>
		  <input name="college" type="text" id="college" placeholder="college">
          </li>
		  <li>
		  <div class="err-txt" id="err4"></div>
			<input name="city" type="text" id="city" placeholder="city">		  
          </li>
		  <li>
		  <div class="err-txt" id="err5"></div>
		  <input name="degree" type="text" id="degree" placeholder="degree">
          </li>
		  <li>
		  <div class="err-txt" id="err6"></div>
            <input name="password" type="password" id="password" placeholder="password">
          </li>
		  <li>
		  <div class="err-txt" id="err7"></div>
            <input name="cpassword" type="password" id="cpassword" placeholder="confirm password">
          </li>
          <li class="submit-area">
            <input name="SubmitRG" type="submit" id="SubmitRG" value="Sign Up">
          </li>
        </ul>
		</form>
      </div>
	</div>
	</div>
</div>
<?php include('includes/social-main.php'); ?>
<?php include('includes/footer.php'); ?>
</body>
</html>
