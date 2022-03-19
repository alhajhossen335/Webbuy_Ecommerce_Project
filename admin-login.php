<?php
    require('includes/config.php');
    require('includes/functions.php');
    $msg='';
    if(isset($_POST['submit']))
    {
      $username=get_safe_value($con, $_POST['username']);
      $password=get_safe_value($con, $_POST['password']);
      $sql="select * from admin where username='$username' and password='$password'";
      $res=mysqli_query($con, $sql);
      $count=mysqli_num_rows($res);
      if($count>0)
      {
        $_SESSION['ADMIN_LOGIN']='Yes';
        $_SESSION['ADMIN_USERNAME']=$username;
        header('Location:category.php');
        die();
      }
      else
      {
        $msg="Please enter correct login details.";
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Lato:wght@400;700&family=Montserrat:wght@400;600;700&family=Mulish:wght@400;600;700&family=Open+Sans:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css"/>
    <link rel="stylesheet" href="assets/css/reg-login.css">
    <link rel="stylesheet" href="assets/css/admin.css"/>
  </head>

  <!-- Admin Login Form -->
  <body>
    <div class="admin-login">
      <div class="common-block">
        <h3 class="text-center pr-2">Admin Login</h3>
          <div class="admin-login-form">
              <form method="post" action="admin-login.php">
                  <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="username" class="admin-login-input form-control" required>
                  </div>
                  <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="admin-login-input form-control" required>
                  </div>
                  <br/>
                  <button type="submit" name="submit" class="btn admin-login-btn">Sign In</button>
              </form>
              <div class="field-error text-center">
                <?php echo $msg ?>
              </div>
          </div>
      </div>
    </div>
    
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/myScript.js"></script>
  </body>
</html>