<?php 

	session_start();
	//including database connection
	include_once "config.php";

	//removing unneccesary white spaces
	$fname = mysqli_real_escape_string($db, $_POST['fname']);
	$lname = mysqli_real_escape_string($db, $_POST['lname']);
	$pnumber = mysqli_real_escape_string($db, $_POST['pnumber']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	if(!empty($fname) && !empty($lname) && !empty($pnumber) && !empty($email) && !empty($password)){
		//checking user's email validity
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //if email is valid
			// checking if the email already exist in the database or not
			$sql = mysqli_query($db, "SELECT email FROM users WHERE email = '{$email}'");
			if(mysqli_num_rows($sql) > 0){ //if email already exist
				echo "$email - Already exist!";
			}else{
				//checking if user uploaded file or not
				if(isset($_FILES['image'])){// if file is uploaded
					$img_name = $_FILES['image']['name']; //getting the user's uploaded  image name
					$tmp_name = $_FILES['image']['tmp_name']; //temporary name used to save/move file in our folder

					//exploding and getting the last extension Eg. jpg or png
					$img_explode = explode('.', $img_name);
					$img_ext = end($img_explode); //we get the extension here

					$extensions = ['png', 'jpeg', 'jpg']; //some valid image extensions stored as an array
					if(in_array($img_ext, $extensions) === true){ //checking if uploaded img ext. matches any of the array element
						$time = time(); //returns current time

						//moving the user's uploaded img to a particular folder
						$new_img_name = $time.$img_name;
						if(move_uploaded_file($tmp_name, "images/".$new_img_name)){

							$status = "Active now"; //user becomes active after signup

							$random_id = rand(time(), 10000000); //creating random id for users

							$timeStamp = time(); //for last seen calculation
							//hash the user's password
							$hashpassword = password_hash($password, PASSWORD_DEFAULT);

							//inserting user's data into the database
							$sql2 = mysqli_query($db, "INSERT INTO users (unique_id, fname, lname, phone_no, email, password, img, last_seen, status) VALUES ({$random_id}, '{$fname}', '{$lname}', '{$pnumber}', '{$email}', '{$hashpassword}', '{$new_img_name}', {$timeStamp}, '{$status}')");

							if($sql2){ //if the submission is successful
								$sql3 = mysqli_query($db, "SELECT * FROM users WHERE email = '{$email}'");
								if(mysqli_num_rows($sql3) > 0){
									$row = mysqli_fetch_assoc($sql3);
									$_SESSION['unique_id'] = $row['unique_id']; //using unique_id as the session id
									echo "success";
								}
							}else{
								echo "Something went wrong!";
							}
						}
						

						

					}else{
						echo "Please select an image file - jpeg, png, jpg!";
					}

				}else{
					echo "Please select an image file!";
				}
			}

		}else{
			echo "$email - This is not a valid email";
		}
	}else{
		echo "All input fields are required";
	}
?>