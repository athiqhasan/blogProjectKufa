<?php
$tab_title = "Hello Admin";
require_once('./includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="page-description bg-success">
                <h1>Dashboard</h1>
                <h2 class="text-primary">Hello <span class="text-light"> <?= $_SESSION['auth_name'] ?></span> < <?= $_SESSION['auth_email'] ?> ></h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4">
            <div class="card widget widget-stats">
                <div class="card-body">
                    <div class="widget-stats-container d-flex">
                        <div class="widget-stats-icon widget-stats-icon-primary">
                            <i class="material-icons-outlined">paid</i>
                        </div>
                        <div class="widget-stats-content flex-fill">
                            <span class="widget-stats-title">Today's Sales</span>
                            <span class="widget-stats-amount">$38,211</span>
                            <span class="widget-stats-info">471 Orders Total</span>
                        </div>
                        <div class="widget-stats-indicator widget-stats-indicator-negative align-self-start">
                            <i class="material-icons">keyboard_arrow_down</i> 4%
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card widget widget-stats">
                <div class="card-body">
                    <div class="widget-stats-container d-flex">
                        <div class="widget-stats-icon widget-stats-icon-warning">
                            <i class="material-icons-outlined">person</i>
                        </div>
                        <div class="widget-stats-content flex-fill">
                            <span class="widget-stats-title">Active Users</span>
                            <span class="widget-stats-amount">23,491</span>
                            <span class="widget-stats-info">790 unique this month</span>
                        </div>
                        <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                            <i class="material-icons">keyboard_arrow_up</i> 12%
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card widget widget-stats">
                <div class="card-body">
                    <div class="widget-stats-container d-flex">
                        <div class="widget-stats-icon widget-stats-icon-danger">
                            <i class="material-icons-outlined">file_download</i>
                        </div>
                        <div class="widget-stats-content flex-fill">
                            <span class="widget-stats-title">Downloads</span>
                            <span class="widget-stats-amount">140,390</span>
                            <span class="widget-stats-info">87 items downloaded</span>
                        </div>
                        <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                            <i class="material-icons">keyboard_arrow_up</i> 7%
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
                <?php
                $users_query = "SELECT id, name, email FROM admins  ORDER BY name LIMIT 8";
                $users_query_db = mysqli_query($db_connect, $users_query);
                $total_users_query = "SELECT COUNT(*) AS 'total' FROM admins";
                $total_users_db = mysqli_query($db_connect, $total_users_query);
                $total_users_count = mysqli_fetch_assoc($total_users_db);
                
                ?>
        <div class="col-xl-6">
            <div class="card widget widget-list" style="height:450px;overflow-Y:scroll">
                <div class="card-header">
                    <h5 class="card-title">Active Users<span class="badge badge-success badge-style-light"><?= $total_users_count['total']?> Users</span></h5>
                </div>
                <div class="card-body">
                    <span class="text-muted m-b-xs d-block">showing <?= $users_query_db->num_rows?> out of <?= $total_users_count['total']?> active tasks.</span>
                    <ul class="widget-list-content list-unstyled">
                        <?php
                        $serial = 0;
                        foreach ($users_query_db as $user) :?>

                        <li class="widget-list-item widget-list-item-green">
                            <span class="widget-list-item-icon"><?= ++$serial ?></span>
                            <span class="widget-list-item-description">
                                <a href="#" class="widget-list-item-description-title">
                                   <?= $user['name']?>
                                </a>
                                <span class="widget-list-item-description-subtitle">
                                <?= $user['email']?>
                                </span>
                            </span>
                        </li>
                        <?php
                        endforeach
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card widget widget-list">
                <div class="card-header">
                    <h5 class="card-title">Todo<span class="badge badge-success badge-style-light">14 completed</span></h5>
                </div>
                <div class="card-body">
                    <span class="text-muted m-b-xs d-block">showing 5 out of 23 active tasks.</span>
                    <ul class="widget-list-content list-unstyled">
                        <li class="widget-list-item widget-list-item-green">
                            <span class="widget-list-item-check">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="">
                                </div>
                            </span>
                            <span class="widget-list-item-description">
                                <a href="#" class="widget-list-item-description-title">
                                    Dashboard UI optimisations
                                </a>
                                <span class="widget-list-item-description-subtitle">
                                    Oskar Hudson
                                </span>
                            </span>
                        </li>
                        <li class="widget-list-item widget-list-item-blue">
                            <span class="widget-list-item-check">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="" checked>
                                </div>
                            </span>
                            <span class="widget-list-item-description">
                                <a href="#" class="widget-list-item-description-title">
                                    Mailbox cleanup
                                </a>
                                <span class="widget-list-item-description-subtitle">
                                    Woodrow Hawkins
                                </span>
                            </span>
                        </li>
                        <li class="widget-list-item widget-list-item-purple">
                            <span class="widget-list-item-check">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="" checked>
                                </div>
                            </span>
                            <span class="widget-list-item-description">
                                <a href="#" class="widget-list-item-description-title">
                                    Header scroll bugfix
                                </a>
                                <span class="widget-list-item-description-subtitle">
                                    Sky Meyers
                                </span>
                            </span>
                        </li>
                        <li class="widget-list-item widget-list-item-yellow">
                            <span class="widget-list-item-check">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="">
                                </div>
                            </span>
                            <span class="widget-list-item-description">
                                <a href="#" class="widget-list-item-description-title">
                                    Localization for file manager
                                </a>
                                <span class="widget-list-item-description-subtitle">
                                    Oskar Hudson
                                </span>
                            </span>
                        </li>
                        <li class="widget-list-item widget-list-item-red">
                            <span class="widget-list-item-check">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="" checked>
                                </div>
                            </span>
                            <span class="widget-list-item-description">
                                <a href="#" class="widget-list-item-description-title">
                                    New E-commerce UX/UI design
                                </a>
                                <span class="widget-list-item-description-subtitle">
                                    Oskar Hudson
                                </span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</div>
<?php
require_once('./includes/footer.php');
?>