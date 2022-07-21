<?php

$dbserver = "localhost";
$dbuser = "root";
$dpass = "";
$database = "users";

$conn = mysqli_connect($dbserver,$dbuser,$dpass,$database);

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

?>