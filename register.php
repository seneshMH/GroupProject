<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/register.css">
    <link rel="shortcut icon" href="images/fav-icon.png" type="image/png">
    <title>Register</title>
</head>

<body>
    <my-header></my-header>
    <section class="register">
        <div class="container">
            <header>Registration</header>
            <form action="./include/register.inc.php" method="POST">
                <div class="fields">
                    <div class="input-field">
                        <label>Index Number</label>
                        <input type="number" name="indexNo" placeholder="Index Number" required>
                    </div>

                    <div class="input-field">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="Enter Your First Name" required>
                    </div>

                    <div class="input-field">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Enter Your Last Name" required>
                    </div>

                    <div class="input-field">
                        <label>Birth Date</label>
                        <input type="date" name="dob" placeholder="Birth Date" required>
                    </div>

                    <div class="input-field">
                        <label>Mobile Number</label>
                        <input type="number" name="mobile" placeholder="Mobile Number" required>
                    </div>

                    <div class="input-field">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="E-mail" required>
                    </div>

                    <div class="input-field">
                        <label>Password</label>
                        <input type="password" name="pass" placeholder="Enter password" required>
                    </div>

                    <div class="input-field">
                        <label>Confirm Password</label>
                        <input type="password" name="repass" placeholder="Confirm password" required>
                    </div>
                </div>


                <button type="sumbit" name="register-btn">
                    <span class="btnText">Register</span>
                </button>

                <?php
                if (isset($_GET["err"])) {
                    if ($_GET["err"] === "empty_input") {
                        echo "<p class='msg' style='background-color: #ee2222;'>All the input fields must be filled!</p>";
                    } else if ($_GET["err"] === "invalid_name") {
                        echo "<p class='msg' style='background-color: #ee2222;'>Both names must be written in only letters!</p>";
                    } else if ($_GET["err"] === "invalid_email") {
                        echo "<p class='msg' style='background-color: #ee2222;'>A proper email must be entered!</p>";
                    } else if ($_GET["err"] === "invalid_mobile") {
                        echo "<p class='msg' style='background-color: #ee2222;'>Mobile number must be 10 digit long & start with 0!</p>";
                    } else if ($_GET["err"] === "invalid_password") {
                        echo "<p class='msg' style='background-color: #ee2222;'>Password must be at least 5 characters long!</p>";
                    } else if ($_GET["err"] === "different_pass") {
                        echo "<p class='msg' style='background-color: #ee2222;'>Both passwords must be matched!</p>";
                    } else if ($_GET["err"] === "available_emailorindex") {
                        echo "<p class='msg' style='background-color: #ee2222;'>Email & index number must be  new!</p>";
                    } else if ($_GET["err"] === "failedstmt") {
                        echo "<p class='msg' style='background-color: #ee2222;'>Failed to execute the query!</p>";
                    }

                    // Register form related message
                    else if ($_GET["err"] === "noerrors") {
                        echo "<p class='msg' style='background-color: #25aa25;'>Successfully registered!<a href='login.php'> Login Hear</a></p>";
                    }

                    // Login form related message
                    else if ($_GET["err"] === "loginfailedemail") {
                        echo "<p class='msg' style='background-color: #ee2222;'>Wrong email, please enter the correct email!</p>";
                    } else if ($_GET["err"] === "loginfailedpass") {
                        echo "<p class='msg' style='background-color: #ee2222;'>Wrong password, please enter the correct password!</p>";
                    }
                }
                ?>
                <div class="reg-msg">
                    <p>Have Accpount <a href="login.php">Login Here</a></p>
                </div>
            </form>
        </div>
    </section>
    <my-footer></my-footer>
    <script type=module src="scripts/main.js"></script>
</body>

</html>