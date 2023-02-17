<?php
//  include("config/app.php");

include_once("controllers/RegisterController.php");
include_once("controllers/LoginController.php");

//  ***************** Registered User *************
if (isset($_POST['register_btn'])) {

    $first_name = validateInput($db->conn, $_POST['first_name']);
    $last_name = validateInput($db->conn, $_POST['last_name']);
    $email =  validateInput($db->conn, $_POST['email']);
    $password = validateInput($db->conn, $_POST['password']);
    $confirm_password = validateInput($db->conn, $_POST['confirm_password']);

    $register = new RegisterController;
    $result_password = $register->confirmPassword($password, $confirm_password);

    if ($result_password) {
        $result_user = $register->isUserExists($email);
        if ($result_user) {
            redirect("Already Email Exists!", 'register.php');
        } else {
            $register_query =  $register->registration($first_name, $last_name, $email, $password);

            if ($register_query) {
                redirect("Registered Successfully!", 'login.php');
            } else {
                redirect("Something Went Wrong!", 'register.php');
            }
        }
    } else {
        redirect("Password and Confirm Password Does not match!", 'register.php');
    }
}





//  ***************** LOGIN User *************

$auth = new LoginController();

if (isset($_POST['login_btn'])) {

    $email = validateInput($db->conn, $_POST['email']);
    $password = validateInput($db->conn, $_POST['password']);

    $checkLogin = $auth->userLogin($email, $password);

    if ($checkLogin) {

        if ($_SESSION['auth_role'] == '1') {
            redirect("Logged In Successfully!", "admin/index.php");
        } else {
            redirect("Logged In Successfully!", "index.php");
        }
    }
    redirect("Invalid Email address or password!", "login.php");
}



//  ***************** logout user *************
if (isset($_POST['logout_btn'])) {
    $checkedLoggedOut =  $auth->logout();

    if ($checkedLoggedOut) {
        redirect("Logged Out  Successfully!", "login.php");
    }
}
