<?php
require('admin/sql.php');
session_start();
if($_REQUEST['eid']!="")
{
	$_SESSION['edetid']=$_REQUEST['eid'];
}
if(isset($_POST['buyticket']))
{


	$buyt=mysql_query("insert into buyticket(uid,eid,tcount,ttlprice,pay,pdate) values('".$_SESSION['uid']."','".$_SESSION['edetid']."','".$_REQUEST['tlcount']."','".$_REQUEST['tlprice']."','Pending','".date('Y-m-d H:i:s')."')");
	$_SESSION['buyins']=mysql_insert_id();
	
	$getcnt=mysql_num_rows(mysql_query("select * from tickets where eid='".$_SESSION['edetid']."'"));
	for($i=1;$i<=$getcnt;$i++)
	{
		if($_REQUEST['tcount'.$i.'']!=0)
		{
			mysql_query("insert into buyt(bid,eid,tid,tcount,tprice) values('".$_SESSION['buyins']."','".$_SESSION['edetid']."'
		,'".$_REQUEST['ticid'.$i.'']."','".$_REQUEST['tcount'.$i.'']."','".$_REQUEST['tval'.$i.'']."')");		
		}
	}
	
	$getticket=mysql_fetch_object(mysql_query("select * from buyticket where id='".$_SESSION['buyins']."'"));
	$getevdet=mysql_fetch_object(mysql_query("select * from event where id='".$_SESSION['edetid']."'"));
	$getregdet=mysql_fetch_object(mysql_query("select * from register where id='".$_SESSION['uid']."'"));
	
	if($getevdet->vaddress2!="")
	{
		$vadd2=''.$getevdet->vaddress2.',<br>';
	}
	$geturem=mysql_fetch_object(mysql_query("select * from register where id='".$_SESSION['uid']."'"));
	$strTo=''.$geturem->email.'';
			$strSubject='Ticket from College Fever' ;
			$message = '
			<table width="500" border="0" cellspacing="3" cellpadding="5" bgcolor="#F16439" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000;" align="center" >
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td align="center" valign="top"><span style="color:#fff; font-size:20px; text-transform:uppercase;">'.$getevdet->name.'</span><br />
            <span style="color:#fff; font-size:14px; text-transform:uppercase;">'.$getevdet->vname.'</span></td>
          </tr>
      </table></td>
  </tr>
  <tr>
    <td width="59%" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="0" bgcolor="#CCCCCC" class="evtable">
      <tr>
        <td width="43%" bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;border-right:solid 1px #ccc;"><strong>Event Address: </strong></td>
        <td width="57%" bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;">
		'.$getevdet->vaddress1.',<br />
		'.$vadd2.'
          '.$getevdet->vstate.',<br />
          '.$getevdet->vcity.' - '.$getevdet->vpincode.' </td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;border-right:solid 1px #ccc;"><strong>No of Tickets: </strong></td>
        <td bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;">'.$getticket->tcount.'</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" style="border-right:solid 1px #ccc;"><strong>Total Price: </strong></td>
        <td bgcolor="#FFFFFF" class="last">Rs. '.$getticket->ttlprice.'</td>
      </tr>
    </table></td>
    <td width="41%" rowspan="2" align="center" valign="top" bgcolor="#FFFFFF"><img src="http://thecollegefever.com/upfile/'.$getevdet->pic2.'"  style="max-width:190px; height:auto;" /></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="0" bgcolor="#CCCCCC" class="evtable">

      <tr>
        <td width="43%" bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;border-right:solid 1px #ccc;"><strong>Ticket No : </strong></td>
        <td width="57%" bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;">'.$getticket->id.''.$getticket->eid.''.$getticket->uid.'</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;border-right:solid 1px #ccc;"><strong>Paid By: </strong></td>
        <td bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;">'.$getregdet->name.'</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" style="border-bottom:solid 0px #ccc;border-right:solid 1px #ccc;"><strong>Paid On: </strong></td>
        <td bgcolor="#FFFFFF" class="last">'.date('M j, Y @ g:i a', strtotime($getticket->pdate)).'</td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="79%"><table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr>
            <td><strong>This is your ticket<br />            
              Print and present it at the event</strong></td>
          </tr>
        </table></td>
        <td width="21%" align="right"><img src="http://thecollegefever.com/images/logotic.png" width="78" height="40" /></td>
      </tr>
      
    </table></td>
    </tr>
</table>
';
$headers  = "From: info@thecollegefever.com \n";
$headers .= "MIME-version: 1.0\n";
$headers .= "Content-type: text/html; charset= iso-8859-1\n"; 
$headers1=$headers;
//$result2 = mail($strTo,$strSubject,$message,$headers1);
	if($buyt)
	{
		?><script>location.replace('event_detail_1_pay.php');</script><?php
	}
}
$getevdet=mysql_fetch_object(mysql_query("select * from event where id='".$_SESSION['edetid']."'"));
$gtkcount=mysql_fetch_object(mysql_query("select sum(tcount) as tcount from buyticket where eid='".$_SESSION['edetid']."' and pay='Paid'"));
$Ruri=$getevdet->url;
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
<script language="JavaScript" src="js/calendar_us1.js"></script>
<link rel="stylesheet" href="css/calendar.css" />
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
  <h1 style="text-transform:capitalize"><?php echo $getevdet->name; ?> </h1>
  <div class="ev-banner">
  	<p align="center"><img src="upfile/<?php echo $getevdet->pic1; ?>" width="960" height="450"></p>
  </div>
  <div class="evnt-det-main">
  	<ul>
		<li><div class="ev1"><strong><?php echo $getevdet->vname; ?></strong>,<br>
<?php echo $getevdet->vaddress1; ?>,<br>
<?php if($getevdet->vaddress2!="") { ?>
<?php echo $getevdet->vaddress2; ?>,<br>
<?php } ?>
<?php echo $getevdet->vcity; ?>,<br>
<?php echo $getevdet->vstate; ?> - <?php echo $getevdet->vpincode; ?></div></li><li>
<div  class="ev2"><strong><?php echo date('M j', strtotime($getevdet->sdate)); ?> - <?php echo date('M j, Y', strtotime($getevdet->edate)); ?></strong><br>
<?php  echo date('g:i a', strtotime($getevdet->stime)); ?> to <?php  echo date('g:i a', strtotime($getevdet->etime)); ?><br><br>
<!--<a href="#"><strong>Add to my calendar</strong></a>--></div></li><?php if($getevdet->evtype!="Free" && $_SESSION['uid']!=$getevdet->uid) { ?><li class="ev3">
<?php
if($_SESSION['uid']!="") 
{ 
	$now = strtotime(date('Y-m-d')); // or your date as well
	$slsdate = strtotime($getevdet->slsdate);
	$datediff1 = $now - $slsdate;
	$datediff11 = floor($datediff1/(60*60*24));
	//echo ''.$datediff11.', '.$getevdet->slsdate.'';

	$sledate = strtotime($getevdet->sledate);
	$datediff2 = $sledate - $now;
	$datediff21 = floor($datediff2/(60*60*24));
	if($datediff11>=0)
	{
		if($datediff21>=0)
		{
			?><a href="javascript:void(0)" id="joinev"><strong>Join the event</strong></a><?php
		}	
		else
		{ 
			//modified before
			/*?><span class="red-txt">Ticket selling ended on <?php echo date('M j, Y', strtotime($getevdet->sledate)); ?></span><?php  */
			// modified starts
			if($Ruri == 'atharv')
			{
				?>
				<script type="text/javascript">
					$(function(){
            			$('#selectEvents').show();
          			});
				</script>
				<?php
			}
			else
			{
				?><span class="red-txt">Ticket selling ended on <?php echo date('M j, Y', strtotime($getevdet->sledate)); ?></span><?php 
			}
		}//modified ended
	}
	else
	{ 
		/* ?><span class="red-txt">Ticket selling starts only on <?php echo date('M j, Y', strtotime($getevdet->slsdate)); ?></span><?php */
		if($Ruri == 'atharv')
		{
				?>
				<script type="text/javascript">
					$(function(){
           				 $('#selectEvents').show();
         			 });
				</script>
				<?php
		}
		else
		{
			?><span class="red-txt">Ticket selling starts only on <?php echo date('M j, Y', strtotime($getevdet->slsdate)); ?></span><?php 
		}
	}	

} else { ?>
	<a href="http://thecollegefever.com/login.php?page=login&type=joinevent"><strong>Join the event</strong></a><?php 
}
?>
</li><?php } ?>
	</ul>
	<?php if($getevdet->uid!="0") { ?>
	<form action="" method="post" onSubmit="return CheckEJform();" name="Event_join">
	<div id="joinevdet">
	<?php $tlp=$getevdet->minorder*$getevdet->slprice; ?>
	<input type="hidden" name="tlprice" id="tlprice" value="<?php echo $tlp; ?>">
	<input type="hidden" name="tlcount" id="tlcount" value="0">
	<div class="join-tab scrollbar-our-definition">	
<table border="0" cellspacing="0" cellpadding="8">
  <tr>
    <td class="td-head"><strong>Ticket Category </strong></td>
    <td class="td-head"><strong>Price (Rs) </strong></td>
    <td align="left" class="td-head"><strong>Quantity</strong></td>
    <td align="right" class="td-head"><strong>Amount (Rs.) </strong></td>
  </tr>
  <?php
  $gettic=mysql_query("select * from tickets where eid='".$getevdet->id."'"); 
  $gettic2=mysql_num_rows($gettic);
  $tcn=0;
  while($gettic1=mysql_fetch_object($gettic))
  {
  $gtkc1=mysql_fetch_object(mysql_query("select sum(tcount) as tcount from buyt where tid='".$gettic1->id."' and pay='Paid'"));
  $tcn++;
  ?>
  <tr>
    <td><strong><?php echo $gettic1->name; ?><input type="hidden" name="ticid<?php echo $tcn ?>" id="ticid<?php echo $tcn ?>" value="<?php echo $gettic1->id; ?>"> </strong>
	<?php if($gettic1->tdesc!="") { ?>
		<br>(<?php echo $gettic1->tdesc; ?>)
	<?php } ?>
	</td>
    <td align="center"><strong><?php echo $gettic1->slprice; ?></strong></td>
    <td align="left">
	<input type="hidden" name="tprc<?php echo $tcn ?>" id="tprc<?php echo $tcn ?>" value="<?php echo $gettic1->slprice; ?>">
	<?php
		$tickleft=$gettic1->maxreg-$gtkc1->tcount;
		if($tickleft<$gettic1->maxorder)
		{
			$ticklast=$tickleft;
		}
		else
		{
			$ticklast=$gettic1->maxorder;
		}
		if($tickleft<$gettic1->minorder)
		{
			?>
			<span class="red-txt"><strong>Tickets are sold out</strong></span>
			<input type="hidden" name="tcount<?php echo $tcn; ?>" id="tcount<?php echo $tcn; ?>" value="0">
			<?php
		}
		else
		{
		?>
		<select name="tcount<?php echo $tcn; ?>" id="tcount<?php echo $tcn; ?>" onChange="calprice('<?php echo $tcn; ?>','<?php echo $gettic2; ?>')">
		<option value="0">0</option>
		<?php 
		for($i=$gettic1->minorder;$i<=$ticklast;$i++) { ?>
      	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
	  	<?php } ?>
    	</select>
		<?php
		}
		?>
	</td>
    <td align="right"><strong><input type="hidden" name="tval<?php echo $tcn; ?>" id="tval<?php echo $tcn; ?>" value="0"><span id="tprice1<?php echo $tcn; ?>"><?php  echo $tlp; ?></span></strong></td>
  </tr>
  <?php } ?>
  <tr>
 
    <td colspan="3" class="orange-txt"><strong><?php echo $getevdet->tinfo; ?></strong></td>
    <td align="right"><strong>TOTAL (Rs.)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="tprice2"><?php echo $tlp; ?></span></strong> </td>
  </tr>
</table>
</div>

<div id="err-price" align="right"></div>
<div class="book-now"><input type="submit" name="buyticket" id="buyticket" value="Submit"></div>
</div>
</form>
<?php } ?>
  </div>
  <div id="selectEvents" style="display:none">
  <?php
        if(isset($_POST['select_event_submit']))
        {

          include('event_tc.php');
          if($_POST['EventName'])
          {
            $count=count($_POST['memberName']);
            $_SESSION['events'][$_POST['EventName']]['event']=$_POST['EventName'];
            $_SESSION['events'][$_POST['EventName']]['member']=$_POST['memberName'];
            $_SESSION['events'][$_POST['EventName']]['phone']=$_POST['Phone'];
            $_SESSION['events'][$_POST['EventName']]['email']=$_POST['email'];
            $_SESSION['events'][$_POST['EventName']]['college']=$_POST['college'];
            $_SESSION['events'][$_POST['EventName']]['age']=$_POST['age'];
            $_SESSION['events'][$_POST['EventName']]['height']=$_POST['candidateHight'];
            $_SESSION['events'][$_POST['EventName']]['price']=($count * $event_tc[$_POST['EventName']]['price']);
            $_SESSION['events'][$_POST['EventName']]['gender']=$_POST['gender'];
            // $_Session['events'][$_POST['EventName']]['price']='99';
           }
           // ($count * $event_tc[$_POST['EventName']]['price']);
        if($_POST['sEvent'][0])
        {
          if($_POST['tmLeader'])
              {
                $_SESSION['team_leader']['name']=$_POST['tmLeader'];
                $_SESSION['team_leader']['phone']=$_POST['Phone'];
                $_SESSION['team_leader']['college']=$_POST['college'];
                $_SESSION['team_leader']['email']=$_POST['email'];
                $_SESSION['team_leader']['accommodation']=$_POST['accommodation']*600;
                $_SESSION['team_leader']['acc_no']=$_POST['accommodation'];
              }
            include_once('template/event_select/loadEvent.php');
          }
          else
          {
            $teamleader=$_SESSION['team_leader']['name'];
            $tPhone=$_SESSION['team_leader']['phone'];
            $tCollege=$_SESSION['team_leader']['college'];
            $tEmail=$_SESSION['team_leader']['email'];
            $acc_no=$_SESSION['team_leader']['acc_no'];
            $user_id=$_SESSION['uid'];
            $teamSql="INSERT INTO `teams` ( `user_id`, `name`, `email`, `college`, `accommodation`, `phone`) VALUES ('$user_id', '$teamleader', '$tEmail', '$tCollege', '$acc_no', '$tPhone')";
            $teamInsert=mysql_query($teamSql);
            $teamId=mysql_insert_id();
            foreach($_SESSION['events'] as $mRow)
            {
              $event=$mRow['event'];
              if($mRow['member'])
              {
                $count=count($mRow['member']);
                for($i=0;$i<$count;$i++)
                {
                  $member=$mRow['member'][$i]?$mRow['member'][$i]:'';
                  $email=$mRow['email'][$i]?$mRow['email'][$i]:'';
                  $phone=$mRow['phone'][$i]?$mRow['phone'][$i]:'';
                  $college=$mRow['college'][$i]?$mRow['college'][$i]:'';
                  $age=$mRow['age'][$i]?$mRow['age'][$i]:'';
                  $height=$mRow['height'][$i]?$mRow['height'][$i]:'';
                  $gender=$mRow['gender'][$i]?$mRow['gender'][$i]:'';
                 
                  $sql="INSERT INTO `event_member` ( `user_id`, `team_id`, `event`, `member_name`, `email`, `phone`, `college`, `age`, `height`, `gender`)
                           VALUES ('$user_id', '$teamId', '$event', '$member', '$email', '$phone', '$college', '$age', '$height', '$gender')";
                  $insert=mysql_query($sql);
                }
              }
            }
            echo "finished";
              unset($_SESSION['events']);
              unset($_SESSION['team_leader']);
          }
        }
        else
        {
            include_once('select_event.php'); 
        }
       

       ?>
  </div>
  <div class="evnt-m-desc">
  	<div class="evnt-desc-l">
		<p><strong>Event Description</strong></p>
		<?php echo stripslashes($getevdet->description); ?>
		
  	</div><div class="evnt-desc-r">
		<div class="contact-info">
		<div class="head">Contact The College Fever</div>
		<div class="tel-det">
			<ul><li class="first"><img src="images/cn-1.png"></li>
			<li>+91 7760001802 </li>
			</ul>
			<ul><li class="first"><img src="images/cn-2.png"></li><li><a href="mailto:info@thecollegefever.com">info@thecollegefever.com</a></li>
			</ul>
		</div>
		</div>
		<div class="contact-info">
		<div class="head">Contact The host</div>
		<div class="tel-det">
		<ul><li style="text-transform:capitalize"><strong><?php echo $getevdet->oname1; ?></strong></li></ul>
			<?php if($getevdet->ophone1!="") { ?>
			<ul><li class="first"><img src="images/cn-1.png"></li><li><?php echo $getevdet->ophone1; ?></li></ul>
			<?php }?>
			<?php if($getevdet->oemail1!="") { ?>
			<ul><li class="first"><img src="images/cn-2.png"></li><li><a href="mailto:<?php echo $getevdet->oemail1; ?>"><?php echo $getevdet->oemail1; ?></a></li></ul>
			<?php } ?>
			<?php if($getevdet->oname2!="") { ?>
			<ul><li style="text-transform:capitalize"><strong><?php echo $getevdet->oname1; ?></strong></li></ul>
			<?php } ?>
			<?php if($getevdet->ophone2!="") { ?>
			<ul><li class="first"><img src="images/cn-1.png"></li><li><?php echo $getevdet->ophone2; ?></li></ul>
			<?php } ?>
			<?php if($getevdet->oemail2!="") { ?>
			<ul><li class="first"><img src="images/cn-2.png"></li><li><a href="mailto:<?php echo $getevdet->oemail2; ?>"><?php echo $getevdet->oemail1; ?></a></li></ul>
			<?php }?>
		</div>
		</div>
		<div class="contact-info share">
		<div class="head">Share the event</div>
		<div class="share-ic">
		<ul>
			<li><a href="<?php echo $getevdet->efacebook; ?>"><img src="images/csc1.png"></a></li><li><a href="<?php echo $getevdet->etwitter; ?>"><img src="images/csc2.png"></a></li><li><a href="<?php echo $getevdet->egoogle; ?>"><img src="images/csc3.png"></a></li><li><a href="#"><img src="images/csc4.png"></a></li><li class="last"><a href="#"><img src="images/csc5.png"></a></li>
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
