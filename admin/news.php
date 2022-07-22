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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="shortcut icon" href="images/fav-icon.png" type="image/png">
    <title>News</title>
</head>

<body>
    <div class="container mt-5">
        <?php include("message.php"); ?>
        <div class="row">
            <div class="col md12">
                <div class="card border border-dark">
                    <div class="card-header">
                        <h4 class="col">Upload News
                            <a href="admin.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <form class="m-2" action="upload-delete.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="file" class="form-control">
                        <label for="desc" class="mt-3">Description</label>
                        <input type="text" name="desc" id="desc" class="form-control">
                        <button type="submit" name="upload" class="btn btn-success my-3">Upload</button>
                    </form>

                    <div class="card-body mt-4">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Create Date</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $quary = "SELECT * FROM news";

                                $quary_run = mysqli_query($conn, $quary);

                                if (mysqli_num_rows($quary_run) > 0) {
                                    foreach ($quary_run as $news) {

                                ?>
                                        <tr>
                                            <td><?= $news['id']; ?></td>
                                            <td><?= $news['date']; ?></td>
                                            <td><?= $news['description']; ?></td>
                                            <td><?= "<img src='uploads/" . $news['image'] . "' style='width: 400px;height= 400px;'>"; ?></td>
                                            <td>
                                                <form action="upload-delete.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_news" value="<?= $news['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
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

        <script src="js/bootstrap.js"></script>
</body>

</html>