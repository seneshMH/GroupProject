<?php
session_start();
require_once "../include/dbh.inc.php";

if (!isset($_SESSION['admin_index'])) {
    header("Location: ../login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="shortcut icon" href="images/fav-icon.png" type="image/png">

    <title>Admin Panel</title>
</head>

<body>

    <div class="container mt-5">
        <?php include("message.php"); ?>
        <div class="row">
            <div class="col md12">
                <h2 class="text-center p-3 mb-2 bg-primary text-white">Admin Panel
                    <form action="admin-create.php" method="POST" class="d-inline float-start">
                        <button name="btn-addadmin" class="btn btn-success">Add admin</button>
                    </form>
                    <form action="../include/logout.inc.php" method="POST" class="d-inline float-end">
                        <button name="btn-logout" class="btn btn-danger">Logout</button>
                    </form>
                </h2>
                <div class="card border border-dark">
                    <div class="card-header">
                        <h4 class="col my-4">Post News
                            <form action="news.php" method="POST" class="d-inline float-end">
                                <button name="btn-news" class="btn btn-success">Post News</button>
                            </form>
                        </h4>
                        <hr>
                        <h4 class="col my-4">Student Detail
                            <a href="student-create.php" class="btn btn-primary float-end">Add Students</a>
                        </h4>
                        <form action="" method="GET" class="my-4">
                            <div class="input-group w-20">
                                <input type="search" name="search" class="form-control rounded border border-primary" placeholder="Search" value="<?php if (isset($_GET['search'])) {
                                                                                                                                                        echo $_GET['search'];
                                                                                                                                                    } ?>" />
                                <button type="submit" class="btn btn-primary">search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body mt-4">
                    <table class="table table-borderd table-striped">
                        <thead>
                            <tr>
                                <th>Index No</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Date of Birth</th>
                                <th>E-mail</th>
                                <th>Mobile</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php


                            if (isset($_GET['search'])) {

                                $filtervalue = mysqli_real_escape_string($conn, $_GET['search']);
                                $quary = "SELECT * FROM students WHERE CONCAT(indexNo,fname,lname) LIKE '%$filtervalue%'";

                                $quary_run = mysqli_query($conn, $quary);

                                if (mysqli_num_rows($quary_run) > 0) {
                                    foreach ($quary_run as $student) {

                            ?>
                                        <tr>
                                            <td><?= $student['indexNo']; ?></td>
                                            <td><?= $student['fname']; ?></td>
                                            <td><?= $student['lname']; ?></td>
                                            <td><?= $student['dob']; ?></td>
                                            <td><?= $student['email']; ?></td>
                                            <td><?= $student['mobile']; ?></td>
                                            <td>
                                                <a href="student-view.php?indexNo=<?= $student['indexNo'] ?>" class="btn btn-info btn-sm">View</a>
                                                <a href="student-edit.php?indexNo=<?= $student['indexNo'] ?>" class="btn btn-success btn-sm">Edit</a>

                                                <form action="code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_student" value="<?= $student['indexNo']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                            <?php

                                    }
                                } else {
                                    echo "<h5> No Record Found </h5>";
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>


    <script src="js/bootstrap.js"></script>
</body>

</html>