 <?php 
// ini_set('allow_url_fopen', 'on');
   $app_id = "283803765131019";
   $app_secret = "3d68027528efab599c0dd34e63c50c18";
   $my_url = "http://thecollegefever.com/facetest2.php";
   
?>
 <?php 
   session_start();
   $code = $_REQUEST["code"];

   if(empty($code)) {
     $_SESSION['state'] = md5(uniqid(rand(), TRUE)); //CSRF protection
     $dialog_url = "https://www.facebook.com/dialog/oauth?client_id=" 
       . $app_id . "&redirect_uri=" . urlencode($my_url) . "&state="
       . $_SESSION['state'];

     echo("<script> top.location.href='" . $dialog_url . "'</script>");
   }

   if($_SESSION['state'] && ($_SESSION['state'] === $_REQUEST['state'])) {
     $token_url = "https://graph.facebook.com/oauth/access_token?"
       . "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
       . "&client_secret=" . $app_secret . "&code=" . $code;

     $response = file_get_contents($token_url);
     $params = null;
     parse_str($response, $params);

     $graph_url = "https://graph.facebook.com/me?access_token=" 
       . $params['access_token'];

     $user = json_decode(file_get_contents($graph_url));
     //echo("Hello " . $user->name);
	 $_SESSION['frsvemail']=$user->email;
	 $_SESSION['frsvname']=$user->name;
	 //echo $_SESSION['frsvemail'];
	 //echo $_SESSION['frsvname'];
	 //echo $_SESSION['frsvphone'];
	 require('admin/sql.php');
	 
	 
	 $chkem=mysql_query("select * from register where email='".$_SESSION['frsvemail']."'");
	 if(mysql_num_rows($chkem)>0)
	 {
	 $chkem1=mysql_fetch_object($chkem);
	 $_SESSION['uid']=$chkem1->id;
	 $_SESSION['uname']=$chkem1->fname;
	 $_SESSION['utype']='Facebook';
	 		if($_SESSION['ltype']=='joinevent')
			{
				?><script>location.replace('event_detail_1.php');</script><?php
			}
			else if($_SESSION['ltype']=='createev')
			{
				?><script>location.replace('create_events_1.php?page=evcreate');</script><?php
			}
			else
			{
				?><script>location.replace('index.php');</script><?php
			}
	 }
	 else
	 {
	 $insusr=mysql_query("insert into register(name,email,ltype,adate,atime,everify) values('".$_SESSION['frsvname']."','".$_SESSION['frsvemail']."','Facebook','".date('Y-m-d')."','".date('H:i:s')."','Yes')");
	 $_SESSION['uid']=mysql_insert_id();
	 $_SESSION['uname']=$_SESSION['frsvname'];
	 $_SESSION['utype']='Facebook';
	 		if($_SESSION['ltype']=='joinevent')
			{
				?><script>location.replace('event_detail_1.php');</script><?php
			}
			else if($_SESSION['ltype']=='createev')
			{
				?><script>location.replace('create_events_1.php?page=evcreate');</script><?php
			}
			else
			{
				?><script>location.replace('index.php');</script><?php
			}
	 }
	 
	 

   }
   else {
     echo("The state does not match. You may be a victim of CSRF.");
   }

 ?>