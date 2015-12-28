<?php
include ('config.php');

$sql = "Insert into notes(x_pos,y_pos,title,details,color) VALUES(0,0,'New Note: Double-click to edit','Additional Note Details','yellow')";

//Execute Query
mysqli_query($link, $sql) or die("Error updating Coords :".mysqli_error());

header( 'Location: index.php' ) ;

?>
