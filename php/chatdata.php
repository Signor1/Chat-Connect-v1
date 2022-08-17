<?php 
	while($rows = mysqli_fetch_assoc($sql)){
		$sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$rows['unique_id']} OR 			outgoing_msg_id = {$rows['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} OR 			incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
		$query2 = mysqli_query($db, $sql2);
		$row2 = mysqli_fetch_assoc($query2);
		if(mysqli_num_rows($query2) > 0){
			$result = $row2['msg'];
		}else{
			$result = "No message available";
		}

		(strlen($result) > 28) ? $msg = substr($result, 0, 28).'...' : $msg = $result;
		//adding you: to text, if the user that logged in sends message
		($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";

		//checking online and offline status
		($rows['status'] == "Offline now") ? $offline = "offline" : $offline = "";

		$output .= '<a href="chat.php?user_id='.$rows['unique_id'].'">
						<div class="content">
							<img src="php/images/'. $rows['img'] .'" alt="Profile-Img">
							<div class="details">
								<span>'. $rows['fname'] ." ". $rows['lname'] .'</span>
								<p>'. $you . $msg .'</p>
							</div>
						</div>
						<div class="status-dot'.' '.$offline.'">
							<i class="ri-checkbox-blank-circle-fill"></i>
						</div>
					</a>';

	}
?>