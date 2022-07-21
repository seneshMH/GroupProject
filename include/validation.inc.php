<?php

function inputEmptyLogin($index,$pass){
    $value = false;
    if(empty($index) || empty($pass)){
        $value = true;
    }
    else{
        $value = false;
    }
    return $value;
}

function indexlInvalid($index){
    $value = false;
    if(!preg_match("/^[\d]*$/",$index)){
        $value = true;
    }else{
        $value = false;
    }
    return $value;
}

function nameInvalid($fname,$lname){
    $value = false;
    if(!preg_match("/^[a-zA-Z]+$/",$fname)){
        $value = true;
    }elseif(!preg_match("/^[a-zA-Z]+$/",$lname)){
        $value = true;
    }else{
        $value = false;
    }
    return $value;
}

function emailInvalid($email){
    $value = false;
    if(!preg_match("/^[a-zA-Z\d._-]+@[a-zA-Z\d_-]+\.[a-zA-Z\d.]{2,}$/",$email)){
        $value = true;
    }else{
        $value = false;
    }
    return $value;
}

function mobileInvalid($mobile){
    $value = false;
    if(!preg_match("/^[0][\d]{9}$/",$mobile)){
        $value = true;
    }else{
        $value = false;
    }
    return $value;
}

function passwordInvalid($pass){
    $value = false;
    if(!preg_match("/^.{5,}$/",$pass)){
        $value = true;
    }else{
        $value = false;
    }
    return $value;
}

function passNotMatch($pass,$rePass){
    $value = false;
    if($pass !== $rePass){
        $value = true;
    }else{
        $value = false;
    }
    return $value;
}

function emailOrMobileAvalable($email,$index,$conn){
    $value = false;

    $sql = "SELECT * FROM students WHERE indexNo = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../register.php?err=faildstmt");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt,"is",$index,$email);
        mysqli_stmt_execute($stmt);
        $data = mysqli_stmt_get_result($stmt);
        if(!mysqli_fetch_assoc($data)){
            $value = false;
        }else{
            $value = true;
        }
    }
    mysqli_stmt_close($stmt);
    return $value;
}

function adminIndexAvalable($conn,$index){

    $value = false;

    $sql = "SELECT * FROM admin WHERE indexNo = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        exit();
    }else{
        mysqli_stmt_bind_param($stmt,"i",$index);
        mysqli_stmt_execute($stmt);
        $data = mysqli_stmt_get_result($stmt);
        if(!mysqli_fetch_assoc($data)){
            $value = false;
        }else{
            $value = true;
        }
    }
    mysqli_stmt_close($stmt);
    return $value;

}
?>