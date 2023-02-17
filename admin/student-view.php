<?php
include("../config/app.php");
require_once("../controllers/AuthenticationController.php");

$authenticated = new AuthenticationController;
$authenticated->admin();

include_once("controllers/StudentController.php");
include("includes/header.php"); ?>



<div class="container-fluid px-4">


    <div class="row mt-4">
        <div class="col-md-12">
            <?php include_once('../message.php'); ?>


            <div class="card">
                <div class="card-header">
                    <h4>Student View</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $students = new StudentController();
                                $result = $students->index();
                                if ($result) {
                                    foreach ($result as $row) {
                                ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['fullname'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['phone'] ?></td>
                                            <td><?php echo $row['course'] ?></td>

                                            <td>
                                                <a href="student-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
                                            </td>
                                            <td>
                                                <!-- <a href="" class="btn btn-danger">Delete</a> -->
                                                <form action="codes/student-code.php" method="POST">
                                                    <button type="submit" name="delete_student" value="<?php echo $row['id']; ?>" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                <?php
                                    }
                                } else {
                                    echo "No Record Found!";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
<?php
include("includes/footer.php");
include("includes/script.php");
?>