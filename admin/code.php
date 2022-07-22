<?php
session_start();
if (!isset($_SESSION['admin_index'])) {
    header("Location: ../login.php");
}

require_once "../include/dbh.inc.php";
require_once "../include/validation.inc.php";


if (isset($_POST['delete_student'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE indexNo='$student_id'";
    $quary_run = mysqli_query($conn, $query);
    if ($quary_run) {
        $_SESSION['message'] = "Student Delete Successfully";
        header("Location: admin.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: admin.php");
        exit(0);
    }
}

if (isset($_POST['update_student'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['tmpIndexNo']);

    $index = mysqli_real_escape_string($conn, $_POST['indexNo']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);

    if (nameInvalid($fname, $lname)) {
        $_SESSION['message'] = "Invalid Student Name";
        header("Location: admin.php");
        exit(0);
    } elseif (emailInvalid($email)) {
        $_SESSION['message'] = "Invalid E-Mail";
        header("Location: admin.php");
        exit(0);
    } elseif (mobileInvalid($mobile)) {
        $_SESSION['message'] = "Invalid Mobile Number";
        header("Location: admin.php");
        exit(0);
    } else {
        $query = "UPDATE students SET indexNo='$index', fname='$fname', lname='$lname', dob='$dob', mobile='$mobile', email='$email' WHERE indexNo='$student_id'";

        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['message'] = "Student Updated Successfully";
            header("Location: admin.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Student Not Updated";
            header("Location: admin.php");
            exit(0);
        }
    }
}

if (isset($_POST['save_student'])) {

    $index = mysqli_real_escape_string($conn, $_POST['indexNo']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $rePass = mysqli_real_escape_string($conn, $_POST['rePass']);

    if (nameInvalid($fname, $lname)) {
        $_SESSION['message'] = "Invalid Student Name";
        header("Location: student-create.php");
        exit(0);
    } elseif (emailInvalid($email)) {
        $_SESSION['message'] = "Invalid E-Mail";
        header("Location: student-create.php");
        exit(0);
    } elseif (mobileInvalid($mobile)) {
        $_SESSION['message'] = "Invalid Mobile Number";
        header("Location: student-create.php");
        exit(0);
    } elseif (passwordInvalid($pass)) {
        $_SESSION['message'] = "Invalid Password";
        header("Location: student-create.php");
        exit(0);
    } elseif (passNotMatch($pass, $rePass)) {
        $_SESSION['message'] = "Password mismatch";
        header("Location: student-create.php");
        exit(0);
    } elseif (emailOrMobileAvalable($email, $index, $conn)) {
        $_SESSION['message'] = "Avalable Index Number Or Email";
        header("Location: student-create.php");
        exit(0);
    } else {
        $passHashed = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO students (indexNo,fname,lname,dob,mobile,email,password) VALUES (?, ?, ?, ?, ?, ?, ?);";

        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $_SESSION['message'] = "Faild STMT";
            header("Location: student-create.php");
            exit(0);
        } else {
            mysqli_stmt_bind_param($stmt, "isssiss", $index, $fname, $lname, $dob, $mobile, $email, $passHashed);
            mysqli_stmt_execute($stmt);
            $data = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            $_SESSION['message'] = "Student Created";
            header("Location: student-create.php");
            exit(0);
        }
    }
}

if(isset($_POST['add_admin'])){
    $index = mysqli_real_escape_string($conn, $_POST['adminIndexNo']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $rePass = mysqli_real_escape_string($conn, $_POST['rePass']);

    if(adminIndexAvalable($conn,$index)){
        $_SESSION['message'] = "Index available";
        header("Location: admin-create.php");
        exit(0);
    } elseif (passwordInvalid($pass)) {
        $_SESSION['message'] = "Invalid Password";
        header("Location: admin-create.php");
        exit(0);
    } elseif (passNotMatch($pass, $rePass)) {
        $_SESSION['message'] = "Password mismatch";
        header("Location: admin-create.php");
        exit(0);
    }else{
        $passHashed = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO admin (indexNo,password) VALUES (?, ?);";


        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $_SESSION['message'] = "Faild STMT";
            header("Location: admin-create.php");
            exit(0);
        } else {
            mysqli_stmt_bind_param($stmt, "is", $index,$passHashed);
            mysqli_stmt_execute($stmt);
            $data = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            $_SESSION['message'] = "Admin Created";
            header("Location: admin-create.php");
            exit(0);
        }
    }

}

if(isset($_POST['delete_admin'])){

    $adminId = mysqli_real_escape_string($conn, $_POST['delete_admin']);

    $query = "DELETE FROM admin WHERE indexNo='$adminId'";
    $quary_run = mysqli_query($conn, $query);
    if ($quary_run) {
        $_SESSION['message'] = "Admin Deleted Successfully";
        header("Location: admin-create.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Admin Delete Error";
        header("Location: admin-create.php");
        exit(0);
    }

}
