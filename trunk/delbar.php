<?php

$id = $_POST['barId'];

include ('config.php');

$sql = "DELETE FROM bars WHERE id = ".$id;
	//Execute Query
mysqli_query($link, $sql) or die("Error updating :".mysqli_error());

?>