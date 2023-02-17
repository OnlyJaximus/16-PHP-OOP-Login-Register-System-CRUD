<?php
// require_once("config/app.php");



class RegisterController
{
    public $conn;

    public function __construct()
    {
        $db = new DatabaseConnection();
        $this->conn = $db->conn;
    }

    public function registration($fname, $lname, $email, $password)
    {
        $register_query = "INSERT INTO users (fname, lname, email, password)
                        VALUES ('$fname', '$lname', '$email', '$password')";

        $result = $this->conn->query($register_query);
        return $result;
    }


    public function isUserExists($email)
    {
        $checkUser = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
        $result = $this->conn->query($checkUser);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function confirmPassword($password, $confirm_password)
    {
        if ($password == $confirm_password) {
            return true;
        } else {
            return false;
        }
    }
}
