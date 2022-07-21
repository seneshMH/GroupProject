<?php

session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: ./login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/profile.css">

    <title>Welcome - <?php if (isset($_SESSION['user_email'])) {
                            echo $_SESSION['user_fname'];
                        } ?></title>
</head>

<body>
<my-header></my-header>

    <section class="profile-container">
        <div class="profile">
            <h2>Welcome <span><?php if (isset($_SESSION['user_email'])) {
                                    echo $_SESSION['user_fname'];
                                } ?></span></h2>
            <label>Index Number</label>
            <div class="data">
                <?php if (isset($_SESSION['user_email'])) {
                    echo $_SESSION['user_index'];
                } ?>
            </div>
            <label>Full Name</label>
            <div class="data">
                <?php if (isset($_SESSION['user_email'])) {
                    echo $_SESSION['user_fname'] . " " . $_SESSION['user_lname'];
                } ?>
            </div>
            <label>Date of Birth</label>
            <div class="data">
                <?php if (isset($_SESSION['user_email'])) {
                    echo $_SESSION['user_dob'];
                } ?>
            </div>
            <label>E-mail</label>
            <div class="data">
                <?php if (isset($_SESSION['user_email'])) {
                    echo $_SESSION['user_email'];
                } ?>
            </div>
            <label>Mobile</label>
            <div class="data">
                <?php if (isset($_SESSION['user_email'])) {
                    echo $_SESSION['user_mobile'];
                } ?>
            </div>
            <div class="btn-log">
                <a href="include/logout.inc.php">Logout</a>
            </div>
        </div>
    </section>
    <my-footer></my-footer>
    <script type=module src="scripts/main.js"></script>
</body>

</html>