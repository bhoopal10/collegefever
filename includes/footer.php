<div class="footer-main">
<div class="black_overlay" id="youtube-popup-black-overlay"></div>
<div class="yout-box" id="youtube-popup-main"><img src="images/close_icon.png" class="yt-close" id="youtube-close-top" /><iframe id="YourIFrameID" style="max-width:100%;" width="560" height="315" src="//www.youtube.com/embed/MeNlIhv-uJ4" frameborder="0" allowfullscreen></iframe></div>
	<div class="container">
		<div class="f-content">
			<ul>
				<li class="first">
                  <h2>About</h2>
				   <p align="justify">&raquo;&nbsp;&nbsp;<a href="aboutus.php?page=nosel">About College Fever</a> </p>
				   <p align="justify">&raquo;&nbsp;&nbsp;<a href="careers.php?page=nosel">Careers in College Fever</a> </p>
				   <p align="justify">&raquo;&nbsp;&nbsp;<a href="contactus.php?page=nosel">Contact College Fever</a> </p>
				   <p align="justify">&raquo;&nbsp;&nbsp;<a href="feedback.php?page=nosel">Send Us A Tip</a> </p>
				   <p align="justify">&raquo;&nbsp;&nbsp;<a href="privacy.php?page=nosel">Privacy Policy</a> </p>
			  </li><li class="second">
					<h2>How it Works</h2>
					<p><img src="images/vpic.png" id="youtube-click-link" /></p>	
				</li><li class="last">
                  <h2>Submit Event</h2>
				  <P>Yeah, we know finding events happening on colleges isn't easy, in fact it's impossible. Why don't we make this easy ?</P>
				  <?php if($_SESSION['uid']!="") { ?>
		<p><a href="create_events_1.php" class="orangebutton">Create Event</a></p>
		<?php }else{ ?>
		<p><a href="login.php?type=createev" class="orangebutton">Create Event</a></p>
		<?php } ?>
		      </li>
          </ul>
      </div>
	  <div class="f-bottom">
	  	<div class="f-left">Copyright &copy; <?php echo date('Y'); ?> TheCollegeFever. All rights reserved.</div>
	  	<!--<div class="f-right">Designed by <a href="http://dotlinedesigns.com/" target="_blank">Dotline</a></div>-->
	  </div>
	</div>
</div>
<img src="images/sctop.png" class="sctop" />