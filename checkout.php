<?php 
    require('includes/header.php');
    if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0)
    {
        echo "<script>window.location.href='home.php';</script>";
    
    }

    if(isset($_POST['submit']))
    {
        $user_id=$_SESSION['USER_ID'];
        $address=get_safe_value($con,$_POST['address']);
        $city=get_safe_value($con,$_POST['city']);
        $postal_code=get_safe_value($con,$_POST['postal_code']);
        $payment_type=get_safe_value($con,$_POST['payment_type']);
        $cart_subtotal=0;
        $total_price=0;
        foreach($_SESSION['cart'] as $key=>$val)
        {
            $productArr=get_product($con,'',$key,'','','');
            $price=$productArr[0]['price'];
            $quantity=$val['quantity'];
            $cart_subtotal=$cart_subtotal+($price*$quantity);
        }
        $total_price=$cart_subtotal+80;
        $payment_status='Pending';
        if($payment_type=='bkash')
        {
            $payment_status='Success';
        }
        $order_status='1';
        $date=date('Y-m-d');
        
        $sql="insert into `order`(user_id,address,city,postal_code,payment_type,payment_status,order_status,date,total_price) values('$user_id','$address','$city','$postal_code','$payment_type','$payment_status','$order_status','$date','$total_price')";
        mysqli_query($con,$sql);

        $order_id=mysqli_insert_id($con);
	
        foreach($_SESSION['cart'] as $key=>$val)
        {
            $productArr=get_product($con,'',$key,'','','');
            $price=$productArr[0]['price'];
            $quantity=$val['quantity'];
            mysqli_query($con,"insert into `order_detail`(order_id,product_id,quantity,price) values('$order_id','$key','$quantity','$price')");
        }
        
        unset($_SESSION['cart']);
        ?>
        <script>
            window.location.href='thank-you.php';
        </script>
        <?php               
    }
?>

<div class="checkout-details">
  <div class="common-block">
    <div class="row mt-3">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb text-uppercase">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row mt-4">
        <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
            <div class="checkout-info pl-5">
                <form method="post" action="checkout.php">
                    <div class="address-info pl-5">
                        <h5>Address Information</h5>
                        <div class="form-group">
                            <label>Full address<span class="text-danger">*</span></label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>City<span class="text-danger">*</span></label>
                            <input type="text" name="city" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Postal Code<span class="text-danger">*</span></label>
                            <input type="text" name="postal_code" class="form-control" required>
                        </div>
                    </div>
                    <div class="payment info mt-5 pl-5">
                        <h5>Payment Information</h5> 
                        <label>Cash On Delivery</label> <input type="radio" name="payment_type" value="COD" required/>&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                    <br/>
                    <br/>
                    <button type="submit" name="submit" class="btn checkout-btn ml-5">SUBMIT</button>
                </form>  
            </div>
        </div>
        <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <div class="order-summary ml-5 mr-2 pl-5 py-4">
                <h5 class="border-bottom mt-0 mb-4">Order Summary</h5>
                <?php
                if(isset($_SESSION['cart']))
                {
                    $cart_subtotal=0;
                    foreach($_SESSION['cart'] as $key=>$val)
                    {
                        $productArr=get_product($con,'',$key,'','','');
                        $image=$productArr[0]['image'];
                        $name=$productArr[0]['name'];
                        $brand=$productArr[0]['brand'];
                        $color=$productArr[0]['color'];
                        $price=$productArr[0]['price'];
                        $quantity=$val['quantity'];
                        $cart_subtotal=$cart_subtotal+($price*$quantity);
                    ?>
                <div class="single-item my-2 clearfix">
                    <img class="mb-2" src="<?php echo $image?>"/>
                    <div class="item-description my-3 pl-4">
                        <p class="mb-0"><?php echo $name?></p>
                        <small>Quantity: <?php echo $quantity?></small>
                    </div>
                    <a class="item-remove m-4 text-danger" href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </div>
                
                <?php
                }
                ?>
                <div class="border-top mt-4">
                    <div class="order-subtotal d-flex justify-content-between my-2">
                        <h6>Order Subtotal:</h6>
                        <span class="subtotal mr-5"><?php echo $cart_subtotal?></span>
                    </div>
                    <div class="shipping-charge d-flex justify-content-between my-2"">
                        <h6>Shipping Charge:</h6>
                        <span class="mr-5">80</span>
                    </div>
                    <div class="order-total d-flex justify-content-between my-2"">
                        <h6>Order Total:</h6>
                        <span class="total mr-5"><?php echo $cart_subtotal+80?></span>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
    </div>
 </div>
</div>

        
										
<?php
    require('includes/footer.php');
?>        