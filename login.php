<?php
require('admin/sql.php');
session_start();
if($_REQUEST['type']=='joinevent')
{
	$_SESSION['ltype']='joinevent';
}
if($_REQUEST['type']=='createev')
{
	$_SESSION['ltype']='createev';
}
?>
<?php
if(isset($_POST['SubmitLG']))
{
$getudet=mysql_query("select * from register where email='".$_REQUEST['email']."' and password='".$_REQUEST['password']."'");
	if(mysql_num_rows($getudet)>0)
	{
		$getudet1=mysql_fetch_object($getudet);		
		if($getudet1->everify=='Yes')
		{
			$_SESSION['uname']=$getudet1->name;
			$_SESSION['utype']='client';
			$_SESSION['uid']=$getudet1->id;
			if($_SESSION['ltype']=='joinevent')
			{
				?><script>location.replace('event_detail_1.php');</script><?php
			}
			else if($_SESSION['ltype']=='createev')
			{
				?><script>location.replace('create_events_1.php?page=evcreate');</script><?php
			}
			else
			{
				?><script>location.replace('index.php');</script><?php
			}
		}
		else
		{
			$failtext='<li class="txt"><span class="red-txt">Login failed, Your email verification is pending</span></li>';
			?><script>
				//alert('Login failed, Your email verification is pending');
				//location.replace('login.php');
			</script><?php
		}
	}
	else
	{
		$failtext='<li class="txt"><span class="red-txt">Invalid Username/Password</span></li>';
		?><script>
		//alert('Invalid Username/Password');
		//location.replace('login.php');
		</script><?php
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
<script type="text/javascript" src="js/jquery_org.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
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
	<h2 align="center">Log in</h2>
	<p align="center">Log in to The College Fever to access all your events and transactions.</p>
	<?php if($_REQUEST['type']=='joinevent') { ?>
	<p align="center" class="red-txt">You must login to join an event</p>
	<?php } ?>
	<?php if($_REQUEST['type']=='createev') { ?>
	<p align="center" class="red-txt">You must login to create an event</p>
	<?php } ?>
	<?php if($_REQUEST['reg']=='yes') { ?>
	<p align="center" class="red-txt">Registration has been successfully completed, You will receive an verification email in your email id</p>
	<?php } ?>
	<div class="login-f-area">
		<div class="f-login">
		<form action="" method="post">
			<ul>
				<li>Sign In</li>
				<?php echo $failtext; ?>
				<li><input name="email" type="email" id="email" placeholder="email" required>
				</li>
				<li class="abv-forgot"><input name="password" type="password" id="password" placeholder="password" required>
				</li>
				<li class="txt"><a href="forgot.php">forgot password?</a></li>
				<li class="submit-area">
				  <input type="submit" name="SubmitLG" value="Sign In">
				</li>
			</ul>
		  </form>
	  </div><div class="or-area">
	  Or
	  </div><div class="social-area">
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
	  	<!--<p><a href="twitter_login/redirect.php"><img src="images/sc-2.png" border="0"></a></p>-->
	  </div>
	</div>
	<p align="center">New to The College Fever? <a href="signup.php"><strong>Sign Up</strong></a> now to get exclusive offers on events!</p>
	</div>
</div>
<?php include('includes/social-main.php'); ?>
<?php include('includes/footer.php'); ?>
</body>
</html>
