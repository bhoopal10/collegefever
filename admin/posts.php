<?php
	session_start();
	require ("fileupload-class.php");
if($_SESSION['pmadminid']=="")
{		 
echo "<script>location.replace('adminlogin.php')</script>";
}
require ("sql.php");	
$task = $_REQUEST['task'];
if($task == "delpost")
{
	mysql_query("delete from posts where id='".$_REQUEST['id']."'");
}
if($task == "delcomment")
{
	mysql_query("delete from comment where id='".$_REQUEST['id']."'");
}


if($_REQUEST['uid']!="")
{
	$_SESSION['puid']=$_REQUEST['uid'];
}
if($_REQUEST['uid']=="All")
{
	$_SESSION['puid']="";
}
if($_SESSION['puid']!="")
{
	$cnd1="where uid='".$_SESSION['puid']."'";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href='http://fonts.googleapis.com/css?family=Lusitana' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
<script> 
$(document).ready(function(){
<?php 
for($i=1;$i<=$pstcnt;$i++)
{
	?>
	$("#vwcm<?php echo $i; ?>").click(function(){
    	$("#shwcm<?php echo $i; ?>").slideDown("slow");
		$("#vwcm<?php echo $i; ?>").hide();
		$("#clscm<?php echo $i; ?>").show();
    });
	$("#clscm<?php echo $i; ?>").click(function(){
    	$("#shwcm<?php echo $i; ?>").slideUp("slow");
		$("#clscm<?php echo $i; ?>").hide();
		$("#vwcm<?php echo $i; ?>").show();
    });
	<?php
}
?>
});  
</script>
<script type="text/javascript">
	function showcom(pid,location)
	{
		document.getElementById('pid').value=pid;
		document.getElementById('location').value=location;
		document.getElementById('add-comment').style.display='block';
	}
</script>
<style>
.black_overlay1{
			position: fixed;
			top: 0px;
			left: 0px;
			width: 100%;
			height: 100%;
			background-color: black;
			z-index:5000;
			-moz-opacity: 0.5;
			opacity:.50;
			filter: alpha(opacity=50);

}
.topbox11Q{
	line-height:18px;
	position: absolute;
	left: 50%;
	top: 10%;
	margin:0 0 0 -300px;
	padding: 17px;
	width: 600px;
	z-index: 5102;
	overflow: visible;
	visibility: visible;
	/*background:url(../images/auditions.png) no-repeat;*/
	color:#333333;
	background:#FFFFFF;
	padding:20px;
	border:dashed 3px #CCCCCC;
	}
.close-div
{
	position:absolute; right:20px; top:20px; color:#FF0000; font-size:14px; cursor:pointer;
}
.middle-area 
{
	font-family:'Lusitana';
	font-size:14px;
	color:#767776;
}
.middle-area a
{
	color:#1f487d;
}

</style>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>::: College Fever - Admin :::</title>
  <LINK href="css/general.css" type=text/css rel=stylesheet>
  <LINK href="css/layout.css" type=text/css rel=stylesheet>
  <link href="css/content.css" rel="stylesheet" type="text/css" />
  <link href="css/word.css" rel="stylesheet" type="text/css" />
  <link href="../css/posts.css" rel="stylesheet" type="text/css" />
</head>
<body >
<table cellSpacing=0 cellPadding=0 width="100%" border=0 >
   <tr>
    	<td>
	 	 <?php include("top.php");?>
		</td>
	</tr>
	<tr >
		<td >
			<table border="0" cellpadding="0" cellspacing="0" width="100%" height="450px">
				<tr>
					<td width="15%" class="admintr" align="left">
						<?php include("leftmenu.php");?>					</td>
					<td width="80%" style="padding-left:20px">
					<br /><br /><br /><br />
					<span style="padding-left:20px;">
					<h2>Posts</h2>
					<form action="" method="post">
					<table width="600" border="0" cellpadding="6" cellspacing="1" bgcolor="#CCCCCC">
                      <tr>
                        <td colspan="3" bgcolor="#FFFFFF"><h3>Filter Posts by User </h3></td>
                      </tr>
                      <tr>
                        <td width="19%" bgcolor="#FFFFFF">Select&nbsp;User</td>
                        <td width="24%" bgcolor="#FFFFFF"><select name="uid" id="uid">
						<option value="All">All Users</option>
						<?php 
						$getusr=mysql_query("select * from register order by name asc");
						while($getusr1=mysql_fetch_object($getusr))
						{
							if($_SESSION['puid']==$getusr1->id)
							{
								?><option value="<?php echo $getusr1->id; ?>" selected="selected"><?php echo $getusr1->name; ?></option><?php
							}
							else
							{
								?><option value="<?php echo $getusr1->id; ?>"><?php echo $getusr1->name; ?></option><?php
							}
						}
						?>
                        </select>                        </td>
                        <td width="57%" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="Filter" /></td>
                      </tr>
                    </table>
					</form>
					<br />
					<div class="middle-area">   
<?php
$getpst=mysql_query("select * from posts ".$cnd1." order by pdate desc");
$pstcnt=mysql_num_rows($getpst);
if(mysql_num_rows($getpst)<=0)
{
	?><p class="redtxt">There are no posts available now</p><?php
}
else
{
$pcnt=0;
while($getpst1=mysql_fetch_object($getpst))
{
$pcnt++;
	$getpusr=mysql_fetch_object(mysql_query("select * from register where id='".$getpst1->uid."'"));
	if($getpst1->uid==$_SESSION['uid'])
	{
		$optxt='style="display:block;"';
	}
	else
	{
		$optxt='style="display:none;"';
	}
?>        
      <div class="detail-area">
	  	<div class="det-area">
		<div style="position:absolute; right:10px; top:10px;"><a href="posts.php?task=delpost&id=<?php echo $getpst1->id; ?>"><img src="images/qno.jpg" border="0" /></a></div>
   		<div class="head-area">
        	<div class="img-area">
            	<?php
		if( $getpusr->pic!="")
		{
			?><img src="../upfile/<?php echo $getpusr->pic; ?>" /><?php
		}
		else
		{
			?><img src="../images/nophoto.png" /><?php
		}
		?>
            
            </div><div class="txt-area"><?php echo $getpusr->name; ?></div>
        </div>
        <div class="category">
        	Category: <?php echo $getpst1->category; ?> 
            <?php
			if($getpst1->subcategory!="")
			{
				echo ' - '.$getpst1->subcategory.'';
			}
			?>
        </div>
            <div class="desc-area">
            <?php echo $getpst1->content; ?>
            </div>
            <div class="v-img">
            <?php if($getpst1->pic!="") { ?>
	          <img src="../upfile/<?php echo $getpst1->pic; ?>" style="max-width:570px;" />
          <?php } ?>
            </div>
            <div class="v-img">
            <?php if($getpst1->vlink!="") { ?>
	          <?php echo $getpst1->vlink; ?>
          <?php } ?>
            </div>
            <div class="post-date">
            Posted on <?php echo date('d M,y @ g:i A', strtotime($getpst1->pdate)); ?>
            </div>
			</div>
			
			<div class="det-area">
            <div class="share-area">
            	<ul>
                	<li><a name="pl<?php echo $getpst1->id; ?>" id="pl<?php echo $getpst1->id; ?>" class="anch"></a>
					<?php
					$chklike=mysql_num_rows(mysql_query("select * from plikes where uid='".$_SESSION['uid']."' and pid='".$getpst1->id."'"));
					?>
					<span class="comment-button"><div class="f-img"><img src="../images/f-up.png" /></div><div class="f-text">Like</div></span>
					
					</li><li class="count-li">
					<?php $likecnt=mysql_fetch_object(mysql_query("select count(id) as plcnt from plikes where pid='".$getpst1->id."'")); ?>
					<div class="like-count"><img src="../images/l-arrow.png" class="like-arrow" /><?php echo $likecnt->plcnt; ?></div>
					</li><li>			
					<span class="comment-button"><div class="f-img">Comment</div><div class="f-text"><img src="../images/comment_icon.png" /></div></span>				
				</li><li>
					<?php $getcmcount=mysql_fetch_object(mysql_query("select count(id) as cntid from comment where pid='".$getpst1->id."'")); ?>
					<div class="like-count"><img src="../images/l-arrow.png" class="like-arrow" /><?php echo $getcmcount->cntid; ?></div>
					</li>
                </ul>
            </div>
			</div>
			<div class="comments"  id="shwcm<?php echo $pcnt; ?>">
			<h2 align="center">Comments</h2>
			
			<?php
			$getcmnt=mysql_query("select * from comment where pid='".$getpst1->id."'");
			if(mysql_num_rows($getcmnt)==0)
			{
				?><p class="redtxt" align="center">There are no comments added yet</p><?php
			}
			else
			{
			while($getcmnt1=mysql_fetch_object($getcmnt))
			{
				$getudet=mysql_fetch_object(mysql_query("select * from register where id='".$getcmnt1->uid."'"));
			?>
			<div class="ucomment">
			<a href="posts.php?task=delcomment&id=<?php echo $getcmnt1->id; ?>" class="c-close"><img src="../images/c-close.png" alt="Delete Comment" /></a>
			<div class="cmdet1">
				<div class="cmmnts">	<?php
		if( $getudet->pic!="")
		{
			?><img src="../upfile/<?php echo $getudet->pic; ?>" /><?php
		}
		else
		{
			?><img src="../images/nophoto.png" /><?php
		}
		?></div>
				<div class="cmmnts1"><span class="name-area"><?php $pieces=explode(" ", $getudet->name); echo $pieces[0]; ?></span></div>
				<div class="cmmnts2"><?php echo $getcmnt1->comment ?></div>
				<div class="cmmnts3"><span class="cm-post-date"><?php echo date('d M,y @ g:i A', strtotime($getcmnt1->pdate)); ?></span></div>
			</div>
			</div>
			<?php
			}
			}
			?>
			
			</div>
			
			
			
      </div>
<?php
}
}
?>      
      
    </div></td>
				</tr>
			</table>	
		</td>
	</tr>
</table>
</body>
</html>