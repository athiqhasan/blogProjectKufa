    <?php 
    require_once('./includes/header.php'); session_start();
    ?>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">
        </div>

        <div class="app-auth-container">
            <div class="logo">
                <a href="index.html">Neptune</a>
            </div>
            <p class="auth-description">Please sign-in to your account and continue to the dashboard.
                <br>Don't have an account? <a href="signup.php">Sign Up</a></p>
            <?php
                if(isset($_SESSION['signin_status'])) : ?>
                 <div class="alert alert-primary" role="alert">
                  <p><?= $_SESSION['signin_status']?></p>
                </div>
            <?php
            endif
            ?>

            <?php
                if(isset($_SESSION['login_error'])) : ?>
                 <div class="alert alert-danger" role="alert">
                  <p><?= $_SESSION['login_error']?></p>
                </div>
            <?php
            endif
            ?>


            <div class="auth-credentials m-b-xxl">
                <form action="./signin_data.php" method="POST">
                    <label for="signInEmail" class="form-label">Email address</label>
                    <input type="text" class="form-control m-b-md <?= isset($_SESSION['email_error']) ? 'is-invalid': ''?>"
                     <?= isset($_SESSION['email_error']);?>  id="signInEmail" aria-describedby="signInEmail"
                      placeholder="example@neptune.com" name="email">
                    <?php
                    //for out the undefine error
                    if(isset($_SESSION['email_error'])){ ?>
                       <p class="text-danger"><?= $_SESSION['email_error'];?></p>
                    <?php
                    }
                    unset($_SESSION['email_error']);
                    ?>

                    <label for="signInPassword" class="form-label">Password</label>
                    <input type="password" class="form-control <?= isset($_SESSION['password_error']) ? 'is-invalid': ''?>"
                     <?= isset($_SESSION['password_error']);?>
                      id="signInPassword" aria-describedby="signInPassword" name="password">

                    <?php
                    //for out the undefine error
                    if(isset($_SESSION['password_error'])){ ?>
                       <p class="text-danger"><?= $_SESSION['password_error'];?></p>
                    <?php
                    }
                    unset($_SESSION['password_error']);
                    ?>
            </div>
                    <div class="auth-submit">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
        </div>  
    </div>
    <?php 
    require_once('./includes/footer.php');
    session_unset();
    ?>
    