<?php
require_once('./includes/header.php');

$users_query = "SELECT id, name, email FROM admins  ORDER BY name LIMIT 8";
$users_query_db = mysqli_query($db_connect, $users_query);

$total_users_query = "SELECT COUNT(*) AS 'total' FROM admins";
$total_users_db = mysqli_query($db_connect, $total_users_query);
$total_users_count = mysqli_fetch_assoc($total_users_db);
?>


<div class="container bg-success">
    <div class="row">
        <div class="col-md-12 ">
            <div class="page-description ">
                <h1 class="text-light">USER - PROFILE</h1>
            </div>            
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card" >
                <div class="card-header">
                    <h4 class="text-success">You can change your profile</h4>
                </div>
                <div class="card-body">
                <h4>
                    <?php
                        if(isset($_SESSION['update_show'])): ?>
                        <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading text-light"><?= $_SESSION['update_show']?></h4>
                        </div>
                        <?php
                        endif;
                        unset($_SESSION['update_show']);
                    ?>
                    <?php
                        if(isset($_SESSION['password_update'])): ?>
                        <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading text-light"><?= $_SESSION['password_update']?></h4>
                        </div>
                        <?php
                        endif;
                        unset($_SESSION['password_update']);
                    ?> 
                </h4>
                    <div class="example-container" >
                        <div class="example-content bg-dark" >
                            <form action="./profile_data.php" method="post" enctype="multipart/form-data">
                                <h6><label for="" class="text-warning">User Name</label></h6>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="update_name" value="<?= $_SESSION['auth_name']?>">
                                </div>
                                <?php
                                //for out the undefine error
                                if(isset($_SESSION['name_error'])){ ?>
                                <p class="text-danger"><?= $_SESSION['name_error'];?></p>
                                <?php
                                }
                                unset($_SESSION['name_error']);
                                ?>

                                <h6><label for="" class="text-warning">Old Password</label></h6>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" name="old_password">
                                </div>
                                <?php
                                //for out the undefine error
                                if(isset($_SESSION['old_password_error'])){ ?>
                                <p class="text-danger"><?= $_SESSION['old_password_error'];?></p>
                                <?php
                                }
                                unset($_SESSION['old_password_error']);
                                ?>
                                <h6><label for="" class="text-warning">New Password</label></h6>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" name="new_password" >
                                </div>
                                <?php
                                //for out the undefine error
                                if(isset($_SESSION['new_password_error'])){ ?>
                                <p class="text-danger"><?= $_SESSION['new_password_error'];?></p>
                                <?php
                                }
                                unset($_SESSION['new_password_error']);
                                ?>

                                <h6><label for="" class="text-warning">Confirm Password</label></h6>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" name="confirm_password" >
                                </div>
                                <?php
                                //for out the undefine error
                                if(isset($_SESSION['confirm_password_error'])){ ?>
                                <p class="text-danger"><?= $_SESSION['confirm_password_error'];?></p>
                                <?php
                                }
                                unset($_SESSION['confirm_password_error']);
                                ?>

                                <h6><label for="" class="text-warning">Phone Number</label></h6>
                                <div class="input-group mb-3">
                                    <input type="tel" class="form-control" name="phone_number" >
                                </div>

                                <h6><label for="" class="text-warning">Upload Profile Picture </label></h6>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="profile_pic">
                                </div>
                                
                                <button type="submit" class=" btn btn-primary" name="update">Update Name</button>
                                <button type="submit" class=" btn btn-primary" name="change_password">Update password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once('./includes/footer.php');
?>