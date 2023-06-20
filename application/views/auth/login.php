<?php require_once __DIR__.'/../includes/header.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Login</h2>
            <?php if(! empty($_SESSION['error'])) { ?>
                <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']);?></div>
            <?php } ?>
            <form method="post" action="<?php echo base_url('login/post'); ?>">
                <div class="form-group">
                    <label for="username">Email</label>
                    <input type="text" class="form-control" id="username" name="username" >
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="password" >
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

<?php require_once __DIR__.'/../includes/footer.php'; ?>