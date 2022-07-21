<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="images/fav-icon.png" type="image/png">
    <title>Login</title>
</head>

<body>
    <my-header></my-header>
    
    <section class="container">
        <div class="login">
            <header>Login</header>
            <form action="include/login.inc.php" method="POST">
                <div class="fields">
                    <div class="input-field">
                        <label>Index Number</label>
                        <input type="number" name="indexNo" placeholder="Enter Index Number" required value="<?php if (isset($_COOKIE['indexcookie'])) {
                                                                                                                    echo $_COOKIE['indexcookie'];
                                                                                                                } ?>">
                    </div>

                    <div class="input-field">
                        <label>Password</label>
                        <input type="password" name="pass" placeholder="Enter pasword" required value="<?php if (isset($_COOKIE['passwordcookie'])) {
                                                                                                            echo $_COOKIE['passwordcookie'];
                                                                                                        } ?>">
                    </div>
                </div>
                <div class="rem">
                    <input type="checkbox" name="re-check" id="re-check" <?php if (isset($_COOKIE['indexcookie'])) { ?> checked <?php } ?>>
                    <label for="re-check">Remember me</label>
                </div>
                <div class="buttons">
                    <button type="sumbit" name="login-btn">
                        <span class="btnText">Login</span>
                    </button>
                </div>
                
                <?php
                
                if (isset($_GET['err'])) {
                    if ($_GET["err"] === "invalid_index") {
                        echo "<p class='msg' style='background-color: #ee2222;'>Wrong Index No, please enter the Index No</p>";
                    } else if ($_GET["err"] === "loginfailedpass") {
                        echo "<p class='msg' style='background-color: #ee2222;'>Wrong password, please enter the correct password!</p>";
                    }
                }
                
                ?>
                <div class="reg-msg">
                    <p>No Accpount <a href="register.php">Register Here</a></p>
                </div>
                
            </form>
        </div>
    </section>
            
    <my-footer></my-footer>
    <script type=module src="scripts/main.js"></script>
</body>

</html>