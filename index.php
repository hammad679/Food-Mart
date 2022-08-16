<?php
include 'connection.php';
$ipaddress = '';
if ($_SERVER['REMOTE_ADDR'])
	$ipaddress = $_SERVER['REMOTE_ADDR'];
else if (getenv('HTTP_CLIENT_IP'))
	$ipaddress = getenv('HTTP_CLIENT_IP');
else if (getenv('HTTP_X_FORWARDED_FOR'))
	$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
else if (getenv('HTTP_X_FORWARDED'))
	$ipaddress = getenv('HTTP_X_FORWARDED');
else if (getenv('HTTP_FORWARDED_FOR'))
	$ipaddress = getenv('HTTP_FORWARDED_FOR');
else if (getenv('HTTP_FORWARDED'))
	$ipaddress = getenv('HTTP_FORWARDED');
else if (getenv('REMOTE_ADDR'))
	$ipaddress = getenv('REMOTE_ADDR');
else
	$ipaddress = 'UNKNOWN';
$q = "INSERT INTO `stats` (`ip_address`, `coordinates`,`city`) VALUES ('$ipaddress','','');";
mysqli_query($con, $q);
$error_msg = "";
if (isset($_POST['login']) || isset($_POST['signup'])) {
	session_start();

	if (isset($_POST['login'])) {
		$log_email = $_POST['log_email'];
		$log_pass  = $_POST['log_pass'];
		$q = "SELECT name,password from users where email='$log_email'; ";
		$q1 = mysqli_query($con, $q);
		$row = mysqli_fetch_array($q1);
		if ($row['password'] == $log_pass) {
			$_SESSION['log_email'] = $log_email;
			$_SESSION['log_name'] = $row['name'];
			$_SESSION['log_client'] = "user";
			$q_ip = "INSERT INTO `stats` (`ip_address`, `coordinates`,`city`,`client`,`status`) VALUES ('$ipaddress','','','$log_email','login');";
			mysqli_query($con, $q_ip);
			header("location:home.php");
		} else {
			$error_msg = "incorrect email or password";
		}
	} else if (isset($_POST['signup'])) {
		$sign_name    = $_POST['sign_name'];
		$sign_pass    = $_POST['sign_pass'];
		$sign_email   = $_POST['sign_email'];
		$sign_phone   = $_POST['sign_phone'];
		$sign_address = $_POST['sign_address'];
		$q2 = "SELECT email from users where email='$sign_email' ";
		$row = mysqli_query($con, $q2);
		$rowcount = mysqli_num_rows($row);
		if ($rowcount > 0) {
			$error_msg = "email already exists";
		} else {
			$q = "INSERT INTO `users` (`name`, `password`, `email`, `phone`, `address`) VALUES ('$sign_name', '$sign_pass', '$sign_email', '$sign_phone', '$sign_address');";
			$q1 = mysqli_query($con, $q);
			if ($q1) {
				$_SESSION['log_email'] = $sign_email;
				$_SESSION['log_name'] = $sign_name;
				$_SESSION['log_client'] = "user";
				$q_ip = "INSERT INTO `stats` (`ip_address`, `coordinates`,`city`,`client`,`status`) VALUES ('$ipaddress','','','$log_email','signup');";
				mysqli_query($con, $q_ip);
				header("location:home.php");
			}
		}
	}
}
?>
<?php include 'header.php'; ?>
<section class="hero-section">
	<div class="container py-5">
		<div class="d-flex flex-column align-items-center justify-content-center py-5 bg-dark">
			<h1 class="text-center text-warning display-1" data-aos="fade-up">FOOD MART</h1>
			<h3 class="text-center text-warning" data-aos="fade-up">Giving your Hunger a new Option</h3>
		</div>
	</div>
</section>
<?php include 'footer.php'; ?>