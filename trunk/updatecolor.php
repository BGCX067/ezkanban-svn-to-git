<?php

$id = $_POST['id'];
$color = $_POST['color'];

include ('config.php');

$sql = 'UPDATE notes SET color = "'. $color .'" WHERE id ='. $id;

//Execute Query
mysqli_query($link, $sql) or die("Error updating :".mysqli_error());

?>