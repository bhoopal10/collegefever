<?php
require('admin/sql.php');
session_start();
if($_SESSION['uid']=="")
{
	?><script>location.replace('index.php');</script><?php
}
if($_REQUEST['eid']!="")
{
	$_SESSION['edetid']=$_REQUEST['eid'];
}
if(isset($_POST['emailatt']))
{
			$strTo=''.$_SESSION['emtxt'].'';
			$strSubject=$_REQUEST['emsubject'];
			$message = '
			'.$_REQUEST['emcontent'].'
<p>______________________________________</p>
<p style="font-size:10px;line-height:8px;">College Fever Team,</p>

';
$headers  = "From: info@thecollegefever.com \n";
$headers .= "MIME-version: 1.0\n";
$headers .= "Content-type: text/html; charset= iso-8859-1\n"; 
$headers1=$headers;
$result2 = mail($strTo,$strSubject,$message,$headers1);
if($result2)
{
	$mailtxt='<p class="red-txt" align="center">The mail has been successfully sent</p>';
}
else
{
	$mailtxt='<p class="red-txt" align="center">Mail sending failed, Try again</p>';
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
<script type="text/javascript" src="admin/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "simple",
		plugins : "pagebreak,style,layer,table,save",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		
		
		
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
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
  <div class="myevent-tab">
  	<ul>
		<li class="sel"><a href="myevents_3.php">My Events as an Organiser</a>
	  <div class="drop_arrow"></div></li><li><a href="myevents_1.php">My Events as an Attendee</a></li><li><a href="#">Support</a></li>
	</ul>
  </div>
  <div class="ticket-tab">
  	<ul>
		<li><a href="myevents_3.php" >Current and Upcoming Events</a><div class="drop_arrow"></div></li><li><a href="myevents_3.php?type=past">Past Events</a><div class="drop_arrow"></div></li><li><a href="myevents_4.php">Transactions</a></li>
	</ul>
  </div>
  <?php $getevdet=mysql_fetch_object(mysql_query("select * from event where id='".$_SESSION['edetid']."'")); ?>
  <?php $getbuytic=mysql_query("select 
  distinct(register.email) as remail
  from buyticket 
  left join register on register.id=buyticket.uid
  where buyticket.eid='".$_SESSION['edetid']."'
  ");
  $em=0; 
  if(mysql_num_rows($getbuytic)<=0)
  {
  	?><p class="red-txt" >There are no attendees for the event</p><?php
  }
  else
  {
  while($getbuytic1=mysql_fetch_object($getbuytic))
  {
  	$em++;
	if($em!=1)
	{
		$emtxt=''.$emtxt.','.$getbuytic1->remail.'';
	}
	else
	{
		$emtxt=''.$getbuytic1->remail.'';
	}
  }
  $_SESSION['emtxt']=$emtxt;
   ?>
   <?php echo $mailtxt; ?>
	<h2>Email Attendees</h2>
	<p>Event Name - '<?php echo $getevdet->name; ?>' </p>
	<p>Email Sent to - '<?php echo $emtxt; ?>'</p>
	<form action="" method="post" name="emform" onSubmit="return CheckEMF();">
	<div class="em-cont">
      <ul class="main">
	  <li class="first">Email Subject<span class="red-txt">*</span></li>
	  <li><input name="emsubject" type="text" id="emsubject">
	  <div class="err-txt" id="err1"></div>
	  </li>
        <li class="first">Email Content <span class="red-txt">*</span></li>
        <li class="second">
          <textarea name="emcontent" cols="" rows="10" class="width100" id="emcontent" placeholder="Enter event details like agenda, sub events, speakers, etc.">
    </textarea>
          <div class="err-txt" id="err2"></div>
        </li>
      </ul>
  </div>
  <div class="ev-cr-submit">
        <input name="emailatt" type="submit" value="Email" class="last">
      </div>
	  </form>
	  <?php } ?>
</div>
<?php include('includes/social-main.php'); ?>
<?php include('includes/footer.php'); ?>
</body>
</html>
