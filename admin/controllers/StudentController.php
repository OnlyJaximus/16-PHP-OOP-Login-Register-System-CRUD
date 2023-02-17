<?php

class StudentController
{
    public $conn;

    public function __construct()
    {
        $db = new DatabaseConnection();
        $this->conn = $db->conn;
    }

    public function create($inputdata)
    {
        $data = "'" . implode("','", $inputdata) . "'";
        // echo $data;   // 'Nemanja','niske@yahoo.com','Programming','0645522111'

        $studentQuery = "INSERT INTO students (fullname, email, course, phone) VALUES ($data)";
        $result = $this->conn->query($studentQuery);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function index()
    {
        $studentQuery = "SELECT * FROM students";
        $result = $this->conn->query($studentQuery);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }


    # ************** EDIT STUDENT FUNCTION ***********************
    public function edit($id)
    {
        $student_id = validateInput($this->conn, $id);
        $studentQuery = "SELECT * FROM students WHERE id = '$student_id' LIMIT 1";
        $result = $this->conn->query($studentQuery);
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }

    # ************** UPDATE STUDENT FUNCTION ***********************
    public function update($inputdata, $id)
    {
        $student_id = validateInput($this->conn, $id);
        $fullname = $inputdata['fullname'];
        $email = $inputdata['email'];
        $course = $inputdata['course'];
        $phone = $inputdata['phone'];

        $studentUpdateQuery = "UPDATE students 
        SET fullname='$fullname', email='$email', course='$course', phone='$phone'
        WHERE id='$student_id' LIMIT 1";

        $result = $this->conn->query($studentUpdateQuery);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }



    # ************** DELETE STUDENT FUNCTION ***********************
    public function delete($id)
    {
        $student_id = validateInput($this->conn, $id);
        $studentDeleteQuery = "DELETE FROM students WHERE id ='$student_id' LIMIT 1";
        $result = $this->conn->query($studentDeleteQuery);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    # logout moj

}
