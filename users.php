<?php 
	session_start();

	if(!isset($_SESSION['unique_id'])){
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
				<section class="users">
					<!-- header section logo -->
					<header id="usersheader">
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
							$sql = mysqli_query($db, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
							if(mysqli_num_rows($sql) > 0){
								$row = mysqli_fetch_assoc($sql);
							}
						?>
						<div class="content">

							<img src="php/images/<?php echo $row['img']; ?>" alt="Profile Image">

							<div class="details">
								<span><?php echo $row['fname']. " ".$row['lname']; ?></span>
								<p><?php echo $row['status']; ?></p>
							</div>

						</div>
						<!-- logout button  -->
						<a href="php/logout.php?logout_id=<?php echo $row['unique_id']?>" class="logout">Logout</a>
					</header>

					<div class="users-chats">
						<h3 class="active showUsers">Users</h3>
						<h3 class="showChats">Chats</h3>
					</div>

					<main class="allusers">
						<!-- search section  -->
						<div class="search">
							<input type="search" name="" placeholder="Enter name to search...">
						</div>

						<div class="users-list" style="color: white;">

						</div>

					</main>

					<main class="allchats" style="display: none;">
						<!-- search section  -->
						<div class="search">
							<input type="search" name="" placeholder="Enter name to search...">
						</div>

						<div class="users-list" style="color: white;">
							
							
						</div>

					</main>

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
	<script src="js/users.js"></script>
	<script src="js/status.js"></script>

</body>

</html>