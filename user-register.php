<?php
    ob_start();
    require('includes/header.php');
    $msg='';
    // User Registration
    if(isset($_POST['register_btn']))
    {
        $name=get_safe_value($con,$_POST['fullname']);
        $email=get_safe_value($con,$_POST['email']);
        $contactNo=get_safe_value($con,$_POST['contactNo']);
        $password=get_safe_value($con,md5($_POST['password']));
        $date=date("Y-m-d");
        
        $res=mysqli_query($con,"select * from users where email='$email'");
        $check_user=mysqli_num_rows($res);
        if($check_user > 0)
        {
            $msg="User already registered.";
        }
        else if($_POST['password'] != $_POST['password2'])
        {
            $msg="The passwords do not match.";
        }
        else
        {
            $query=mysqli_query($con,"insert into users(name,email,contactNo,password,date) values('$name','$email','$contactNo','$password','$date')");
            if($query)
            {
                echo "<script>alert('You are successfully registered');</script>";
                header('location:user-login.php');
                die();
            }
            else
            {
                $msg="Not register something went worng.";
            }
        }
    }
?>

    <!-- Customer Registration Form -->
    <div class="common-block">
      <p class="reg-login-font">Create New Customer Account</p>
      <div class="reg-login-form">
        <form method="post" action="user-register.php">
            <p class="border-bottom">Personal Information</p>
            <div class="form-group">
                <label class="reg-login-text">Full Name</label>
                <input type="text" name="fullname" class="reg-input form-control" required>
            </div>
            <p class="border-bottom">Sign-In Information</p>
            <div class="form-group">
                <label class="reg-login-text">Email</label>
                <input type="email" name="email" class="reg-input form-control" required>
            </div>
            <div class="form-group">
                <label class="reg-login-text">Contact Number</label>
                <input type="number" name="contactNo" class="reg-input form-control" required>
            </div>
            <div class="form-group">
                <label class="reg-login-text">Password</label>
                <input type="password" name="password" class="reg-input form-control" minlength="8" required>
            </div>
            <div class="form-group">
                <label class="reg-login-text">Confirm Password</label>
                <input type="password" name="password2" class="reg-input form-control" minlength="8" required>
            </div>
            <br/>
            <button type="submit" name="register_btn" class="register">CREATE AN ACCOUNT</button>
        </form>
        <p class="reg-login-text">Already registered? <a class="reg-login-link" href="user-login.php">Sign In</a></p>
        <div class="field-error">
            <?php echo $msg ?>
        </div>
      </div>
    </div>

<?php
    require('includes/footer.php');
    ob_end_flush();
?>
