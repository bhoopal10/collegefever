<?php

if($_REQUEST['page']!="")
{
	$_SESSION['page']=$_REQUEST['page'];
}
if($_REQUEST['page']=="evcreate" && $_SESSION['crevnt']!='Yes')
{
	unset($_SESSION['evtype']);
}
if($_SESSION['page']=='evsearch')
{
	$selnav1='class="sel"';
}
if($_SESSION['page']=='evcreate')
{
	$selnav2='class="sel"';
}
if($_SESSION['page']=='login')
{
	$selnav3='class="sel"';
}
if($_SESSION['page']=='myevents')
{
	$selnav4='class="sel"';
}

if($_SESSION['uid']=="")
{
?>
<div class="header-main">
	<div class="container">
		<div class="logo-area">
			<a href="index.php?page=index"><img src="images/logo.png"></a>
		</div><div class="navs-area">
			<ul>
				<li><a href="events_search.php?page=evsearch" <?php echo $selnav1; ?>>Events</a>
				<?php if($_SESSION['uid']!="") { ?>
				</li><li><a href="create_events_1.php?page=evcreate" <?php echo $selnav2; ?>><strong>Create Event</strong></a>
				<?php }else{ ?>
				</li><li><a href="login.php?type=createev" <?php echo $selnav2; ?>><strong>Create Event</strong></a>
				<?php } ?>
				</li><li class="last"><a href="login.php?page=login" <?php echo $selnav3; ?>>Login | <strong>Sign Up</strong></a></li>
			</ul>
		</div>
	</div>	
</div>
<?php
}
else
{
$usrdet=mysql_fetch_object(mysql_query("select * from register where id='".$_SESSION['uid']."'"));
?>
<div class="header-main">
	<div class="container">
		<div class="logo-area">
			<a href="index.php?page=index"><img src="images/logo.png" border="0"></a> </div><div class="navs-area logged-nav">
			<ul class="logged">
				<li><a href="events_search.php?page=evsearch" <?php echo $selnav1; ?>>All Events</a>
				</li><li><a href="create_events_1.php?page=evcreate" <?php echo $selnav2; ?>><strong>Create Event</strong></a>
				</li><li><a href="myevents_3.php?page=myevents" <?php echo $selnav4; ?>>Dashboard</a>
				</li><li class="last"><a href="#" id="usr-det-link"><?php echo substr($usrdet->name,0,10); ?>
				<img src="images/user_drop.png" id="udet-down" /><img src="images/user_drop1.png" style="display:none;" id="udet-up" />
				</a>
				<div class="udrop">
				<a href="editprofile.php">Edit Profile</a>
				<a href="logout.php" class="last">Log Out</a>
				</div>
				</li>
			</ul>
		</div>
	</div>	
</div>
<?php
}
?>