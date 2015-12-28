<?php 

include ('config.php');

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>EZKanban</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/eggplant/jquery-ui-1.8.10.custom.css" type="text/css" />
	<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.10.custom.min.js"></script>
	<script type="text/javascript" src="js/jquery.ui.droppable.min.js"></script>
	<script type="text/javascript" src="js/jquery.json-2.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.jeditable.min.js"></script>
	<script type="text/javascript" src="js/jquery.simplemodal.1.4.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.ui.dialog.min.js"></script>
	<script type="text/javascript" src="js/ezkanban.js"></script>
</head>

<body>

<!-- div id="respond"></div>-->

<div id="board">

<?php 

	// Render Bars
		$get_bars = mysqli_query($link, "SELECT * FROM bars");
		while($row = mysqli_fetch_array($get_bars)) {
			
			$id = $row['id'];
			$x = $row['x_pos'];
		
			echo '<div id='.$id.' class="bar" style="top:0px; left:'.$x.'px;"></div>';			
		}
		
	// Render Labels
		$get_labels = mysqli_query($link, "SELECT * FROM labels");
		while($row = mysqli_fetch_array($get_labels)) {
			$id = $row['id']; 
			$x = $row['x_pos'];
			$y = $row['y_pos']; 
			$text = $row['text'];
			echo '<div id='.$id.' class="label" style="left:'.$x.'px; top:'.$y.'px;">
					<a class="labelDeleteIcon" href="dellabel.php?id='.$id.'">x</a>
					<p id="'.$id.'" class="editlabel">'.$text.'</p></div>';
			}	

	// Render Notes
		$get_coords = mysqli_query($link, "SELECT * FROM notes");
		while($row = mysqli_fetch_array($get_coords)) {
			$id = $row['id']; 
			$x = $row['x_pos'];
			$y = $row['y_pos']; 
			$title = $row['title'];
			$notes = $row['Notes'];
			$zindex = $row['zindex'];
			$color = $row['color'];
			
			echo '<div id='.$id.' class="note ' . $color . '" style="left:'.$x.'px; top:'.$y.'px; z-index:'.$zindex.';">
					<a class="noteDeleteIcon" href="delnote.php?id='.$id.'">x</a>
					<p id="'.$id.'" class="edit notebody">'.$title.'</p>
					<!-- img class="up" src="images/up.png"><img class="down" src="images/down.png" -->
				  </div>';
			}	
			

?>

<img id="logo" src="images/logo.png" />

</div><!-- board -->

<div id="menu">
	<a href="addnote.php">Add Note</a>
	<a href="addbar.php">Add Bar</a>
	<a href="addlabel.php">Add Label</a>
	<span id="help">Help</span>
</div>


<div id="helpbox" style="display:none">
	<a href="#" class="simplemodal-close"><img style="float:right;border:2px outset #aaa;position:relative;bottom:20px" src="images/close.png" /></a>
	<h1>EZKanban Help</h1>
	<p>EZKanban strives to be a simple, easy-to-use, project execution tool.</p>
	<h2>Add a Note</h2>
	<ul>
		<li>Click the "Add Note" link</li>
		<li>Double click on the note to change the text</li>
		<li>Drag and drop the note to desired location on the board</li>
	</ul>
	<h2>Delete Note</h2>
	<ul>
		<li>Click on the "X" on the top right corner of the note</li>
	</ul>
	<h2>Change Note Color</h2>
	<ul>
		<li>Right-click on body of note</li>
	</ul>
	<h2>Board Labels</h2>
	<ul>
		<li>Add label: Click on add label link</li>
		<li>Delete label: Click on the "X" on the top right corner of the label</li>
		<li>Position label: Drag and drop to desired location</li>
	</ul>	
	<h2>Organization Bars</h2>
	<ul>
		<li>Add bar: Click on add bar link</li>
		<li>Delete bar: double-click on the bar</li>
		<li>Position bar: Drag and drop to desired location</li>
	</ul>	
</div>


</body>

</html>