<?php
$error_msg = "";
if (isset($_POST['login']) || isset($_POST['signup'])) {
    include 'connection.php';
    session_start();

    if (isset($_POST['login'])) {
        $log_email = $_POST['log_email'];
        $log_pass  = $_POST['log_pass'];
        $q = "SELECT name,password from riders where email='$log_email'; ";
        $q1 = mysqli_query($con, $q);
        $row = mysqli_fetch_array($q1);
        if ($row['password'] == $log_pass) {
            $_SESSION['rider_log_name'] = $row['name'];
            $_SESSION['rider_log_email'] = $log_email;
            $_SESSION['log_client'] = "rider";
            header("location:rider_home.php");
        } else {
            $error_msg = "incorrect email or password";
        }
    } else if (isset($_POST['signup'])) {
        $sign_name    = $_POST['sign_name'];
        $sign_pass    = $_POST['sign_pass'];
        $sign_email   = $_POST['sign_email'];
        $sign_phone   = $_POST['sign_phone'];
        $sign_address = $_POST['sign_address'];
        $q2 = "SELECT email from riders where email='$sign_email' ";
        $row = mysqli_query($con, $q2);
        $rowcount = mysqli_num_rows($row);
        if ($rowcount > 0) {
            $error_msg = "email already exists";
        } else {
            $q1 = "INSERT INTO `riders` (`name`, `password`, `email`, `phone`, `address`) VALUES ('$sign_name', '$sign_pass', '$sign_email', '$sign_phone', '$sign_address');";
            $q3 = mysqli_query($con, $q1);
            if ($q3) {
                $_SESSION['rider_log_email'] = $sign_email;
                $_SESSION['rider_log_name'] = $sign_name;
                $_SESSION['log_client'] = "rider";
                header("location:rider_home.php");
            }
        }
    }
}
?>
<?php include 'header.php'; ?>
<div class="page-title">
    <div class="container">
        <h1 class="entry-title display-1 text-center fw-bold text-light mb-4">Rider Login</h1>
    </div>
</div>
<div class="main-page-wrapper">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <img src="images/rider.png" width="90%">
                    </div>
                    <div class="col-6">
                        <h2 class="display-2">Our Services</h2>
                        <p>A partner will confirm your order request within 60 seconds. We will contact you with the closest partner and ensure your parcel is delivered on time.</p>
                        <p>Your Favourite Eatery is a Tap Away Order food from any eatery in your city and get it delivered in a few minutes.</p>
                        <p>Get in touch
Call us now at +9221 38654444, or visit us at locations below.
Locations
Head Office : 4th Floor, Ebrahim Estates , Near Anum Empire, Baloch Bridge, Shahrah-e-Faisal - 75350
Regional Office South : University Road, between Nipa Chorangi & Hassan Square, near Bait-ul-Mukarram Masjid, Gulshan-e-Iqbal - 75300
Regional Office Central : Block 56-A2, Tipu Road, Gulberg 3, near Ghalib Market - 54660
Regional Office North : Office # 2, First Floor Shalimar Plaza Jinnah Avenue Blue Area - 44000</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>