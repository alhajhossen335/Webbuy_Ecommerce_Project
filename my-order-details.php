<?php 
    require('includes/header.php');
    if(!isset($_SESSION['USER_LOGIN']))
    {
        echo "<script>window.location.href='home.php';</script>";
    }

    $order_id=get_safe_value($con,$_GET['id']);
?>

<div class="order-details">
  <div class="common-block">
    <div class="row mt-3">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb text-uppercase">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="my-order.php">My Order</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Order Details</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row my-4 mx-4">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form action="#">               
                <div class="table-content table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user_id=$_SESSION['USER_ID'];
                            $sql="select distinct(order_detail.id), order_detail.*, product.name,product.image,product.brand,product.color from order_detail, product, `order` where order_detail.order_id='$order_id' and order_detail.product_id=product.id and `order`.user_id='$user_id'";
                            $res=mysqli_query($con,$sql);
                            $total_price=0;
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $total_price=$total_price+($row['quantity']*$row['price']);
                                ?>
                                <tr class="text-center">
                                    <td class="product-thumbnail pl-5">
                                        <a href="#"><img src="<?php echo $row['image']?>"></a>
                                        <div class="product-description ml-4">
                                            <p><b><?php echo $row['name']?></b></p>
                                            <p><b>Brand:</b> <?php echo $row['brand']?></p>
                                            <p><b>Color:</b> <?php echo $row['color']?></p>
                                        </div>
                                    </td>
                                    <td class="product-quantity"><?php echo $row['quantity']?></td>
                                    <td class="product-price"><?php echo $row['price']?></td>
                                    <td class="product-subtotal"><?php echo $row['quantity']*$row['price']?></td>
                                </tr>
                            <?php 
                            } ?>
                            <tr class="text-center no-border">
                                <td colspan="2"></td>
                                <td>Total Price</td>
                                <td><?php echo $total_price?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
 </div>
</div>

        
										
<?php
    require('includes/footer.php');
?>        