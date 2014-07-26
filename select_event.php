<form class="common-form" onsubmit="return CheckEventSelect()" name="EventSelect">
	<ul>
		<li class="label"><input min="1" max="1" type="checkbox" name="gameOfShadow" value="500" id="lbl1" /><label for="lbl1">Game of shadows</label></li>
		
		<li class="label"><input min="2" max="2" type="checkbox" name="finopoly" value="500" id="lbl2" /><label for="lbl2">Finopoly</label></li>
		
		<li class="label"><input min="1" max="3" type="checkbox" name="avantGarde" value="500" id="lbl3" /><label for="lbl3">Avant garde</label></li>
		
		<li class="label"><input min="2" max="4" type="checkbox" name="venditionVendetta" value="500" id="lbl4" /><label for="lbl4">Vendition vendetta</label></li>
		
		<li class="label"><input min="2" max="2" type="checkbox" name="pragnya" value="500" id="lbl5" /><label for="lbl5">Pragnya</label></li>
		
		<li class="label"><input min="1" max="1" type="checkbox" name="bailar" value="500" id="lbl6" /><label for="lbl6">Bailar</label></li>
		
		<li class="label"><input min="5" max="8" type="checkbox" name="promenade" value="500" id="lbl7" /><label for="lbl7">Promenade</label></li>
		
		<li class="label"><input min="1" max="5" type="checkbox" name="tremolo" value="500" id="lbl8" /><label for="lbl8">Tremolo</label></li>
		
		<li class="label"><input min="3" max="8" type="checkbox" name="delirium" value="500" id="lbl20" /><label for="lbl20">Delirium</label></li>
	
		<li class="label"><input min="8" max="9" cd="1"  type="checkbox" name="vanity" value="500" id="lbl9" /><label for="lbl9">Vanity</label></li>
		
		<li class="label"><input min="3" max="3" type="checkbox" name="warOfWords" value="500" id="lbl10" /><label for="lbl10">War of Words</label></li>	

		<li class="label"><input min="1" max="1" type="checkbox" name="mun" value="1000" id="lbl11" /><label for="lbl11">MUN</label></li>
		
		<li class="label"><input min="2" max="2" type="checkbox" name="econjecture" value="500" id="lbl12" /><label for="lbl12">Econjecture</label></li>

		<li class="label"><input min="2" max="2" type="checkbox" name="genQuiz" value="500" id="lbl13" /><label for="lbl13">Gen quiz</label></li>
		
		<li class="label"><input min="2" max="3" type="checkbox" name="vandals" value="500" id="lbl14" /><label for="lbl14">Vandals</label></li>

		<li class="label"><input min="4" max="20" ex="3" type="checkbox" name="expressions" value="500" id="lbl15" /><label for="lbl15">Expressions</label></li>
		
		<li class="label"><input min="5" max="18" type="checkbox" name="hallaBol" value="500" id="lbl16" /><label for="lbl16">Halla bol</label></li>

		<li class="label"><input min="3" max="5" type="checkbox" name="voxPopuli" value="500" id="lbl17" /><label for="lbl17">Vox populi</label></li>
		
		<li class="label"><input min="2" max="2" type="checkbox" name="stratOSphere" value="500" id="lbl18" /><label for="lbl18">Strat o sphere</label></li>

		<li class="label"><input min="1" max="1" type="checkbox" name="GGWP" value="500" id="lbl19" /><label for="lbl19">GGWP</label></li>
	</ul>
	<ul><li><span>Fill below details</span></li></ul>
	<ul>
		<li class="InPut"><div class="err-txt" id="err-tl"></div><input type="text" name="tmLeader" id="tl" placeholder="Teamleader"></li>
		<li class="InPut"><div class="err-txt" id="err-phone"></div><input type="text" name="Phone" id="phone" placeholder="Phone"></li>
		<li class="InPut"><div class="err-txt" id="err-college"></div><input type="text" name="college" id="college" placeholder="College"></li>
		
	</ul>
	<ul>
		<li class="InPut"><div class="err-txt" id="err-email"></div><input type="text" name="email" id="email" placeholder="Email"></li>
	</ul>
	<ul id="vanity-fill" style="display:none">
		<hr>
		<li class="InPut"><div class="err-txt" id="err-age"></div><input type="text" name="age" placeholder="Age" ></li>
		<li class="InPut"><div class="err-txt" id="err-candidateHeight"></div><input type="text" name="candidateHeight" placeholder="Height" ></li>
		<li class="radio"><div class="err-txt" id="err-gender"></div>
			<input type="radio" name="gender" value="M" id="male" checked> <label for="male" style="color:black">Male</label>
			<input type="radio" name="gender" value="F" id="female"> <label for="female" style="color:black">Female</label>
		</li>
	</ul>
	<ul>
		<li class="submit">

		<input readonly="readonly" class="last" type="text" name="select_event_submit" value="0" id="totalAmount">

		<input class="last" type="submit" name="select_event_submit" value="Proceed">

		</li>
	</ul>
	<ul></ul>
</form>
<script type="text/javascript">
	var tot=0;
	$("input").change(function(){
		
		$(this).prop( "checked", function( i, val ) {
			if(val)
			{
				if($(this).attr('type') == 'checkbox')
				{
					var newAmount = parseInt($(this).val());
					tot= (tot + newAmount);
					if($(this).attr('name') == 'vanity')
					{
						$('#vanity-fill').show();
					}
				}
			}
			else
			{
				if($(this).attr('type') == 'checkbox')
				{
					var newAmount =parseInt($(this).val());
					tot= (tot - newAmount);
					if($(this).attr('name') == 'vanity')
					{
						$('#vanity-fill').hide();
					}
				}
			}
			
		});
		$('#totalAmount').val(tot);
		});
	function CheckEventSelect()
   {
      var tl      =document.EventSelect.tmLeader.value;
      var phone   =$('#phone').val();
      var college =document.EventSelect.college.value;
      var age     =document.EventSelect.age.value;
      var gender  =document.EventSelect.gender.checked;
      var email   =document.EventSelect.email.value;
      var height  =document.EventSelect.candidateHeight.value;
      var vanity  =document.EventSelect.vanity.checked;
      alert(gender);
      return false;
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
      if(vanity)
      {
      	
         if(!age)
         {
             document.getElementById('err-age').innerHTML='Age is required';
              document.EventSelect.age.className="alert";
              document.EventSelect.age.focus();
            // alert('Age is required');
             return false;
         }
          else
          {
             document.getElementById('err-age').innerHTML='';
                document.EventSelect.age.className='';

          }
         if(!height)
         {
             document.getElementById('err-candidateHeight').innerHTML='Height is required';
              document.EventSelect.candidateHeight.className="alert";
              document.EventSelect.candidateHeight.focus();
            //alert('Height is required');
             return false;
         }
          else
          {
             document.getElementById('err-candidateHeight').innerHTML='';
                document.EventSelect.candidateHeight.className='';

          }
      if(gender)
         {
             alert(gender);
         	 document.getElementById('err-gender').innerHTML='';
              document.EventSelect.gender.className="";
              return true;
         }
         else
         {
         	
              document.getElementById('err-gender').innerHTML='Gender is required';
              document.EventSelect.gender.className="alert";
             alert(gender);
             return false;
         }
         
      }
      
   }

</script>
