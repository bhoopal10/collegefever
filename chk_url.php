<?php
require('admin/sql.php');
$output = 'true';
$username = mysql_real_escape_string($_POST['url']);
$result = mysql_query("SELECT * FROM event WHERE url='$username'");
while($row = mysql_fetch_array($result))
{
    $output = 'false';
}
echo $output;
?>