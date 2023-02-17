
<?php
include("../config/app.php");
unset($_SESSION['authenticated']);
unset($_SESSION['auth_user']);
unset($_SESSION['auth_role']);
redirect("Logged Out  Successfully!", "login.php");
