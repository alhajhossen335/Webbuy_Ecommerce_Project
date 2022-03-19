<?php 
  require('includes/header.php');
  $category=get_safe_value($con,$_GET['category']);
  $get_product=get_product($con,$category,'','','','');
?>

<div class="category-products">
  <div class="common-block">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb text-uppercase">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $category?></li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h4 class="my-4 ml-3 text-capitalize"><?php echo $category?></h4>
      </div>
    </div>
    <div class="row mx-5 px-5">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <?php if(count($get_product) > 0){?>
        <div class="row">
          <?php
            foreach($get_product as $product){
            ?>
            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
              <div class="product-single-block text-center">
                  <a href="product-details.php?id=<?php echo $product['id']?>">
                    <img src="<?php echo $product['image']?>" alt="product images">
                    <br/>
                    <a class="category-product-name text-info" href="product-details.php?id=<?php echo $product['id']?>"><?php echo $product['name']?></a>
                    <p class="category-product-price">&#2547;<?php echo $product['price']?></p>
                  </a>
              </div>
            </div>
            <?php
            } ?>
        </div>
      <?php 
      } 
      else
      { 
        echo "<p class='m-4'>No Products Available</p>";
      } ?>
      </div>
    </div>
  </div>
</div>

<?php 
  require('includes/footer.php')
?>        