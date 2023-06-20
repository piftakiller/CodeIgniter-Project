<?php require_once __DIR__.'/../includes/header.php'; ?>
<div class="container-sm text-center">
  <h2>Register to the site</h2>
  <h6><?php if(isset($data['error'])) echo $data['error'];  ?></h6>
<form method="post" action="<?php echo base_url('register/post'); ?>">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="text" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" required>
</div>
<div class="mb-3">
    <label for="phone_number" class="form-label">Phone Number</label>
    <input type="text" class="form-control" id="phone_number" name="phone_number" required>
</div>
  <!--<div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
    <label class="form-check-label" for="exampleCheck1">I aggree with the terms and conditions</label>
  </div> -->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php require_once __DIR__.'/../includes/footer.php'; ?>