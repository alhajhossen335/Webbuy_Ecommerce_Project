
<?php
    ob_start();
    require('includes/header.php');
    $msg='';
    // User login
    if(isset($_POST['login_btn']))
    {
        $email=get_safe_value($con,$_POST['email']);
        $password=get_safe_value($con,md5($_POST['password']));
        $res=mysqli_query($con,"select * from users where email='$email' and password='$password'");
        $check_user=mysqli_num_rows($res);
        if($check_user > 0)
        {
            $row=mysqli_fetch_assoc($res);
            $_SESSION['USER_LOGIN']='Yes';
            $_SESSION['USER_ID']=$row['id'];
            $_SESSION['USER_NAME']=$row['name'];
            echo "<script>alert('You are now logged in');</script>";
            header('location:home.php');
            die();
        }
        else
        {
            $msg="Please enter correct login details.";
        }
    }
?>

    <!-- Customer Login Form -->
    <div class="common-block">
      <p class="reg-login-font">Customer Login</p>
      <div class="reg-login-form">
        <form method="post" action="user-login.php">
            <div class="form-group">
                <label class="reg-login-text">Email</label>
                <input type="email" name="email" class="login-input form-control" required>
            </div>
            <div class="form-group">
                <label class="reg-login-text">Password</label>
                <input type="password" name="password" class="login-input form-control" required>
            </div>
            <br/>
            <button type="submit" name="login_btn" class="login">Sign In</button>
        </form>
        <p class="reg-login-text">Not registered yet? <a class="reg-login-link" href="user-register.php">Register Here</a></p>
        <div class="field-error">
            <?php echo $msg ?>
        </div>
      </div>
    </div>

<?php
    require('includes/footer.php');
    ob_end_flush();
?>
