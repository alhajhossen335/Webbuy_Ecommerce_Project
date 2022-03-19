<?php
    require('includes/header.php');
    // User Contact Form
    if(isset($_POST['contact_btn']))
    {
        $name=get_safe_value($con,$_POST['name']);
        $email=get_safe_value($con,$_POST['email']);
        $contactNo=get_safe_value($con,$_POST['contactNo']);
        $message=get_safe_value($con,$_POST['message']);
        $date=date("Y-m-d");

        $query=mysqli_query($con,"insert into contact_us(name,email,contactNo,message,date) values('$name','$email','$contactNo','$message','$date')");
        if($query)
        {
            echo "<script>alert('The message sent successfully');</script>";
        }
        else
        {
            echo "<script>alert('Something went worng');</script>";
        }
        
    }
?>


    <!-- User Contact Form -->
    <div class="user-contact">
        <div class="common-block">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14608.039147952033!2d90.36710721944047!3d23.74703040345424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b33cffc3fb%3A0x4a826f475fd312af!2sDhanmondi%2C%20Dhaka%201205!5e0!3m2!1sen!2sbd!4v1603735176069!5m2!1sen!2sbd" width="450" height="410" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>                </div>
                    </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="row">
                        <h4 class="text-uppercase contact-us">Contact us</h4>
                    </div>
                    <div class="row">
                        <div class="contact-icons d-flex justify-content-center align-items-center">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="contact-text">
                            <h6 class="text-uppercase">our address</h6>
                            <p>666 5th Ave New York, NY, United</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="contact-icons d-flex justify-content-center align-items-center">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        </div>
                        <div class="contact-text">
                            <h6 class="text-uppercase">openning hour</h6>
                            <p>666 5th Ave New York, NY, United</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="contact-icons d-flex justify-content-center align-items-center">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="contact-text">
                            <h6 class="text-uppercase">Contact Number</h6>
                            <p>+8809666745745</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h4 class="query-title text-uppercase">send a query</h4>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="user-contact-form">
                        <form method="post" action="user-contact-form.php">
                            <input type="text" name="name" placeholder="Your Name*" required>
                            <input type="email" name="email" placeholder="Email*" required>
                            <input type="number" name="contactNo" placeholder="Contact Number*" required>
                            <br/>
                            <textarea name="message" placeholder="Your Message..." required></textarea>
                            <br/>
                            <button type="submit" name="contact_btn" class="contact-btn">SEND MESSAGE</button>
                        </form>
                        <div class="form-output">
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

<?php
    require('includes/footer.php');
?>