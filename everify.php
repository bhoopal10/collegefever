<?php
require('admin/sql.php');
session_start();
$updet=mysql_query("update register set everify='Yes' where id='".$_REQUEST['tuid']."'");
if($updet)
{
	?>
	<script>
		alert('Your Email ID has been successfully verified');
		location.replace('login.php');
	</script>
	<?php
}
else
{
	?>
	<script>
		alert('Your Email ID verification failed, Try again');
		location.replace('signup.php');
	</script>
	<?php
}
?>