<?php
require_once('./includes/header.php');
?>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card bg-success">
            <div class="card-header">
                <h3 class="text-light">Add Services</h3>
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
                <form action="./service_data.php" method="POST">
                <div class="example-container bg-dark">
                    <div class="example-content">
                        <h5><label for="" class="text-warning">Service Title</label></h4>
                        <input type="text" class="form-control" placeholder="Service Title" name="service_title">
                    </div>
                    <div class="example-content">
                        <h5><label for="" class="text-warning">Service Icon</label></h4>
                        <input readonly type="text" class="form-control" id="icon_value" placeholder="Service icon" name="service_icon">
                        <br>

                        <div class="card bg-light   form-control">
                            <div class="card-body " style="overflow-x:scroll;height:150px">
                                <?php
                                require_once('./includes/icons.php');
                                foreach ($fonts as $font) : ?>
                                    <span class="card-text  m-1 badge badge-primary" style="cursor:pointer"><i class="<?= $font?> fs-5 icon_click text-light  " id="<?= $font?>" aria-hidden="true"></i></span>

                                <?php
                                endforeach;
                                ?>
                                
                            </div>
                        </div>
                    </div>

                    
                
                    <div class="example-content">
                        <h5><label for="" class="text-warning">Service Description</label></h4>
                        <textarea name="service_description" id="" cols="30" rows="3" class="form-control form-control-rounded">
                        </textarea>
                    </div>
                    <div class="example-content">
                        <h5><label for="" class="text-warning">Service Activity</label></h4>
                        <select name="service_status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
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