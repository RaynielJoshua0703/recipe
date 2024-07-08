<?php
// Connection.
require '../PHP/connection.php';

if(isset($_GET['food'])){
    $foodID = mysqli_real_escape_string($connect, $_GET['food']);
    $sql = "DELETE FROM favorites WHERE idrecipe = $foodID";	
	$result = mysqli_query($connect, $sql);
	
	if ($result == TRUE) {
	header('location: profile.php');
	exit();
	}
}