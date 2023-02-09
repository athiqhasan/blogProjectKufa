<?php
require_once('../db_connect.php');
session_start();

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

$email_password_check_query = "SELECT COUNT(*) AS 'result' FROM `admins` WHERE email = '$email' AND password = '$password'";
$email_password_check_db = mysqli_query($db_connect, $email_password_check_query);
$email_password_check_result = mysqli_fetch_assoc($email_password_check_db);

$name_query = "SELECT id,name FROM admins WHERE email = '$email'";
$name_query_db = mysqli_query($db_connect, $name_query);
$name_query_result = mysqli_fetch_assoc($name_query_db);
$name = $name_query_result['name'];
$id =  $name_query_result['id'];

$flag = false;

if($email){
    $flag = true;
    $_SESSION['email_error'] = 'Email is wrong !';
} else{
    $flag = true;
    $_SESSION['email_error'] = 'email dewa hoy nai';
}

if($password){
    $flag = true;
    $_SESSION['password_error'] = 'password is wrong !';
} else{
    $flag = true;
    $_SESSION['password_error'] = 'password dewa hoy nai';
}

if($email_password_check_result['result']){
    $_SESSION['auth_email'] = $email;
    $_SESSION['auth_name'] = $name;
    $_SESSION['auth_id'] = $id;
    header('location:../home.php');
} else{
    $_SESSION['login_error'] = 'email || password mile nai';
    header('location:./signin.php');
}

?>