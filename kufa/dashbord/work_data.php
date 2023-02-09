<?php
require_once('./db_connect.php');
session_start();

    $id                = $_SESSION['auth_id'];
    $work_title        = $_POST['work_title'];
    $work_heading      = $_POST['work_heading'];
    $work_description  = $_POST['work_description'];
    $work_status       = $_POST['work_status'];
    $work_image        = $_FILES['work_image'];

    if (isset($_POST['add_work'])) {
        if ($work_image['name']) {
            $image_name = $work_image['name'];
            $explode_image_name = explode('.',$image_name);
            $extension = end($explode_image_name);
    
            if ($extension === 'png' || $extension === 'jpg') {
    
                $new_image_name = $id. "_". time(). ".". $extension;
                $tmp_name       = $work_image['tmp_name'];
                $file_path      = "./uploads/works/". $new_image_name;
                move_uploaded_file($tmp_name, $file_path);
                $work_query =  "INSERT INTO `work`(`work_title`, `work_heading`, `work_description`, `work_status`, `work_image`) VALUES ('$work_title','$work_heading','$work_description','$work_status','$new_image_name')";
                mysqli_query($db_connect, $work_query) ;
                header('location:./work_add.php');
            } 
        }
    }

    if (isset($_POST['update_work'])) {
        $update_id = $_POST['update_id'];
        if ($work_image['name']) {
            //delete old image
            $work_query = "SELECT work_image FROM work WHERE id = $update_id";
            $work_query_db = mysqli_query($db_connect, $work_query);
            $old_image_name = mysqli_fetch_assoc($work_query_db)['work_image'];
            $file_path      = "./uploads/works/". $old_image_name;
            unlink($file_path);

            //new image
            $image_name = $work_image['name'];
            $explode_image_name = explode('.',$image_name);
            $extension = end($explode_image_name);  
            if ($extension === 'png' || $extension === 'jpg') {
    
                $new_image_name = $id. "_". time(). ".". $extension;
                $tmp_name       = $work_image['tmp_name'];
                $file_path      = "./uploads/works/". $new_image_name;
                move_uploaded_file($tmp_name, $file_path);
                $work_update_query = "UPDATE work SET work_title = '$work_title', work_heading = '$work_heading', work_description = '$work_description', work_status = '$work_status', work_image = '$new_image_name' WHERE id = '$update_id'";
                $work_update_query_db = mysqli_query($db_connect,$work_update_query);
                header("location:./work_update.php?id={$update_id}");
            } 
        }
        $work_update_query = "UPDATE work SET work_title = '$work_title', work_heading = '$work_heading', work_description = '$work_description', work_status = '$work_status' WHERE id = '$update_id'";
        $work_update_query_db = mysqli_query($db_connect,$work_update_query);
        header("location:./work_update.php?id={$update_id}"); 
    }

?>