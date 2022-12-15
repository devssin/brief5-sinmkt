<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row ">
    <div class="col-md-6 mx-auto ">
        <div class="card card-body my-5 bg-light vh-60">
            <?php flash('register_success') ?>
            <h2 class="text-center mb-5">Login</h2>
            <form action="<?php echo URLROOT . '/users/login' ?>" method="post">

                <div class="form-group mt-3">
                    <input type="text" name="username" placeholder="Username" class="form-control <?php echo (!empty($data['username_err']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['username'] ?>">
                    <span class="invalid-feedback"><?php echo $data['username_err'] ?></span>
                </div>
                <div class="form-group mt-3">
                    <input type="password" name="password" placeholder="Pasword" class="form-control <?php echo (!empty($data['password_err']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['password'] ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err'] ?></span>
                </div>
                <button type="submit"  class="btn btn-warning mt-3">Login</button>
        </div>
        </form>
    </div>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php' ?>