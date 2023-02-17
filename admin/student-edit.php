<?php
include("../config/app.php");
require_once("../controllers/AuthenticationController.php");

$authenticated = new AuthenticationController;
$authenticated->admin();
include("includes/header.php");
include_once("controllers/StudentController.php");
?>



<div class="container-fluid px-4">


    <div class="row mt-4">
        <div class="col-md-12">
            <?php include_once('../message.php'); ?>


            <div class="card">
                <div class="card-header">
                    <h4>Student Edit</h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $student_id = validateInput($db->conn, $_GET['id']);
                        $student = new StudentController();
                        $result = $student->edit($student_id);

                        if ($result) {
                    ?>
                            <form action="codes/student-code.php" method="POST">
                                <input type="hidden" name="student_id" value="<?php echo $result['id']; ?>">
                                <div class="mb-3">
                                    <label for="">Full Name</label>
                                    <input type="text" name="fullname" class="form-control" value="<?php echo $result['fullname'] ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="">Email address</label>
                                    <input type="text" name="email" class="form-control" value="<?php echo $result['email'] ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="">Course</label>
                                    <input type="text" name="course" class="form-control" value="<?php echo $result['course'] ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" value="<?php echo $result['phone'] ?>" required>
                                </div>


                                <div class="mb-3">
                                    <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
                                </div>


                            </form>
                    <?php
                        } else {
                            echo "<h4>No Record Found</h4>";
                        }
                    } else {
                        echo "<h4>Something Went Wrong!</h4>";
                    }

                    ?>


                </div>
            </div>
        </div>
    </div>


</div>
<?php
include("includes/footer.php");
include("includes/script.php");
?>