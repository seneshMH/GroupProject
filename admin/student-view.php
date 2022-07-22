<?php

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
    <title>Student view</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border border-secondary">
                    <div class="card-header">
                        <h4>Student View Details
                            <a href="admin.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body border">
                        <?php
                        if (isset($_GET['indexNo'])) {
                            $student_id = mysqli_real_escape_string($conn, $_GET['indexNo']);
                            $quary = "SELECT * FROM students WHERE indexNo='$student_id'";
                            $quary_run = mysqli_query($conn, $quary);

                            if (mysqli_num_rows($quary_run) > 0) {
                                $student = mysqli_fetch_array($quary_run);
                        ?>


                                <div class="mb-3">
                                    <label>Index Number</label>
                                    <p class="form-control border border-dark">
                                        <?= $student['indexNo']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>First Name</label>
                                    <p class="form-control border border-dark">
                                        <?= $student['fname']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Last Name</label>
                                    <p class="form-control border border-dark">
                                        <?= $student['lname']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Date of Birth</label>
                                    <p class="form-control border border-dark">
                                        <?= $student['dob']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>E-mail</label>
                                    <p class="form-control border border-dark">
                                        <?= $student['email']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Mobile</label>
                                    <p class="form-control border border-dark">
                                        <?= $student['mobile']; ?>
                                    </p>
                                </div>



                        <?php
                            } else {
                                echo "<h4>No such id found</h4>";
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