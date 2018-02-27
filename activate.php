<?php
require_once('config/config.php');
$errorArray = array();
$user_id = '';
$activation_token = '';
$check = 'true';
if($_GET){
    if (array_key_exists('user_id', $_GET)) {
        $user_id = $_GET['user_id'];
    }
    if (array_key_exists('activation_token', $_GET)) {
        $activation_token = $_GET['activation_token'];
    }
    if ($genObj->checkEmpty($activation_token)) {
        $check = 'false';
    }

    if ($genObj->checkEmpty($user_id)) {
        $check = 'false';
    }
    $user = new User();
    if($check){
        $checkEmail = $user->select_user(array($user_id,$activation_token));
        print_r($checkEmail);
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
                <h3 class="text-center">Activate</h3>
                <h4><?php echo $msg;?></h4>
				<a href="login.php">Login</a>
				
			</div>
		</div>
    </main>
    <footer class="site-footer">
	</footer>
</body>
</html>
<?php include('template/footer.php'); ?>
