<?php
session_start();

define("DB_HOST", 'localhost');
define("DB_USER", 'root');
define("DB_PASSWORD", '');
define("DB_DATABASE", 'adminpanel');

define("SITE_URL", 'http://localhost/oop%20form%20funda-fake/');



include_once("DatabaseConnection.php");

$db = new DatabaseConnection();


function base_url($slug)
{
    echo SITE_URL . $slug;
}


function validateInput($dbconn, $input)
{
    return  mysqli_real_escape_string($dbconn, $input);
}


function redirect($message, $page)
{
    $redirectTo = SITE_URL . $page;
    $_SESSION['message'] = "$message";
    header("Location: $redirectTo");
    exit(0);
}















# *****************************************************************

// session_start();

// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASSWORD', '');
// define('DB_DATABASE', 'adminpanel');


// define('SITE_URL', 'http://localhost/oop%20form%20funda/');

// include_once("DatabaseConnection.php");

// $db = new DatabaseConnection();

// // require_once("codes/authentication_code.php");


// function base_url($slug)
// {
//     echo SITE_URL . $slug;
// }

// function redirect($message, $page)
// {
//     $redirectTo = SITE_URL . $page;
//     $_SESSION['message'] = "$message";
//     header("Location: $redirectTo");
//     exit();
// }


// function validateInput($dbcon, $input)
// {
//     return mysqli_real_escape_string($dbcon, $input);
// }
