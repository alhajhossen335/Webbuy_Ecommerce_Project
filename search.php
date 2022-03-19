<?php
  ob_start();
  require('includes/header.php');
  $search=get_safe_value($con,$_GET['search']);
  if($search!='')
  {
    $get_product=get_product($con,'','',$search,'','');
  }
  else
  {
    echo "<script>alert('Nothing found');</script>";
    header("location:home.php");
    die();
  }

?>

<div class="category-products">
  <div class="common-block">
    <div class="row mt-2">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb text-uppercase">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $search?></li>
          </ol>
        </nav>
      </div>
    </div>
    
    <div class="row d-flex justify-content-center mt-5">
      <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">
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
    </div>
  </div>
</div>

<?php 
  require('includes/footer.php');
  ob_end_flush();
?>        

