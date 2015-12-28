<?php

$id = $_GET['id'];

include ('config.php');

$sql = "DELETE FROM labels WHERE id = ".$id;
	//Execute Query
mysqli_query($link, $sql) or die("Error updating :".mysqli_error());

header( 'Location: index.php' ) ;
?>
