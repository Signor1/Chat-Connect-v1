<?php 
	session_start();
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
				<section class="form forgot">
					<!-- header section  -->
					<header id="loginheader">
						<div class="logo">
							<img src="img/icons/links-fill-white-lg.png" alt="Logo Image">
							<a href="index.php">ChatConnect</a>
						</div>
					</header>
					<!-- end of header section  -->

					<!-- form section  -->
					<form action="#">
						<h2>Password Recovery</h2>
						<!-- error msg tag  -->
						<div class="error-txt"></div>
							
						<div class="field input">
							<label for="email">Email Address</label>
							<input type="email" name="email" id="email" placeholder="Your E-mail Address" required>
							<i class="ri-mail-line"></i>
						</div>

						<div class="field input">
							<label for="password">New Password</label>
							<input type="password" name="password" id="password" placeholder="Enter New Password" required>
							<i class="ri-key-line"></i>
							<i class="ri-eye-line" id="pswdeye"></i>
							<i class="ri-eye-off-line" id="pswdeye" style="display: none;"></i>
						</div>



						<div class="field button">
							<input type="submit" value="Continue to Chat">
						</div>

						<div class="link">Not yet signed up? <a href="signup.php">Signup now!</a></div>
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
	<!-- close tag for overall container -->

	<!-- javascript  -->
	<script src="js/showHide.js"></script>
	<script src="js/forgot.js"></script>

</body>

</html>