<?php 
$sEvent=$_POST['sEvent'];
$Current=array_slice($sEvent,1);
$Current=($Current)? $Current : '0';
$jSEvent=json_encode($sEvent);
?>
<span><?php echo $_POST['sEvent'][0]; ?></span>
<form class ="common-form" onsubmit="" method="post">
	<ul>
		<li class="Input"><input type ="text" name='name' placeholder="Name" ></li>
		<li class ="InPut"><div class="err-txt" id="err-phone"></div><input type="text" name="Phone" id="phone" placeholder="Phone"></li>
		<li class ="InPut"><div class="err-txt" id="err-college"></div><input type="text" name="college" id="college" placeholder="College"></li>
	</ul>
	<ul>
		<li class ="InPut"><div class="err-txt" id="err-email"></div><input type="text" name="email" id="email" placeholder="Email"></li>
	</ul>
	<ul>
		<li class="submit">
		<?php print_r($Current); foreach($Current as $values){?>
			<input type="hidden" name="sEvent[]" value="<?php echo $values; ?>">
		<?php }?>
			<input id="pro" class="last" type="submit" name="select_event_submit" value="Proceed">
		</li>
	</ul>
</form>
