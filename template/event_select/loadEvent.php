<?php 
$sEvent=$_POST['sEvent'];
$Current=array_slice($sEvent,1);
$Current=($Current)? $Current : '0';
$jSEvent=json_encode($sEvent);
?>
<script  type="text/javascript">
	$(function(){
		var vanity="<?php echo $_POST['sEvent'][0]; ?>";
		var max=<?php echo $event_tc[$_POST['sEvent'][0]]['max'] ?>;
		var sCount="<?php echo $event_tc[$_POST['sEvent'][0]]['max']-$event_tc[$_POST['sEvent'][0]]['min'] ?>";
		var actual=sCount;		
		if(sCount < 1){ $('#Add-user').hide(); }
		$('#Add-user').on('click',function(){
			if(vanity == 'vanity')
			{
				$('.append-here').append('<div><ul>'+
									'<li class="Sno"><span>'+(max-sCount+1)+'</span>'+
									'</ul>'+
									'<ul>'+
									'<li class="Input" style="width: 32.8%;"><input style="width: 100%;" required="required" type ="text" name="memberName[]" placeholder="Name" ></li>'+
									'<li class ="InPut" style="width: 32.8%;"><input style="width: 100%;" required="required" type="number" name="Phone[]" id="phone" placeholder="Phone"></li>'+
									'<li class ="InPut" style="width: 32.8%;"><input style="width: 100%;" required="required" type="text" name="college[]" id="college" placeholder="College"></li>'+
									'</ul>'+
									'<ul>'+
									'<li class ="InPut"><input required="required" type="email" name="email[]"  placeholder="Email"></li>'+
									'<li class ="InPut"><div class="err-txt" ></div><input required="required" type="text" name="age[]" id="age" placeholder="Age"></li>'+
									'<li class ="InPut"><div class="err-txt" ></div><input required="required" type="text" name="candidateHight[]"  placeholder="Hight"></li>'+
									'</ul>'+
									'<ul>'+
									'<li class="radio"><div class="err-txt" id="err-gender"></div>'+
										'<input required="required" type="radio" name="gender['+(max-sCount+1)+']" value="M" id="male" checked="checked"><label style="color:black">Male</label>'+
										'<input required="required" type="radio" name="gender['+(max-sCount+1)+']" value="F" id="female"> <label style="color:black">Female</label>'+
									'</li>'+
									'<li class="Sno remove-user"><span style="cursor:pointer"><b>X</b></span></li>'+
									'</ul></div>');
			}
			else
			{

				$('.append-here').append('<div><ul>'+
									'<li class="Sno"><span>'+(max-sCount+1)+'</span>'+
									'</ul>'+
									'<ul>'+
									'<li class="Input" style="width: 32.8%;"><input style="width: 100%;" required="required" type ="text" name="memberName[]" placeholder="Name" ></li>'+
									'<li class ="InPut" style="width: 32.8%;"><input style="width: 100%;" required="required" type="number" name="Phone[]" id="phone" placeholder="Phone"></li>'+
									'<li class ="InPut" style="width: 32.8%;"><input style="width: 100%;" required="required" type="text" name="college[]" id="college" placeholder="College"></li>'+
									'</ul>'+
									'<ul>'+
									'<li class ="InPut"><input required="required" type="email" name="email[]" placeholder="Email"></li>'+
									'<li class="Sno remove-user"><span style="cursor:pointer"><b>X</b></span></li>'+
									'</ul></div>');
		}
			sCount=sCount-1;
			console.log(sCount);
			if(sCount < 1)
			{
				$('#Add-user').hide();
			}
			
		});
		$('.append-here').on('click','.remove-user',function(){
			$(this).parent().parent().remove();
			sCount=sCount+1;
			if(sCount > 0)
			{
				$('#Add-user').show();
			}
			
		});

	});
</script>
<span><h2><?php echo $_POST['sEvent'][0]; ?></span> </h2>
<form class ="common-form"  method="post">
<div class="append-here">
<?php $count=$event_tc[$_POST['sEvent'][0]]['min']; for($i=0;$i<$count;$i++){ ?>
	<ul><li class="Sno"><span><?php echo $i+1; ?></span></li></ul>
	<ul>
		<li class="Input"><input required="required" type ="text" name='memberName[]' placeholder="Name" ></li>
		<li class ="InPut"><div class="err-txt"></div><input required="required" type="number" name="Phone[]"  placeholder="Phone"></li>
		<li class ="InPut"><div class="err-txt"></div><input required="required" type="text" name="college[]" placeholder="College"></li>
	</ul>
	<?php if($_POST['sEvent'][0] == 'vanity'){ ?>
	<ul>
		<li class ="InPut"><div class="err-txt"></div><input required="required" type="email" name="email[]"  placeholder="Email"></li>
		<li class ="InPut"><div class="err-txt"></div><input required="required" type="text" name="age[]"  placeholder="Age"></li>
		<li class ="InPut"><div class="err-txt"></div><input required="required" type="text" name="candidateHight[]" placeholder="Hight"></li>
	</ul>
	<ul>
		<li class="radio"><div class="err-txt" id="err-gender"></div>
			<input required="required" type="radio" name="gender[<?php echo $i+1; ?>]" value="M" id="male" checked="checked"> <label  style="color:black">Male</label>
			<input required="required" type="radio" name="gender[<?php echo $i+1; ?>]" value="F" id="female"> <label  style="color:black">Female</label>
		</li>
	</ul>
	<?php }else { ?>
	<ul>
		<li class ="InPut"><div class="err-txt" ></div><input required="required" type="email" name="email[]"  placeholder="Email"></li>
	</ul>
	<?php } ?>
<?php } ?>
</div>
	<ul>

		<li class="submit">
		<input required="required" type="hidden" name="EventName" value="<?php echo $_POST['sEvent'][0]; ?>">
		<?php foreach($Current as $values){?>
			<input required="required" type="hidden" name="sEvent[]" value="<?php echo $values; ?>">

		<?php }?>
		<span id="Add-user" class="spanBtn">AddMember</span>
		<?php
			if(!$Current)
			{
			?>
			<input id="pro" class="last" required="required" type="submit" name="select_event_submit" value="Proceed">
			<?php
			}else
			{?>
			<input id="pro" class="last" required="required" type="submit" name="select_event_submit" value="Next">
			<?php }?>
			
		</li>
	</ul>
	<ul><li></li></ul>
</form>
<script  type="text/javascript">
	
</script>
