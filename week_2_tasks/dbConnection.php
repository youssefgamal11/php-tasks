<?php

session_start();

$server = 'localhost';
$dbName = 'youssef';
$dbUser = 'root';
$dbPassword = '';

$con = mysqli_connect($server ,$dbUser , $dbPassword , $dbName);

if($con){
    echo 'data base connected' .'<br>';
}else{
    die ('Error'.mysqli_connect_error());
}

?>