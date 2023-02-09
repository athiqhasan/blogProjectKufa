 <?php
require_once('./includes/header.php');
require_once('./db_connect.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-info">Service Lists</h3>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <div class="example-content">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Serial</th>
                                    <th scope="col">Service Title</th>
                                    <th scope="col">Service Icon</th>
                                    <th scope="col">Service Description</th>
                                    <th scope="col">Service Activity</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $service_query = "SELECT * FROM services";
                                    $service_query_db = mysqli_query($db_connect, $service_query);
                                    $serial = 1;

                                foreach ($service_query_db as $services) : ?>
                                    <tr>
                                        <th scope="row"><?= $serial++ ?></th>
                                        <td><?= $services['service_title']?></td>
                                        <td>
                                        <span class="card-text m-1 badge badge-primary"><i class="<?= $services['service_icon']?> fs-5  text-light " aria-hidden="tru"></i></span>
                                        </td>
                                        <td><?= $services['service_description']?></td>
                                        <td><span class="badge <?=($services['service_status']== 'active')? 'badge-success' : 'badge-danger'?>"><?= $services['service_status']?></span></td>
                                        <td>
                                            <a href="./service_update.php?id=<?= $services['id']?>" class="btn btn-info">Edit</a>
                                            <a href="./service_delete.php?id=<?= $services['id']?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once('./includes/footer.php');
?>