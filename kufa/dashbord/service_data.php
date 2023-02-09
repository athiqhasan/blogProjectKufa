<?php
require_once('./db_connect.php');
session_start();


$flag = false;

if(isset($_POST['add_services'])){
    $service_title          = $_POST['service_title'];
    $service_icon           = $_POST['service_icon'];
    $service_description    = $_POST['service_description'];
    $service_status         = $_POST['service_status'];
    if( empty($service_title) || empty($service_icon) || empty($service_description) || empty($service_status)){
        $flag = true;
        $_SESSION['service_error'] = 'All fields are required !';
    }
     
}
if($flag){
    header('location:./service_add.php');
} 


elseif(isset($_POST['add_services'])){
    $admin_query =  "INSERT INTO `services` (service_title, service_icon, service_description, service_status) VALUES ('$service_title', '$service_icon', '$service_description', '$service_status')";
    mysqli_query($db_connect, $admin_query) ;
    $_SESSION['success'] = 'Services added successfully!';
    header('location:./service_add.php');
}
?>