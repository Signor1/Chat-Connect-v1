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
			<!-- header section  -->
			<header id="homeheader">
				<div class="logo">
					<img src="img/icons/links-fill-white-lg.png" alt="Logo Image">
					<a href="index.php">ChatConnect</a>
				</div>
			</header>
			<!-- end of header section  -->

			<!-- main section  -->
			<main>
				<div class="welcome">
					<h1>Chat. Connect. Grow and Inspire &#x1F60D;</h1>
					<p>Signup to connect and chat with people from all around the world.</p>

					<div class="buttons">
						<a href="signup.php" class="signup">
							<i class="ri-user-add-line"></i>
							<span>Signup</span>
						</a>

						<a href="login.php" class="login">
							<i class="ri-key-2-line"></i>
							<span>Login</span>
						</a>
					</div>
				</div>

				<div id="img1">
					<img src="img/1.png" alt="">
				</div>



			</main>
			<!-- end of main section  -->

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
	<!-- end of overall container  -->

</body>

</html>