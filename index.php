<?php
require('admin/sql.php');
session_start();
unset($_SESSION['cald']);
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="fav.ico">
<link rel="shortcut icon" href="fav.ico">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42927084-1', 'auto');
  ga('send', 'pageview');

</script>
<script language="JavaScript" src="js/calendar_us1.js"></script>
<link rel="stylesheet" href="css/calendar1.css" />
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

<body onLoad="getevents();getdates(0);">
<?php include('includes/header.php'); ?>
<div class="banner-main">
	<div class="container">
		<div class="b-content">
			<h2>NEVER MISS OUT</h2>
			<p>Hundreds of events are happening in colleges.<br>
			  What are you doing?</p>
		</div>
	</div>
	<div class="container1">
		<div class="search-area">
		<form action="events_search.php?page=evsearch" method="post" name="formevsearch" id="formevsearc">
		<ul>
		  <li><input name="srname" id="srname" type="text" size="30" placeholder="college name/event name/category" value="<?php echo $_REQUEST['srname']; ?>"></li><li>
		  <input name="srcity" id="srcity" list="srcity" type="text" size="10" placeholder="city" value="<?php echo $_REQUEST['srcity']; ?>">
		  </li><li>
		  <input name="srfrom" id="srfrom" type="text" size="10" placeholder="from"  value="<?php echo $_REQUEST['srfrom']; ?>">
		   <script language="JavaScript">
										new tcal ({
											// form name
											'formname': 'formevsearch',
											// input name
											'controlname': 'srfrom'
										});
									
										</script></li><li>
		  <input name="srto" id="srto" type="text" size="10" placeholder="to" value="<?php echo $_REQUEST['srto']; ?>">
		   <script language="JavaScript">
										new tcal ({
											// form name
											'formname': 'formevsearch',
											// input name
											'controlname': 'srto'
										});
									
										</script></li><li>
		  <input type="image" src="images/inp-sub.png" class="subm"><li>
		  </ul>
		</form>  
		</div>
	</div>
</div>
<div class="subnav-main">
	<div class="container">
		<div class="subnav">
			<ul>
			<li class="sel" id="etli1">
				<a href="javascript:void(0)" onClick="seletype('All','1');"><span class="icon-area"><img src="images/sn-1.png"></span><span class="txt-area">All<br>Events</span></a>
				<div class="drop_bottom"></div><div class="drop_arrow"></div>
				
			<?php
			$getcat=mysql_query("select * from category order by id asc");
			$catno=1;
			while($getcat1=mysql_fetch_object($getcat))
			{
			$catno++;
			?>		</li><li class="e<?php echo $catno; ?>" id="etli<?php echo $catno; ?>">	
				<a href="javascript:void(0)" onClick="seletype('<?php echo $getcat1->name; ?> Events','<?php echo $catno; ?>');"><span class="icon-area"><img src="upfile/<?php echo $getcat1->pic; ?>"></span>
					<span class="txt-area"><?php echo $getcat1->name; ?><br>Events</span>
				</a>
				<div class="drop_bottom"></div><div class="drop_arrow"></div>	
			<?php
				if($catno==6)
				{
					?></li><?php
				}

			}
			?>	
			</ul>
		</div>
	</div>
</div>
<div class="container">
	<div class="find-events">
		<a href="javascript:void(0)" class="sel" id="ftlink1">Find events with filters<div class="drop_arrow"></div></a><a href="javascript:void(0)" id="ftlink2">Find events with calendar<div class="drop_arrow"></div></a>
	</div>
</div>
<input type="hidden" name="noofev" id="noofev" value="6">
<input type="hidden" name="etype" id="etype" value="All">
<input type="hidden" name="ecity" id="ecity" value="All">
<input type="hidden" name="scrollto" id="scrollto" value="0">
<?php
$evedate=mysql_fetch_object(mysql_query("select max(edate) as medate from event"));
$edate1=date('Y-m-d', strtotime("+1 day"));
$edate2=date('Y-m-d', strtotime("+7 day"));
$tday=date('D');
if($tday=='Mon')
{
	$dfwk=6;
}
else if($tday=='Tue')
{
	$dfwk=5;
}
else if($tday=='Wed')
{
	$dfwk=4;
}
else if($tday=='Thu')
{
	$dfwk=3;
}
else if($tday=='Fri')
{
	$dfwk=2;
}
else if($tday=='Sat')
{
	$dfwk=1;
}
else
{
	$dfwk=7;
}
$edate3=date('Y-m-d', strtotime("+".$dfwk." day"));
$edate4=date('Y-m-d', strtotime("+1 month"));
$edate5=date('Y-m-d', strtotime("+2 month"));
?>
<input type="hidden" name="esdate" id="esdate" value="<?php echo $evedate->medate; ?>">
<input type="hidden" name="eedate" id="eedate" value="<?php echo date('Y-m-d'); ?>">
<input type="hidden" name="caldate" id="caldate" value="<?php echo date('Y-m-d'); ?>">
<div class="container">	
	<div class="filters" id="filter1">
		<ul>
			<li class="sel" id="ed1" onClick="seledates('<?php echo $evedate->medate; ?>','<?php echo date('Y-m-d'); ?>','1')">All</li>
			<li id="ed2" onClick="seledates('<?php echo date('Y-m-d'); ?>','<?php echo date('Y-m-d'); ?>','2')">Today</li>
			<li id="ed3" onClick="seledates('<?php echo $edate1; ?>','<?php echo $edate1; ?>','3')">Tomorrow</li>
			<li id="ed4" onClick="seledates('<?php echo $edate2; ?>','<?php echo $edate2; ?>','4')">This Week</li>
			<li id="ed5" onClick="seledates('<?php echo $edate3; ?>','<?php echo $edate3; ?>','5')">This Weekend</li>
			<li id="ed6" onClick="seledates('<?php echo $edate4; ?>','<?php echo $edate4; ?>','6')">This Month</li>
			<li id="ed7" onClick="seledates('<?php echo $edate5; ?>','<?php echo $edate5; ?>','7')">Next Month</li>
		</ul>
	</div>
	<div class="f-calender" id="filter2">
		<div class="f-tab">
			<div class="f-cell page2" onClick="getdates('-6')">&lt;&lt;</div>
			<div class="f-cell page1" onClick="getdates('-1')">&lt;</div>
			<div class="f-cell sel" id="ec1" onClick="selcdates('<?php echo $evedate->medate; ?>','<?php echo date('Y-m-d'); ?>','1')">ALL<br>
			  <span class="small-txt">Events</span></div>
			<div id="loaddates">
			</div>
			<div class="f-cell page1" onClick="getdates('1')">&gt;</div>
			<div class="f-cell page2" onClick="getdates('6')">&gt;&gt;</div>
		</div>
	</div>
	<div class="city-drop">
		<a href="javascript:void(0)">City <span id="citysel">- All</span></a>
		<div class="city-list" id="city-list">
		<p onClick="selecity('All')">All</p>
		<?php
		$getcity=mysql_query("select distinct(vcity) from event where publish='Yes' and edate>='".date('Y-m-d')."' order by vcity asc");
		if(mysql_num_rows($getcity)<=0)
		{
			?><p class="red-txt">There are no events added yet</p><?php
		}
		else
		{
		while($getcity1=mysql_fetch_object($getcity))
		{
			?><p onClick="selecity('<?php echo $getcity1->vcity; ?>')"><?php echo $getcity1->vcity; ?></p><?php
		}
		} 
		?>
		</div>
	</div>
</div>
<div class="container">

  <div class="events-main" id="loadevents">
  <p align="center"><img src="images/loading2.gif"></p><h1 align="center">Loading Events</h1>
  </div>
	
</div>
<?php include('includes/hosting.php'); ?>
<?php include('includes/social-main.php'); ?>
<?php include('includes/footer.php'); ?>
</body>
</html>
