<?php
session_start();
require ("fileupload-class.php");
include("AES_4.class.php");
include("aes_key.php");
error_reporting(0);
$aes = new AES($z);
require ("sql.php");	

if($_REQUEST['id']!="")
{
$_SESSION['hmedid']=$_REQUEST['id'];
}

if($_SESSION['pmadminid']=="")
{		 
echo "<script>location.replace('adminlogin.php');</script>";
}

if($_REQUEST['task']!="")
{
$_SESSION['rsvtask']=$_REQUEST['task'];
}

$task = $_SESSION['rsvtask'];
$getevdet=mysql_fetch_object(mysql_query("select * from event where id='".$_SESSION['hmedid']."'"));	
if($task == "edit")
{
		$sql ="select * from event where id = ".$_SESSION['hmedid'];
		$result = mysql_query($sql);
		$ged2 = mysql_fetch_object($result);
		$_SESSION['rsvevpic1']=$ged2->pic1;
		$_SESSION['rsvevpic2']=$ged2->pic2;
		$_SESSION['rsvemail']=$ged2->email;
		$legend = "Edit Details";
		$btnval = "Save";
}
else
{
		$legend = "Add New Content";
		$btnval = "Add";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="calendarDateInput.js"></script>
<script type="text/javascript">
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
function gethmdetl1()
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
    document.getElementById("txtCar").innerHTML=xmlhttp.responseText;
    }
  else
  {
  	document.getElementById("txtCar").innerHTML='Loading City';
  }	
  }
var qwe11="getcity.php?state="+document.getElementById('vstate').value;
xmlhttp.open("GET",qwe11,true);
xmlhttp.send();
}
</script>
<style>
h3
{
	font-size:14px; margin:0px; padding:0px;
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>::: College Fever - Admin :::</title>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
function CheckRegister() 
{
   if(document.RegForm.name.value=="")
   {
      alert('Enter Name, please!');
      document.RegForm.name.focus();
      return false;
   }
   if(document.RegForm.email.value=="")
   {
	  alert('Enter Email Id, please!');
      document.RegForm.email.focus();
      return false;
   }
   if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.RegForm.email.value))
   {
   }
   else
   {
   alert("Invalid E-mail Address! Please re-enter.");
   document.RegForm.email.focus();
   return false;
   }   
   if(document.RegForm.phone.value=="")
   {
	alert("Please enter your Phone Number");
    document.RegForm.phone.focus();
	return false;
   }
   if(document.RegForm.username.value=="")
   {
	alert("Please enter your Username");
    document.RegForm.username.focus();
	return false;
   }
   if(document.RegForm.password.value=="")
   {
    alert('Enter Password, please!');
    document.RegForm.password.focus();
    return false;
   }   
   if (!PasLen(document.RegForm.password.value))
   {
        alert("Password should contain atleast 6 characters");
       document.RegForm.password.focus();
       document.RegForm.password.value="";
        return false;
   }
   if(document.RegForm.cpassword.value=="")
   {
      alert('Enter Confirm Password, please!');
      document.RegForm.cpassword.focus();
      return false;
   }
   if(document.RegForm.cpassword.value != document.RegForm.password.value)
   {
      alert('Passwords entered dont match, please re-enter!');
      document.RegForm.cpassword.focus();
	  document.RegForm.cpassword.value="";
      return false;
   }
	 return true; 
}

function IsNumeric(sText)
{

   var ValidChars = "0123456789.-\/";
   var IsNumber=true;
   var Char;
   for (i = 0; i < sText.length && IsNumber == true; i++)

      {

      Char = sText.charAt(i);

      if (ValidChars.indexOf(Char) == -1)

         {

         IsNumber = false;

         }

      }

   return IsNumber;

}

function NoNumber(sText)

{

   var ValidChars = "0123456789.-\/";

   var IsNumber=true;

   var Char;
   
   var c=0;

   for (i = 0; i < sText.length && IsNumber == true; i++)

      {

      Char = sText.charAt(i);

      if (ValidChars.indexOf(Char) == 1)
         {
         c++;
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


function NoChar(sText)

{

   var ValidChars = "abcdedfghijklmnopqrstuvwxyz/";

   var IsNumber=true;

   var Char;
   
   var c=0;

   for (i = 0; i < sText.length && IsNumber == true; i++)

      {

      Char = sText.charAt(i);

      if (ValidChars.indexOf(Char) == 1)
         {
         c++;
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
   else if(pasle > 10)
   len=false;
   else
   len=true;
   return len;
}

</script>
<LINK href="css/general.css" type=text/css rel=stylesheet>
<LINK href="css/layout.css" type=text/css rel=stylesheet>
<link href="css/content.css" rel="stylesheet" type="text/css" />
<link href="css/word.css" rel="stylesheet" type="text/css" />

<!-- TinyMCE -->
<script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "simple",
		plugins : "pagebreak,style,layer,table,save",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		
		
		
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<script type="text/javascript">
function chasta()
{
document.getElementById('subid1').innerHTML = document.form11.state.value;
if(document.form11.state.value=="")
{
document.getElementById('subid1').innerHTML = 'Select a state';
}
<?php
$selt="select * from state order by state asc ";
$selt1=mysql_query($selt);
while($selt2=mysql_fetch_object($selt1))
{
?>
if(document.form11.state.value=="<?php echo $selt2->state; ?>")
{
document.getElementById('subid1').innerHTML = "<select name='suburb'><?php
$selcat="select * from suburb where state='".$selt2->state."' order by suburb asc";
$selcat1=mysql_query($selcat);
while($selcat2=mysql_fetch_object($selcat1))
{
if($selcat2->suburb == $ged2->suburb)
{
echo "<option value='".$selcat2->suburb."' selected='selected'>".$selcat2->suburb."</option>";
}
else
{
echo "<option value='".$selcat2->suburb."'>".$selcat2->suburb."</option>";
}
}
?></select>";
}
<?php
}
?>
}
</script>
<!-- /TinyMCE -->
</head>
<body onLoad="chacat();chasta();">
<table cellSpacing=0 cellPadding=0 width="100%" border=0 >
  <tr>
    <td><?php include("top.php");?>
    </td>
  </tr>
  <tr>
    <td><table border="0" cellpadding="0" cellspacing="0" width="100%" height="450px">
        <tr>
          <td width="15%" class="admintr" align="left"><?php include("leftmenu.php");?>
          </td>
          <td width="80%" align="center"><br />
            <br />
            <table border="0" cellpadding="0" cellspacing="0" width="95%">
              <tr align="center">
                <td><fieldset>
                  <h2 align="left"><span style="padding-left:20px;">Event</span></h2>
                  <legend><?php echo $legend;?></legend>
				  <table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">
                      <tr></tr>
                      <tr>
                        <td bgcolor="#FFFFFF"><form method="post" action="event.php"  enctype="multipart/form-data" name="crevform" id="crevform" onSubmit="return CheckRegister();">
                          <table width="100%" border="0" cellpadding="3" cellspacing="3" style="padding-left:5px">

                            <tr>
                              <td width="100%"><table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#CCCCCC">
                                <tr>
                                  <td width="25%" bgcolor="#FFFFFF"><span class="first">Event Name <span class="red-txt">*</span></span></td>
                                  <td width="25%" bgcolor="#FFFFFF"><span class="second">
                                    <input name="name" type="text" id="name" value="<?php  echo $getevdet->name; ?>" />
                                  </span></td>
                                  <td width="25%" bgcolor="#FFFFFF"><span class="first">Event Category <span class="red-txt">*<span class="second">
                                    <?php
		  $catarr=array();
		  $getcat=mysql_query("select * from category order by id asc");
		  while($getcat1=mysql_fetch_object($getcat))
		  {
		  	array_push($catarr,''.$getcat1->name.' Events');
		  }
		  	//$catarr=array('Cultural Events','Technical Events','Management Events','Sporting Events','Fun and Other Events');
		  ?>
                                  </span></span></span></td>
                                  <td width="25%" bgcolor="#FFFFFF"><span class="second">
                                    <select name="category" id="category">
                                      <option value="">Select Category</option>
                                      <?php
				for($i=0;$i<sizeof($catarr);$i++)
				{
					if($catarr[$i]==$getevdet->category)
					{
						?>
                                      <option value="<?php echo $catarr[$i]; ?>" selected="selected"><?php echo $catarr[$i]; ?></option>
                                      <?php
					}
					else
					{
						?>
                                      <option value="<?php echo $catarr[$i]; ?>"><?php echo $catarr[$i]; ?></option>
                                      <?php
					}
				} 
			?>
                                    </select>
                                  </span></td>
                                </tr>
                                <tr>
                                  <td bgcolor="#FFFFFF"><span class="first">Event URL <span class="red-txt">*</span></span></td>
                                  <td colspan="3" bgcolor="#FFFFFF"><span class="in1">http://www.thecollegefever.com/&nbsp;&nbsp;</span><span class="in2">
                                    <input name="url" type="text" id="url" placeholder="only alphabets, numbers and &lsquo;-&rsquo; allowed" value="<?php  echo $getevdet->url; ?>" />
                                  </span><span class="in50">                                    </td>
                                  </tr>
                                <tr>
                                  <td bgcolor="#FFFFFF"><span class="in25 txt-right"><span class="start-time">Start Time <span class="red-txt">*</span></span></span></td>
                                  <td bgcolor="#FFFFFF"><div class="seltime">
                                          <?php $starr=explode(':',$getevdet->stime) ?>
                                          <select name="stime1" id="stime1">
                                            <option value="">HH</option>
                                            <?php
										for($i=0;$i<=23;$i++)
										{
											if($i<10)
											{
												$ival='0'.$i.'';
											}
											else
											{
												$ival=$i;
											}
											if($ival==$starr[0])
											{
												?>
                                            <option value="<?php echo $ival; ?>" selected="selected"><?php echo $ival; ?></option>
                                            <?php
											}
											else
											{
												?>
                                            <option value="<?php echo $ival; ?>"><?php echo $ival; ?></option>
                                            <?php
											}	
										} 
										?>
                                          </select>
                                          &nbsp;-&nbsp;
                                          <select name="stime2" id="stime2">
                                            <option value="">MM</option>
                                            <?php
										for($i=0;$i<=55;$i=$i+5)
										{
											if($i<10)
											{
												$ival='0'.$i.'';
											}
											else
											{
												$ival=$i;
											}
											if($ival==$starr[1])
											{
												?>
                                            <option value="<?php echo $ival; ?>" selected="selected"><?php echo $ival; ?></option>
                                            <?php
											}
											else
											{
												?>
                                            <option value="<?php echo $ival; ?>"><?php echo $ival; ?></option>
                                            <?php
											}
										} 
										?>
                                          </select>
                                        </div></td>
                                  <td bgcolor="#FFFFFF"><span class="first">Start Date <span class="red-txt">*</span></span></td>
                                  <td bgcolor="#FFFFFF">
								  <script>DateInput('sdate', true, 'YYYY-MM-DD', '<?php echo $getevdet->sdate; ?>')</script>								  </td>
                                </tr>
                                <tr>
                                  <td bgcolor="#FFFFFF"><span class="in25 txt-right"><span class="start-time">End Time <span class="red-txt">*</span></span></span></td>
                                  <td bgcolor="#FFFFFF"><div class="seltime">
                                          <?php $etarr=explode(':',$getevdet->etime) ?>
                                          <select name="etime1" id="etime1">
                                            <option value="">HH</option>
                                            <?php
										for($i=0;$i<=23;$i++)
										{
											if($i<10)
											{
												$ival='0'.$i.'';
											}
											else
											{
												$ival=$i;
											}
											if($ival==$etarr[0])
											{
												?>
                                            <option value="<?php echo $ival; ?>" selected="selected"><?php echo $ival; ?></option>
                                            <?php
											}
											else
											{
												?>
                                            <option value="<?php echo $ival; ?>"><?php echo $ival; ?></option>
                                            <?php
											}
										} 
										?>
                                          </select>
                                          &nbsp;-&nbsp;
                                          <select name="etime2" id="select2">
                                            <option value="">MM</option>
                                            <?php
										for($i=0;$i<=55;$i=$i+5)
										{
											if($i<10)
											{
												$ival='0'.$i.'';
											}
											else
											{
												$ival=$i;
											}
											if($ival==$etarr[1])
											{
												?>
                                            <option value="<?php echo $ival; ?>" selected="selected"><?php echo $ival; ?></option>
                                            <?php
											}
											else
											{
												?>
                                            <option value="<?php echo $ival; ?>"><?php echo $ival; ?></option>
                                            <?php
											}
										} 
										?>
                                          </select>
                                          <div class="err-txt" id="err7"></div>
                                        </div></td>
                                  <td bgcolor="#FFFFFF"><span class="first">End Date <span class="red-txt">*</span></span></td>
                                  <td bgcolor="#FFFFFF"><script>DateInput('edate', true, 'YYYY-MM-DD', '<?php echo $getevdet->edate; ?>')</script>                             </td>
                                </tr>
                                <tr>
                                  <td bgcolor="#FFFFFF"><span class="first v-top">Event Description <span class="red-txt">*</span></span></td>
                                  <td colspan="3" bgcolor="#FFFFFF"><textarea name="description" cols="100" rows="20" class="width100" id="description" placeholder="Enter event details like agenda, sub events, speakers, etc."><?php  echo $getevdet->description; ?>
                              </textarea></td>
                                  </tr>
                                <tr>
                                  <td bgcolor="#FFFFFF"><span class="first v-top">Banner Image <span class="red-txt">*</span></span></td>
                                  <td bgcolor="#FFFFFF"><span class="second">
                                    <input name="pic" type="file" class="imgfield" id="pic" />
                                  </span></td>
                                  <td bgcolor="#FFFFFF"><span class="first v-top">Thumbnail Image <span class="red-txt">*</span></span></td>
                                  <td bgcolor="#FFFFFF"><span class="second">
                                    <input name="pic1" type="file" class="imgfield" id="pic1" />
                                  </span></td>
                                </tr>
                                <tr>
                                  <td colspan="4" bgcolor="#CCCCCC"><h3><strong>Venue Details</strong> </h3></td>
                                  </tr>
                                <tr>
                                  <td bgcolor="#FFFFFF"><span class="first">Venue Name <span class="red-txt">*</span></span></td>
                                  <td bgcolor="#FFFFFF"><span class="second">
                                    <input name="vname" type="text" class="width100" id="vname" value="<?php  echo $getevdet->vname; ?>" />
                                  </span></td>
                                  <td bgcolor="#FFFFFF"><span class="first">Address Line 1 <span class="red-txt">*</span></span></td>
                                  <td bgcolor="#FFFFFF"><span class="second">
                                    <input name="vaddress1" type="text" class="width100" id="vaddress1" value="<?php  echo $getevdet->vaddress1; ?>" />
                                  </span></td>
                                </tr>
                                <tr>
                                  <td bgcolor="#FFFFFF"><span class="first">Address Line 2</span></td>
                                  <td bgcolor="#FFFFFF"><span class="second">
                                    <input name="vaddress2" type="text" class="width100" id="vaddress2" value="<?php  echo $getevdet->vaddress2; ?>" />
                                  </span></td>
                                  <td bgcolor="#FFFFFF"><span class="first">Country <span class="red-txt">*</span></span></td>
                                  <td bgcolor="#FFFFFF"><span class="in50">
                                    <select name="vcountry" class="width100" id="vcountry">
                                      <option value="India">India</option>
                                    </select>
                                  </span></td>
                                </tr>
                                <tr>
                                  <td bgcolor="#FFFFFF"><span class="in25 txt-right"><span class="start-time">Pincode <span class="red-txt">*</span></span></span></td>
                                  <td bgcolor="#FFFFFF"><span class="in25">
                                    <input name="vpincode" type="text" class="width100" id="vpincode" value="<?php  echo $getevdet->vpincode; ?>" />
                                  </span></td>
                                  <td bgcolor="#FFFFFF"><span class="first">State <span class="red-txt">*</span></span></td>
                                  <td bgcolor="#FFFFFF"><span class="in50">
                                    <select name="vstate" class="width100" id="vstate" onchange="gethmdetl1();">
                                      <option value="">Select State</option>
                                      <?php
					$getst=mysql_query("select * from statei order by name asc");
					while($getst1=mysql_fetch_object($getst))
					{
						if($getst1->name==$getevdet->vstate)
						{
							?>
                                      <option value="<?php echo $getst1->name; ?>" selected="selected"><?php echo $getst1->name; ?></option>
                                      <?php
						}
						else
						{
							?>
                                      <option value="<?php echo $getst1->name; ?>"><?php echo $getst1->name; ?></option>
                                      <?php
						}
					}
					?>
                                    </select>
                                  </span></td>
                                </tr>
                                <tr>
                                  <td bgcolor="#FFFFFF"><span class="first">City <span class="red-txt">*</span></span></td>
                                  <td bgcolor="#FFFFFF"><div id="txtCar">
                                    <select name="vcity" id="vcity">
                                      <option value="">Select City</option>
                                      <?php
									$getcn=mysql_query("select * from city where state='".$getevdet->vstate."' order by name asc");
									while($getcn1=mysql_fetch_object($getcn))
									{
										if($getcn1->name==$getevdet->vcity)
										{
											echo '<option value="'.$getcn1->name.'" selected="selected">'.$getcn1->name.'</option>';
										}
										else
										{
											echo '<option value="'.$getcn1->name.'">'.$getcn1->name.'</option>';
										}
									}
									?>
                                    </select>
                                  </div></td>
                                  <td bgcolor="#FFFFFF">&nbsp;</td>
                                  <td bgcolor="#FFFFFF">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td colspan="4" bgcolor="#CCCCCC"><h3><strong>Contact Details</strong> </h3></td>
                                  </tr>
                                <tr>
                                  <td bgcolor="#FFFFFF"><span class="first">Organiser Name <span class="red-txt">*</span></span></td>
                                  <td bgcolor="#FFFFFF"><span class="second">
                                    <input name="oname1" type="text" class="width100" id="oname1" value="<?php  echo $getevdet->oname1; ?>" />
                                  </span></td>
                                  <td bgcolor="#FFFFFF"><span class="first">Organiser Email <span class="red-txt">*</span></span></td>
                                  <td bgcolor="#FFFFFF"><span class="second">
                                    <input name="oemail1" type="text" class="width100" id="oemail1" value="<?php  echo $getevdet->oemail1; ?>" />
                                  </span></td>
                                </tr>
                                <tr>
                                  <td bgcolor="#FFFFFF"><span class="first">Organiser Phone </span></td>
                                  <td bgcolor="#FFFFFF"><span class="second">
                                    <input name="ophone1" type="text" class="width100" id="ophone1" value="<?php  echo $getevdet->ophone1; ?>" />
                                  </span></td>
                                  <td bgcolor="#FFFFFF">&nbsp;</td>
                                  <td bgcolor="#FFFFFF">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td colspan="4" bgcolor="#CCCCCC"><h3><strong>Contact 2 </strong></h3></td>
                                  </tr>
                                <tr>
                                  <td bgcolor="#FFFFFF"><span class="first">Organiser Name</span></td>
                                  <td bgcolor="#FFFFFF"><span class="second">
                                    <input name="oname2" type="text" class="width100" id="oname2" value="<?php  echo $getevdet->oname2; ?>" />
                                  </span></td>
                                  <td bgcolor="#FFFFFF"><span class="first">Organiser Email</span></td>
                                  <td bgcolor="#FFFFFF"><span class="second">
                                    <input name="oemail2" type="text" class="width100" id="oemail2" value="<?php  echo $getevdet->oemail2; ?>" />
                                  </span></td>
                                </tr>
                                <tr>
                                  <td bgcolor="#FFFFFF"><span class="first">Organiser Phone </span></td>
                                  <td bgcolor="#FFFFFF"><span class="second">
                                    <input name="ophone2" type="text" class="width100" id="ophone2" value="<?php  echo $getevdet->ophone2; ?>" />
                                  </span></td>
                                  <td bgcolor="#FFFFFF">&nbsp;</td>
                                  <td bgcolor="#FFFFFF">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td colspan="4" bgcolor="#CCCCCC"><h3><strong>Social Links</strong> </h3></td>
                                  </tr>
                                <tr>
                                  <td bgcolor="#FFFFFF"><span class="first">Event Website URL</span></td>
                                  <td bgcolor="#FFFFFF"><span class="second">
                                    <input name="ewebsite" type="text" class="width100" id="ewebsite" value="<?php  echo $getevdet->ewebsite; ?>" />
                                  </span></td>
                                  <td bgcolor="#FFFFFF"><span class="first">Event Facebook Page</span></td>
                                  <td bgcolor="#FFFFFF"><span class="second">
                                    <input name="efacebook" type="text" class="width100" id="efacebook" value="<?php  echo $getevdet->efacebook; ?>" />
                                  </span></td>
                                </tr>
                                <tr>
                                  <td bgcolor="#FFFFFF"><span class="first">Event Twitter Handle</span></td>
                                  <td bgcolor="#FFFFFF"><span class="second">
                                    <input name="etwitter" type="text" class="width100" id="etwitter" value="<?php  echo $getevdet->etwitter; ?>" />
                                  </span></td>
                                  <td bgcolor="#FFFFFF"><span class="first">Event Google+ Page</span></td>
                                  <td bgcolor="#FFFFFF"><span class="second">
                                    <input name="egoogle" type="text" class="width100" id="egoogle" value="<?php  echo $getevdet->egoogle; ?>" />
                                  </span></td>
                                </tr>
								<?php  if($getevdet->evtype!='Free') { ?>
								<?php } ?>
                                <tr>
                                  <td colspan="4" bgcolor="#CCCCCC"><h3>Event View Details </h3></td>
                                  </tr>
                                <tr>
                                  <td bgcolor="#FFFFFF">Publish</td>
                                  <td bgcolor="#FFFFFF"><select name="publish" id="publish">
                                    <option value="Yes" <?php if($getevdet->publish=='Yes') { echo 'selected="selected"'; } ?> >Yes</option>
                                    <option value="No" <?php if($getevdet->publish=='No') { echo 'selected="selected"'; } ?>>No</option>
                                  </select></td>
                                  <td bgcolor="#FFFFFF">Priority</td>
                                  <td bgcolor="#FFFFFF"><select name="priority" id="priority">
								  <?php 
								  	for($i=1;$i<=10;$i++) 
									{
										if($i==$getevdet->priority)
										{
											?><option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option><?php
										}
										else
										{
											?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php
										}  
								  } 
								  ?>
                                  </select></td>
                                </tr>
                                <tr>
                                  <td colspan="4" bgcolor="#CCCCCC"><h3>Ticket Sale Details </h3></td>
                                </tr>
                                <tr>
                                  <td bgcolor="#FFFFFF"><span class="first">Sale Start Date <span class="red-txt">*</span> </span></td>
                                  <td bgcolor="#FFFFFF"><script>DateInput('slsdate', true, 'YYYY-MM-DD', '<?php echo $getevdet->slsdate; ?>')</script></td>
                                  <td bgcolor="#FFFFFF"><span class="first">Sale End Date<span class="red-txt"> *</span> </span></td>
                                  <td bgcolor="#FFFFFF"><script>DateInput('sledate', true, 'YYYY-MM-DD', '<?php echo $getevdet->sledate; ?>')</script>                                  </td>
                                </tr>
                                <tr>
                                  <td bgcolor="#FFFFFF">Discount Information </td>
                                  <td bgcolor="#FFFFFF"><span class="second">
                                    <input name="tinfo" type="text" class="width100" id="tinfo" value="<?php  echo $getevdet->tinfo; ?>" />
                                  </span></td>
                                  <td bgcolor="#FFFFFF">&nbsp;</td>
                                  <td bgcolor="#FFFFFF">&nbsp;</td>
                                </tr>                                
                              </table>
                              
                              </td>
                            </tr>
                            <tr>
                              <td align="center"><input name="submit" type="submit" value="<?php echo $btnval;?>" />
                                  </a> &nbsp;&nbsp;</td>
                            </tr>
                          </table>
                          <input type="hidden" name="id" value="<?php echo $_SESSION['hmedid'];?>" />
                          <input type="hidden" name="task" value="<?php echo $task;?>" />
                        </form></td>
                      </tr>
					  <?php
					  if($task=='edit')
					  {
					  ?>
                  </table>
				  <?php
				  }
				  ?>
                  </fieldset></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
