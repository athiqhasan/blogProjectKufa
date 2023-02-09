<?php
//for Out the session error
session_start();
require_once('../db_connect.php');

//catch form data by name                                                
$name = htmlspecialchars($_POST['user_name']);
$email = htmlspecialchars($_POST['user_email']);
$password = htmlspecialchars($_POST['user_password']);
$confirm_password = htmlspecialchars($_POST['user_confirm_password']);

//email check in database
$email_check_query = "SELECT COUNT(*) AS 'result' FROM admins WHERE email = '$email'";
$email_check_db = mysqli_query($db_connect,$email_check_query);
$email_check_result = mysqli_fetch_assoc($email_check_db);

$flag = false;
//checking name field name = yes or not
if($name){
    $remove_name_space = str_replace(" ", "", $name); //remove space and convert to string
    if(ctype_alpha($remove_name_space)){  //for not number in name field
        $_SESSION['old_name'] = $name;
    } else{
        $flag = true;
        $_SESSION['name_error'] = "Name namber diso";
    }
} else{
    $flag = true;
    $_SESSION['name_error'] = 'name dewa hoy nai';
}

if($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        if($email_check_result['result'] == 1){
            $flag = true;
            $_SESSION['email_error'] = 'email ache';
        }
    } else{
        $flag = true;
        $_SESSION['email_error'] = 'Your email is wrong';
    }
} else{
    $flag = true;
    $_SESSION['email_error'] = 'email dewa hoy nai';
}

if($password){
    if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password)){
        $flag = true;
        $_SESSION['password_error'] = 'Your password is wrong';  
    }
}  else{
    $flag = true;
    $_SESSION['password_error'] = 'password dewa hoy nai';
}

if($confirm_password){
    if(!($password === $confirm_password)){
        $flag = true;
        $_SESSION['confirm_password_error'] = 'confirm_password is wrong';
    }
} else{
    $flag = true;
    $_SESSION['confirm_password_error'] = 'confirm_password dewa hoy nai';
}

if($flag){
    header('location:./signup.php');

} else{
    //$salt = rand(100,999);
    //$password_encode = sha1($password).$salt;
    $password_encode = sha1($password); 
    $admin_query =  "INSERT INTO `admins` (name, email, password) VALUES ('$name', '$email', '$password_encode')";
    mysqli_query($db_connect, $admin_query) ;
    $_SESSION['signin_status'] = "Hello $name";
    header('location: ./signin.php');

}
?>