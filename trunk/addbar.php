<?php
include ('config.php');

$sql = "Insert into bars(x_pos) VALUES('250')";

//Execute Query
mysqli_query($link, $sql) or die("Error updating Coords :".mysqli_error());

header( 'Location: index.php' ) ;

?>