<?php
$error_msg = "";
if (isset($_POST['login']) || isset($_POST['signup'])) {
    include 'connection.php';
    session_start();

    if (isset($_POST['login'])) {
        $log_email = $_POST['log_email'];
        $log_pass  = $_POST['log_pass'];
        $q = "SELECT name,password from restaurants where email='$log_email'; ";
        $q1 = mysqli_query($con, $q);
        $row = mysqli_fetch_array($q1);
        if ($row['password'] == $log_pass) {
            $_SESSION['restaurant_log_name'] = $row['name'];
            $_SESSION['restaurant_log_email'] = $log_email;
            $_SESSION['log_client'] = "restaurant";
            header("location:restaurant_home.php");
        } else {
            $error_msg = "incorrect email or password";
        }
    } else if (isset($_POST['signup'])) {
        $sign_name    = $_POST['sign_name'];
        $sign_pass    = $_POST['sign_pass'];
        $sign_email   = $_POST['sign_email'];
        $sign_phone   = $_POST['sign_phone'];
        $sign_address = $_POST['sign_address'];
        $sign_desc    = $_POST['sign_desc'];
        $q2 = "SELECT email from restaurants where email='$sign_email' ";
        $row = mysqli_query($con, $q2);
        $rowcount = mysqli_num_rows($row);
        if ($rowcount > 0) {
            $error_msg = "email already exists";
        } else {
            $q1 = "INSERT INTO `restaurants` (`name`, `password`, `email`, `phone`, `address`,`description`) VALUES ('$sign_name', '$sign_pass', '$sign_email', '$sign_phone', '$sign_address','$sign_desc');";
            $q3 = mysqli_query($con, $q1);
            if ($q3) {
                $_SESSION['restaurant_log_email'] = $sign_email;
                $_SESSION['restaurant_log_name'] = $sign_name;
                $_SESSION['log_client'] = "restaurant";
                header("location:restaurant_home.php");
            }
        }
    }
}
?>

<?php include 'header.php'; ?>
<div class="page-title">
    <div class="container">
        <h1 class="entry-title display-1 text-center fw-bold text-light mb-4">Restaurant Login</h1>
    </div>
</div>
<div class="main-page-wrapper">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="video-wrapper full-height-video">
                    <iframe width="100%" height="650" src="https://www.youtube.com/embed/R8Y7NWC5jgM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>