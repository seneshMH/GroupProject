<?php

require_once "include/validation.inc.php";

if(isset($_POST['send'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $mobile = trim($_POST['mobile']);
    $message = trim($_POST['message']);

    if(emailInvalid($email)) {
        header("Location: ../index.html?err=invalid_email");
    } elseif (mobileInvalid($mobile)) {
        header("Location: ../index.html?err=invalid_mobile");
    }else{
        $myMail = "pelessavidyalaya@gmail.com";
        $headder = "From: " . $email;
        $message2 = "You have recived a message from " . $name . "\n" . "mobile :" . $mobile . "\n" . "email :" . $email . "\n\n" . $message;
    
        mail($myMail,$subject,$message2,$headder);
        header("Location: index.html?msg=mailsend");
    } 

   
}
