<?php

session_start();
if (!isset($_SESSION['admin_index'])) {
    header("Location: ../login.php");
}
require_once "../include/dbh.inc.php";
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="shortcut icon" href="images/fav-icon.png" type="image/png">
    <title>Student Edit</title>
</head>

<body>

    <div class="container mt-5">
        <?php include("message.php"); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card border border-secondary">
                    <div class="card-header">
                        <h4>Student Edit
                            <a href="admin.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['indexNo'])) {
                            $student_id = mysqli_real_escape_string($conn, $_GET['indexNo']);
                            $quary = "SELECT * FROM students WHERE indexNo='$student_id'";
                            $quary_run = mysqli_query($conn, $quary);

                            if (mysqli_num_rows($quary_run) > 0) {
                                $student = mysqli_fetch_array($quary_run);
                        ?>

                                <form action="code.php" method="POST">
                                    <input type="hidden" name="tmpIndexNo" value="<?= $_GET['indexNo'];?>">
                                    <div class="mb-3">
                                        <label>Index Number</label>
                                        <input type="number" name="indexNo" value="<?=$student['indexNo'];?>" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>First Name</label>
                                        <input type="text" name="fname" value="<?=$student['fname'];?>" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Last Name</label>
                                        <input type="text" name="lname" value="<?=$student['lname'];?>" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Date of Birth</label>
                                        <input type="date" name="dob" value="<?=$student['dob'];?>" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>E-mail</label>
                                        <input type="email" name="email" value="<?=$student['email'];?>" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Mobile</label>
                                        <input type="number" name="mobile" value="0<?=$student['mobile'];?>" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
                                    </div>

                                </form>
                        <?php
                            } else {
                                echo "<h4>Ho such id found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.js"></script>
</body>

</html>