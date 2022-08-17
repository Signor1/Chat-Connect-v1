<?php 

session_start();
include_once "config.php";

$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);

if(!empty($email) && !empty($password)){
	//checking user's entered details mtched the one in the database
	$sql = mysqli_query($db, "SELECT * FROM users WHERE email = '{$email}'");
	if(mysqli_num_rows($sql) > 0){ //if email matched the ones in the database
		$row = mysqli_fetch_assoc($sql);

		if(password_verify($password, $row['password'])){

			$timeStamp = time();  //for last seen calculation
			$status = "Active now"; //updating the status of the logged out user to active

			$sql2 = mysqli_query($db, "UPDATE users SET status = '{$status}', last_seen = {$timeStamp} 	WHERE unique_id={$row['unique_id']}");

			if($sql2){
				$_SESSION['unique_id'] = $row['unique_id']; //using unique_id as the session id
				echo "success";
			}

		}else{
			echo "Email or Password is incorrect";
		}	
		
	}else{
		echo "Email or Password is incorrect";
	}
}else{
	echo "All input fields are required!";
}
