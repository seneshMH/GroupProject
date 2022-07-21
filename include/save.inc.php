<?php

require_once "./dbh.inc.php";
require_once "./validation.inc.php";

if(isset($_POST['save-btn'])){
    $index = $_POST['indexNo'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $tmpId = $_POST['tmpId'];

    if(nameInvalid($fname,$lname)){
        header("Location: ../student-edit.php?err=invalid_name");
    }elseif(emailInvalid($email)){
        header("Location: ../student-edit.php?err=invalid_email");
    }elseif(mobileInvalid($mobile)){
        header("Location: ../student-edit.php?err=invalid_mobile");
    }else{
        updateUser($conn,$index,$fname,$lname,$dob,$mobile,$email,$pass);
    }
}else{
    header("Location : ../student-edit.php");
    exit();
}

function updateUser($conn,$index,$fname,$lname,$dob,$mobile,$email,$tmpId){

    $sql = "UPDATE students SET indexNo=?, fname=?, lname=?, dob=?, mobile=?, email=? WHERE indexNo=?";
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../student-edit.php?err=faildstmt");
        //exit();
    }else{
        mysqli_stmt_bind_param($stmt,"isssisi",$index,$fname,$lname,$dob,$mobile,$email,$tmpId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../admin.php?err=noerrors");
    }
    
   
    
}
?>