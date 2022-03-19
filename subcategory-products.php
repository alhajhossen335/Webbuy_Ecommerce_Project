<?php 
  require('includes/header.php');

  if(isset($_GET['subcategory']) && $_GET['subcategory']!='')
    {
        $subcategory=get_safe_value($con,$_GET['subcategory']);
        $sql="select product.*,sub_category.sub_category from product,sub_category where sub_category.sub_category='$subcategory' and product.sub_category_id=sub_category.id and product.status=1";
        $subcategory_res=mysqli_query($con,$sql);
        $subcategory_arr=array();
        while ($row=mysqli_fetch_assoc($subcategory_res)){
            $subcategory_arr[]=$row;
        }
    } 
?>

<div class="subcategory-products">
  <div class="common-block">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb text-uppercase">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $subcategory?></li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h4 class="my-4 ml-3 text-capitalize"><?php echo $subcategory?></h4>
      </div>
    </div>
    <div class="row mx-5 px-5">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <?php if(count($subcategory_arr) > 0){?>
        <div class="row">
          <?php
            foreach($subcategory_arr as $product){
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