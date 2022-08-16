<footer class="py-4 text-light" style="background-color: #000;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6">
                <p class="text-uppercase h6 mb-0">
                    All rights reserved. FOOD MART
                </p>
            </div>
            <div class="col-6">
                <ul class="d-flex justify-content-end list-unstyled gap-3 mb-0">
                    <li><a href="restaurant_sign.php" class="btn btn-warning fw-bold">Restaurant login</a></li>
                    <li><a href="rider_sign.php" class="btn btn-warning fw-bold">Rider login</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<div class="modal" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="form-group mb-3">
                        <label for="log_email"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="log_email" class="form-control" required autocomplete="off">
                    </div>

                    <div class="form-group mb-3">
                        <label for="log_pass"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="log_pass" class="form-control" required autocomplete="off">
                    </div>
                    <div id="log_error_msg" class="error_msg"><?php if ($error_msg == "incorrect email or password") echo $error_msg; ?></div>
                    <button type="submit" name="login" value="login" class="btn btn-dark fw-bold w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="form-group mb-3">
                        <label for="sign_name"><b>Name</b></label>
                        <input type="text" placeholder="Enter Name" name="sign_name" class="form-control" required autocomplete="off">
                    </div>

                    <div class="form-group mb-3">
                        <label for="sign_email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="sign_email" class="form-control" required autocomplete="off">
                    </div>

                    <div class="form-group mb-3">
                        <label for="sign_pass"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="sign_pass" class="form-control" required autocomplete="off">
                    </div>

                    <div class="form-group mb-3">
                        <label for="sign_phone"><b>Phone</b></label>
                        <input type="text" placeholder="Enter Phone" name="sign_phone" class="form-control" required autocomplete="off">
                    </div>

                    <div class="form-group mb-3">
                        <label for="sign_address"><b>Address</b></label>
                        <input type="text" placeholder="Enter Address" name="sign_address" class="form-control" required autocomplete="off">
                    </div>
                    <div id="sign_error_msg" class="error_msg"><?php if ($error_msg == "email already exists") echo $error_msg; ?></div>
                    <button type="submit" name="signup" value="Sign Up" class="btn btn-dark fw-bold w-100">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="js/index.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    AOS.init();
</script>
</body>

</html>