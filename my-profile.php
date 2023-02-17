<?php
require_once("config/app.php");
require_once("codes/authentication_code.php");
require_once("controllers/AuthenticationController.php");

$authenticated = new AuthenticationController();
$data = $authenticated->authDetail();

require_once("includes/header.php");
require_once("includes/navbar.php");
?>




<div class="py-5">
    <div class="container">
        <?php include("message.php"); ?>
        <h1>My Profile Page</h1>
        <hr>
        <h4>Full Name: <?= $data['fname'] . " " . $data['lname']; ?></h4>
        <h4>Email: <?= $data['email'] ?></h4>
        <!-- <h4>Created At: <//?= $data['created_at'] ?></h4>  //  2023-02-14 14:53:31 -->

        <h4>Created At: <?= date('d-m-Y', strtotime($data['created_at'])) ?></h4>
        <!-- 14-02-2023  -->
    </div>

</div>
</div>


<?php
require_once("includes/footer.php");
?>