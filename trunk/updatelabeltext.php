<?php

$newtitle = $_POST["value"];
$id = $_POST["id"];

include ('config.php');

//Setup Query
$sql = "UPDATE labels SET text = '$newtitle' WHERE id = '$id'";
	
//Execute Query
mysqli_query($link,$sql) or die("Error updating Label Text :".mysqli_error());

// Have to echo back the value for jeditable to render.
echo $newtitle;

?>