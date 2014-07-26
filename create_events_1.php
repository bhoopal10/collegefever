<?php
require('admin/sql.php');
require('admin/fileupload-class.php');
session_start();
?>
<?php
if($_REQUEST['ev']=='discard')
{
	unset($_SESSION['crevnt']);
	unset($_SESSION['rsvevid']);
	unset($_SESSION['evtype']);
}
if($_REQUEST['evtype']=='Free')
{
	$_SESSION['evtype']='Free';
}
if($_REQUEST['evtype']=='Paid')
{
	$_SESSION['evtype']='Paid';
}
if($_REQUEST['pubev']=='Yes')
{
	$_SESSION['crevnt']='Yes';
	$_SESSION['rsvevid']=$_REQUEST['evid'];
}
if($_SESSION['rsvevid']=="")
{
	$_SESSION['crevnt']='No';
}

if(
isset($_POST['subcrev1']) 
|| isset($_POST['subcrev2']) 
|| isset($_POST['subcrev3']) 
|| isset($_POST['subcrev4']) 
|| isset($_POST['subcrev5']) 
)
{
	if($_SESSION['crevnt']!='Yes')
	{
		$my_uploader = new uploader('en');
		$my_uploader->upload("pic", "", "");
		$mode = 2;
		$my_uploader->save_file("upfile/", $mode);
		if ($my_uploader->error)
		{
		}
		else
		{
			$doc1 = $my_uploader->file['name'];
		}
		
		$my_uploader = new uploader('en');
		$my_uploader->upload("pic1", "", "");
		$mode = 2;
		$my_uploader->save_file("upfile/", $mode);
		if ($my_uploader->error)
		{
		}
		else
		{
			$doc2 = $my_uploader->file['name'];
		}
		
		$my_uploader = new uploader('en');
		$my_uploader->upload("tpic", "", "");
		$mode = 2;
		$my_uploader->save_file("upfile/", $mode);
		if ($my_uploader->error)
		{
		}
		else
		{
			$doc3 = $my_uploader->file['name'];
		}
		
		$inscrev=mysql_query("insert into event(name,category,url,sdate,stime,edate,etime,description,pic1,pic2,
		vname,vaddress1,vaddress2,vcity,vpincode,vcountry,vstate,ewebsite,efacebook,etwitter,egoogle,slsdate,
		sledate,slprice,maxreg,minorder,maxorder,tpic,
		oname1,oemail1,ophone1,oname2,oemail2,ophone2,ldate,uid,evtype,tinfo
		)
		values('".$_REQUEST['name']."','".$_REQUEST['category']."','".$_REQUEST['url']."','".date('Y-m-d', strtotime($_REQUEST['sdate']))."','".$_REQUEST['stime1'].":".$_REQUEST['stime2']."','".date('Y-m-d', strtotime($_REQUEST['edate']))."','".$_REQUEST['etime1'].":".$_REQUEST['etime2']."','".addslashes($_REQUEST['description'])."','".$doc1."','".$doc2."','".$_REQUEST['vname']."','".$_REQUEST['vaddress1']."','".$_REQUEST['vaddress2']."','".$_REQUEST['vcity']."','".$_REQUEST['vpincode']."','".$_REQUEST['vcountry']."','".$_REQUEST['vstate']."','".$_REQUEST['ewebsite']."','".$_REQUEST['efacebook']."','".$_REQUEST['etwitter']."','".$_REQUEST['egoogle']."','".date('Y-m-d', strtotime($_REQUEST['slsdate']))."','".date('Y-m-d', strtotime($_REQUEST['sledate']))."','".$_REQUEST['slprice']."','".$_REQUEST['maxreg']."','".$_REQUEST['minorder']."','".$_REQUEST['maxorder']."','".$doc3."'
		,'".$_REQUEST['oname1']."','".$_REQUEST['oemail1']."','".$_REQUEST['ophone1']."','".$_REQUEST['oname2']."','".$_REQUEST['oemail2']."','".$_REQUEST['ophone2']."','".date('Y-m-d H:i:s')."','".$_SESSION['uid']."','".$_SESSION['evtype']."','".addslashes($_REQUEST['tinfo'])."'
		)");
		if($inscrev)
		{
			$_SESSION['crevnt']='Yes';
			$_SESSION['rsvevid']=mysql_insert_id();
			$errtxt='<p align="center" class="red-txt">Event details are successfully saved</p>';
		}
		else
		{
			$errtxt='<p align="center" class="red-txt">Event details failed to save, try again</p>';
		}
		
	}
	else
	{
		
		$doc1=$_SESSION['rsvevpic1'];
		$doc2=$_SESSION['rsvevpic2'];
		
		$my_uploader = new uploader('en');
		$my_uploader->upload("pic", "", "");
		$mode = 2;
		$my_uploader->save_file("upfile/", $mode);
		if ($my_uploader->error)
		{
		}
		else
		{
			$doc1 = $my_uploader->file['name'];
		}
		
		$my_uploader = new uploader('en');
		$my_uploader->upload("pic1", "", "");
		$mode = 2;
		$my_uploader->save_file("upfile/", $mode);
		if ($my_uploader->error)
		{
		}
		else
		{
			$doc2 = $my_uploader->file['name'];
		}
		
		$my_uploader = new uploader('en');
		$my_uploader->upload("tpic", "", "");
		$mode = 2;
		$my_uploader->save_file("upfile/", $mode);
		if ($my_uploader->error)
		{
		}
		else
		{
			$doc3 = $my_uploader->file['name'];
		}
		
		
		
		$updcrev=mysql_query("
		update event set
		name='".$_REQUEST['name']."',
		category='".$_REQUEST['category']."',
		url='".$_REQUEST['url']."',
		sdate='".date('Y-m-d', strtotime($_REQUEST['sdate']))."',
		stime='".$_REQUEST['stime1'].":".$_REQUEST['stime2']."',
		edate='".date('Y-m-d', strtotime($_REQUEST['edate']))."',
		etime='".$_REQUEST['etime1'].":".$_REQUEST['etime2']."',
		description='".addslashes($_REQUEST['description'])."',
		pic1='".$doc1."',
		pic2='".$doc2."',
		vname='".$_REQUEST['vname']."',
		vaddress1='".$_REQUEST['vaddress1']."',
		vaddress2='".$_REQUEST['vaddress2']."',
		vcity='".$_REQUEST['vcity']."',
		vpincode='".$_REQUEST['vpincode']."',
		vcountry='".$_REQUEST['vcountry']."',
		vstate='".$_REQUEST['vstate']."',
		ewebsite='".$_REQUEST['ewebsite']."',
		efacebook='".$_REQUEST['efacebook']."',
		etwitter='".$_REQUEST['etwitter']."',
		egoogle='".$_REQUEST['egoogle']."',
		slsdate='".date('Y-m-d', strtotime($_REQUEST['slsdate']))."',
		sledate='".date('Y-m-d', strtotime($_REQUEST['sledate']))."',
		slprice='".$_REQUEST['slprice']."',
		maxreg='".$_REQUEST['maxreg']."',
		minorder='".$_REQUEST['minorder']."',
		maxorder='".$_REQUEST['maxorder']."',
		tpic='".$doc3."',
		oname1='".$_REQUEST['oname1']."',
		oemail1='".$_REQUEST['oemail1']."',
		ophone1='".$_REQUEST['ophone1']."',
		oname2='".$_REQUEST['oname2']."',
		oemail2='".$_REQUEST['oemail2']."',
		ophone2='".$_REQUEST['ophone2']."',
		ewebsite='".$_REQUEST['ewebsite']."',
		efacebook='".$_REQUEST['efacebook']."',
		etwitter='".$_REQUEST['etwitter']."',
		egoogle='".$_REQUEST['egoogle']."',
		slprice='".$_REQUEST['slprice']."',
		maxreg='".$_REQUEST['maxreg']."',
		minorder='".$_REQUEST['minorder']."',
		maxorder='".$_REQUEST['maxorder']."',
		tinfo='".addslashes($_REQUEST['tinfo'])."'
		where id='".$_SESSION['rsvevid']."'
		");
		
		if($updcrev)
		{
			$errtxt='<p align="center" class="red-txt">Event details are successfully saved</p>';
		}
		else
		{
			$errtxt='<p align="center" class="red-txt">Event details failed to save, try again</p>';
		}
	}
}

if(isset($_POST['subcrev5']))
{
	
	mysql_query("update event set publish='Yes' , ticketno='".$_REQUEST['ticketno']."' where id='".$_SESSION['rsvevid']."'");
	for($t=1;$t<=$_REQUEST['ticketno'];$t++)
	{
		mysql_query("insert into tickets(eid,name,slprice,maxreg,minorder,maxorder,slsdate,sledate,tdesc) values('".$_SESSION['rsvevid']."','".$_REQUEST['tname'.$t.'']."','".$_REQUEST['slprice'.$t.'']."','".$_REQUEST['maxreg'.$t.'']."','".$_REQUEST['minorder'.$t.'']."','".$_REQUEST['maxorder'.$t.'']."','".date('Y-m-d', strtotime($_REQUEST['slsdate'.$t.'']))."','".date('Y-m-d', strtotime($_REQUEST['sledate'.$t.'']))."','".addslashes($_REQUEST['tdesc'.$t.''])."')");
	}
	unset($_SESSION['crevnt']);
	unset($_SESSION['rsvevid']);
	unset($_SESSION['evtype']);
	if($_SESSION['uid']!="")
	{
	?><script>location.replace('myevents_3.php?page=myevents&addevent=yes');</script><?php
	}
	else
	{
	?><script>location.replace('index.php?page=index&addevent=yes');</script><?php
	}
}

$getevdet=mysql_fetch_object(mysql_query("select * from event where id='".$_SESSION['rsvevid']."'"));
$_SESSION['rsvevpic1']=$getevdet->pic1;
$_SESSION['rsvevpic2']=$getevdet->pic2;
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="fav.ico">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42927084-1', 'auto');
  ga('send', 'pageview');

</script>
<style>
<?php if($_SESSION['evtype']!='Free') { ?>
.event-tab div
{
	width:239px;
}
<?php }else{ ?>
.event-tab div
{
	width:299px;
}
<?php } ?>
@media only screen and (max-width: 800px) 
{
	.event-tab div
	{
		width:100%; padding-left:0; padding-right:0; border-right:0px; border-bottom:solid 1% #999999; padding-top:12px; padding-bottom:12px;
	}
}
</style>
<script type="text/javascript">
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
<script type="text/javascript" src="admin/js/tiny_mce/tiny_mce.js"></script>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script language="JavaScript" src="js/calendar_us1.js"></script>
<link rel="stylesheet" href="css/calendar.css" />
<script src="js/jused.js" type="text/javascript"></script>
<script type="text/javascript">
var urlres;
$(document).ready(function()
{
    $("#url").focusout(function()
    {
		//alert('adsa');
        //Check if usernane if available
        $.post("chk_url.php", {url:  $("#url").val()}, function(data)
        {

            	if(data  =='false')
            	{
					urlres=false;	
                }
                else
                {
                    urlres=true;
                }
            });
			//alert(urlres);
            return false;
        });
    });
function CheckCr1() 
{
   if(document.crevform.name.value=="")
   {
   document.getElementById('err1').innerHTML='Enter Name, please';
   document.crevform.name.className = "alert";
   document.crevform.name.focus();
   return false;
   }
   else
   {
   document.getElementById('err1').innerHTML='';
   document.crevform.name.className="";	
   }  
   
   if(document.crevform.category.value=="")
   {
   document.getElementById('err2').innerHTML='Select Category, please';
   document.crevform.category.className = "alert";
   document.crevform.category.focus();
   return false;
   }
   else
   {
   document.getElementById('err2').innerHTML='';
   document.crevform.category.className="";	
   }
   
   if(document.crevform.url.value=="")
   {
   document.getElementById('err3').innerHTML='Enter URL, please';
   document.crevform.url.className = "alert";
   document.crevform.url.focus();
   return false;
   }
   else
   {
   document.getElementById('err3').innerHTML='';
   document.crevform.url.className="";	
   }
   
   if(!urlchk(document.crevform.url.value))
   {
   document.getElementById('err3').innerHTML='Invalid URL, Only alphabets, numbers and '-' are allowed';
   document.crevform.url.className = "alert";
   document.crevform.url.focus();
   return false;
   }
   else
   {
   document.getElementById('err3').innerHTML='';
   document.crevform.url.className="";	
   }
   
   <?php if($_SESSION['crevnt']!='Yes') { ?>
   if(!urlres)
   {
   document.getElementById('err3').innerHTML='URL entered is already used, try an other URL';
   document.crevform.url.className = "alert";
   document.crevform.url.focus();
   return false;
   }
   else
   {
   document.getElementById('err3').innerHTML='';
   document.crevform.url.className="";	
   }
   <?php } ?>
   
   if(document.crevform.sdate.value=="")
   {
   document.getElementById('err4').innerHTML='Select Date, please';
   document.crevform.sdate.className = "alert";
   document.crevform.sdate.focus();
   return false;
   }
   else
   {
   document.getElementById('err4').innerHTML='';
   document.crevform.sdate.className="";	
   }
   
   /*if(document.crevform.stime1.value=="")
   {
   document.getElementById('err5').innerHTML='Select Hour, please';
   document.crevform.stime1.className = "alert";
   document.crevform.stime1.focus();
   return false;
   }
   else
   {
   document.getElementById('err5').innerHTML='';
   document.crevform.stime1.className="";	
   }
   
   if(document.crevform.stime2.value=="")
   {
   document.getElementById('err5').innerHTML='Select Minute, please';
   document.crevform.stime2.className = "alert";
   document.crevform.stime2.focus();
   return false;
   }
   else
   {
   document.getElementById('err5').innerHTML='';
   document.crevform.stime2.className="";	
   }*/
   
   if(document.crevform.edate.value=="")
   {
   document.getElementById('err6').innerHTML='Select Date, please';
   document.crevform.edate.className = "alert";
   document.crevform.edate.focus();
   return false;
   }
   else
   {
   document.getElementById('err6').innerHTML='';
   document.crevform.edate.className="";	
   }
   if(!CompareDates())
   {
   document.getElementById('err6').innerHTML='End date should be greater than start date';
   document.crevform.edate.className = "alert";
   document.crevform.edate.focus();
   return false;
   }
   else
   {
   document.getElementById('err6').innerHTML='';
   document.crevform.edate.className="";	
   }
   
   /*if(document.crevform.etime1.value=="")
   {
   document.getElementById('err7').innerHTML='Select Hour, please';
   document.crevform.etime1.className = "alert";
   document.crevform.etime1.focus();
   return false;
   }
   else
   {
   document.getElementById('err7').innerHTML='';
   document.crevform.etime1.className="";	
   }
   
   if(document.crevform.etime2.value=="")
   {
   document.getElementById('err7').innerHTML='Select Minute, please';
   document.crevform.etime2.className = "alert";
   document.crevform.etime2.focus();
   return false;
   }
   else
   {
   document.getElementById('err7').innerHTML='';
   document.crevform.etime2.className="";	
   }*/
   
   if(tinyMCE.get('description').getContent()=="")
   {
   document.getElementById('err8').innerHTML='Enter Descrption, please';
   document.crevform.description.className = "alert";
   document.crevform.description.focus();
   return false;
   }
   else
   {
   document.getElementById('err8').innerHTML='';
   document.crevform.description.className="";	
   }
   
   <?php if($getevdet->pic1=="") { ?>
   if(!getFileType(document.getElementById('pic').value))
   {
   document.getElementById('err9').innerHTML='Select Image, please';
   document.crevform.pic.className = "alert";
   document.crevform.pic.focus();
   return false;   
   }
   else
   {
   document.getElementById('err9').innerHTML='';
   document.crevform.pic.className="";	
   }
   <?php } ?>
   <?php if($getevdet->pic2=="") { ?>
   if(!getFileType(document.getElementById('pic1').value))
   {
   document.getElementById('err10').innerHTML='Select Image, please';
   document.crevform.pic1.className = "alert";
   document.crevform.pic1.focus();
   return false;   
   }
   else
   {
   document.getElementById('err10').innerHTML='';
   document.crevform.pic1.className="";	
   }
   <?php } ?>
   return true; 
}

function CheckCr4() 
{
	if(document.crevform.slsdate.value=="")
   {
   document.getElementById('err42').innerHTML='Enter Start Sale Date, please';
   document.crevform.slsdate.className = "alert";
   document.crevform.slsdate.focus();
   return false;
   }
   else
   {
   document.getElementById('err42').innerHTML='';
   document.crevform.slsdate.className="";	
   }
   
   if(document.crevform.sledate.value=="")
   {
   document.getElementById('err43').innerHTML='Enter End Sale Date, please';
   document.crevform.sledate.className = "alert";
   document.crevform.sledate.focus();
   return false;
   }
   else
   {
   document.getElementById('err43').innerHTML='';
   document.crevform.sledate.className="";	
   }
   if(!CompareDates12(document.crevform.slsdate.value,document.crevform.sledate.value))
   {
   document.getElementById('err43').innerHTML='End sale date should be greater than start sale date';
   document.crevform.sledate.className = "alert";
   document.crevform.sledate.focus();
   return false;
   }
   else
   {
   document.getElementById('err43').innerHTML='';
   document.crevform.sledate.className="";	
   }
	
   <?php for($i=1;$i<=5;$i++) { ?>
   if(document.crevform.tname<?php echo $i; ?>.value=="")
   {
   document.getElementById('err48<?php echo $i; ?>').innerHTML='Enter Ticket Name, please';
   document.crevform.tname<?php echo $i; ?>.className = "alert";
   document.crevform.tname<?php echo $i; ?>.focus();
   return false;
   }
   else
   {
   document.getElementById('err48<?php echo $i; ?>').innerHTML='';
   document.crevform.tname<?php echo $i; ?>.className="";	
   }
   
   if(document.crevform.slprice<?php echo $i; ?>.value=="")
   {
   document.getElementById('err44<?php echo $i; ?>').innerHTML='Enter Ticket Price, please';
   document.crevform.slprice<?php echo $i; ?>.className = "alert";
   document.crevform.slprice<?php echo $i; ?>.focus();
   return false;
   }
   else
   {
   document.getElementById('err44<?php echo $i; ?>').innerHTML='';
   document.crevform.slprice<?php echo $i; ?>.className="";	
   }
   
   if(chkprice(document.crevform.slprice<?php echo $i; ?>.value)||document.crevform.slprice<?php echo $i; ?>.value=='0')
   {
   document.getElementById('err44<?php echo $i; ?>').innerHTML='Invalid Ticket Price, please re-enter';
   document.crevform.slprice<?php echo $i; ?>.className = "alert";
   document.crevform.slprice<?php echo $i; ?>.focus();
   return false;
   }
   else
   {
   document.getElementById('err44<?php echo $i; ?>').innerHTML='';
   document.crevform.slprice<?php echo $i; ?>.className="";	
   }
   
   if(document.crevform.maxreg<?php echo $i; ?>.value=="")
   {
   document.getElementById('err45<?php echo $i; ?>').innerHTML='Select Maximum Registrations, please';
   document.crevform.maxreg<?php echo $i; ?>.className = "alert";
   document.crevform.maxreg<?php echo $i; ?>.focus();
   return false;
   }
   else
   {
   document.getElementById('err45<?php echo $i; ?>').innerHTML='';
   document.crevform.maxreg<?php echo $i; ?>.className="";	
   }
   
   if(document.crevform.minorder<?php echo $i; ?>.value=="")
   {
   document.getElementById('err46<?php echo $i; ?>').innerHTML='Select Mininum Order at a Time, please';
   document.crevform.minorder<?php echo $i; ?>.className = "alert";
   document.crevform.minorder<?php echo $i; ?>.focus();
   return false;
   }
   else
   {
   document.getElementById('err46<?php echo $i; ?>').innerHTML='';
   document.crevform.minorder<?php echo $i; ?>.className="";	
   }
   
   if(parseInt(document.crevform.minorder<?php echo $i; ?>.value)>=parseInt(document.crevform.maxreg<?php echo $i; ?>.value))
   {
   document.getElementById('err46<?php echo $i; ?>').innerHTML='Minimum order should be less than maximum registrations';
   document.crevform.minorder<?php echo $i; ?>.className = "alert";
   document.crevform.minorder<?php echo $i; ?>.focus();
   return false;
   }
   else
   {
   document.getElementById('err46<?php echo $i; ?>').innerHTML='';
   document.crevform.minorder<?php echo $i; ?>.className="";	
   }
   
   //alert(document.crevform.maxorder<?php echo $i; ?>.value);
   //alert(document.crevform.maxreg<?php echo $i; ?>.value);
   
   if(document.crevform.maxorder<?php echo $i; ?>.value=="")
   {
   document.getElementById('err47<?php echo $i; ?>').innerHTML='Select Maximum Order at a Time, please';
   document.crevform.maxorder<?php echo $i; ?>.className = "alert";
   document.crevform.maxorder<?php echo $i; ?>.focus();
   return false;
   }
   else
   {
   document.getElementById('err47<?php echo $i; ?>').innerHTML='';
   document.crevform.maxorder<?php echo $i; ?>.className="";	
   }
   
   if(parseInt(document.crevform.maxorder<?php echo $i; ?>.value) < parseInt(document.crevform.minorder<?php echo $i; ?>.value))
   {
   document.getElementById('err47<?php echo $i; ?>').innerHTML='Maximum order should be greater than minimum order';
   document.crevform.maxorder<?php echo $i; ?>.className = "alert";
   document.crevform.maxorder<?php echo $i; ?>.focus();
   return false;
   }
   else
   {
   document.getElementById('err47<?php echo $i; ?>').innerHTML='';
   document.crevform.maxorder<?php echo $i; ?>.className="";	
   }
   
   if(parseInt(document.crevform.maxorder<?php echo $i; ?>.value) > parseInt(document.crevform.maxreg<?php echo $i; ?>.value))
   {
   document.getElementById('err47<?php echo $i; ?>').innerHTML='Maximum order should not be greater than maximum registrations';
   document.crevform.maxorder<?php echo $i; ?>.className = "alert";
   document.crevform.maxorder<?php echo $i; ?>.focus();
   return false;
   }
   else
   {
   document.getElementById('err47<?php echo $i; ?>').innerHTML='';
   document.crevform.maxorder<?php echo $i; ?>.className="";	
   }
   if(parseInt(document.getElementById('ticketno').value)==<?php echo $i ?>)
   {
   		return true;
   }
   <?php } ?>
   return true; 
}

</script>
<script>
$(document).ready(function(){

$("#ercvf1,#ercvf2,#ercvf3,#ercvf4").hide();
for(var i=1;i<=4;i++)
{
	$("#crev"+i).removeClass("sel");
}
var crevcnt;
<?php
if($_POST['subcrev1'])
{
	?>$("#ercvf1").show();$("#crev1").addClass("sel");crevcnt=1;<?php
}
else if($_POST['subcrev2'])
{
	?>$("#ercvf2").show();$("#crev2").addClass("sel");crevcnt=2;<?php
}
else if($_POST['subcrev3'])
{
	?>$("#ercvf3").show();$("#crev3").addClass("sel");crevcnt=3;<?php
}
else if($_POST['subcrev4'])
{
	?>$("#ercvf4").show();$("#crev4").addClass("sel");crevcnt=4;<?php
}
else
{
	?>$("#ercvf1").show();$("#crev1").addClass("sel");crevcnt=1;<?php
}
?>
$("#chev1,#chev2").click(function()
{
	$("#ercvf1,#ercvf2,#ercvf3,#ercvf4").hide();
	for(var i=1;i<=4;i++)
	{
		$("#crev"+i).removeClass("sel");
	}
	$("#ercvf1").show();$("#crev1").addClass("sel");crevcnt=1;
});	
$(".event-form .last").click(function()
	{
		if(crevcnt==1 && !CheckCr1())
		{
		}
		else if(crevcnt==2 && !CheckCr2())
		{
		}
		else if(crevcnt==3 && !CheckCr3())
		{
		}
		else if(crevcnt==4 && !CheckCr4())
		{
		}
		else
		{
			crevcnt++;
			for(var i=1;i<=4;i++)
			{
				$("#ercvf"+i).hide();
				$("#crev"+i).removeClass("sel");
			}									
    		$("#ercvf"+crevcnt).show();
			$("#crev"+crevcnt).addClass("sel");
			$(window).scrollTop($('.event-tab').offset().top);
		}
  	});

	$(".event-form .prev").click(function()
	{
		crevcnt--;
		for(var i=1;i<=4;i++)
		{
			$("#ercvf"+i).hide();
			$("#crev"+i).removeClass("sel");
		}									
    	$("#ercvf"+crevcnt).show();
		$("#crev"+crevcnt).addClass("sel");
		$(window).scrollTop($('.event-tab').offset().top);
  	});

});
</script>

<link href='http://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<link href="css/common.css" rel="stylesheet" type="text/css">
<link href="css/mobile_style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>::: thecollegefever.com :::</title>
</head>

<body>
<?php include('includes/header.php'); ?>
<div class="container contcrev">
<?php if($_SESSION['evtype']=="") { ?>
<div class="black_overlay1"></div>
<div class="selevtype"><h1>Select Event Type</h1><p><a href="create_events_1.php?evtype=Free" class="orangebutton">Free Event</a><a href="create_events_1.php?evtype=Paid">Paid Event</a></p></div>
<?php } ?>
  <h3>Create Event</h3>
  <?php if($_SESSION['crevnt']=='Yes' && $_REQUEST['page']=='evcreate') {?>
<div class="error-info">  
<p>You have already created an event, but the event informations are not completely filled yet. </p>
<p>Fill the form below completely to publish it</p>
<p>Or</p>
<p><a href="create_events_1.php?ev=discard">Click here to discard it and Create a new event</a></p>
</div>
<?php } ?>
  <div class="event-tab">
  	<div class="sel" id="crev1">
		<div class="no-txt">1</div>
		<p>Events Details</p>
		<div class="drop_arrow"></div>
	</div><div id="crev2">
		<div class="no-txt">2</div>
		<p>Venue Details</p>
		<div class="drop_arrow"></div>
	</div><div id="crev3">
		<div class="no-txt">3</div>
		<p>Contact Details</p>
		<div class="drop_arrow"></div>
	</div><?php if($_SESSION['evtype']!='Free') { ?><div id="crev4">
		<div class="no-txt">4</div>
		<p>Ticket and Payment Details</p>
		<div class="drop_arrow"></div>
	</div><?php } ?>
  </div>
  <?php echo $errtxt; ?>
  <div class="evform-main">
  <form action="create_events_1.php" method="post" name="crevform" enctype="multipart/form-data">
  <div id="ercvf1">
    <div class="event-form">
      <ul class="main">
        <li class="first">Event Name <span class="red-txt">*</span></li><li class="second"><input name="name" type="text" id="name" value="<?php  echo $getevdet->name; ?>"><div class="err-txt" id="err1"></div></li>
	    </ul>
	    <ul class="main">
	      <li class="first">Event Category <span class="red-txt">*</span></li><li class="second">
		  <?php
		  $catarr=array();
		  $getcat=mysql_query("select * from category order by id asc");
		  while($getcat1=mysql_fetch_object($getcat))
		  {
		  	array_push($catarr,''.$getcat1->name.' Events');
		  }
		  	//$catarr=array('Cultural Events','Technical Events','Management Events','Sporting Events','Fun and Other Events');
		  ?>
		  <select name="category" id="category">
		  <option value="">Select Category</option>
	        <?php
				for($i=0;$i<sizeof($catarr);$i++)
				{
					if($catarr[$i]==$getevdet->category)
					{
						?><option value="<?php echo $catarr[$i]; ?>" selected="selected"><?php echo $catarr[$i]; ?></option><?php
					}
					else
					{
						?><option value="<?php echo $catarr[$i]; ?>"><?php echo $catarr[$i]; ?></option><?php
					}
				} 
			?>
	      </select>
		  <div class="err-txt" id="err2"></div></li>
	    </ul>
	    <ul class="main">
	      <li class="first">Event URL <span class="red-txt">*</span></li><li class="second"><ul><li class="in1">http://www.thecollegefever.com/&nbsp;</li><li class="in2"><input name="url" type="text" id="url" placeholder="only alphabets, numbers and '-' allowed" value="<?php  echo $getevdet->url; ?>"><div class="err-txt" id="err3"></div></li></ul></li>
	    </ul>
	    <ul class="main">
	      <li class="first">Start Date <span class="red-txt">*</span></li><li class="second"><ul><li class="in50">
	        <input name="sdate" type="text" id="sdate" placeholder="MM/DD/YYYY" 
			<?php if($getevdet->sdate!="") { ?> value="<?php echo date('m/d/Y', strtotime($getevdet->sdate)); ?>" <?php } ?>
			>
	        <script language="JavaScript">
										new tcal ({
											// form name
											'formname': 'crevform',
											// input name
											'controlname': 'sdate'
										});
									
										</script><div class="err-txt" id="err4"></div></li><li class="in25 txt-right"><span class="start-time">Start Time</span></li><li>
										<div class="seltime">
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
												?><option value="<?php echo $ival; ?>" selected="selected"><?php echo $ival; ?></option><?php
											}
											else
											{
												?><option value="<?php echo $ival; ?>"><?php echo $ival; ?></option><?php
											}	
										} 
										?>
										</select>
										&nbsp;-&nbsp;<select name="stime2" id="stime2">
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
												?><option value="<?php echo $ival; ?>" selected="selected"><?php echo $ival; ?></option><?php
											}
											else
											{
												?><option value="<?php echo $ival; ?>"><?php echo $ival; ?></option><?php
											}
										} 
										?>
										</select>
										</div>
										<div class="err-txt" id="err5"></div>
	        </li></ul></li>
	    </ul>
	    <ul class="main">
	      <li class="first">End Date <span class="red-txt">*</span></li><li class="second"><ul><li class="in50"><input name="edate" type="text" id="edate" placeholder="MM/DD/YYYY" 
		  <?php if($getevdet->edate!="") { ?> value="<?php echo date('m/d/Y', strtotime($getevdet->edate)); ?>" <?php } ?>
		  >
		  <script language="JavaScript">
										new tcal ({
											// form name
											'formname': 'crevform',
											// input name
											'controlname': 'edate'
										});
									
										</script><div class="err-txt" id="err6"></div>
		  </li><li class="in25 txt-right"><span class="start-time">End Time</li><li>
<div class="seltime">
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
												?><option value="<?php echo $ival; ?>" selected="selected"><?php echo $ival; ?></option><?php
											}
											else
											{
												?><option value="<?php echo $ival; ?>"><?php echo $ival; ?></option><?php
											}
										} 
										?>
  </select>
  &nbsp;-&nbsp;<select name="etime2" id="select2">
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
												?><option value="<?php echo $ival; ?>" selected="selected"><?php echo $ival; ?></option><?php
											}
											else
											{
												?><option value="<?php echo $ival; ?>"><?php echo $ival; ?></option><?php
											}
										} 
										?>
  </select>
  <div class="err-txt" id="err7"></div>
</div>
<div class="err-txt" id="err6"></div>
	        </li></ul></li>
	    </ul>
	    <ul class="main">
	      <li class="first v-top">Event Description <span class="red-txt">*</span></li><li class="second"><textarea name="description" cols="" rows="10" class="width100" id="description" placeholder="Enter event details like agenda, sub events, speakers, etc."><?php  echo $getevdet->description; ?></textarea>
	      <div class="err-txt" id="err8"></div>
	        </li>
	    </ul>
	    <ul class="main">
	      <li class="first v-top">Banner Image <span class="red-txt">*</span></li><li class="second">
		  <input name="pic" type="file" class="imgfield" id="pic">
		  <div class="err-txt" id="err9"></div>
	        <div class="img-desc">
	          <ul>
	            <li><strong>Image Format:</strong><br>JPG, PNG, GIF</li>
			    <li><strong>File Size:</strong><br>Not more than 2 MB</li>
			    <li class="last"><strong>Image Dimensions:</strong><br>960px x 300 px; Images greater than this will be cropped.<br>
		        Images smaller than this will not be supported.</li>
		    </ul>
		    </div><?php if($getevdet->pic1!="") {?><div class="up-img">
			<img src="upfile/<?php echo $getevdet->pic1; ?>">
			</div><?php } ?>
		    </li>
	    </ul>
	    <ul class="main">
	      <li class="first v-top">Thumbnail Image <span class="red-txt">*</span></li><li class="second">
		  <input name="pic1" type="file" class="imgfield" id="pic1">
		  <div class="err-txt" id="err10"></div>
	        <div class="img-desc">
	          <ul>
	            <li><strong>Image Format:</strong><br>JPG, PNG, GIF</li>
			    <li><strong>File Size:</strong><br>
			    Not more than 1 MB</li>
			    <li class="last"><strong>Image Dimensions:</strong><br>
			    250px x 250 px; Images greater than this will be cropped.<br>
		        Images smaller than this will not be supported.</li>
		    </ul>
		    </div><?php if($getevdet->pic2!="") {?><div class="up-img">
			<img src="upfile/<?php echo $getevdet->pic2; ?>">
			</div><?php } ?>
		    </li>
	    </ul>
	    <div class="ev-cr-submit">
	      <input name="subcrev1" type="submit" value="Save Draft" onClick="return CheckCr1();"><input name="" type="button" value="Continue" class="last">
        </div>
    </div>
  </div>
  
  <div id="ercvf2">
    <div class="event-form">
      <ul class="main">
        <li class="first">Venue Name <span class="red-txt">*</span></li><li class="second"><input name="vname" type="text" class="width100" id="vname" value="<?php  echo $getevdet->vname; ?>"><div class="err-txt" id="err21"></div>
        </li>
	    </ul>
	    <ul class="main">
	      <li class="first">Address Line 1 <span class="red-txt">*</span></li><li class="second"><input name="vaddress1" type="text" class="width100" id="vaddress1" value="<?php  echo $getevdet->vaddress1; ?>"><div class="err-txt" id="err22"></div>
	      </li>
	    </ul>
	    <ul class="main">
	      <li class="first">Address Line 2</li><li class="second"><input name="vaddress2" type="text" class="width100" id="vaddress2" value="<?php  echo $getevdet->vaddress2; ?>">
	      </li>
	    </ul>
	    <ul class="main">
	      <li class="first">Country <span class="red-txt">*</span></li><li class="second"><ul><li class="in50">
	        <select name="vcountry" class="width100" id="vcountry">
              <option value="India">India</option>
            </select>
	      </li><li class="in25 txt-right"><span class="start-time">Pincode </span></li><li class="in25"><input name="vpincode" type="text" class="width100" id="vpincode" value="<?php  echo $getevdet->vpincode; ?>"><div class="err-txt" id="err25"></div>
	      </li></ul>
		    </li>
	    </ul>
	    <ul class="main">
	      <li class="first">State <span class="red-txt">*</span></li><li class="second">
	        <ul>
	          <li class="in50"><select name="vstate" class="width100" id="vstate" onChange="gethmdetl1();">
			  		<option value="">Select State</option>
					<?php
					$getst=mysql_query("select * from statei order by name asc");
					while($getst1=mysql_fetch_object($getst))
					{
						if($getst1->name==$getevdet->vstate)
						{
							?><option value="<?php echo $getst1->name; ?>" selected="selected"><?php echo $getst1->name; ?></option><?php
						}
						else
						{
							?><option value="<?php echo $getst1->name; ?>"><?php echo $getst1->name; ?></option><?php
						}
					}
					?>
	            </select>
	          <div class="err-txt" id="err23"></div>
				</li>
	        </ul>
          </li>
        </ul>
	    <ul class="main">
	      <li class="first">City <span class="red-txt">*</span></li><li class="second">
	        <ul>
	          <li class="in50">
	            <div id="txtCar">
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
				  </div>
						  <div class="err-txt" id="err24"></div>
              </li>
	        </ul>
          </li>
        </ul>
	    <div class="ev-cr-submit">
	      <input name="subcrev2" type="submit" id="subcrev2" onClick="return CheckCr2();" value="Save Draft">
	      <input name="" type="button" value="Previous" class="prev"><input name="" type="button" value="Continue" class="last">
        </div>
    </div>
  </div>
  
  <div id="ercvf3">
    <h4>Contact 1</h4>
    <div class="event-form">
      <ul class="main">
        <li class="first">Organiser Name <span class="red-txt">*</span></li><li class="second"><input name="oname1" type="text" class="width100" id="oname1" value="<?php  echo $getevdet->oname1; ?>"><div class="err-txt" id="err31"></div>
        </li>
	    </ul>
		
	    <ul class="main">
	      <li class="first">Organiser Email <span class="red-txt">*</span></li><li class="second"><input name="oemail1" type="text" class="width100" id="oemail1" value="<?php  echo $getevdet->oemail1; ?>"><div class="err-txt" id="err32"></div>
	      </li>
	    </ul>
		
	    <ul class="main">
	      <li class="first">Organiser Phone </li><li class="second"><input name="ophone1" type="text" class="width100" id="ophone1" value="<?php  echo $getevdet->ophone1; ?>">
	      </li>
	    </ul>
		<?php if($getevdet->oname2=="") {?>
	    <ul class="main" id="add-cn-main">
	      <li class="first"></li><li class="second"><a href="javascript:void(0);" id="cn-2-link">Add another contact</a></li>
	    </ul>
		<?php }?> 
    </div>
	<div id="cn-form-2" <?php if($getevdet->oname2=="") { echo 'style="display:none;"'; } else { echo 'style="display:block;"'; } ?> >
	<h4>Contact 2</h4>
	<div class="event-form">
      <ul class="main">
        <li class="first">Organiser Name</li><li class="second"><input name="oname2" type="text" class="width100" id="oname2" value="<?php  echo $getevdet->oname2; ?>">
        </li>
	    </ul>
	    <ul class="main">
	      <li class="first">Organiser Email</li><li class="second"><input name="oemail2" type="text" class="width100" id="oemail2" value="<?php  echo $getevdet->oemail2; ?>">
	      </li>
	    </ul>
	    <ul class="main">
	      <li class="first">Organiser Phone </li><li class="second"><input name="ophone2" type="text" class="width100" id="ophone2" value="<?php  echo $getevdet->ophone2; ?>">
	      </li>
	    </ul>
    </div>
	</div>
    <h4>Social Links</h4>
    <div class="event-form">
      <ul class="main">
        <li class="first">Event Website URL</li><li class="second"><input name="ewebsite" type="text" class="width100" id="ewebsite" value="<?php  echo $getevdet->ewebsite; ?>">
        </li>
	    </ul>
	    <ul class="main">
	      <li class="first">Event Facebook Page</li><li class="second"><input name="efacebook" type="text" class="width100" id="efacebook" value="<?php  echo $getevdet->efacebook; ?>">
	      </li>
	    </ul>
	    <ul class="main">
	      <li class="first">Event Twitter Handle</li><li class="second"><input name="etwitter" type="text" class="width100" id="etwitter" value="<?php  echo $getevdet->etwitter; ?>">
	      </li>
	    </ul>
	    <ul class="main">
	      <li class="first">Event Google+ Page</li><li class="second"><input name="egoogle" type="text" class="width100" id="egoogle" value="<?php  echo $getevdet->egoogle; ?>">
	      </li>
	    </ul>
	    <div class="ev-cr-submit">
	      <input name="subcrev3" type="submit" id="subcrev3" value="Save Draft" onClick="return CheckCr3();">
	      <input name="" type="button" value="Previous" class="prev"><?php if($_SESSION['evtype']!="Free") { ?><input name="" type="button" value="Continue" class="last"><?php }else{ ?><input name="subcrev5" type="submit" class="last1" id="subcrev5" value="Publish" onClick="return CheckCr3();"><?php } ?>
        </div>
    </div>
  </div>
  
  <div id="ercvf4">
  <?php if($getevdet->tpic=="") { ?>
 <!-- <div class="ticket-tab">
  	<ul>
		<li class="sel" id="crl41">Make Custom Ticket/Pass
		  <div class="drop_arrow"></div></li><li id="crl42">Upload Existing Ticket/Pass
		    <div class="drop_arrow"></div></li>
	</ul>
  </div>-->
  <?php } else { ?>
  <!--<div class="ticket-tab">
  	<ul>
		<li id="crl41">Make Custom Ticket/Pass
		  <div class="drop_arrow"></div></li><li id="crl42" class="sel">Upload Existing Ticket/Pass
		    <div class="drop_arrow"></div></li>
	</ul>
  </div>-->
  <?php } ?>
  <input type="hidden" value="1" name="f4sel" id="f4sel">
  <?php if($getevdet->tpic=="") { $cr4d1='style="display:block;"'; $cr4d2='style="display:none;"'; } else { $cr4d1='style="display:none;"'; $cr4d2='style="display:block;"'; }?>
  <div id="cre41" <?php echo $cr4d1; ?>>
  <?php if($_SESSION['rsvevid']=="") { ?>
  <!--<p class="red-txt" align="center">There are no event details saved yet</p>-->
  <?php }else{ ?>
  <div class="ev-banner">
    <p align="center"><img src="upfile/<?php echo $getevdet->pic1; ?>"></p>
	  <p align="right"><a href="#" id="chev1">Change Image</a></p>
  </div>
  <div class="evnt-detls">
    <div class="edit-det"><a href="#" id="chev2">Edit Event Information</a></div>
  	  <ul>
  	    <li class="first">Event Name</li><li><strong><?php  echo $getevdet->name; ?></strong></li><li class="first">Start Date</li><li><strong><?php  echo date('M j Y', strtotime($getevdet->sdate)); ?>,</strong> at <strong><?php  echo date('g:i a', strtotime($getevdet->stime)); ?></strong></li><li class="first">End Date</li><li><strong><?php  echo date('M j Y', strtotime($getevdet->edate)); ?>,</strong> at <strong><?php  echo date('g:i a', strtotime($getevdet->etime)); ?></strong></li><li class="first">Event Description</li><li><strong><?php echo $getevdet->description; ?></strong></li><li class="first">Location</li><li><strong><?php echo $getevdet->vname; ?>,
		<br><?php echo $getevdet->vaddress1; ?>,
		<?php if($getevdet->vaddress2!=""){ ?>
		<br><?php echo $getevdet->vaddress2; ?>,
		<?php } ?>
		<br><?php echo $getevdet->vcity; ?>, <?php echo $getevdet->vstate; ?>, <?php echo $getevdet->vcountry; ?> - <?php echo $getevdet->vpincode; ?></strong></li>
	  </ul>
  </div>
  <?php } ?>
  </div>
  <div id="cre42" <?php echo $cr4d2; ?>>
  <div class="evnt-d-form">
    <ul>
      <li class="first">Ticket/Pass Image <span class="red-txt">*</span></li><li class="img-field"><input name="tpic" type="file" class="imgfield" id="tpic"><div class="err-txt" id="err41"></div>
        <div class="img-desc">
          <ul>
            <li><strong>Image Format:</strong> <br>
              JPG, PNG, GIF</li>
              <li><strong>File Size:</strong><br>
                Not more than 2 MB</li>
              <li class="last"><strong>Image Dimensions:</strong><br>
                960px x 300 px; Images greater than this will be cropped.<br>
                Images smaller than this will not be supported.</li>
            </ul>
          </div><?php if($getevdet->tpic!="") {?><div class="up-img">
			<img src="upfile/<?php echo $getevdet->tpic; ?>">
			</div><?php } ?>
		  </li>
    </ul>
	</div>
	</div>
	<div class="evnt-d-form">
    <ul>
      <li class="first">No of ticket types<span class="red-txt">*</span> </li><li><select name="ticketno" id="ticketno" onChange="tcount();">
			<?php for($i=1;$i<=5;$i++) { ?>
				<?php if($getevdet->ticketno==$i) { ?>
					<option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
				<?php } else { ?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } ?>
			<?php } ?>
        </select></li><li class="first">Sale Start Date <span class="red-txt">*</span> </li><li>
        <input name="slsdate" type="text" id="slsdate" placeholder="MM/DD/YYYY">
		<script language="JavaScript">
										new tcal ({
											// form name
											'formname': 'crevform',
											// input name
											'controlname': 'slsdate'
										});
									
										</script>
		<div class="err-txt" id="err42"></div>
      </li><li class="first">Discount Information</li><li><input name="tinfo" id="tinfo" type="text">
      </li><li class="first">Sale End Date<span class="red-txt"> *</span>
	  </li><li><input name="sledate" type="text" id="sledate" placeholder="MM/DD/YYYY">
		<script language="JavaScript">
										new tcal ({
											// form name
											'formname': 'crevform',
											// input name
											'controlname': 'sledate'
										});
									
										</script>
		<div class="err-txt" id="err43"></div></li>
	</ul>
	</div> 
	<?php for($it=1;$it<=5;$it++) 
	{
		if($it!=1)
		{
			$discnd='style="display:none;"';
		} 
	?> 
	<div class="evnt-d-form evnt-d-formt" <?php echo $discnd; ?> id="ticdiv<?php echo $it; ?>">
    <ul>
      <li class="first">Ticket Name <span class="red-txt">*</span> </li><li class="large">
        <input name="tname<?php echo $it; ?>" type="text" id="tname<?php echo $it; ?>" placeholder="Eg. Early Bird Registration or The College Fever Special Price">
		<div class="err-txt" id="err48<?php echo $it; ?>"></div>
      </li><li class="first">Ticket Description </li><li class="large">
	  <input name="tdesc<?php echo $it; ?>" id="tdesc<?php echo $it; ?>" placeholder="Enter any description or information you wish to display with this ticket type">
      </li><li class="first">Price per ticket<span class="red-txt"> *</span>
		</li><li>
		<input name="slprice<?php echo $it; ?>" type="text" id="slprice<?php echo $it; ?>" placeholder="Enter price in INR" value="<?php echo $getevdet->slprice; ?>"><div class="err-txt" id="err44<?php echo $it; ?>"></div>
        </li><li class="first">
		Maximum Registrations <span class="red-txt">*</span></li><li>
        <select name="maxreg<?php echo $it; ?>" id="maxreg<?php echo $it; ?>">
			<option value="">Select</option>
			<?php for($i=1;$i<=100;$i++) { ?>
				<?php if($getevdet->maxreg==$i) { ?>
					<option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
				<?php } else { ?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } ?>
			<?php } ?>
        </select>
        <div class="err-txt" id="err45<?php echo $it; ?>"></div>
        </li><li class="first">Minimum Order at a Time <span class="red-txt">*</span>
		</li><li>
	  <select name="minorder<?php echo $it; ?>" id="minorder<?php echo $it; ?>">
	  		<option value="">Select</option>
			<?php for($i=1;$i<=100;$i++) { ?>
				<?php if($getevdet->minorder==$i) { ?>
					<option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
				<?php } else { ?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } ?>
			<?php } ?>
        </select>
	  <div class="err-txt" id="err46<?php echo $it; ?>"></div>
        </li><li class="first">Maximum Order at a Time <span class="red-txt">*</span>
		</li><li>
	  <select name="maxorder<?php echo $it; ?>" id="maxorder<?php echo $it; ?>">
	  		<option value="">Select</option>
			<?php for($i=1;$i<=100;$i++) { ?>
				<?php if($getevdet->maxorder==$i) { ?>
					<option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
				<?php } else { ?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } ?>
			<?php } ?>
        </select>
	  <div class="err-txt" id="err47<?php echo $it; ?>"></div>
        </li>
    </ul>
  </div>
  <?php } ?>
  <div class="event-form">
    <div class="ev-cr-submit">
      <!--<input name="subcrev4" type="submit" id="subcrev4" value="Save Draft" onClick="return CheckCr4();">-->
      <input name="" type="button" value="Previous" class="prev"><input name="subcrev5" type="submit" class="last1" id="subcrev5" value="Publish" onClick="return CheckCr4();">
      </div>
  </div>
  </div>
  </form>
  </div>
  
</div>
<?php include('includes/social-main.php'); ?>
<?php include('includes/footer.php'); ?>
</body>
</html>
