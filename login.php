<?php

require_once("config/app.php");
include("codes/authentication_code.php");

$auth->isLoggedIn();

include("includes/header.php");
include("includes/navbar.php");
?>




<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <?php include('message.php'); ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>

                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="email" placeholder="Enter Email Address" class="form-control" name="email">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="text" placeholder="Enter Password" class="form-control" name="password">
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" name="login_btn" class="btn btn-primary">Login Now</button>
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