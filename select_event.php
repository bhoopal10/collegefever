<form class="common-form" onsubmit="return CheckEventSelect();" name="EventSelect" method="post">
	<ul>
		<li><div class="err-txt" id="err-check"></div></li>
	</ul>
	<ul>
		<li class="label"><input min="1" max="1" type="checkbox" name="sEvent[]" value="gameOfShadow" price="500" id="lbl1" /><label for="lbl1">Game of shadows</label></li>
		
		<li class="label"><input min="2" max="2" type="checkbox" name="sEvent[]" value="finopoly" price="500" id="lbl2" /><label for="lbl2">Finopoly</label></li>
		
		<li class="label"><input min="1" max="3" type="checkbox" name="sEvent[]" value="avantGarde" price="500" id="lbl3" /><label for="lbl3">Avant garde</label></li>
		
		<li class="label"><input min="2" max="4" type="checkbox" name="sEvent[]" value="venditionVendetta" price="500" id="lbl4" /><label for="lbl4">Vendition vendetta</label></li>
		
		<li class="label"><input min="2" max="2" type="checkbox" name="sEvent[]" value="pragnya" price="500" id="lbl5" /><label for="lbl5">Pragnya</label></li>
		
		<li class="label"><input min="1" max="1" type="checkbox" name="sEvent[]" value="bailar" price="500" id="lbl6" /><label for="lbl6">Bailar</label></li>
		
		<li class="label"><input min="5" max="8" type="checkbox" name="sEvent[]" value="promenade" price="500" id="lbl7" /><label for="lbl7">Promenade</label></li>
		
		<li class="label"><input min="1" max="5" type="checkbox" name="sEvent[]" value="tremolo" price="500" id="lbl8" /><label for="lbl8">Tremolo</label></li>
		
		<li class="label"><input min="3" max="8" type="checkbox" name="sEvent[]" value="delirium" price="500" id="lbl20" /><label for="lbl20">Delirium</label></li>
	
		<li class="label"><input min="8" max="9" cd="1"  type="checkbox" name="sEvent[]" value="vanity" price="500" id="lbl9" /><label for="lbl9">Vanity</label></li>
		
		<li class="label"><input min="3" max="3" type="checkbox" name="sEvent[]" value="warOfWords" price="500" id="lbl10" /><label for="lbl10">War of Words</label></li>	

		<li class="label"><input min="1" max="1" type="checkbox" name="sEvent[]" value="mun" price="1000" id="lbl11" /><label for="lbl11">MUN</label></li>
		
		<li class="label"><input min="2" max="2" type="checkbox" name="sEvent[]" value="econjecture" price="500" id="lbl12" /><label for="lbl12">Econjecture</label></li>

		<li class="label"><input min="2" max="2" type="checkbox" name="sEvent[]" value="genQuiz" price="500" id="lbl13" /><label for="lbl13">Gen quiz</label></li>
		
		<li class="label"><input min="2" max="3" type="checkbox" name="sEvent[]" value="vandals" price="500" id="lbl14" /><label for="lbl14">Vandals</label></li>

		<li class="label"><input min="4" max="20" ex="3" type="checkbox" name="sEvent[]" value="expressions" price="500" id="lbl15" /><label for="lbl15">Expressions</label></li>
		
		<li class="label"><input min="5" max="18" type="checkbox" name="sEvent[]" value="hallaBol" price="500" id="lbl16" /><label for="lbl16">Halla bol</label></li>
		<li class="label"><input min="3" max="5" type="checkbox" name="sEvent[]" value="voxPopuli" price="500" id="lbl17" /><label for="lbl17">Vox populi</label></li>
		<li class="label"><input min="2" max="2" type="checkbox" name="sEvent[]" value="stratOSphere" price="500" id="lbl18" /><label for="lbl18">Strat o sphere</label></li>

		<li class="label"><input min="1" max="1" type="checkbox" name="sEvent[]" value="GGWP" price="500" id="lbl19" /><label for="lbl19">GGWP</label></li>
	</ul>
	<ul><li><span>Fill below details</span></li></ul>
	<ul>
		<li class="InPut"><div class="err-txt" id="err-tl"></div><input type="text" name="tmLeader" id="tl" placeholder="Teamleader"></li>
		<li class="InPut"><div class="err-txt" id="err-phone"></div><input type="text" name="Phone" id="phone" placeholder="Phone"></li>
		<li class="InPut"><div class="err-txt" id="err-college"></div><input type="text" name="college" id="college" placeholder="College"></li>
		
	</ul>
	<ul>
		<li class="InPut"><div class="err-txt" id="err-email"></div><input type="text" name="email" id="email" placeholder="Email"></li>
    <li class="InPut"><div class="err-txt" id="err-accommodation"></div><input type="text" name="accommodation" id="accommodation" placeholder="No of Accommodation"></li>
	</ul>
	<ul>
		<li class="submit">

			<input class="last" type="submit" name="select_event_submit" value="Proceed">
		</li>
	</ul>
	<ul></ul>
</form>
<script type="text/javascript">
	
	function CheckEventSelect()
	{
      var tl      =document.EventSelect.tmLeader.value;
      var phone   =$('#phone').val();
      var college =document.EventSelect.college.value;
      var email   =document.EventSelect.email.value;
      var accommodation= document.EventSelect.accommodation.value;
      var count=$("input[type='checkbox']:checked").length;
      if(count < 1)
      {
      	$('#err-check').html('Please select atleast one event');
      	return false;
      }
      else
      {
      	$('#err-check').html('');
      }

      if(!tl)
      {
         document.getElementById('err-tl').innerHTML='Enter team leader name';
          document.EventSelect.tmLeader.className="alert";
          document.EventSelect.tmLeader.focus();
          return false;
      }
      else
      {
         document.getElementById('err-tl').innerHTML='';
            document.EventSelect.tmLeader.className='';

      }
      if(!phone)
      {
         //alert('Phone is required');
          document.getElementById('err-phone').innerHTML='Phone is required';
          document.EventSelect.Phone.className="alert";
          document.EventSelect.Phone.focus();
           return false;
      }
       else
       {
          document.getElementById('err-phone').innerHTML='';
             document.EventSelect.Phone.className='';

       }
      if(!college)
      {
          document.getElementById('err-college').innerHTML='College is required';
           document.EventSelect.college.className="alert";
           document.EventSelect.college.focus();
         //alert('College is required')
          return false;
      }
       else
       {
          document.getElementById('err-college').innerHTML='';
             document.EventSelect.college.className='';
       }
      if(!email)
      {
      document.getElementById('err-email').innerHTML='Email is required';
           document.EventSelect.email.className="alert";
           document.EventSelect.email.focus();
         //alert('Email is required');
          return false;
      }
       else
       {
          document.getElementById('err-email').innerHTML='';
             document.EventSelect.email.className='';

       }
      if(isNaN(accommodation))
      {
          document.getElementById('err-accommodation').innerHTML='No of accommodation must numeric';
           document.EventSelect.accommodation.className="alert";
           document.EventSelect.accommodation.focus();
         //alert('Email is required');
          return false;  
      }
  }

</script>
