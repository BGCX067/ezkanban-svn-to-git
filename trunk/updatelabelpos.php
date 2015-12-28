<?php
if(!$_POST["data"]){
	echo "Nothing Sent";
	exit;
}

include ('config.php');

//decode JSON data received from AJAX POST request
$data = json_decode($_POST["data"]);

foreach($data->coords as $item) {
	
	//Extract id number for panel
	$my_id = preg_replace('/[^\d\s]/', '', $item->currentId);
	//Extract X number for panel
	$coord_X = preg_replace('/[^\d\s]/', '', $item->coordTop);
	//Extract Y number for panel
	$coord_Y = preg_replace('/[^\d\s]/', '', $item->coordLeft);
	//escape just-in case
	
	$id = mysqli_real_escape_string($link,$my_id);
	$x_coord = mysqli_real_escape_string($link, $coord_X);
	$y_coord = mysqli_real_escape_string($link, $coord_Y);
	
	//Setup Query
	$sql = "UPDATE labels SET x_pos = '$x_coord', y_pos = '$y_coord' WHERE id = '$id'";
	
	//Execute Query
	mysqli_query($link, $sql) or die("Error updating Coords :".mysqli_error());
	
}

//Return Success
echo "success";


?>
