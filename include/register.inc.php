<?php

require_once "./dbh.inc.php";
require_once "./validation.inc.php";


if (isset($_POST['register-btn'])) {
    $index = $_POST['indexNo'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $re_pass = $_POST['repass'];

    if (nameInvalid($fname, $lname)) {
        header("Location: ../register.php?err=invalid_name");
    } elseif (emailInvalid($email)) {
        header("Location: ../register.php?err=invalid_email");
    } elseif (mobileInvalid($mobile)) {
        header("Location: ../register.php?err=invalid_mobile");
    } elseif (passwordInvalid($pass)) {
        header("Location: ../register.php?err=invalid_password");
    } elseif (passNotMatch($pass, $re_pass)) {
        header("Location: ../register.php?err=different_pass");
    } elseif (emailOrMobileAvalable($email, $index, $conn)) {
        header("Location: ../register.php?err=available_emailorindex");
    } else {
        registerNewUser($conn, $index, $fname, $lname, $dob, $mobile, $email, $pass);
    }
} else {
    header("Location : ../register.php");
    exit();
}

function registerNewUser($conn, $index, $fname, $lname, $dob, $mobile, $email, $pass)
{

    $passHashed = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO students (indexNo,fname,lname,dob,mobile,email,password) VALUES (?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../register.php?err=faildstmt");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "isssiss", $index, $fname, $lname, $dob, $mobile, $email, $passHashed);
        mysqli_stmt_execute($stmt);
        $data = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../register.php?err=noerrors");
    }
}
