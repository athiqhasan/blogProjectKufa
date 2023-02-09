<?php
$tab_title = 'add work';
require_once('./includes/header.php');
?>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card bg-success">
            <div class="card-header">
                <h3 class="text-light">Add Work</h3>
            </div>
        
            <div class="card-body">
            <?php
            if(isset($_SESSION['success'])): ?>
            <div class="alert alert-light" role="alert">
              <h4 class="alert-heading text-primary"><?= $_SESSION['success']?></h4>
            </div>
            <?php
            endif;
            unset($_SESSION['success']);
            ?>
            <?php
            if(isset($_SESSION['service_error'])): ?>
            <div class="alert alert-light" role="alert">
              <h4 class="alert-heading text-danger"><?= $_SESSION['service_error']?></h4>
            </div>
            <?php
            endif;
            unset($_SESSION['service_error']);
            ?>
                <form action="./work_data.php" method="POST" enctype="multipart/form-data">
                    <div class="example-container bg-dark">
                        <div class="example-content">
                            <h5><label for="" class="text-warning">Work Title</label></h4>
                            <input type="text" class="form-control" placeholder="Work Title" name="work_title">
                        </div>
                        
                        <div class="example-content">
                            <h5><label for="" class="text-warning">Work Heading</label></h4>
                            <input type="text" class="form-control" placeholder="Work Heading" name="work_heading">
                        </div>
                    
                        <div class="example-content">
                            <h5><label for="" class="text-warning">Work Description</label></h4>
                            <textarea name="work_description" id="" cols="30" rows="3" class="form-control form-control-rounded">
                            </textarea>
                        </div>

                        <div class="example-content">
                            <h5><label for="" class="text-warning">Work Image</label></h4>
                            <input type="file" class="form-control" name="work_image">
                        </div>

                        <div class="example-content">
                            <h5><label for="" class="text-warning">Work Status</label></h4>
                            <select class="form-control" name="work_status" id="">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="example-content">
                            <button class="btn btn-primary" name="add_work">Add Work </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require_once('./includes/footer.php');
?>