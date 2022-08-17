<?php 
	//database connection
	$db = mysqli_connect("localhost", "root", "", "chat_connect");
	if(!$db){
		echo "Database Connected" . mysqli_connect_error();
	}
?>