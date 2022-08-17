<?php 
	session_start();

	if(isset($_SESSION['unique_id'])){ //if user is logged in then come to this page otherwise go to login page

		include_once "config.php";
		$logout_id = mysqli_real_escape_string($db, $_GET['logout_id']);
		if(isset($logout_id)){ //if logout_id is set
			$status = "Offline now";
			//running and setting the status of the logged out user to offline
			$sql = mysqli_query($db, "UPDATE users SET status = '{$status}' WHERE unique_id={$logout_id}");
			if($sql){
				session_destroy();
				session_unset();
				header("location: ../login.php");
			}
		}else{
			header("location: ../users.php");
		}

	}else{
		header("location: ../login.php");
	}

?>