<?php 
    require('includes/header.php');
    if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0)
    {
        echo "<script>window.location.href='home.php';</script>";
    
    }
?>

<div class="cart-details">
  <div class="common-block">
    <div class="row mt-3">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb text-uppercase">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
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
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(isset($_SESSION['cart']))
                        {
                            
                            foreach($_SESSION['cart'] as $key=>$val)
                            {
                                $productArr=get_product($con,'',$key,'','','');
                                $image=$productArr[0]['image'];
                                $name=$productArr[0]['name'];
                                $brand=$productArr[0]['brand'];
                                $color=$productArr[0]['color'];
                                $price=$productArr[0]['price'];
                                $quantity=$val['quantity'];
                            ?>
                                <tr class="text-center">
                                    <td class="product-thumbnail pl-5">
                                        <a href="#"><img src="<?php echo $image?>"/></a>
                                        <div class="product-description ml-4">
                                            <p><b><?php echo $name?></b></p>
                                            <p><b>Brand:</b> <?php echo $brand?></p>
                                            <p><b>Color:</b> <?php echo $color?></p>
                                        </div>
                                    </td>
                                    <td class="product-price"><?php echo $price?></td>
                                    <td class="product-quantity">
                                        <input class="text-center" type="number" id="<?php echo $key?>quantity" value="<?php echo $quantity?>" />
                                        <br/>
                                        <a class="update" href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')">Update</a>
                                    </td>
                                    <td class="product-subtotal"><?php echo $quantity*$price?></td>
                                    <td class="product-remove"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                </tr>
                            <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-end pr-5">
            <div>
                <a class="btn continue text-uppercase" href="home.php">Continue Shopping</a>
            </div>
            <div>
                <a class="btn checkout text-uppercase" href="checkout.php">Checkout</a>
            </div>
        </div>
    </div>
 </div>
</div>

        
										
<?php
    require('includes/footer.php');
?>        