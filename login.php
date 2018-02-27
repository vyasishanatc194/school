<?php
require_once('config/config.php');
include('template/header.php'); ?>
<body class="login-layout login">
    <main class="page-content" aria-label="Content" id="main-content">
		<div class="wrapper">
			<header class="main-header">
				<img src="images/logo.png" alt="citrusbug">
			</header>
			<div class="card">
				<h3 class="text-center">LOGIN</h3>
				<form action="" class="form">
					<div>
						<label for="">E-Mail Address</label>
						<input type="email">
					</div>
					
					<div>
						<label for="">Password</label>
						<input type="password">
					</div>

					<!-- <div class="checkbox padd_0 margin-left--15">
						<input type="checkbox" id="rememberme">
						<label for="rememberme">Remember Me</label>

						<a href="#" class="forgot">Forgot your password?</a>
					</div> -->

					<div class="buttons">
						<button class="button-login" >Login</button>
					</div>
				</form>
				Create New account <a class="button-login" href="register.php">Sign up</a>
				<a href="forgotpassword.php">Forgot Password</a>
			</div>
		</div>
    </main>
    <footer class="site-footer">
	</footer>
</body>
</html>
<?php include('template/footer.php'); ?>
