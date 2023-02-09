<?php
session_start();
require_once('./db_connect.php');
$name =  htmlspecialchars(trim($_POST['update_name']));
$id = htmlspecialchars($_SESSION['auth_id']);



$flag = false;

if(isset($_POST['update'])){
    $name = $_POST['update_name'];
    $phone_number = $_POST['phone_number'];
    if($name){
        $remove_name_space = str_replace(" ", "", $name);
        if(!ctype_alpha($remove_name_space)){ 
            $flag = true;
            $_SESSION['name_error'] = 'Name namber diso';
        } 
    }  else{
        $flag = true;
        $_SESSION['name_error'] = 'name dewa hoy nai';
    }
        if($_FILES['profile_pic']['name'] != ''){
            $image_name = $_FILES['profile_pic']['name'];
            $explode_image_name = explode('.',$image_name);
            $extension = end($explode_image_name);
            $new_image_name = $id. '.' .$extension;
            $temp_path = $_FILES['profile_pic']['tmp_name'];
            $file_path = './uploads/profile/'.$new_image_name;
            move_uploaded_file($temp_path,$file_path);
            $profile_pic_update_query = "UPDATE admins SET profile_pic = '$new_image_name' WHERE id = '$id' ";
            $profile_pic_update_db = mysqli_query($db_connect,$profile_pic_update_query);
            //header('location:./profile.php');
        }
        if ($phone_number) {
            $phone_number_update_query = "UPDATE admins SET phone_number = '$phone_number' WHERE id = '$id' ";
            $phone_number_update_db = mysqli_query($db_connect,$phone_number_update_query);
            header('location:./profile.php');
        }
}




if(isset($_POST['change_password'])){
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    if ($old_password) {
        $old_password_check_query = "SELECT password FROM admins WHERE id = '$id'";
        $old_password_check_query_db = mysqli_query($db_connect,$old_password_check_query);
        $old_password_from_db = mysqli_fetch_assoc($old_password_check_query_db);
        if ( sha1($old_password) === $old_password_from_db['password'] ) {
            if ($new_password) {
                if (preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$new_password)) {
                    if ($old_password === $new_password) {
                        $flag = true;
                        $_SESSION['new_password_error'] = 'new password old password same';
                    } else{
                        if ($confirm_password) {
                            if ($new_password === $confirm_password) {

                                $encode_pass = sha1($new_password);
                                $password_update_query = "UPDATE admins SET password = '$encode_pass' WHERE id = '$id' ";
                                $password_update_db = mysqli_query($db_connect,$password_update_query);

                                $flag = true;
                                $_SESSION['password_update'] = 'Password update successful !!!';
                            } else{
                                $flag = true;
                                $_SESSION['confirm_password_error'] = 'Confirm password new password mile nai';
                            }
                        } else{
                            $flag = true;
                            $_SESSION['confirm_password_error'] = 'Confirm password dao nai';
                        }
                    } 
                } else{
                    $flag = true;
                    $_SESSION['new_password_error'] = 'New password strong na';
                }
            } else{
                $flag = true;
                $_SESSION['new_password_error'] = 'New password dao nai';
            }
        } else{
            $flag = true;
            $_SESSION['old_password_error'] = 'old password mile nai';
        }
    } else{
        $flag = true;
        $_SESSION['old_password_error'] = 'Old password dao nai';
    }

}
if($flag){
    header('location:./profile.php');

}

elseif(isset($_POST['update'])) {
    $_SESSION['auth_name'] = $name;
    $name_update_query = "UPDATE admins SET name = '$name' WHERE id = '$id' ";
    $name_update_db = mysqli_query($db_connect,$name_update_query);
    header('location:./profile.php');
    $_SESSION['update_show'] = "Successfully updated !";
    
}
?>