<?php
require('admin/sql.php');
session_start();
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/jused.js" type="text/javascript"></script>
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
<?php $sql="SELECT r.id,r.name,t.id as teamId,t.name as teamLeader,t.accommodation FROM register r JOIN teams t on r.id=t.user_id";
		$res=mysql_query($sql);
		?>
		<table border="1px solid black">
			<thead>
				<tr>
					<th>Sno</th>
					<th>User</th>
					<th>TeamLeader</th>
					<th>Accommodation</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php while($objArr=mysql_fetch_object($res)) { ?>
				<tr>
					<td>Sno</td>
					<td><?php echo $objArr->name; ?></td>
					<td><?php echo $objArr->teamLeader; ?></td>
					<td><?php echo $objArr->accommodation; ?></td>
				</tr>
			<?php } ?>
				
			</tbody>
		</table>
		<?php
		
		
 ?>
<?php include('includes/social-main.php'); ?>
<?php include('includes/footer.php'); ?>
</body>
</html>
