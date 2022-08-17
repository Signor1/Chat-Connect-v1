<?php 
	while($rows = mysqli_fetch_assoc($sql)){

		//checking online and offline status
		($rows['status'] == "Offline now") ? $offline = "offline" : $offline = "";

		

		$status = $rows['status'];

		$output .= '<a href="profile.php?user_id='.$rows['unique_id'].'">
						<div class="content">
							<img src="php/images/'. $rows['img'] .'" alt="Profile-Img">
							<div class="details">
								<span>'. $rows['fname'] ." ". $rows['lname'] .'</span>
								<p>'. $status.'</p>
							</div>
						</div>
						<div class="status-dot'.' '.$offline.'">
							<i class="ri-checkbox-blank-circle-fill"></i>
						</div>
					</a>';
	}
?>