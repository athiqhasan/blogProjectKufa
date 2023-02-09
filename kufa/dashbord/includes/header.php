<?php
session_start();
if( !isset($_SESSION['auth_id']) ){
    header('location:../dashbord/opps.php');
}
require_once('./db_connect.php');

//$explode_page = explode('/',$_SERVER['PHP_SELF']);
//$end_page     = end($explode_page);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Title -->
    <title><?= $tab_title?></title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">

    <link href="./assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="./assets/plugins/pace/pace.css" rel="stylesheet">

    <!--font stylesheet here-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Theme Styles -->
    <link href="./assets/css/main.min.css" rel="stylesheet">
    <link href="./assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        <div class="app-sidebar bg-success">
            <div class="logo bg-secondary">
                <a href="index.html" class="logo-icon"><span class="logo-text">Neptune</span></a>
                <div class="sidebar-user-switcher user-activity-online">
                    <?php
                    $id = $_SESSION['auth_id'];
                    $profile_pic_query = "SELECT profile_pic FROM admins WHERE id = $id";
                    $profile_pic_query_db = mysqli_query($db_connect, $profile_pic_query);
                    $demo_image_name = mysqli_fetch_assoc($profile_pic_query_db)['profile_pic'];
                    
                    
                    ?>
                    <a href="#">
                        <span class="activity-indicator"></span>
                        <img style="height:100px;width:100px" src="./uploads/profile/<?= $demo_image_name?>">
                        <br><br><br>
                        <span class="user-info-text text-danger"><?= $_SESSION['auth_name']?></span>
                        <span class="user-state-info text-primary"><?= $_SESSION['auth_email']?></span>
                    </a>
                </div>
            </div>
            <div class="app-menu">
                <ul class="accordion-menu">
                    <li class="sidebar-title">
                        Apps
                    </li>
                    <li class="<?= ($end_page == 'home.php')?'active-page': ''?>">
                        <a href="../dashbord/home.php" class="active"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
                    </li> 

                    <li class="<?= ($end_page == 'social_links.php')?'active-page': ''?>">
                        <a href="../dashbord/social_links.php" class="active"><i class="material-icons-two-tone">link</i>Social links</a>
                    </li>
                     
                    <li class="<?= ($end_page == 'profile.php')?'active-page': ''?>">
                        <a href="../dashbord/profile.php" class="active"><i class="material-icons-two-tone">face</i>Profile</a>
                    </li>
                    <li class="<?= ($end_page == 'service_add.php') || ($end_page == 'service_list.php')?'active-page': ''?>">
                        <a href=""><i class="material-icons-two-tone">manage_accounts</i>Services<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= ($end_page == 'service_add.php')?'active': ''?>" href="../dashbord/service_add.php">Add service</a>
                            </li>
                            <li>
                                <a class="<?= ($end_page == 'service_list.php')?'active': ''?>" href="../dashbord/service_list.php">Service list</a>
                            </li>
                        </ul>
                    </li>


                    <li class="<?= ($end_page == 'work_add.php') || ($end_page == 'work_list.php')?'active-page': ''?>">
                    <a href=""><i class="material-icons-two-tone">workspaces</i>Works<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= ($end_page == 'work_add.php')?'active': ''?>" href="../dashbord/work_add.php">Add work</a>
                            </li>
                            <li>
                                <a class="<?= ($end_page == 'work_list.php')?'active': ''?>" href="../dashbord/work_list.php">work list</a>
                            </li>
                        </ul>
                    </li>


                </ul>
            </div>
        </div>
        <div class="app-container">
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            <div class="app-header">
                <nav class="navbar navbar-light navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-nav" id="navbarNav">
            
                        </div>
                        <div class="d-flex">
                            <ul class="navbar-nav">
                            <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link btn btn-warning text-white" target="_blank" href="../frontend/index.php">Visit site</a>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link btn btn-danger text-white"
                                     href="../dashbord/auth/logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="app-content">
                <div class="content-wrapper">