<?php
require('admin/sql.php');
session_start();
$_SESSION['rvsstate']=$_REQUEST['state'];
if($_REQUEST['etype']!="" && $_REQUEST['etype']!="All")
{
	$cnd1="and category='".$_REQUEST['etype']."'";
}
if($_REQUEST['ecity']!="" && $_REQUEST['ecity']!="All")
{
	$cnd2="and vcity='".$_REQUEST['ecity']."'";
}
if($_REQUEST['esdate']!="")
{
	$cnd3="and sdate<='".$_REQUEST['esdate']."'";
}
if($_REQUEST['eedate']!="")
{
	$cnd4="and edate>='".$_REQUEST['eedate']."'";
}
//echo $cnd3; echo $cnd4;
?>
 <?php
  $ev=0;
  $getev=mysql_query("select * from event where publish='Yes' ".$cnd1." ".$cnd2." ".$cnd3." ".$cnd4."  order by priority desc,id desc limit ".$_REQUEST['noofev'].""); 
  $getevn=mysql_num_rows($getev);
  if($getevn<=0)
  {
  	?><p class="red-txt" align="center">There are no events available with the selected category</p><?php
  }
  else
  {
  while($getev1=mysql_fetch_object($getev))
  {
  $ev++;
  	$getcat=mysql_query("select * from category order by id asc");
	$cat=1;
	while($getcat1=mysql_fetch_object($getcat))
	{
		$cat++;
		$cattxt=''.$getcat1->name.' Events';
		if($cattxt==$getev1->category)
		{
			$clstxt='e'.$cat.'';
		}
	}
  ?>
  	<div class="events <?php echo $clstxt; ?>">
			<div class="contents">
				<div class="img-area">
				<!--<a href="<?php echo $getev1->url; ?>"><img src="upfile/<?php echo $getev1->pic2; ?>"></a>-->
				<a href="event_detail_1.php?eid=<?php echo $getev1->id; ?>"><img src="upfile/<?php echo $getev1->pic2; ?>"></a>
				</div>
				<div class="cont-area">
				<p><strong class="head"><a href="<?php echo $getev1->url; ?>"><?php 
					if(strlen($getev1->name)>15)
					{
						echo ''.substr($getev1->name,0,15).'...'; 
					}
					else
					{
						echo $getev1->name;
					}
				?></a></strong><br><?php echo $getev1->category; ?>
				</p>
				<p><?php 
					//echo $getev1->vname; 
					if(strlen($getev1->vname)>30)
					{
						echo ''.substr($getev1->vname,0,30).'...'; 
					}
					else
					{
						echo $getev1->vname;
					}
				?><br>
				<strong><?php echo $getev1->vcity; ?></strong></p>
<p><?php echo date('M j', strtotime($getev1->sdate)); ?> - <?php echo date('M j', strtotime($getev1->edate)); ?><br>
<?php  echo date('g:i a', strtotime($getev1->stime)); ?> onwards</p></div>
			</div>
 </div>
  <?php
  }
  }
  ?>
  <?php
  if($_REQUEST['noofev']<=$getevn)
  {
  ?>
   	<div class="load-more"><a href="javascript:void(0);" onclick="addmoreev();">Load more events</a></div>
 <?php
  }
  ?>	
