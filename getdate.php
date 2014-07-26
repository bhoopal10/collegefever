<?php
require('admin/sql.php');
session_start();

if($_SESSION['cald']=="")
{
	$_SESSION['cald']=date('Y-m-d');
}
$nxt = date('Y-m-d', strtotime($_SESSION['cald']) + (86400*$_REQUEST['dno']));
$_SESSION['cald']=$nxt;
$tddate=$_SESSION['cald'];
//echo $tddate;
//echo $_REQUEST['dno'];
$ed=1;
for($i=1;$i<=6;$i++)
{
	$ed++;
	$nxt = date('Y-m-d', strtotime($tddate) + 86400);
	$nxt1 = date('d', strtotime($tddate) + 86400);
	$nxt2 = date('M', strtotime($tddate) + 86400);
	?>
	<div class="f-cell" id="ec<?php echo $ed; ?>"  onClick="selcdates('<?php echo $nxt; ?>','<?php echo $nxt; ?>','<?php echo $ed; ?>')"><?php echo $nxt1; ?><br>
    <span class="small-txt"><?php echo $nxt2; ?></span></div>
	<?php
	$tddate=$nxt;
}
?>