<?php
require_once('config/config.php');

$school_name = '';
$user_name = '';
$school_email = '';
$password = '';
$c_password = '';
$errorArray = Array();

if ($_POST) {
	
	if (array_key_exists('school_name', $_POST)) {
		$school_name = $_POST['school_name'];
	}
	if (array_key_exists('user_name', $_POST)) {
		$user_name = $_POST['user_name'];
	}
	if (array_key_exists('school_email', $_POST)) {
		$school_email = $_POST['school_email'];
	}
	if (array_key_exists('password', $_POST)) {
		$password = $_POST['password'];
	}
	if (array_key_exists('c_password', $_POST)) {
		$c_password = $_POST['c_password'];
	}
	
	if ($genObj->checkEmpty($school_name)) {
		$errorArray[] = "Please enter school name";
	}

	if ($genObj->checkEmpty($user_name)) {
		$errorArray[] = "Please enter user name";
	}

	if ($genObj->checkEmpty($school_email)) {
		$errorArray[] = "Please enter Email address";
	}

	if ($genObj->checkEmpty($password)) {
		$errorArray[] = "Please enter password";
	}

	if ($genObj->checkEmpty($c_password) && $c_password == $password) {
		$errorArray[] = "Please enter confirm password same as password";
	}

	$user = new User();
	$checkEmail = $user->check_user('email', $school_email);
	$checkUserName = $user->check_user('username', $user_name);

	if($checkEmail){
		$errorArray[] = "Please enter different Email address";
	}

	if($checkUserName){
		$errorArray[] = "Please enter different username";
	}
	if(count($errorArray) == 0){
		$userInsert = $_POST;
		$userInsert['password'] = md5($salt.$password);
		$activation_token = $userInsert['active_token'] = md5(time());
		$user_id = $user->insert($userInsert);
		
		$headers = 'From: ' . $email_from . "\r\n" .
			'Reply-To: ' . $email_from . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
		$link = $BASE_URL.'activate.php?user_id='.$user_id.'&activation_token='. $activation_token;
		ob_start();
		include "template/mail/activationmail.php";
		$myvar = ob_get_clean();
		$email_message = $myvar;
		@mail($school_email, 'Activate Your Account', $email_message, $headers);
		echo "<script>
		alert('Check Your Mail for complete your registration with verify your Email Address');
		window.location.href='login.php';
		</script>";
	}

}
?>
<?php include('template/header.php'); ?>
<body class="login-layout login">
    <main class="page-content" aria-label="Content" id="main-content">
		<div class="wrapper">
			<header class="main-header">
				<img src="images/logo.png" alt="citrusbug">
			</header>
			<div class="card">
				<h3 class="text-center">Register</h3>
				<form action="" method="post" id="registration" class="form">
					<?php 
						if(count($errorArray) > 0){
							foreach($errorArray as $error){
								echo '<label class="error">'.$error.'</label>';
							}
						}
					?>
					<div>
						<label for="">School Name</label>
						<input type="text" name="school_name" id="school_name" value="<?php echo $school_name; ?>">
					</div>

					<div>
						<label for="">User Name</label>
						<input type="text" name="user_name" id="user_name" value="<?php echo $user_name; ?>">
					</div>
					
					<div>
						<label for="">E-Mail Address</label>
						<input type="email" name="school_email" id="school_email" value="<?php echo $school_email; ?>">
					</div>

					<div>
						<label for="">Password</label>
						<input type="password" max name="password" id="password" value="<?php echo $password; ?>">
					</div>

					<div>
						<label for="">Confirm Password</label>
						<input type="password" name="c_password" id="c_password" value="<?php echo $c_password; ?>">
					</div>

					<div class="buttons">
						<button class="button-login">Register</button>
					</div>
				</form>
				<a href="login.php">Login</a>
			</div>
		</div>
    </main>
    <footer class="site-footer">
	</footer>

</body>
</html>
<?php include('template/footer.php'); ?>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/custom/registration.js"></script>