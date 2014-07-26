<?php

/**

 * @file

 * User has successfully authenticated with Twitter. Access tokens saved to session and DB.

 */



/* Load required lib files. */

session_start();

require_once('twitteroauth/twitteroauth.php');

require_once('config.php');



/* If access tokens are not available redirect to connect page. */

if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {

    header('Location: ./clearsessions.php');

}

/* Get user access tokens out of the session. */

$access_token = $_SESSION['access_token'];



/* Create a TwitterOauth object with consumer/user tokens. */

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);



/* If method is set change API call made. Test is called by default. */

$content1 = $connection->get('account/verify_credentials');



/* Some example calls */

//$connection->get('users/show', array('screen_name' => 'abraham'));

//$connection->post('statuses/update', array('status' => date(DATE_RFC822)));

//$connection->post('statuses/destroy', array('id' => 5437877770));

//$connection->post('friendships/create', array('id' => 9436992));

//$connection->post('friendships/destroy', array('id' => 9436992));



/* Include HTML to display on the page */

//include('twit.php');



//$_SESSION['rsvtuser']=$content->screen_name;

//$_SESSION['rsvtid']=$content->id;



require('../admin/sql.php');

//echo $content1->id;

	 $chkem=mysql_query("select * from register where tid='".$content1->id."'");

//mysql_num_rows($chkem);	 

	 if(mysql_num_rows($chkem)>0)

	 {

	 $chkem1=mysql_fetch_object($chkem);

	 $_SESSION['uid']=$chkem1->id;

	 $_SESSION['uname']=$chkem1->fname;

	 $_SESSION['utype']='Twitter';

	 ?>

	 <script>

	 //location.replace('../index.php');

	 location.replace('../index.php');

	 </script>

	 <?php

	 }

	 else

	 {

	 $_SESSION['rtid']=$content1->id;

	 $_SESSION['rtname']=$content1->name;

	 $_SESSION['rtuser']=$content1->screen_name;

	 /*$insusr=mysql_query("insert into register(tid,fname,username,type) 

	 values('".$content->id."','".$content->name."','".$content->screen_name."','Twitter')");

	 $_SESSION['uid']=mysql_insert_id();

	 $_SESSION['uname']=$_SESSION['frsvname'];

	 $_SESSION['utype']='Twitter';*/

	 ?>

	 <script>

	 location.replace('../twemail.php');

	 </script>

	 <?php	 

	 }

	 ?>