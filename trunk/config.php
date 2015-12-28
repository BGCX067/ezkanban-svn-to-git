<?php
/*Database Settings*/

$db_host ="localhost";
$db_name = "ezkanban";
$db_usr = "ezkanban";
$db_pass = "ezkanban";

$link = mysqli_connect($db_host, $db_usr, $db_pass) or die("MySQL Error: " . mysqli_error());
mysqli_select_db($link, $db_name) or die("MySQL Error: " . mysqli_error());
?>
