<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="fav.ico">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
$now = strtotime('2014-06-03'); // or your date as well
     $your_date = strtotime("2014-06-01");
     $datediff = $now - $your_date;
     echo floor($datediff/(60*60*24));
?>
</body>
</html>
