<?php
session_start();
require_once "./include/dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/news.css">
    <link rel="shortcut icon" href="images/fav-icon.png" type="image/png">
    <title>News</title>
</head>

<body>
    <my-header></my-header>
    <h1>NEWS</h1>
    <?php
    $quary = "SELECT * FROM news";

    $quary_run = mysqli_query($conn, $quary);

    if (mysqli_num_rows($quary_run) > 0) {
        foreach ($quary_run as $news) {
    ?>
        <section class="news">
            <h3>Date : <?= $news['date'];?></h3>
            <img src="admin/uploads/<?= $news['image'];?>">
        </section>
    <?php

        }
    } else {
        echo "<h5> No Record Found </h5>";
    }

    ?>
   
    <my-footer></my-footer>
    <script type=module src="scripts/main.js"></script>
</body>

</html>