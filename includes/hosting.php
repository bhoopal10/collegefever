<div class="create-event">
	<div class="container">
		<h2>Hosting an event at your college?</h2>
		<P>Create your event at The College Fever to maximize your reach</P>
		<?php if($_SESSION['uid']!="") { ?>
		<p><a href="create_events_1.php">Create Event</a></p>
		<?php }else{ ?>
		<p><a href="login.php?type=createev">Create Event</a></p>
		<?php } ?>
	</div>
</div>