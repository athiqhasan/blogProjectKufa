<?php
require_once('./includes/header.php');
?>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card bg-success">
            <div class="card-header">
                <h3 class="text-light">Social Links</h3>
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
                <form action="./social_link_update.php" method="POST">
                <div class="example-container bg-dark">
                    <div class="example-content">
                        <h5> <label for="" class="text-warning">Facebook</label></h5>
                        <input type="url" class="form-control" placeholder="Facebook Link" name="facebook">
                    </div>
                    <div class="example-content">
                        <h5> <label for="" class="text-warning">Twitter</label></h5>
                        <input type="url" class="form-control" placeholder="Twitter Link" name="twitter">
                    </div>
                    <div class="example-content">
                        <h5> <label for="" class="text-warning">Instagram</label></h5>
                        <input type="url" class="form-control" placeholder="Instagram Link" name="instagram">
                    </div>
                    <div class="example-content">
                        <h5> <label for="" class="text-warning">Linked In</label></h5>
                        <input type="url" class="form-control" placeholder="LinkedIn Link" name="linkedin">
                    </div>
                    
                    <div class="example-content">
                        <button class="btn btn-primary" name="add_services">Update social links </button>
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