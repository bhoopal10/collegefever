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
<script language="JavaScript" src="js/calendar_us1.js"></script>
<link rel="stylesheet" href="css/calendar.css" />
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

<body  onLoad="getevents1();">
<?php include('includes/header.php'); ?>
<div class="container">
<div class="ev-search">
<p>Search for events</p>
<form action="#" method="post" name="formevsearch" id="formevsearc">
<ul>
	<li><input name="srname" id="srname" type="text" size="30" placeholder="college name/event name/category" value="<?php echo $_REQUEST['srname']; ?>">
	</li>
	<li>
      <input name="srcity" id="srcity" type="text" size="15" placeholder="city" value="<?php echo $_REQUEST['srcity']; ?>">
    </li>
	<li>
      <input name="srfrom" id="srfrom" type="text" size="8" placeholder="from" value="<?php echo $_REQUEST['srfrom']; ?>">
    <script language="JavaScript">
										new tcal ({
											// form name
											'formname': 'formevsearch',
											// input name
											'controlname': 'srfrom'
										});
									
										</script></li>
	<li>
    <input name="srto" id="srto" type="text" size="8" placeholder="to" value="<?php echo $_REQUEST['srto']; ?>">
  <script language="JavaScript">
										new tcal ({
											// form name
											'formname': 'formevsearch',
											// input name
											'controlname': 'srto'
										});
									
										</script></li>
	<li>
  <a href="javascript:void(0);" onClick="getevents1();"><img src="images/inp-sub.png"></a>  </li>
</ul>
</form>
<p>And filter them with categories</p>
</div>
</div>
<div class="subnav-main">
  <div class="container">
    <div class="subnav">
      <ul>
        <li class="sel" id="etli1"> <a href="javascript:void(0)" onClick="seletype1('All','1');"><span class="icon-area"><img src="images/sn-1.png"></span><span class="txt-area">All<br>
          Events</span></a>
            <div class="drop_bottom"></div>
          <div class="drop_arrow"></div>
       <?php
			$getcat=mysql_query("select * from category order by id asc");
			$catno=1;
			while($getcat1=mysql_fetch_object($getcat))
			{
			$catno++;
			?>		</li><li class="e<?php echo $catno; ?>" id="etli<?php echo $catno; ?>">	
				<a href="javascript:void(0)" onClick="seletype1('<?php echo $getcat1->name; ?> Events','<?php echo $catno; ?>');"><span class="icon-area"><img src="upfile/<?php echo $getcat1->pic; ?>"></span>
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
<input type="hidden" name="scrollto" id="scrollto" value="0">
<input type="hidden" name="noofev" id="noofev" value="6">
<input type="hidden" name="etype" id="etype" value="All">
<input type="hidden" name="ecity" id="ecity" value="All">
<?php
$evedate=mysql_fetch_object(mysql_query("select max(edate) as medate from event"));
?>
<input type="hidden" name="esdate" id="esdate" value="<?php echo $evedate->medate; ?>">
<input type="hidden" name="eedate" id="eedate" value="<?php echo date('Y-m-d'); ?>">
<input type="hidden" name="caldate" id="caldate" value="<?php echo date('Y-m-d'); ?>">
  <div class="events-main" id="loadevents1">
  <p align="center"><img src="images/loading2.gif"></p><h1 align="center">Loading Events</h1>
	</div>
	
</div>
<?php include('includes/hosting.php'); ?>
<?php include('includes/social-main.php'); ?>
<?php include('includes/footer.php'); ?>
</body>
</html>
