<?php

session_start();
require_once "../include/dbh.inc.php";

if (!isset($_SESSION['admin_index'])) {
    header("Location: ../login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="shortcut icon" href="images/fav-icon.png" type="image/png">
    <title>Add admin</title>
</head>

<body>

    <div class="container mt-5">
        <?php include("message.php"); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card border border-dark">
                    <div class="card-header">
                        <h4>Add Admin
                            <a href="admin.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="mb-3">
                                <label>Index Number</label>
                                <input type="number" name="adminIndexNo" class="form-control border border-primary" required>
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
                                <button type="submit" name="add_admin" class="btn btn-primary">Add Admin</button>
                            </div>
                        </form>
                            <div class="card-body mt-4">
                                <table class="table table-borderd table-striped">
                                    <thead>
                                        <tr>
                                            <th>Admin Index No</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $quary = "SELECT * FROM admin";

                                        $quary_run = mysqli_query($conn, $quary);

                                        if (mysqli_num_rows($quary_run) > 0) {
                                            foreach ($quary_run as $admin) {

                                        ?>
                                                <tr>
                                                    <td><?= $admin['indexNo']; ?></td>
                                                    <td>
                                                        <?php
                                                        if (mysqli_num_rows($quary_run) == 1) {
                                                            echo "There must be at least one administrator for operations to be performed out.";
                                                        } else {
                                                        ?>
                                                            <form action="code.php" method="POST" class="d-inline">
                                                                <button type="submit" name="delete_admin" value="<?= $admin['indexNo']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                        <?php

                                            }
                                        } else {
                                            echo "<h5> No Record Found </h5>";
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




    <script src="js/bootstrap.js"></script>

</body>

</html>