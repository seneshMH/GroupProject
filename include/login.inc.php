<?php

require_once "./dbh.inc.php";
require_once "./validation.inc.php";


if (isset($_POST['login-btn'])) {
    $index = $_POST['indexNo'];
    $pass = $_POST['pass'];
    $remember = $_POST['re-check'];

    if (inputEmptyLogin($index, $pass)) {
        header("Location: ../login.php?err=empty_inputs");
    } elseif (indexlInvalid($index)) {
        header("Location: ../login.php?err=invalid_index");
    } elseif (passwordInvalid($pass)) {
        header("Location: ../login.php?err=invalid_password");
    } else {
        loginUser($conn, $index, $pass, $remember);
    }
} else {
    header("Location: ../index.php");
    exit();
}


function loginUser($conn, $index, $pass, $remember)
{

    $sql = "SELECT * FROM students WHERE indexNo = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?err=faildstmtregister");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $index);
    mysqli_stmt_execute($stmt);
    $data = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($data)) {

        $passHashed = $row['password'];

        $isPassOk = password_verify($pass, $passHashed);
        if ($isPassOk) {
            session_start();
            $_SESSION['user_index'] = $row['indexNo'];
            $_SESSION['user_fname'] = $row['fname'];
            $_SESSION['user_lname'] = $row['lname'];
            $_SESSION['user_dob'] = $row['dob'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_mobile'] = $row['mobile'];

            cookie($remember, $index, $pass);

            header("Location: ../profile.php");
            exit();
        } else {
            header("Location: ../login.php?err=loginfailedpass");
            exit();
        }
        mysqli_stmt_close($stmt);
    } else {

        $sql = "SELECT * FROM admin WHERE indexNo = ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?err=faildstmtregister");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $index);
        mysqli_stmt_execute($stmt);
        $data = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($data)) {
            $passHashed = $row['password'];

            $isPassOk = password_verify($pass, $passHashed);
            if ($isPassOk) {
                session_start();

                $_SESSION['admin_index'] = $row['indexNo'];
                cookie($remember, $index, $pass);

                header("Location: ../admin/admin.php");
                exit();
            } else {
                header("Location: ../login.php?err=loginfailedpass");
                exit();
            }
        }
        
        header("Location: ../login.php?err=loginfailedpass");
        mysqli_stmt_close($stmt);
        exit();
    }
}

function cookie($remember, $index, $pass)
{
    if (isset($remember)) {
        setcookie("indexcookie", $index, time() + (3600 * 24 * 7), "/");
        setcookie("passwordcookie", $pass, time() + (3600 * 24 * 7), "/");
    } else {
        if (isset($_COOKIE['indexcookie'])) {
            setcookie("indexcookie", $index, time() - (3600 * 24 * 7), "/");
        }
        if (isset($_COOKIE['passwordcookie'])) {
            setcookie("passwordcookie", $index, time() - (3600 * 24 * 7), "/");
        }
    }
}
