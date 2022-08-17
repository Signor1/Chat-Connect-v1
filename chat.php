<?php
session_start();

if (!isset($_SESSION['unique_id'])) {
	header("location: login.php");
}
?>

<?php 
//including the head
include_once "includes/head.php";
?>

<body>
	<!-- preloader  -->
	<div class="preloader">
		<div class="semipolar-spinner">
			<div class="ring"></div>
			<div class="ring"></div>
			<div class="ring"></div>
			<div class="ring"></div>
			<div class="ring"></div>
		</div>
	</div>
	<!-- end of preloader  -->

	<!-- overall container  -->
	<div class="overall-container">
		<!-- the background animation  -->
		<div id="bgAnime">
			<div id='stars'></div>
			<div id='stars2'></div>
			<div id='stars3'></div>
		</div>
		
		<!-- General Container wrapper DOM content after preloader goes off  -->
		<div class="general-container">
			<!-- Signup wrapper  -->
			<div class="wrapper">
				<!-- form and signup section  -->
				<section class="chat-area">
					<!-- header section logo -->
					<header id="chatsheader">
						<div class="logo">
							<img src="img/icons/links-fill-white-lg.png" alt="Logo Image">
							<h1>ChatConnect</h1>
						</div>

						<div class="connect">
							<h3 id="status"></h3>
							<h4 id="timeUpdate"></h4>
						</div>
					</header>
					<!-- end of header section  -->

					<!-- header section user profile  -->
					<header id="userProfile">
						<?php
							include_once "php/config.php";
							$user_id = mysqli_real_escape_string($db, $_GET['user_id']);
							$sql = mysqli_query($db, "SELECT * FROM users WHERE unique_id = {$user_id}");
							if (mysqli_num_rows($sql) > 0) {
								$row = mysqli_fetch_assoc($sql);
							}
						?>
						<a href="users.php" class="back-icon"><i class="ri-arrow-left-fill"></i></a>
						<img src="php/images/<?php echo $row['img']; ?>" alt="Profile Image">

						<div class="details">
							<span><?php echo $row['fname']. " ".$row['lname']; ?></span>
							<p><?php echo $row['status']; ?></p>
						</div>
					</header>

					<div class="chat-box">
						
					</div>
		
					<form action="#" class="typing-area">
						<input type="text" hidden name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" >
						<input type="text" hidden name="incoming_id" value="<?php echo $user_id; ?>" >
						<input type="text" name="message" class="input-field"  placeholder="Type a message here...">
						<button><i class="ri-send-plane-fill"></i></button>
					</form>

				</section>

			</div>
			<!-- end of wrapper  -->

			<!-- footer section  -->
			<footer>
				<p>Copyright &copy; <script>
						document.write(new Date().getFullYear());
					</script>
					All Rights Reserved | ChatConnect | Developed By Omemgboji Emma</p>
			</footer>
			<!-- end of footer -->

		</div>
		<!-- End of general container  -->
	</div>
	<!-- close tag for background particles  -->

	<!-- javascript  -->
	<script src="js/status.js"></script>
	<script src="js/chat.js"></script>

</body>

</html>