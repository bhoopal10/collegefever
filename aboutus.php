<?php
require('admin/sql.php');
session_start();
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
<?php
if(isset($_POST['SubmitRG']))
{
	 $strTo="fadil@dotlinedesigns.com";
							 
							 		   		                
							 $strSubject=" Contact from " .$_POST['name'];
							 $message = "\n".
							 $message = '
            <table width=497 border="0" cellspacing="3"  >
              <tr>
                <td  colspan="3" >&nbsp;</td>
              </tr>
              <tr>
                <td width="135" >Name</td>
                <td width="26" > : </td>
                <td width="318" > '.$_POST['name'].'</td>
              </tr>
              <tr>
                <td >Phone</td>
                <td  > : </td>
                <td  >'.$_POST['phone'].'</td>
              </tr>
			  <tr>
                <td >Email</td>
                <td  >: </td>
                <td  >'.$_POST['email'].'</td>
              </tr>
              <tr>
                <td >Comments</td>
                <td  > : </td>
                <td  >'.$_POST['comments'].'</td>
              </tr>
                      
            </table>
                               
                                             ';
                             
							
								 $headers  = "From:".$_REQUEST['email'] ."\n";
                                 $headers .= "MIME-version: 1.0\n";
                                 $headers .= "Content-type: text/html; charset= iso-8859-1\n"; 
                             $result = mail($strTo,$strSubject,$message,$headers);
							 if($result)
							 {
							  	?>
<p class="red-txt" align="center">Thanking you for contacting us, we will get back to you soon</p>
<?php
							 }
							 else
							 {
							 	?>
<p class="red-txt" align="center">Mail sending failed, try again</p>
<?php
							 }
}
?>
<h2>About Us</h2>
<p>Hello there!! Are you tired of your exams and assignments?  Feeling disconnected and locked up into courses and syllabus. Well, we are here  to help you out. Come join us as we take you to various events and fests held  at various colleges and universities across the nation. Indulging into fests  and events not only will raise your spirit but also will raise your confidence  level to boost your personality. Gatherings will help you to grow, learn and  get inspired. Take a break from your lousy life and enjoy a time filled with  gusto and zest with us.<br>
Let's just brief you about ourselves.</p>
<p><strong>We strive to bring to  you a common gateway for exuberance!</strong></p>
<p>  The college fever aims at consolidating the information  about events, fests, fairs and exhibitions in one platform. This will enable  students to post and manage bulletins regarding their fests and events so that  other students may come and take part. Ours is a robust platform that will  enable students not only view information but also buy tickets or register for  selected fests or events. Also advertisers can login to our portal for  campaigns, promotions and sponsorships. </p>
<p><strong>We want your presence  to be felt everywhere.</strong></p>
<p>    Ten years back, when colleges did not have enough exposure  to the outside world, students learnt about fests and events through brochures  and some selected print media like news papers and pamphlets. Lack of  communication hindered the overall growth of college communities and exempted  students from communal gatherings, fests and other celebrations. But now time has  changed and we have come to know the potential of internet. Using internet as  our platform we tend to reach out to those enthusiasts who are barred because  of sheer communication gap.</p>
<p>So guys stay tuned!!  We have just taken the initial steps. We will upgrade ourselves with more  features and offers. By then ... just chill!! </p>
</div>
<?php include('includes/social-main.php'); ?>
<?php include('includes/footer.php'); ?>
</body>
</html>
