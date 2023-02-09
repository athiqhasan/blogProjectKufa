<?php
require_once('./db_connect.php');
session_start();

$id = $_SESSION['auth_id'];
$facebook     = $_POST['facebook'];
$twitter      = $_POST['twitter'];
$instagram    = $_POST['instagram'];
$linkedin     = $_POST['linkedin'];

$social_links_update_query    = "UPDATE admins SET facebook = '$facebook', twitter = '$twitter', instagram = '$instagram', linkedin = '$linkedin' WHERE id = '$id' ";
$social_links_update_db       = mysqli_query($db_connect,$social_links_update_query);
header('location:./social_links.php');
?>