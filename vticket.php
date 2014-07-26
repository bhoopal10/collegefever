<?php
require('admin/sql.php');
session_start();
$getticket=mysql_fetch_object(mysql_query("select * from buyticket where id='".$_REQUEST['btid']."'"));
$getevdet=mysql_fetch_object(mysql_query("select * from event where id='".$getticket->eid."'"));
$getregdet=mysql_fetch_object(mysql_query("select * from register where id='".$getticket->uid."'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
body
{
	padding:0px; margin:0px; background-color:#EEEEEE;
	
}
.tic-main
{
	width:500px; margin:20px auto 0px auto; background:#fff; box-shadow:0px 0px 3px #ccc; padding:3px;
}
/*img.tpic
{
	max-width:190px; height:auto;
}

.t-head
{
	width:94%; padding:2% 3%; font-size:15px; background:#777777; color:#fff; line-height:21px;
}
.t-head .large
{
	font-size:18px;
}
.w18
{
	color:#fff; font-size:20px; text-transform:uppercase;
}
.w15
{
	color:#fff; font-size:14px; text-transform:capitalize;
}
.evtable
{
}
.evtable td
{
	border-bottom:solid 1px #ccc;
}
.evtable td.first
{
	border-right:solid 1px #ccc;
}
.evtable td.last
{
	border-bottom:0px;
}
.white-txt
{
	color:#fff;
}*/
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $getevdet->name; ?> - ticket</title>
</head>

<body>
<div class="tic-main">
	<table width="500" border="0" cellspacing="3" cellpadding="5" bgcolor="#F16439" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000;" align="center" >
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td align="center" valign="top"><span style="color:#fff; font-size:20px; text-transform:uppercase;"><?php echo $getevdet->name; ?></span><br />
            <span style="color:#fff; font-size:14px; text-transform:uppercase;"><?php echo $getevdet->vname; ?></span></td>
          </tr>
      </table></td>
  </tr>
  <tr>
    <td width="59%" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="0" bgcolor="#CCCCCC" class="evtable">
      <tr>
        <td width="43%" bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;border-right:solid 1px #ccc;"><strong>Event Address: </strong></td>
        <td width="57%" bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;"><?php echo $getevdet->vaddress1; ?>,<br />
		  <?php if($getevdet->vaddress2!="") { ?><?php echo $getevdet->vaddress1; ?>,<br /><?php } ?>
          <?php echo $getevdet->vstate; ?>,<br />
          <?php echo $getevdet->vcity; ?> - <?php echo $getevdet->vpincode; ?> </td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;border-right:solid 1px #ccc;"><strong>No of Tickets: </strong></td>
        <td bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;">
		
		<table width="100%" border="0" cellspacing="0" cellpadding="2">
		<?php 
		$getbtS=mysql_fetch_object(mysql_query("select SUM(tcount) as tcnt from buyt where bid='".$getticket->id."'"));
			$getbt=mysql_query("select * from buyt where bid='".$getticket->id."'");
			while($getbt1=mysql_fetch_object($getbt))
			{
				$gettcnm=mysql_fetch_object(mysql_query("select * from tickets where id='".$getbt1->tid."'"));
		?>
          <tr>
            <td width="25%"><?php echo $gettcnm->name; ?></td>
            <td width="11%">:</td>
            <td width="64%"><?php echo $getbt1->tcount; ?></td>
          </tr>
		  <?php
		  }
		  ?>
          <tr>
            <td style="border-top:solid 1px #000;"><strong>Total</strong></td>
            <td style="border-top:solid 1px #000;"><strong>:</strong></td>
            <td style="border-top:solid 1px #000;"><strong><?php echo $getbtS->tcnt; ?></strong></td>
          </tr>
        </table>		</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" style="border-right:solid 1px #ccc;"><strong>Total Price: </strong></td>
        <td bgcolor="#FFFFFF" class="last">Rs. <?php echo $getticket->ttlprice; ?></td>
      </tr>
    </table></td>
    <td width="41%" rowspan="2" align="center" valign="top" bgcolor="#FFFFFF"><img src="upfile/<?php echo $getevdet->pic2; ?>"  style="max-width:190px; height:auto;" /></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="0" bgcolor="#CCCCCC" class="evtable">

      <tr>
        <td width="43%" bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;border-right:solid 1px #ccc;"><strong>Ticket No : </strong></td>
        <td width="57%" bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;"><?php echo ''.$getticket->id.''.$getticket->eid.''.$getticket->uid.''; ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;border-right:solid 1px #ccc;"><strong>Paid By: </strong></td>
        <td bgcolor="#FFFFFF" style="border-bottom:solid 1px #ccc;"><?php echo $getregdet->name; ?> </td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF" style="border-bottom:solid 0px #ccc;border-right:solid 1px #ccc;"><strong>Paid On: </strong></td>
        <td bgcolor="#FFFFFF" class="last"><?php echo date('M j, Y @ g:i a', strtotime($getticket->pdate)); ?></td>
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
        <td width="21%" align="right"><img src="images/logotic.png" width="78" height="40" /></td>
      </tr>
      
    </table></td>
    </tr>
</table>

</div>
</body>
</html>
