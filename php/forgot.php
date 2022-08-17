<?php 

session_start();
include_once "config.php";

$email = mysqli_real_escape_string($db, $_POST['email']);
$newpassword = mysqli_real_escape_string($db, $_POST['password']);

if(!empty($email) && !empty($newpassword)){
	//checking user's entered details mtched the one in the database
	$sql = mysqli_query($db, "SELECT * FROM users WHERE email = '{$email}'");
	if(mysqli_num_rows($sql) > 0){ //if email matched the ones in the database

		//hashing the new password
		$newhashpassword = password_hash($newpassword, PASSWORD_DEFAULT);

		$sql2 = mysqli_query($db, "UPDATE users SET password = '{$newhashpassword}' WHERE email='{$email}'");

		if($sql2){
			echo "success";
		}	

	}else{
		echo "Account does not exist!";
	}	

}else{
	echo "All input fields are required!";
}	

?>