<?php
require('admin/sql.php');
session_start();
if($_SESSION['uid']=="")
{
	?><script>location.replace('index.php');</script><?php
}
?>
<?php
if(isset($_POST['SubmitRG']))
{
$upddet=mysql_query("
update register set
name='".$_REQUEST['name']."',
college='".$_REQUEST['college']."',
city='".$_REQUEST['city']."',
degree='".$_REQUEST['degree']."',
password='".$_REQUEST['password']."'
where id='".$_SESSION['uid']."'
");
if($upddet)
{
	$edttxt='<li class="error">Profile has been successfully edited</li>';
}
else
{
	$edttxt='<li class="error">Profile edition failed, Try again</li>';
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
	<h2 align="center">Edit Profile </h2>
	<p align="center">Edit your profile details below</p>
	
	<div class="login-f-area">
	<form action="" name="RegSign" method="post" onSubmit="return CheckRegister11();">
	  <div class="edit-pr1">
        <ul>
			<?php echo $edttxt; ?>
          <li>Name</li><li>
		  <div class="err-txt" id="err1"></div>
            <input name="name" type="text" id="name" value="<?php echo $usrdet->name; ?>">
          </li><li>College</li><li>
		  <div class="err-txt" id="err3"></div>
		  <input name="college" type="text" id="college" value="<?php echo $usrdet->college; ?>">
            
			 </li><li>City</li><li>
		  <div class="err-txt" id="err4"></div>
		  <input name="city" type="text" id="city" value="<?php echo $usrdet->city; ?>">
          </li><li>Degree</li><li>
		  <div class="err-txt" id="err5"></div>
		  <input name="degree" type="text" id="degree" value="<?php echo $usrdet->degree; ?>">
            
          </li><?php if($usrdet->ltype=='Normal'){ ?><li>Password</li><li>
		  <div class="err-txt" id="err6"></div>
            <input name="password" type="password" id="password" placeholder="password" value="<?php echo $usrdet->password; ?>">
          </li><li>Confirm Password</li><li>
		  <div class="err-txt" id="err7"></div>
            <input name="cpassword" type="password" id="cpassword" placeholder="confirm password" value="<?php echo $usrdet->password; ?>">
          </li><?php } ?><li class="submit-area">
            <input name="SubmitRG" type="submit" id="SubmitRG" value="Edit Profile">
          </li>
        </ul>
      </div>
	  </form>
	  </div>
	</div>
</div>
<?php include('includes/social-main.php'); ?>
<?php include('includes/footer.php'); ?>
</body>
</html>
