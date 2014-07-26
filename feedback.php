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
<h2>Feedback</h2>
<?php
if(isset($_POST['SubmitRG']))
{
	 $strTo="info@thecollegefever.com";
							 
							 		   		                
							 $strSubject="Feedback from " .$_POST['name'];
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
<p class="red-txt" align="center">Thanking you for your feedback, we will respond to you soon</p>
<?php
							 }
							 else
							 {
							 	?><p class="red-txt" align="center">Mail sending failed, try again</p><?php
							 }
}
?>
<div class="contact-main">
<div class="c-right">
	<div class="f-login">
      <form action="" name="RegSign" method="post" onSubmit="return CheckCform();">
        <ul>
          <li><a name="err"></a>Fill the form below to send us your feedback </li>
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
            <input name="phone" type="text" id="phone" placeholder="phone number">
          </li>
          <li>
            <div class="err-txt" id="err4"></div>
            <textarea name="comments" cols="" rows="5" id="comments" placeholder="comment"></textarea>
          </li>
          <li class="submit-area">
            <input name="SubmitRG" type="submit" id="SubmitRG" value="Submit">
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
