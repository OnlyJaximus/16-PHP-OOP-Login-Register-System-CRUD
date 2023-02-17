<?php
include('../../config/app.php');
include_once('../controllers/StudentController.php');

if (isset($_POST['save_student'])) {

    $input_data = [
        'fullname' => validateInput($db->conn, $_POST['fullname']),
        'email' => validateInput($db->conn, $_POST['email']),
        'course' => validateInput($db->conn, $_POST['course']),
        'phone' => validateInput($db->conn, $_POST['phone'])
    ];

    $student = new StudentController();
    $result = $student->create($input_data);
    // echo $result;  // 'Nemanja','nemanja@yahoo.com','Programming','0645522111'

    if ($result) {
        redirect("Student Added Succeessfulaly", "admin/student-add.php");
    } else {
        redirect("Something Went Wrong", "admin/student-add.php");
    }
}


//  ****************** EDIT STUDENT ************************
if (isset($_POST['update_student'])) {
    $id = validateInput($db->conn, $_POST['student_id']);
    $input_data = [
        'fullname' => validateInput($db->conn, $_POST['fullname']),
        'email' => validateInput($db->conn, $_POST['email']),
        'course' => validateInput($db->conn, $_POST['course']),
        'phone' => validateInput($db->conn, $_POST['phone'])
    ];
    $student = new StudentController();
    $result = $student->update($input_data, $id);

    if ($result) {
        redirect("Student Updated Succeessfulaly!", "admin/student-view.php");
    } else {
        redirect("Something Went Wrong!", "admin/student-view.php");
    }
}

//  ****************** DELETE STUDENT ************************
if (isset($_POST['delete_student'])) {


    $id = validateInput($db->conn, $_POST['delete_student']);
    $student = new StudentController();
    $result = $student->delete($id);

    if ($result) {
        redirect("Student Deleted Succeessfulaly!", "admin/student-view.php");
    } else {
        redirect("Something Went Wrong!", "admin/student-view.php");
    }
}


# moje 
# LOGOUT FORM
