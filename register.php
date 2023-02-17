<?php
include("config/app.php");
include("codes/authentication_code.php");

$auth->isLoggedIn();
include("includes/header.php");
include("includes/navbar.php");

?>




<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card">

                    <?php include("message.php"); ?>

                    <div class="card-header">
                        <h4>Register</h4>
                    </div>


                    <div class="card-body">

                        <form action="" method="POST">

                            <div class="form-group mb-3">
                                <label for="">First Name</label>
                                <input type="text" name="first_name" placeholder="Enter First Name" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Last Name</label>
                                <input type="text" name="last_name" placeholder="Enter Last Name" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" placeholder="Enter Email Address" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="text" name="password" placeholder="Enter Password" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Confirm Password</label>
                                <input type="text" name="confirm_password" placeholder="Enter Confirm Password" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary" name="register_btn">Register</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<?php
require_once("includes/footer.php");
?>