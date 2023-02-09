<?php
require_once('./includes/header.php');
?>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card bg-success">
            <div class="card-header">
                <h3 class="text-light">Update Services</h3>
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
            $id = $_GET['id'];
            $service_query = "SELECT * FROM services WHERE id = $id";
            $service_query_db = mysqli_query($db_connect, $service_query);
            $service = mysqli_fetch_assoc($service_query_db);
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
                <form action="./service_update_data.php" method="POST">
                <div class="example-container bg-dark">
                    <div class="example-content">
                        <h5> <label for="" class="text-warning">Service Title</label></h5>
                        <input hidden type="number" name="id" value="<?= $service['id']?>">
                        <input type="text" class="form-control" placeholder="Service Title" name="service_title" value="<?= $service['service_title']?>">
                    </div>
                    <div class="example-content">
                        <h5><label for="" class="text-warning">Service Icon</label>
                        <i class="<?= $service['service_icon']?> text-info"></i></h5>
                        
                        <input readonly type="text" class="form-control" id="icon_value" value="<?= $service['service_icon']?>" placeholder="Service icon" name="service_icon">
                        <br>

                        <div class="card bg-light  form-control">
                            <div class="card-body " style="overflow-x:scroll;height:150px">
                                <?php
                                require_once('./includes/icons.php');
                                foreach ($fonts as $font) : ?>
                                    <span class="card-text m-1 badge badge-primary" style="cursor:pointer"><i class="<?= $font?> fs-5 icon_click text-light " id="<?= $font?>" aria-hidden="true"></i></span>

                                <?php
                                endforeach;
                                ?>
                                
                            </div>
                        </div>
                    </div>

                    
                
                    <div class="example-content">
                        <h5><label for="" class="text-warning">Service Description</label></h4>
                        <textarea name="service_description" id="" cols="30" rows="3" class="form-control form-control-rounded"><?= $service['service_description']?></textarea>
                    </div>
                    <div class="example-content">
                        <h5><label for="" class="text-warning">Service Activity</label></h4>
                        <select name="service_status" class="form-control">
                            <option value="active" <?= ($service['service_status'] === 'active')? 'selected' : ''?>>Active</option>
                            <option value="inactive" <?= ($service['service_status'] === 'inactive')? 'selected' : ''?>>Inactive</option>
                        </select>
                    </div>
                    <div class="example-content">
                        <button class="btn btn-primary" name="add_services">Add service </button>
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
<script>
    $(document).ready(function(){
        $('.icon_click').click(function(){
            $('#icon_value').val($(this).attr('id'));
        })
    })
</script>