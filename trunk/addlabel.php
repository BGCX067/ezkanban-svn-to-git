<?php
include ('config.php');

$sql = "Insert into labels(x_pos,y_pos,text) VALUES(15,15,'New Label')";

//Execute Query
mysqli_query($link, $sql) or die("Error updating Coords :".mysqli_error());

header( 'Location: index.php' ) ;

?>