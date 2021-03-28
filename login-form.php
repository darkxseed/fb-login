<br>



<a href="<?php echo $fb_login_url;?>" class="btn btn-primary "><i class="fa fa-facebook"></i> Sign in with <b>Facebook</b></a> <a class="btn btn-secondary" href="">Sign Up</a>

<br>

<?php 
include "login.php"	;

?>
<form action="" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">

  </div>
  <button type="submit" name="login" class="btn btn-primary">Login</button>
</form>
