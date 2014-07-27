<?php
require('admin/sql.php');
session_start();
	$getbook=mysql_fetch_object(mysql_query("select * from book_event where id='".$_SESSION['bookId']."'"));
	$getregdet=mysql_fetch_object(mysql_query("select * from register where id='".$_SESSION['uid']."'"));

?>
<?php
// Merchant key here as provided by Payu
//$MERCHANT_KEY = "JBZaLc";
$MERCHANT_KEY = "JHj6zM";

// Merchant Salt as provided by Payu
//$SALT = "GQs7yium";
$SALT = "FT7fRxty";

// End point - change to https://secure.payu.in for LIVE mode
//$PAYU_BASE_URL = "https://test.payu.in";
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
//print_r($_POST);
foreach($_POST as $key => $value) {    
$posted[$key] = $value; 

}
}

$formError = 0;

if(empty($posted['txnid'])) {
// Generate random transaction id
$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
$txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence =     "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
if(
      empty($posted['key'])
      || empty($posted['txnid'])
      || empty($posted['amount'])
      || empty($posted['firstname'])
      || empty($posted['email'])
      || empty($posted['phone'])
      || empty($posted['productinfo'])
      || empty($posted['surl'])
      || empty($posted['furl'])
      || empty($posted['service_provider'])
) {
$formError = 1;
} else {
//$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution     fee","value":"1500","isRequired":"false"}]'));
$hashVarsSeq = explode('|', $hashSequence);
$hash_string = '';  
foreach($hashVarsSeq as $hash_var) {
  $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
  $hash_string .= '|';
}

$hash_string .= $SALT;


$hash = strtolower(hash('sha512', $hash_string));
$action = $PAYU_BASE_URL . '/_payment';
}
} elseif(!empty($posted['hash'])) {
$hash = $posted['hash'];
$action = $PAYU_BASE_URL . '/_payment';
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
<script>
var hash = '<?php echo $hash ?>';
function submitPayuForm() {
  if(hash == '') {
    return;
  }
  var payuForm = document.forms.payuForm;
  payuForm.submit();
}
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

<body onLoad="submitPayuForm()">
<?php include('includes/header.php'); ?>
<div class="container">
	<h1>Booking details of '<?php echo 'Atharv'; ?>'</h1>
  <div class="evnt-det-main" style="border-bottom:0px;">
  	<!-- <ul>
		<li><div class="ev1"><strong><?php echo $getevdet->vname; ?></strong>,<br>
<?php echo $getevdet->vaddress1; ?>,<br>
<?php if($getevdet->vaddress2!="") { ?>
<?php echo $getevdet->vaddress2; ?>,<br>
<?php } ?>
<?php echo $getevdet->vcity; ?>,<br>
<?php echo $getevdet->vstate; ?> - <?php echo $getevdet->vpincode; ?></div></li><li>
<div  class="ev2"><strong><?php echo date('M j', strtotime($getevdet->sdate)); ?> - <?php echo date('M j, Y', strtotime($getevdet->edate)); ?></strong><br>
<?php  echo date('g:i a', strtotime($getevdet->stime)); ?> to <?php  echo date('g:i a', strtotime($getevdet->etime)); ?><br><br>
</div></li><?php if($getevdet->uid!="0") { ?><li class="ev3">
<p><strong></strong></p>

</li><?php } ?>
	</ul> -->
<?php if($formError) { ?>
  <p style="color:red">Please fill all mandatory fields.</p>
<?php } ?>	
	<form action="<?php echo $action; ?>" method="post" name="payuForm">
<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" >
<input type="hidden" name="hash" value="<?php echo $hash ?>">
<input type="hidden" name="txnid" value="<?php echo $txnid ?>" >
<input type="hidden" name="amount" value="<?php echo $getbook->b_amount; ?>" >
<input type="hidden" name="firstname" id="firstname" value="<?php echo $getregdet->name; ?>" >
<input type="hidden" name="email" id="email" value="<?php echo $getregdet->email; ?>" >
<input type="hidden" name="phone" value="0000000000" >
<input type="hidden" name="productinfo" value="College Fever Event Ticket" >
<input type="hidden" name="surl" value="http://thecollegefever.com/myevents_1.php?page=myevents&newev=paid" >
<input type="hidden" name="furl" value="http://thecollegefever.com/myevents_1.php?page=myevents&newev=failed" >
<input type="hidden" name="service_provider" value="payu_paisa" >
	<div class="join-tab scrollbar-our-definition">	
  <table border="0" cellspacing="0" cellpadding="8">
    <tr>
      <td class="td-head"><strong>Booking Details </strong></td>
      <td class="td-head"><strong>Price (Rs) </strong></td>
      <!-- <td align="left" class="td-head"><strong>Quantity</strong></td> -->
      <td align="right" class="td-head"><strong>Amount (Rs.) </strong></td>
    </tr>
	<?php
	$getbuyt=mysql_query("select * from book_event where bid='".$_SESSION['bookId']."'");
	?>
    <tr>
      <!-- <td colspan="3" class="orange-txt"><strong><?php echo $getevdet->tinfo; ?></strong></td> -->
      <td align="right"><strong>TOTAL (Rs.)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="tprice2"><?php echo $_SESSION['events']['Total']; ?></span></strong> </td>
    </tr>
  </table>
      </div>
      <?php unset($_SESSION['events']); unset($_SESSION['tmLeader']); ?>
	<div class="book-now1"><a href="event_detail_1.php">Back</a>&nbsp;&nbsp;&nbsp;<input type="submit" name="buyticket" id="buyticket" value="Proceed to payment">
	  </div>
	</form>
  </div>
  
  
</div>
<?php include('includes/hosting.php'); ?>
<?php include('includes/social-main.php'); ?>
<?php include('includes/footer.php'); ?>
</body>
</html>
