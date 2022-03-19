<?php 
  require('includes/header.php');
  $product_id=get_safe_value($con,$_GET['id']);
	$get_product=get_product($con,'',$product_id,'','','');
?>

<div class="product-details">
  <div class="common-block">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb text-uppercase">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="category-products.php?category=<?php echo $get_product[0]['category']?>"><?php echo $get_product[0]['category']?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $get_product[0]['name']?></li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 d-flex align-items-center justify-content-center">
        <img class="img-fluid" src="<?php echo $get_product[0]['image']?>">
      </div>
      <div class="col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5">
        <div class="product-detail-box my-4">
          <h3 class="text-info"><?php echo $get_product[0]['name']?></h3>
          <small>Brand: <span class="brand"><?php echo $get_product[0]['brand']?></span></small>
          <h4 class="text-danger mt-2 border-bottom"><span class="bdt">&#2547;</span><?php echo $get_product[0]['price']?></h4>
          <small>Warranty: <span class="warranty">12 Months Brand Warranty</span></small>
          <br/>
          <small>EMIs from ৳684.41/month</small>
          <br/><br/>
          <p class="text-secondary mb-4">Color: <?php echo $get_product[0]['color']?></p>
          <div class="control-quantity">
              <input type="button" id="increase-quantity" value="+" onclick="increase()">  
              <input type="text" id="quantity" value="1">
              <input type="button" id="decrease-quantity" value="-" onclick="decrease()">
          </div>
          <a class="btn add-cart-btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product[0]['id']?>','add')" data-toggle="modal" data-target=".bd-example-modal-lg">ADD TO CART</a>
          <?php
          if(isset($_SESSION['USER_LOGIN']))
          {
          ?>
          <!-- Large modal -->
          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <p class="mt-3 mx-auto modal-text"><i class="fa fa-check" aria-hidden="true"></i> Product successfully added to your cart</p>
                  </div>
              </div>
          </div>
          <?php
          }?>
          <a class="btn buy-now"  href="checkout.php" onclick="manage_cart('<?php echo $get_product[0]['id']?>','add')">BUY NOW</a>
        </div>
      </div>
    </div>
    <div class="row detail-info-box">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h5 class="description-title text-uppercase">Description</h5>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="description">
          <h5><?php echo $get_product[0]['short_description']?></h5>
          <?php echo $get_product[0]['description']?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
  require('includes/footer.php');
?>        