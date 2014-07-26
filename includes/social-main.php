
<div class="social-main">
	<div class="container">
		<div class="connect">
			<ul>
				<li>Connect with The College Fever to know what's new and happening!</li><li class="img-li"><a href="https://www.facebook.com/thecollegefever" target="_blank"><img src="images/sc1.png" /></a><a href="https://twitter.com/thecollegefever" target="_blank"><img src="images/sc2.png"></a><!--<a href="#"><img src="images/sc3.png"></a><a href="#"><img src="images/sc4.png"></a>--><a href="https://www.youtube.com/watch?v=MeNlIhv-uJ4" target="_blank"><img src="images/sc5.png"></a>
				</li>
			</ul>
	  </div>
		<div class="newsletter"><a name="newsanch"></a>
		<?php
		if(isset($_POST['subnews']))
		{
		$chkemnw=mysql_num_rows(mysql_query("select * from newsletter where email='".$_REQUEST['newsemail']."'"));
		if($chkemnw>0)
		{
			?><p class="red-button1">The email entered has been already subscribed</p><?php
		}
		else
		{
		$insem=mysql_query("insert into newsletter(email,sdate) values('".$_REQUEST['newsemail']."','".date('Y-m-d H:i:s')."')");
		if($insem)
		{
			?><p class="red-button1">The entered email has been successfully subscribed for newsletters</p><?php
		}
		}
		}
		?>
		<form action="#newsanch" method="post">
			<ul>
				<li>Subscribe to our newsletter</li><li class="input">
				  <input name="newsemail" id="newsemail" type="email" size="45" placeholder="enter your email here" required>
				</li><li class="input1"><input type="submit" name="subnews" id="subnews" value="Subscribe"></li>
			</ul>
	  
	  </form>
	  </div>
	</div>
</div>