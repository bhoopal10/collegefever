// JavaScript Document
//alert($( window ).width());

//$(".live-content").height($(".live-txt").height()); 
$(window).load(function(){
      $(".live-content").height($(".live-txt").height());   
   });

$(document).ready(function(){
   
   $("#prh1").click(function()
   {     
      $("#prh1 .plus").toggle();
      $("#prh1 .minus").toggle();
      $("#prc1").slideToggle();
   });
   
   $("#prh2").click(function()
   {     
      $("#prh2 .plus").toggle();
      $("#prh2 .minus").toggle();
      $("#prc2").slideToggle();
   });
   
   $("#prh3").click(function()
   {     
      $("#prh3 .plus").toggle();
      $("#prh3 .minus").toggle();
      $("#prc3").slideToggle();
   });
   
   $("#prh4").click(function()
   {     
      $("#prh4 .plus").toggle();
      $("#prh4 .minus").toggle();
      $("#prc4").slideToggle();
   });
   
   $("#prh5").click(function()
   {     
      $("#prh5 .plus").toggle();
      $("#prh5 .minus").toggle();
      $("#prc5").slideToggle();
   });
   
   $("#prh6").click(function()
   {     
      $("#prh6 .plus").toggle();
      $("#prh6 .minus").toggle();
      $("#prc6").slideToggle();
   });
                     
   $(".myevent-main .up").hide();
   $(".myevent-list a").click(function(){ 
      var mlid = $(this).attr('id');
      //alert(mlid);
      $("#"+mlid+"c").slideToggle('slow');
      $("#"+mlid+"dw").toggle();
      $("#"+mlid+"up").toggle();
   });
   
   $("#filter2").hide();
   $("#joinevdet").hide();
   $("#joinev").click(function()
   {
      $("#joinevdet").slideToggle();
      //$(window).scrollTop($('.join-tab').offset().top);
      $('html, body').animate({scrollTop:$('.join-tab').position().top}, 'slow');
   });
   $("#ftlink1").click(function()
   {     
      $("#filter2").hide();
      $("#filter1").show();
      $("#ftlink2").removeClass('sel');
      $("#ftlink1").addClass('sel');
   });
   $("#ftlink2").click(function()
   {     
      $("#filter1").hide();
      $("#filter2").show();
      $("#ftlink1").removeClass('sel');
      $("#ftlink2").addClass('sel');
   });
   
   $(".city-drop a").click(function()
   {
      $(".city-list").slideToggle();
   });
   $("#usr-det-link").click(function()
   {
      $(".udrop").slideToggle();
      $("#udet-down").toggle();
      $("#udet-up").toggle();
   });
   $("#cn-2-link").click(function()
   {     
      $("#add-cn-main").hide();
      $("#cn-form-2").slideDown();
   });
   $("#crl41").click(function()
   {     
      $("#cre42").hide();
      $("#cre41").show();
      $("#crl42").removeClass('sel');
      $("#crl41").addClass('sel');
      //$("#f4sel").val('1');
      $('input[name="f4sel"]').val("1");
   });
   $("#crl42").click(function()
   {     
      $("#cre41").hide();
      $("#cre42").show();
      $("#crl41").removeClass('sel');
      $("#crl42").addClass('sel');
      //$("#f4sel").val('2');
      $('input[name="f4sel"]').val("2");
   });
   
   //First get the  iframe URL
var url = $('#YourIFrameID').attr('src');
   
   $("#youtube-click-link").click(function(){
      $('#youtube-popup-main').css('top',$(document).scrollTop()+30);
      $("#youtube-popup-black-overlay").fadeIn("2000");
      $("#youtube-popup-main").fadeIn("4000");
      $('#YourIFrameID').attr('src', url);
   });
   
   $("#youtube-close-top").click(function(){
      $("#youtube-popup-black-overlay").fadeOut("2000");
      $("#youtube-popup-main").fadeOut("4000");
      $('#YourIFrameID').attr('src', '');
      //$('#YourIFrameID').attr('src', $('iframe').attr('src'));
   });
   $(".sctop").click(function(){
      $("html, body").animate({ scrollTop: 0 }, "slow");
   });
});

function showcrev(id)
{
   for(var i=1;i<=4;i++)
   {
      if(i!=id)
      {
         document.getElementById("#ercvf"+i).style.display='none';
         document.getElementById("#crev"+i).className='';
      }
      else
      {
         document.getElementById("#ercvf"+i).style.display='block';
         document.getElementById("#crev"+i).className='sel';
      }
      $(window).scrollTop($('.event-tab').offset().top);
   }
   
   
}

function PasLen(sText)
{
   var pasle=sText.length;
   len=false;
   if(pasle < 6)
   len=false;
   else
   len=true;
   return len;
}

function PasLen1(sText)
{
   var pasle=sText.length;
   len=false;
   if(pasle < 10)
   len=false;
   else
   len=true;
   return len;
}

function NoNumber1(sText)
{
   var ValidChars = "0123456789";
   var IsNumber=true;
   var Char;
   var c=0;
   for (i = 0; i < sText.length && IsNumber == true; i++)
      {
      Char = sText.charAt(i);
      if (ValidChars.indexOf(Char) >= 0)
         {
         c++;
   //  alert(ValidChars.indexOf(Char));
         }
      }    
     if(c == 0)
     {
     IsNumber=false;
     }
     else
     {
     IsNumber=true;
     }
   return IsNumber;
}

function NoChar1(sText)
{
   var ValidChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
   var IsChar=true;
   var Char;
   var c=0;
   for (i = 0; i < sText.length && IsChar == true; i++)
      {
      Char = sText.charAt(i);

      if (ValidChars.indexOf(Char) >= 0)
         {
         c++;
//     alert(ValidChars.indexOf(Char));
         }
      }    
     if(c == 0)
     {
     IsChar=false;
     }
     else
     {
     IsChar=true;
     }
   return IsChar;
}

function CheckRegister11() 
{
   
   if(document.RegSign.name.value=="")
   {
   document.getElementById('err1').innerHTML='Enter Name, please';
   document.RegSign.name.className = "alert";
   document.RegSign.name.focus();
   return false;
   }
   else
   {
   document.getElementById('err1').innerHTML='';
   document.RegSign.name.className=""; 
   }   
   
   if(document.RegSign.email.value=="")
   {
   document.getElementById('err2').innerHTML='Enter Email, please';
   document.RegSign.email.className = "alert";
   document.RegSign.email.focus();
   return false;
   }
   else
   {
   document.getElementById('err2').innerHTML='';
   document.RegSign.email.className="";   
   }  
   
   if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.RegSign.email.value))
   {
   document.getElementById('err2').innerHTML='';
   document.RegSign.email.className="";   
   }
   else
   {
   document.getElementById('err2').innerHTML='Invalid Email Address, please';
   document.RegSign.email.className = "alert";
   document.RegSign.email.focus();
   return false;
   }
   
   if(document.RegSign.college.value=="")
   {
   document.getElementById('err3').innerHTML='Enter College, please';
   document.RegSign.college.className = "alert";
   document.RegSign.college.focus();
   return false;
   }
   else
   {
   document.getElementById('err3').innerHTML='';
   document.RegSign.college.className=""; 
   }
   
   if(document.RegSign.city.value=="")
   {
   document.getElementById('err4').innerHTML='Enter City, please';
   document.RegSign.city.className = "alert";
   document.RegSign.city.focus();
   return false;
   }
   else
   {
   document.getElementById('err4').innerHTML='';
   document.RegSign.city.className=""; 
   }
   
   if(document.RegSign.degree.value=="")
   {
   document.getElementById('err5').innerHTML='Enter Degree, please';
   document.RegSign.degree.className = "alert";
   document.RegSign.degree.focus();
   return false;
   }
   else
   {
   document.getElementById('err5').innerHTML='';
   document.RegSign.degree.className="";  
   }
      
   if(document.RegSign.password.value=="")
   {
   document.getElementById('err6').innerHTML='Enter password, please';
   document.RegSign.password.className = "alert";
   document.RegSign.password.focus();
   return false;
   }
   else
   {
   document.getElementById('err6').innerHTML='';
   document.RegSign.password.className="";   
   }
   
   if (!PasLen(document.RegSign.password.value))
   {
   document.getElementById('err6').innerHTML='Password should contain atleast 6 characters';
   document.RegSign.password.className = "alert";
   document.RegSign.password.focus();
   document.RegSign.password.value="";
   return false;
   }
   else
   {
   document.getElementById('err6').innerHTML='';
   document.RegSign.password.className="";   
   }
   
   /*if (NoNumber1(document.RegSign.password.value) && NoChar1(document.RegSign.password.value))
   {
   document.getElementById('err6').innerHTML='';
   document.RegSign.password.className="";   
   }
   else
   {
   document.getElementById('err6').innerHTML='Password should be alphanumeric';
   document.RegSign.password.className = "alert";
   document.RegSign.password.focus();
   document.RegSign.password.value="";
   return false;
   }*/
   
   if(document.RegSign.cpassword.value != document.RegSign.password.value)
   {
   document.getElementById('err7').innerHTML='Password entered do not match, please!';
   document.RegSign.cpassword.className = "alert";
   document.RegSign.cpassword.focus();
   return false;
   }
   else
   {
   document.getElementById('err7').innerHTML='';
   document.RegSign.cpassword.className="";  
   }
   
   return true; 
}

function CheckCform() 
{
   
   if(document.RegSign.name.value=="")
   {
   document.getElementById('err1').innerHTML='Enter Name, please';
   document.RegSign.name.className = "alert";
   document.RegSign.name.focus();
   return false;
   }
   else
   {
   document.getElementById('err1').innerHTML='';
   document.RegSign.name.className=""; 
   }   
   
   if(document.RegSign.email.value=="")
   {
   document.getElementById('err2').innerHTML='Enter Email, please';
   document.RegSign.email.className = "alert";
   document.RegSign.email.focus();
   return false;
   }
   else
   {
   document.getElementById('err2').innerHTML='';
   document.RegSign.email.className="";   
   }  
   
   if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.RegSign.email.value))
   {
   document.getElementById('err2').innerHTML='';
   document.RegSign.email.className="";   
   }
   else
   {
   document.getElementById('err2').innerHTML='Invalid Email Address, please';
   document.RegSign.email.className = "alert";
   document.RegSign.email.focus();
   return false;
   }
   
   if(document.RegSign.phone.value=="")
   {
   document.getElementById('err3').innerHTML='Enter Phone Number, please';
   document.RegSign.phone.className = "alert";
   document.RegSign.phone.focus();
   return false;
   }
   else
   {
   document.getElementById('err3').innerHTML='';
   document.RegSign.phone.className="";   
   }
   
   if(document.RegSign.comments.value=="")
   {
   document.getElementById('err4').innerHTML='Enter Comment, please';
   document.RegSign.comments.className = "alert";
   document.RegSign.comments.focus();
   return false;
   }
   else
   {
   document.getElementById('err4').innerHTML='';
   document.RegSign.comments.className="";   
   }
   
   return true; 
}


function urlchk(sText)
{
   var ValidChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-";
   var IsChar=true;
   var Char;
   var c=0;
   for (i = 0; i < sText.length && IsChar == true; i++)
      {
      Char = sText.charAt(i);
      if (ValidChars.indexOf(Char) < 0)
         {
            c++;
         }
      }
    // alert(c);
     if(c == 0)
     {
      IsChar=true;
     }
     else
     {
      IsChar=false;
     }
   return IsChar;
}


    function getFileType(sValue)
    {
    var aParts = sValue.split( "/" );
    var iParts = aParts.length;
    if( iParts >= 1 )
    {
      var sFile = aParts[ iParts - 1 ];
      var aFile = sFile.split( "." );
      if( aFile.length == 2 )
      {
         sName = aFile[0];
         sExt = aFile[1];
         //alert("Filename is: "+sName+" extension is: "+sExt);
         return true;
      }
      else
      {
         //alert("Bad filespec; should have one dot between name and extension");
         return false;
      }
      }
      else
      {
         //alert("No file selected");
         return false;
      }
    }




function chkpin1(sText)
{
   var pasle=sText.length;
      
   if(pasle != 6)
   {
         return true;
   }
   else
   {
         return false;
   }
}

function chkpin2(sText)
{
   var ValidChars = "0123456789";
   var IsChar=true;
   var Char;
   var c=0;
   for (i = 0; i < sText.length; i++)
      {
      Char = sText.charAt(i);
      if (ValidChars.indexOf(Char) < 0)
         {
            c++;
         }
      }
    // alert(c);
     if(c == 0)
     {
         return false;
     }
     else
     {
         return true;
     }
      
}

function chkprice(sText)
{
   var ValidChars = "0123456789.";
   var IsChar=true;
   var Char;
   var c=0;
   for (i = 0; i < sText.length; i++)
      {
      Char = sText.charAt(i);
      if (ValidChars.indexOf(Char) < 0)
         {
            c++;
         }
      }
    // alert(c);
     if(c == 0)
     {
         return false;
     }
     else
     {
         return true;
     }
      
}

function CheckCr2() 
{
   //alert('check form 2');
   if(document.crevform.vname.value=="")
   {
   document.getElementById('err21').innerHTML='Enter Venue Name, please';
   document.crevform.vname.className = "alert";
   document.crevform.vname.focus();
   return false;
   }
   else
   {
   document.getElementById('err21').innerHTML='';
   document.crevform.vname.className="";  
   }
   
   if(document.crevform.vaddress1.value=="")
   {
   document.getElementById('err22').innerHTML='Enter Address, please';
   document.crevform.vaddress1.className = "alert";
   document.crevform.vaddress1.focus();
   return false;
   }
   else
   {
   document.getElementById('err22').innerHTML='';
   document.crevform.vaddress1.className=""; 
   }
   
   if(document.crevform.vstate.value=="")
   {
   document.getElementById('err23').innerHTML='Select State, please';
   document.crevform.vstate.className = "alert";
   document.crevform.vstate.focus();
   return false;
   }
   else
   {
   document.getElementById('err23').innerHTML='';
   document.crevform.vstate.className=""; 
   }
   
   if(document.crevform.vcity.value=="")
   {
   document.getElementById('err24').innerHTML='Select City, please';
   document.crevform.vcity.className = "alert";
   document.crevform.vcity.focus();
   return false;
   }
   else
   {
   document.getElementById('err24').innerHTML='';
   document.crevform.vcity.className="";  
   }
   
   /*if(document.crevform.vpincode.value=="")
   {
   document.getElementById('err25').innerHTML='Enter Pincode, please';
   document.crevform.vpincode.className = "alert";
   document.crevform.vpincode.focus();
   return false;
   }
   else
   {
   document.getElementById('err25').innerHTML='';
   document.crevform.vpincode.className="";  
   }

   if(chkpin1(document.crevform.vpincode.value) || chkpin2(document.crevform.vpincode.value))
   {
   document.getElementById('err25').innerHTML='Invalid Pincode, please re-enter';
   document.crevform.vpincode.className = "alert";
   document.crevform.vpincode.focus();
   return false;
   }
   else
   {
   document.getElementById('err25').innerHTML='';
   document.crevform.vpincode.className="";  
   }*/
   
   return true; 
}

function CheckCr3() 
{
   //alert('check form 3');
   if(document.crevform.oname1.value=="")
   {
   document.getElementById('err31').innerHTML='Enter Organiser Name, please';
   document.crevform.oname1.className = "alert";
   document.crevform.oname1.focus();
   return false;
   }
   else
   {
   document.getElementById('err31').innerHTML='';
   document.crevform.oname1.className=""; 
   }
   
   if(document.crevform.oemail1.value=="")
   {
   document.getElementById('err32').innerHTML='Enter Organiser Email, please';
   document.crevform.oemail1.className = "alert";
   document.crevform.oemail1.focus();
   return false;
   }
   else
   {
   document.getElementById('err32').innerHTML='';
   document.crevform.oemail1.className="";   
   }
   
   if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.crevform.oemail1.value))
   {
   document.getElementById('err32').innerHTML='';
   document.crevform.oemail1.className="";   
   }
   else
   {
   document.getElementById('err32').innerHTML='Invalid Email Address, please';
   document.crevform.oemail1.className = "alert";
   document.crevform.oemail1.focus();
   return false;
   }
   
   return true; 
}

function addmoreev()
{
   var evnt=parseInt(document.getElementById('noofev').value)+5;
   document.getElementById('noofev').value=evnt;
   getevents();
}
function addmoreev1()
{
   var evnt=parseInt(document.getElementById('noofev').value)+6;
   document.getElementById('noofev').value=evnt;
   getevents1();
}
function seletype(etype,eid)
{
   document.getElementById('etype').value=etype;
   for(var i=1;i<=6;i++)
   {
      document.getElementById('etli'+i).className="e"+i;
   }
   document.getElementById('etli'+eid).className="sel"+eid;
   getevents();
}
function seletype1(etype,eid)
{
   document.getElementById('etype').value=etype;
   for(var i=1;i<=6;i++)
   {
      document.getElementById('etli'+i).className="e"+i;
   }
   document.getElementById('etli'+eid).className="sel"+eid;
   getevents1();
}
function selecity(ecity)
{
   document.getElementById('ecity').value=ecity;
   document.getElementById('citysel').innerHTML='- '+ecity;
   document.getElementById('city-list').style.display='none';
   getevents();
}
function seledates(esdate,eedate,eid)
{
   document.getElementById('esdate').value=esdate;
   document.getElementById('eedate').value=eedate;
   for(var i=1;i<=7;i++)
   {
      document.getElementById('ed'+i).className="";
   }
   document.getElementById('ed'+eid).className="sel";
   getevents();
}
function selcdates(esdate,eedate,eid)
{
   document.getElementById('esdate').value=esdate;
   document.getElementById('eedate').value=eedate;
   for(var i=1;i<=7;i++)
   {
      document.getElementById('ec'+i).className="f-cell";
   }
   document.getElementById('ec'+eid).className="f-cell sel";
   getevents();
}
function getevents()
{
   if(document.getElementById('scrollto').value==1)
   {
      $('html, body').animate({scrollTop:$('#loadevents').position().top}, 'slow');
   }
var xmlhttp;    
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
   xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("loadevents").innerHTML=xmlhttp.responseText;
   document.getElementById('scrollto').value=1;
    }
  else
  {
   document.getElementById("loadevents").innerHTML='<p align="center"><img src="images/loading2.gif"></p><h1 align="center">Loading Events</h1>';
  }   
  }
var qwe11="getevents.php?noofev="+document.getElementById('noofev').value+"&etype="+document.getElementById('etype').value+"&ecity="+document.getElementById('ecity').value+"&esdate="+document.getElementById('esdate').value+"&eedate="+document.getElementById('eedate').value;
xmlhttp.open("GET",qwe11,true);
xmlhttp.send();
}

function getevents1()
{
   if(document.getElementById('scrollto').value==1)
   {
      $('html, body').animate({scrollTop:$('#loadevents1').position().top}, 'slow');
   }
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
   xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("loadevents1").innerHTML=xmlhttp.responseText;
   document.getElementById('scrollto').value=1;
    }
  else
  {
   document.getElementById("loadevents1").innerHTML='<p align="center"><img src="images/loading2.gif"></p><h1 align="center">Loading Events</h1>';
  }   
  }
var qwe11="getevents1.php?noofev="+document.getElementById('noofev').value+"&etype="+document.getElementById('etype').value+"&srname="+document.getElementById('srname').value+"&srcity="+document.getElementById('srcity').value+"&srfrom="+document.getElementById('srfrom').value+"&srto="+document.getElementById('srto').value;
xmlhttp.open("GET",qwe11,true);
xmlhttp.send();
}

function getdates(dno)
{
var xmlhttp;    
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
   xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("loaddates").innerHTML=xmlhttp.responseText;
    }
  else
  {
   document.getElementById("loaddates").innerHTML='<div class="f-cell red">Loading<br><span class="small-txt">Dates</span></div>';
  }   
  }
var qwe11="getdate.php?dno="+dno;
xmlhttp.open("GET",qwe11,true);
xmlhttp.send();
}
function calprice(tid,tno)
{
   //alert(document.getElementById('tprc'+tid).value);
   var ticp=parseInt((parseInt(document.getElementById('tprc'+tid).value))*(parseInt(document.getElementById('tcount'+tid).value)));
   document.getElementById('tprice1'+tid).innerHTML=ticp;
   document.getElementById('tval'+tid).value=ticp;
   var tfinal=0;
   var tfinalc=0;
   for(var j=1; j<=tno; j++)
   {
      tfinal=tfinal+parseInt(document.getElementById('tval'+j).value);
      tfinalc=tfinalc+parseInt(document.getElementById('tcount'+j).value);
   }
   document.getElementById('tprice2').innerHTML=tfinal;
   document.getElementById('tlprice').value=tfinal;
   document.getElementById('tlcount').value=tfinalc;
   //alert(document.getElementById('tlcount').value);
}
function chkttlpr()
{
   if((document.getElementById('tlprice').value=="")||(document.getElementById('tlprice').value=="0"))
   {
      document.getElementById('err-price').innerHTML='<p class="red-txt"><strong>You have not selected any ticket to proceed to payment</strong></p>';
      return false;
   }
   else
   {
      return true;
   }
}
/*Modified*/
function CheckEJform()
{
   if((document.getElementById('tlprice').value=="")||(document.getElementById('tlprice').value=="0"))
   {
      document.getElementById('err-price').innerHTML='<p class="red-txt"><strong>You have not selected any ticket to proceed to payment</strong></p>';
      return false;
   }
   if(document.Event_join.e_name.value=='')
   {
      document.getElementById('e_name_err').innerHTML='Enter Name';
      document.Event_join.e_name.className="alert";
      document.Event_join.e_name.focus();
      return false;
   }
   else
   {
      document.getElementById('e_name_err').innerHTML='';
      document.Event_join.e_name.className='';
   }
   if(document.Event_join.e_father_name.value=='')
   {
      document.getElementById('e_father_name_err').innerHTML='Enter Father Name';
      document.Event_join.e_father_name.className="alert";
      document.Event_join.e_father_name.focus();
      return false;
   }
   else
   {
      document.getElementById('e_father_name_err').innerHTML='';
      document.Event_join.e_father_name.className='';
   }
   if(document.Event_join.e_dob.value=='')
   {
      document.getElementById('e_dob_err').innerHTML='Enter date of birth';
      document.Event_join.e_dob.className="alert";
      document.Event_join.e_dob.focus();
      return false;
   }
   else
   {

      document.getElementById('e_dob_err').innerHTML='';
      document.Event_join.e_dob.className='';
   }
   if(document.Event_join.e_class.value=='')
   {
      document.getElementById('e_class_err').innerHTML='Enter Class';
      document.Event_join.e_class.className="alert";
      document.Event_join.e_class.focus();
      return false;
   }
   else
   {
      document.getElementById('e_class_err').innerHTML='';
      document.Event_join.e_class.className='';
   }
   if(document.Event_join.e_school.value=='')
   {
      document.getElementById('e_school_err').innerHTML='Enter School';
      document.Event_join.e_school.className="alert";
      document.Event_join.e_school.focus();
      return false;
   }
   else
   {
      document.getElementById('e_school_err').innerHTML='';
      document.Event_join.e_school.className='';
   }
   if(document.Event_join.e_city.value=='')
   {
      document.getElementById('e_city_err').innerHTML='Enter City';
      document.Event_join.e_city.className="alert";
      document.Event_join.e_city.focus();
      return false;
   }
   else
   {
      document.getElementById('e_city_err').innerHTML='';
      document.Event_join.e_city.className='';
   }
    if(document.Event_join.e_mobile.value=='')
   {
      document.getElementById('e_mobile_err').innerHTML='Enter Mobile';
      document.Event_join.e_mobile.className="alert";
      document.Event_join.e_mobile.focus();
      return false;
   }
   else
   {
      document.getElementById('e_mobile_err').innerHTML='';
      document.Event_join.e_mobile.className='';
   }
   if(document.Event_join.e_email.value=='')
   {
      document.getElementById('e_email_err').innerHTML='Enter Email-Id';
      document.Event_join.e_email.className="alert";
      document.Event_join.e_email.focus();
      return false;
   }
   else
   {
      document.getElementById('e_email_err').innerHTML='';
      document.Event_join.e_email.className='';
   }
    if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.Event_join.e_email.value))
   {
   document.getElementById('e_email_err').innerHTML='';
   document.Event_join.e_email.className='';  
   }
   else
   {
   document.getElementById('e_email_err').innerHTML='Invalid Email Address, please';
   document.Event_join.e_email.className = "alert";
   document.Event_join.e_email.focus();
   return false;
   }
    
  
}
/*end modified*/
function confrimfunc(url)
{
var x;
var r=confirm("Confirm Registration Cancellation?");
if (r==true)
  {
   location.replace(url);
  }
else
  {
   //x="You pressed Cancel!";
  }
//document.getElementById("demo").innerHTML=x;
}

function CheckEMF() 
{
   if(document.emform.emsubject.value=="")
   {
   document.getElementById('err1').innerHTML='Enter Subject, please';
   document.emform.emsubject.className = "alert";
   document.emform.emsubject.focus();
   return false;
   }
   else
   {
   document.getElementById('err1').innerHTML='';
   document.emform.name.className="";  
   }  
   
   if(tinyMCE.get('emcontent').getContent()=="")
   {
   document.getElementById('err2').innerHTML='Enter Content, please';
   document.emform.emcontent.className = "alert";
   document.emform.emcontent.focus();
   return false;
   }
   else
   {
   document.getElementById('err2').innerHTML='';
   document.emform.emcontent.className="";   
   }
   
   return true; 
}

function dydiff()
{
var minutes = 1000*60;
var hours = minutes*60;
var days = hours*24;

var foo_date1 = getDateFromFormat(document.getElementById('cindate').value, "M/d/y");
var foo_date2 = getDateFromFormat(document.getElementById('coutdate').value, "M/d/y");

var diff_date = Math.round((foo_date2 - foo_date1)/days);
//alert(diff_date);
document.getElementById('dysldiff').value=diff_date;
}
function getcindate()
{
document.getElementById('coutdate').value=document.getElementById('cindate').value;
}
function CompareDates()
{ 
var str1 = document.getElementById("sdate").value; 
var str2 = document.getElementById("edate").value; 
var mon1  = parseInt(str1.substring(0,2),10); 
var dt1 = parseInt(str1.substring(3,5),10); 
var yr1  = parseInt(str1.substring(6,10),10); 
var mon2  = parseInt(str2.substring(0,2),10); 
var dt2 = parseInt(str2.substring(3,5),10); 
var yr2  = parseInt(str2.substring(6,10),10); 
var date1 = new Date(yr1, mon1, dt1); 
var date2 = new Date(yr2, mon2, dt2); 

if(date2 < date1) 
{ 
    //alert("To date cannot be greater than from date"); 
    return false; 
} 
else
{
   return true; 
}
} 
function CompareDates1()
{ 
var str1 = document.getElementById("slsdate").value; 
var str2 = document.getElementById("sledate").value; 
var mon1  = parseInt(str1.substring(0,2),10); 
var dt1 = parseInt(str1.substring(3,5),10); 
var yr1  = parseInt(str1.substring(6,10),10); 
var mon2  = parseInt(str2.substring(0,2),10); 
var dt2 = parseInt(str2.substring(3,5),10); 
var yr2  = parseInt(str2.substring(6,10),10); 
var date1 = new Date(yr1, mon1, dt1); 
var date2 = new Date(yr2, mon2, dt2); 

if(date2 < date1) 
{ 
    //alert("To date cannot be greater than from date"); 
    return false; 
} 
else
{
   return true; 
}
} 


function CompareDates12(s1,s2)
{ 
var str1 = s1; 
var str2 = s2; 
var mon1  = parseInt(str1.substring(0,2),10); 
var dt1 = parseInt(str1.substring(3,5),10); 
var yr1  = parseInt(str1.substring(6,10),10); 
var mon2  = parseInt(str2.substring(0,2),10); 
var dt2 = parseInt(str2.substring(3,5),10); 
var yr2  = parseInt(str2.substring(6,10),10); 
var date1 = new Date(yr1, mon1, dt1); 
var date2 = new Date(yr2, mon2, dt2); 
//alert(s1);
//alert(s2);
if(date2 < date1) 
{ 
    //alert("To date cannot be greater than from date"); 
    return false; 
} 
else
{
   return true; 
}
} 


function tcount()
{
   var tc;
   for(tc=1;tc<=5;tc++)
   {
      document.getElementById('ticdiv'+tc).style.display='none';
   }
   for(tc=1;tc<=document.getElementById('ticketno').value;tc++)
   {
      document.getElementById('ticdiv'+tc).style.display='block';
   }
}
