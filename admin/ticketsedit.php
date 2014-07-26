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
	
if($task == "edit")
{
		$sql ="select * from tickets where id = ".$_SESSION['hmedid'];
		$result = mysql_query($sql);
		$ged2 = mysql_fetch_object($result);
		$getevdet=mysql_fetch_object(mysql_query($sql));
		$_SESSION['rsvuser']=$ged2->username;
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
		theme : "advanced",
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
                  <h2 align="left"><span style="padding-left:20px;">Tickets Dropdown </span></h2>
                  <legend><?php echo $legend;?></legend>
				  <table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">
                      <tr></tr>
                      <tr>
                        <td bgcolor="#FFFFFF"><form method="post" action="tickets.php"  enctype="multipart/form-data" name="RegForm" id="RegForm" onSubmit="return CheckRegister();">
                          <table width="100%" border="0" cellpadding="3" cellspacing="3" style="padding-left:5px">

                            <tr>
                              <td width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="5">
                                <tr>
                                  <td width="25%"><span class="first">Ticket Name <span class="red-txt">*</span></span></td>
                                  <td width="25%"><input name="name" type="text" id="name" placeholder="Ticket Name" value="<?php echo $ged2->name;?>" /></td>
                                  <td width="25%">Description</td>
                                  <td width="25%"><input name="tdesc" type="text" id="tdesc" placeholder="Ticket Name" value="<?php echo $ged2->tdesc;?>" /></td>
                                </tr>
                                <tr>
                                  <td><span class="first"> Maximum Registrations <span class="red-txt">*</span></span></td>
                                  <td><select name="maxreg" id="maxreg">
                                      <option value="">Select</option>
                                      <?php for($i=1;$i<=100;$i++) { ?>
                                      <?php if($getevdet->maxreg==$i) { ?>
                                      <option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
                                      <?php } else { ?>
                                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                      <?php } ?>
                                      <?php } ?>
                                  </select></td>
                                  <td><span class="first">Minimum Order at a Time <span class="red-txt">*</span> </span></td>
                                  <td><select name="minorder" id="minorder">
                                      <option value="">Select</option>
                                      <?php for($i=1;$i<=100;$i++) { ?>
                                      <?php if($getevdet->minorder==$i) { ?>
                                      <option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
                                      <?php } else { ?>
                                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                      <?php } ?>
                                      <?php } ?>
                                  </select></td>
                                </tr>
                                <tr>
                                  <td><span class="first">Maximum Order at a Time <span class="red-txt">*</span> </span></td>
                                  <td><select name="maxorder" id="maxorder">
                                      <option value="">Select</option>
                                      <?php for($i=1;$i<=100;$i++) { ?>
                                      <?php if($getevdet->maxorder==$i) { ?>
                                      <option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
                                      <?php } else { ?>
                                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                      <?php } ?>
                                      <?php } ?>
                                  </select></td>
                                  <td><span class="first">Price per ticket<span class="red-txt"> *</span> </span></td>
                                  <td><input name="slprice" type="text" id="slprice" placeholder="Enter price in INR" value="<?php echo $getevdet->slprice; ?>" /></td>
                                </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td align="center"><input name="submit" type="submit" value="<?php echo $btnval;?>" />
                                  </a> &nbsp;&nbsp;</td>
                            </tr>
                          </table>
                          <input type="hidden" name="id" value="<?php echo $ged2->id;?>" />
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
