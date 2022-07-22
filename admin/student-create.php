<?php

session_start();

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
    <title>Student Create</title>
</head>

<body>

    <div class="container mt-5">
        <?php include("message.php"); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card border border-dark">
                    <div class="card-header">
                        <h4>Student Add
                            <a href="admin.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="mb-3">
                                <label>Index Number</label>
                                <input type="number" name="indexNo" class="form-control border border-primary" required>
                            </div>
                            <div class="mb-3">
                                <label>First Name</label>
                                <input type="text" name="fname" class="form-control border border-primary" required>
                            </div>
                            <div class="mb-3">
                                <label>Last Name</label>
                                <input type="text" name="lname" class="form-control border border-primary" required>
                            </div>
                            <div class="mb-3">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" class="form-control border border-primary" required>
                            </div>
                            <div class="mb-3">
                                <label>E-mail</label>
                                <input type="email" name="email" class="form-control border border-primary" required>
                            </div>
                            <div class="mb-3">
                                <label>Mobile</label>
                                <input type="number" name="mobile" class="form-control border border-primary" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="pass" class="form-control border border-primary" required>
                            </div>
                            <div class="mb-3">
                                <label>Confirm Password</label>
                                <input type="password" name="rePass" class="form-control border border-primary" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_student" class="btn btn-primary">Save Student</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.js"></script>
</body>

</html>