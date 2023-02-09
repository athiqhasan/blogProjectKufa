<?php
require_once('./includes/header.php');
require_once('./db_connect.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-info">Work Lists</h3>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <div class="example-content">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Serial</th>
                                    <th scope="col">Work Title</th>
                                    <th scope="col">Work Heading</th>
                                    <th scope="col">Work Description</th>
                                    <th scope="col">Work Image </th>
                                    <th scope="col">Work Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $work_query = "SELECT * FROM work";
                                    $work_query_db = mysqli_query($db_connect, $work_query);
                                    $serial = 1;

                                foreach ($work_query_db as $work) : ?>
                                    <tr>
                                        <th scope="row"><?= $serial++ ?></th>
                                        <td><?= $work['work_title']?></td>
                                        <td > <?= $work['work_heading']?></td>
                                        <td><?= $work['work_description']?></td>
                                        <td><img src="./uploads/works/<?= $work['work_image']?>" alt="image" width="50" height="50"></td>

                                        <td><span class="badge <?=($work['work_status']== 'active')? 'badge-success' : 'badge-danger'?>"><?= $work['work_status']?></span></td>

                                        <td>
                                            <a href="./work_update.php?id=<?= $work['id']?>" class="btn btn-info">Edit</a>
                                            <a href="./work_delete.php?id=<?= $work['id']?>" class="btn btn-danger">Delete</a>
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