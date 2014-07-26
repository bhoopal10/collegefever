<?php
require('admin/sql.php');
session_start();
?>
<?php
if(isset($_POST['SubmitLG']))
{
$getemail=mysql_query("select * from register where email='".$_REQUEST['email']."'");
if(mysql_num_rows($getemail)>0)
{
$getemail1=mysql_fetch_object($getemail);
$strTo=$_REQUEST['email'];
$strSubject="College Fever Forgot Password Request" ;
$message = "\n".
$message = '
<p>Hello </p>
<p>You had requested for your username/password. Your College Fever Username is : '.$getemail1->email.' and Password is : '.$getemail1->password.'</p>
<p>You can login to your College Fever account with the above login details.</p>
<p>______________________________________</p>
<p style="font-size:10px;line-height:8px;">College Fever Team,</p>
';
								 $headers  = "From: info@thecollegefever.com  \n";
                                 $headers .= "MIME-version: 1.0\n";
                                 $headers .= "Content-type: text/html; charset= iso-8859-1\n"; 
                             $result2 = mail($strTo,$strSubject,$message,$headers);
	if($result2)						 
	{
	$failtext='<li class="txt"><span class="red-txt">Username/Password has been sent to your email id</span></li>';
	?>
	<script>
	//alert('Username/Password has been sent to your email id');
	//location.replace('login.php');
	</script>
	<?php
	}
	}
	else
	{
	$failtext='<li class="txt"><span class="red-txt">The email id given is not registered yet</span></li>';
	?>
	<script>
	//alert('The email id given is not registered yet');
	//location.replace('forgot.php');
	</script>
	<?php
	}
	}?>	
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
	<div class="login-area">
	<h2 align="center">Forgot Password? </h2>
	<p align="center">Enter your email id to receive your username &amp; password </p>
	<div class="login-f-area">
		<div class="f-login">
		<form action="" method="post">
			<ul>
				<li>Enter Email ID </li>
				<?php echo $failtext; ?>
				<li>
					<input name="email" type="email" id="email" placeholder="email" required>
				</li>
				<li class="submit-area">
				  <input type="submit" name="SubmitLG" value="Submit">
				</li>
			</ul>
			</form>
	  </div><div class="or-area">
	  Or
	  </div><div class="social-area">
	  	<p><a href="#"><img src="images/sc-1.png" border="0"></a></p>
	  	<p><a href="#"><img src="images/sc-2.png" border="0"></a></p>
	  </div>
	</div>
	<p align="center">New to The College Fever? <a href="#">Sign Up</a> now to get exclusive offers on events!</p>
	</div>
</div>
<?php include('includes/social-main.php'); ?>
<?php include('includes/footer.php'); ?>
</body>
</html>
