<?php
require('../admin/sql.php');
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/content1.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36558821-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>

<script src="../stickynote.js">

/***********************************************
* Sticky Note Script (c) Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/

</script>

<script>

var mysticky=new stickynote({
	content:{divid:'stickynote1', source:'inline'},
	pos:['right', 'bottom'],
	showfrequency:'always'
	//hidebox:0
})

</script>
<link rel="shortcut icon" href="../favicon.ico">
<script type="text/javascript">
function alertSize() {
  var myWidth = 0, myHeight = 0;
  if( typeof( window.innerWidth ) == 'number' ) {
    //Non-IE
    myWidth = window.innerWidth;
    myHeight = window.innerHeight;
  } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
    //IE 6+ in 'standards compliant mode'
    myWidth = document.documentElement.clientWidth;
    myHeight = document.documentElement.clientHeight;
  } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
    //IE 4 compatible
    myWidth = document.body.clientWidth;
    myHeight = document.body.clientHeight;
  }
  //window.alert( 'Width = ' + myWidth );
  //window.alert( 'Height = ' + myHeight );
  var myHeight1=myHeight-235;
  document.getElementById('wrapper').style.minHeight=myHeight1+'px';
}

</script>
<link href="../css/ui-lightness/jquery-ui-1.9.0.custom.css" rel="stylesheet">
<script src="../js/jquery-1.8.2.js"></script>
<script src="../js/jquery-ui-1.9.0.custom.js"></script>
<script type="text/javascript">
function CheckNews() 
{
   if(document.NewsForm.emailN.value=="")
   {
      alert('Enter Email, please!');
	  document.NewsForm.emailN.focus();
      return false;
   }
   if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.NewsForm.emailN.value))
   {
   }
   else
   {
   alert("Invalid E-mail Address! Please re-enter.");
   document.NewsForm.emailN.focus();
   return false;
   }
	 return true; 
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>deals dashbod - keep track of all your daily deals, digital coupons and more in your own digital wallet</title>
<!-- InstanceEndEditable -->
<meta name="keywords" content=" Track Daily Deals, Daily Deals Organizer, Daily Deals Wallet, Digital Wallet, My Groupons, My Vouchers, Expired Groupon, Daily, Deals, Organize, Digital Coupons, Discounts, Groupon, LivingSocial, Dealfind, Tippr, Yelp, Resaurant.com, DealChicken" />
<meta name="description" content="View and Keep track of your Daily deals and Digital coupons all in ONE website from Groupon, LivingSocial and 800+ others filtered for where you are." />
<link href="../css/global.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function cleartext(name){
if(name.defultvalue=name)
name.value="";
}
</script>
<script type="text/javascript" src="../js/split.js"></script>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body onload="alertSize();">
<!-- Div for rollover images -->
<div id="preloader_images" style="display:none;">
<img src="../images/bg.png" alt="preloader" />
<img src="../images/top.png" alt="preloader" />
<img src="../images/face_login_h.jpg" alt="preloader" />
<img src="../images/invite_h.png" alt="preloader" />
<img src="../images/logins-h.jpg" alt="preloader" />
<img src="../images/sign-h.jpg" alt="preloader" />
<img src="../images/signup_h.png" alt="preloader" />
<img src="../images/twitter_login_h.jpg" alt="preloader" />
</div><!-- Div for rollover images -->

<div id="stickynote1" class="stickynote">
<ul>
<li>
<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2FDealsDashbod&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=522280557818001" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe>
</li>
<li>
<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.twitter.com/dealsdashbod" data-via="DealsDashbod">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</li>
<li>
<!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
</li>
</ul>
</div>


<!-- Invite friends popup window -->
<div id="light1" style="display:none">
	<?php include('../invsend.php'); ?>
</div>

<!-- Close Invite friends popup window -->



<!------------------------- STARTING HEADER HTML--------------------------------------->
	
		<div id="header">
			<div class="top">
				<div class="mainpart">
					
					<div class="second"></div>
					<div class="links">
						<ul>
							<?php
						if($_SESSION['uid']=="")
						{
						?>
							<li><a href="../login.php">LOGIN</a></li>
							<li><a href="../howitworks.php">HOW IT WORKS</a></li>
							<li><a href="../signup.php">SIGN UP NOW FOR FREE</a></li>
						<?php
						}
						else
						{
						?>
							<li><a href="../logout.php">LOGOUT</a></li>
							<li> | </li>
							<li><a href="../my-account.php">MY ACCOUNT</a></li>
							<li> | </li>
							<li class="orange">WELCOME <span style="text-transform:uppercase;"><strong><?php echo $_SESSION['uname']; ?></strong></span>&nbsp;&nbsp;&nbsp;&nbsp;</li>	
						<?php
						}
						?>
						</ul>
					</div>
				  <div class="logopart">
						<div class="logo"><a 
						href="<?php if($_SESSION['uid']==""){echo 'index.php';}else{echo 'today-deals.php';}?>"
						><img src="../images/logo.png" border="0" alt="Logo" /></a></div>
					  <?php if($_SESSION['uid']!="") {?>
						<div class="cdiv">
						<ul>
						<li onmouseover="document.getElementById('hds1').style.display='block'"
						onmouseout="document.getElementById('hds1').style.display='none'">
						<a href="../my-deals.php?vval1=Active"></a>
						<?php $getmdeal=mysql_fetch_object(mysql_query("select count(id) as cid from deal where uid='".$_SESSION['uid']."' 
						and ((expiry>='".date('Y-m-d')."' and status='0' and dexpiry='Yes') OR (status='0' and dexpiry='No'))")); ?>
						<?php if($getmdeal->cid>0) {?>
						<div class="blc"><?php echo $getmdeal->cid; ?></div>
						<?php } ?>
						<div class="hvr" id="hds1" style="display:none;">Active Deals</div>
						</li>
						<li onmouseover="document.getElementById('hds2').style.display='block'"
						onmouseout="document.getElementById('hds2').style.display='none'">
						<a href="../my-deals.php?vval1=Expired" class="secondl"></a>
						<?php $getmdeal1=mysql_fetch_object(mysql_query("select count(id) as cid from deal where uid='".$_SESSION['uid']."' and expiry<'".date('Y-m-d')."' and dexpiry='Yes'")); ?>
						<?php if($getmdeal1->cid>0) {?>
						<div class="blc"><?php echo $getmdeal1->cid; ?></div>
						<?php } ?>
						<div class="hvr" id="hds2" style="display:none;">Expired Deals</div>
						</li>
						<li onmouseover="document.getElementById('hds3').style.display='block'"
						onmouseout="document.getElementById('hds3').style.display='none'">
						<a href="../my-deals.php?vval1=Used" class="third"></a>
						<?php $getmdeal2=mysql_fetch_object(mysql_query("select count(id) as cid from deal where uid='".$_SESSION['uid']."' and status='1'")); ?>
						<?php if($getmdeal2->cid>0) {?>
						<div class="blc"><?php echo $getmdeal2->cid; ?></div>
						<?php } ?>
						<div class="hvr" id="hds3" style="display:none;">Used Deals</div>
						</li>
						<li onmouseover="document.getElementById('hds4').style.display='block'"
						onmouseout="document.getElementById('hds4').style.display='none'">
						<a href="../my-deals.php?vval1=Needs Attention" class="fourth"></a>
						<?php 
						$datelic1 = strtotime(date("Y-m-d", strtotime(date('Y-m-d'))) . " +10 days");
						$exdate = gmdate('Y-m-d',$datelic1);
						$getmdeal3=mysql_fetch_object(mysql_query("select count(id) as cid from deal where uid='".$_SESSION['uid']."' and expiry<='".$exdate."' and expiry>='".date('Y-m-d')."' and dexpiry='Yes'")); ?>
						<?php if($getmdeal3->cid>0) {?>
						<div class="blc"><?php echo $getmdeal3->cid; ?></div>
						<?php } ?>
						<div class="hvr" id="hds4" style="display:none;">Needs Attention</div>
						</li>
						</ul>
						</div>
					  <?php } ?>
						
					</div>
				</div>
				<div class="invite"><a href = "#" onclick = "document.getElementById('light1').style.display='block';" ></a></div>
			</div>
		</div>
		
	<!-------------------------CLOSING HEADER & STARTING CONTENTS PART HTML--------------------------------------->
	<!--starting wrapper--->
	<div id="wrapper">
	
	
	<a id="top" name="top"></a>
		<div id="container">
			<div id="main"><!-- InstanceBeginEditable name="content" -->
			  <div class="maintab">
                <div id="pettabs" class="indentmenu">
                  <h2>Twitter Login </h2>
                </div>
			    <div class="tab_top"></div>
			    <div class="normal2">
                  <div class="leftColum">
                    
					<?php if (isset($menu)) { ?>
        <?php echo $menu; ?>
      <?php } ?>
	  <?php if (isset($status_text)) { ?>
      <?php echo '<h3>'.$status_text.'</h3>'; ?>
    <?php } ?>
	 <?php print_r($content); ?>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                  </div>
			      <div class="rightColum">
                    <p>&nbsp;</p>
			        <p>&nbsp;</p>
			        <p>&nbsp;</p>
			        <p>&nbsp;</p>
		          </div>
		        </div>
			    <div class="tab_bot"></div>
		    </div>
			<!-- InstanceEndEditable --></div>
			
		</div>
		<script type="text/javascript">

var mypets=new ddtabcontent("pettabs")
mypets.setpersist(true)
mypets.setselectedClassTarget("link")
mypets.init(2000)

</script>
		
		<!-------------------------CLOSING CONTENTS PART & STARTING FOOTER HTML--------------------------------------->
		
	</div><!--closing wrapper--->
	
	
	<div id="footer">
	  <div id="fcolum">
			<div class="ftop">
				<div class="colum1"><img src="../images/companylinks.png" height="25" alt="company links" />
				<ul>
					<li><a href="../about.php">About Deals Dashbod</a></li>
					<li><a href="../faq.php">Frequently Asked Questions</a></li>
					<li><a href="../blog.php">Blog</a></li>
					<li><a href="../contact.php">Contact Us</a></li>
				</ul>
				<ul style="margin-left:30px;" >
					<li><a href="../advertise.php">Advertise With Us </a></li>
					<li><a href="../terms-conditions.php">Terms & Conditions</a></li>
					<li><a href="../privacy-policy.php">Privacy Policy</a></li>
				</ul>
			</div>
			    <div class="colum2"> <img src="../images/newsletter.png" width="225" height="25" alt="newsletter" />
                    <p>Subscribe to Deals Dashbod and get notification<br />
                      about new deals &amp; special offers.</p>
			      <?php
			  if(isset($_POST['SubmitEMS']))
			  {
			  if($chkemail=mysql_num_rows(mysql_query("select * from newsletter where email='".$_REQUEST['emailN']."'"))>0)
			  {
			  ?>
                    <script>
					alert('Email id given is already registered for newsletters');
					location.replace('index.php');
					</script>
                    <?php
			  }
			  else
			  {
			  $insem=mysql_query("insert into newsletter(email,adate) values('".$_REQUEST['emailN']."','".date('Y-m-d')."')");
			  	if($insem)
				{
					?>
                    <script>
					alert('The email id has been successfully registered for newsletters');
					location.replace('index.php');
					</script>
                    <?php
				}
				else
				{
					?>
                    <script>
					alert('Email id registration failed, Try again');
					location.replace('index.php');
					</script>
                    <?php
				}
			  }
			  }
			  ?>
                    <form action="" method="post" name="NewsForm" id="NewsForm"  onsubmit="return CheckNews();">
                      <table width="280" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="5" align="center"><img src="../images/em1.png" width="5" height="36" /></td>
                          <td width="299" align="left" class="embg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="84%"><input name="emailN" type="text" class="sarchBox2" id="emailN" onfocus="cleartext(this)" value="Enter your email address..." /></td>
                                <td width="16%" align="right"><label>
                                  <input name="SubmitEMS" type="submit" class="embtn" id="SubmitEMS" value="GO" />
                                </label></td>
                              </tr>
                          </table></td>
                          <td width="6"><img src="../images/em2.png" width="4" height="36" /></td>
                        </tr>
                      </table>
                    </form>
		      </div>
			    <div class="colum3">
			  <img src="../images/lets_socialize.png" width="148" height="25" alt="lets socialize" />
			  <p>Prefer to stay in touch on Twitter and Facebook?<br />
		      You can find us there too.</p>
				  <ul>
				  		<li><a href="https://www.facebook.com/dealsdashbod" target="_blank"><img src="../images/facebook.jpg" border="0" alt="facebook" /></a></li>
						<li><a href="https://www.twitter.com/dealsdashbod" target="_blank"><img src="../images/twitter.jpg" width="24" height="24" border="0" alt="twitter" /></a></li>
						<li><a href="#"><img src="../images/google.png" width="24" height="24" border="0" alt="Google+" /></a></li>
						<li><a href="#"><img src="../images/linkdin.jpg" width="24" height="24" border="0" alt="linkedin" /></a></li>
						<li><a href="#"><img src="../images/blog.jpg" width="24" height="24" border="0" alt="blog" /></a></li>
				  </ul>
			</div>
			</div>
			<div class="fbot">
              <ul>
                <li style="padding-bottom:0px; padding-top:11px;">&copy; <?php echo date('Y'); ?> DEALS DASHBOD. ALL RIGHTS RESERVED<br />
                </li>
                <li style="color:#787878; padding-top:0px; padding-bottom:0px; padding-left:120px;"><img src="../images/rack.png" width="158" height="50" /></li>
                <li style="padding-bottom:0px; padding-top:11px; float:right;"> <span style="color:#787878;">ALL TRADEMARKS ARE THE PROPERTY OF THEIR RESPECTIVE OWNERS</span></li>
              </ul>
	    </div>
	  </div>
	</div>
	
</body>
<!-- InstanceEnd --></html>
