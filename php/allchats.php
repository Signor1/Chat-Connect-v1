<?php
	session_start();
	include_once "config.php";
	
	$outgoing_id = $_SESSION['unique_id'];
	$sql = mysqli_query($db, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}");
	$output = "";
	if(mysqli_num_rows($sql) == 0){
		$output .= "No user available to chat";
	}elseif(mysqli_num_rows($sql) > 0){
		include "chatdata.php";
	}
	echo $output;

?>