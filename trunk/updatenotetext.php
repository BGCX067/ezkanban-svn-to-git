<?php

$newtitle = $_POST["value"];
$id = $_POST["id"];

include ('config.php');

//Setup Query
$sql = "UPDATE notes SET title = '$newtitle' WHERE id = '$id'";
	
//Execute Query
mysqli_query($link,$sql) or die("Error updating Coords :".mysqli_error());

// Have to echo back the value for jeditable to render.
echo $newtitle;

?>