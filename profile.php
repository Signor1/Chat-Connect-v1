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
				<section class="profile-area">
					<!-- header section logo -->
					<header id="profileheader">
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
					<header id="backBtn">
						<a href="users.php" class="back-icon"><i class="ri-arrow-left-fill"></i></a>
					</header>

					<div class="profileSection">
						<?php
							include_once "php/config.php";
							$user_id = mysqli_real_escape_string($db, $_GET['user_id']);
							$sql = mysqli_query($db, "SELECT * FROM users WHERE unique_id = {$user_id}");
							if (mysqli_num_rows($sql) > 0) {
								$row = mysqli_fetch_assoc($sql);
							}
						?>
						<div class="profileImg">
							<img src="php/images/<?php echo $row['img']; ?>" alt="">
						</div>
						<div class="profileContacts">
							<p>First Name</p>
							<p><i class="ri-user-3-line"></i><span><?php echo $row['fname']; ?></span></p>
							<p>Last Name</p>
							<p><i class="ri-user-3-line"></i><span><?php echo $row['lname']; ?></span></p>
							<p>Phone Number</p>
							<p><i class="ri-phone-line"></i><a href="#"><?php echo $row['phone_no']; ?></a></p>
						</div>
					</div>
					

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

</body>

</html>