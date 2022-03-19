<?php 
    ob_start();
    require('includes/config.php');
    require('includes/functions.php');
    require('add-to-cart.php');

    // Set Category
    $category_res=mysqli_query($con, "select * from category where status=1");
    $category_arr=array();
    while ($row=mysqli_fetch_assoc($category_res)){
        $category_arr[]=$row;
    }

    $obj=new add_to_cart();
    $totalProduct=$obj->totalProduct();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        <title>Webbuy</title>
        
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500&family=Inter&family=Lato:wght@400;700&family=Montserrat:wght@400;600;700&family=Mulish:wght@400;600;700&family=Open+Sans:wght@400;700&family=Roboto:wght@400;700&family=Crimson+Text&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css"/>
    </head>
    
    <body>
        <header id="myHeader">
            <!-- Top header part -->
            <section class="top-header">
                <div class="common-block">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="home.php">
                            <img src="images/logo.png" alt="Webbuy">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="search-box">
                                <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
                                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search..." aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                </form>
                            </div>
                        
                            <div class="top-links">
                                <ul class="navbar-nav mr-auto">
                                    <?php if(isset($_SESSION['USER_LOGIN'])){
                                            echo 
                                            '
                                                <li class="nav-item ml-5">
                                                    <a class="nav-link purple-color" href="cart.php">
                                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                                                        <span id="cart-item-numbers">'.$totalProduct.'</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link yellow-color" href="my-order.php">
                                                        <i class="fa fa-info-circle" aria-hidden="true"></i> My Order
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link red-color" href="user-logout.php">
                                                    <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                                                    </a>
                                                </li>
                                            ';
                                        }
                                        else
                                        {
                                            echo 
                                            '
                                            <li class="nav-item ml-5">
                                                <a class="nav-link red-color" id="reg" href="user-register.php">
                                                    <i class="fa fa-user-plus" aria-hidden="true"></i> Register
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link yellow-color" id="sign-in" href="user-login.php">
                                                    <i class="fa fa-user" aria-hidden="true"></i> Sign In
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link purple-color" href="cart.php">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                                                    <span id="cart-item-numbers">0</span>
                                                </a>
                                            </li>
                                            ';
										}
										?>
                                    
                                    
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </section>

            <!-- Bottom header part -->
            <section class="bottom-header">
                <div class="common-block">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                      
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav mr-auto">
                            <?php
                            foreach($category_arr as $list){
                                ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="category-products.php?category=<?php echo $list['category']?>" id="navbarDropdownMenuLink">
                                        <?php echo $list['category']?>
                                    </a>
                                    <?php
                                    $category_id = $list['id'];
                                    $sub_category_res = mysqli_query($con,"select * from sub_category where status='1' and category_id='$category_id'");
                                    if(mysqli_num_rows($sub_category_res) > 0)
                                    {
                                    ?>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <?php
                                            while($sub_category_rows = mysqli_fetch_assoc($sub_category_res))
                                            {
                                                echo '<a class="dropdown-item" href="subcategory-products.php?subcategory='.$sub_category_rows['sub_category'].'"><div class="hover-effect">'.$sub_category_rows['sub_category'].'</div></a>';
                                                  
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </li>
                                <?php
                            }
                            ?>
                          </ul>
                        </div>
                    </nav>
                </div>
            </section>
        </header>

        <!-- Carousel -->
        <section class="slider">
            <div class="common-block">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="images/banner-1.jpg" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="images/banner-2.jpg" alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="images/banner-3.jpg" alt="Third slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="images/banner-4.jpeg" alt="Fourth slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="images/banner-5.jpeg" alt="Fifth slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Carousel menu
        <section class="slider-menu">
            <div class="common-block">
                <ul class="slider-menu-list text-center">
                    <li><a href="#">Smartphone Sale</a></li>
                    <li>|</li>
                    <li><a href="#">OPPO F15 2020 8GB/128GB</a></li>
                    <li>|</li>
                    <li><a href="#">Galaxy S20</a></li>
                    <li>|</li>
                    <li><a href="#">Under 999</a></li>
                    <li>|</li>
                    <li><a href="#">Branded Watches Sale</a></li>
                    <li>|</li>
                    <li><a href="#">Pureit</a></li>
                </ul>
            </div>
        </section> -->

        <main>
            <!-- Hot deals section -->
            <section class="hot-deals common-block">
                <div class="hot-deals-title">
                    <p class="text-center text-uppercase">*hot deals*</p>
                </div>
                <div class="card-group text-center">
                    <?php
                    $get_product=get_product($con,'smartphones','','','1','5');
                    foreach($get_product as $product){
                    ?>
                        <div class="card">
                            <a class="p-0" href="product-details.php?id=<?php echo $product['id']?>">
                                <img class="card-img-top img-fluid" src="<?php echo $product['image']?>" alt="Card image cap">
                                <div class="card-body">  
                                    <p class="card-text">
                                        <a href="product-details.php?id=<?php echo $product['id']?>"><?php echo $product['name']?></a>
                                        <p>&#2547;<?php echo $product['price']?></p>
                                        <input type="hidden" id="quantity" value="1">
                                        <a class="btn add-cart-btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $product['id']?>','add')" data-toggle="modal" data-target=".bd-example-modal-lg">Add to cart</a>
                                        <?php
                                        if(isset($_SESSION['USER_LOGIN']))
                                        {
                                        ?>
                                        <!-- Large modal -->
                                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <p class="mt-3"><i class="fa fa-check" aria-hidden="true"></i> Product successfully added to your cart</p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    <?php
                    } ?>
                </div>
            </section>

            <!-- Smartphones -->
            <section class="smartphones">
                <div class="common-block">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pr-0">
                            <div class="category">
                                <!-- Category Title -->
                                <div class="category-title">
                                    <div class="d-flex flex-row justify-content-center">
                                        <div class="p-2 d-flex align-items-center">
                                            <img class="img-fluid" src="images/icon-1.png">
                                        </div>
                                        <div class="p-2 d-flex align-items-center">
                                            <h3>Smartphones</h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- Category Menu -->
                                <div class="category-menu">
                                    <div class="d-flex flex-column">
                                    <?php
                                    $sub_category_res = mysqli_query($con,"select sub_category.*,category.* from sub_category,category where category.category='smartphones' and category.id=sub_category.category_id and sub_category.status='1'");
                                    if(mysqli_num_rows($sub_category_res) > 0)
                                    {
                                        while($sub_category_rows = mysqli_fetch_assoc($sub_category_res))
                                        {
                                            echo '<a href="subcategory-products.php?subcategory='.$sub_category_rows['sub_category'].'">'.$sub_category_rows['sub_category'].'</a>';
                                        }  
                                    }
                                    ?>
                                    </div>                                      
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 px-0">
                            <!-- Category Products -->
                            <div class="products">
                                <div class="card-group text-center">
                                <?php
                                $get_product=get_product($con,'smartphones','','','','3');
                                foreach($get_product as $product){
                                ?>
                                    <div class="card">
                                        <a class="p-0" href="product-details.php?id=<?php echo $product['id']?>">
                                            <img class="card-img-top img-fluid" src="<?php echo $product['image']?>" alt="Card image cap">
                                            <div class="card-body">  
                                                <p class="card-text">
                                                    <a href="product-details.php?id=<?php echo $product['id']?>"><?php echo $product['name']?></a>
                                                    <p>&#2547;<?php echo $product['price']?></p>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                                </div>
                                <div class="card-group text-center">
                                <?php
                                $get_product=get_product($con,'smartphones','','','1','3');
                                foreach($get_product as $product){
                                ?>
                                    <div class="card">
                                        <a class="p-0" href="product-details.php?id=<?php echo $product['id']?>">
                                            <img class="card-img-top img-fluid" src="<?php echo $product['image']?>" alt="Card image cap">
                                            <div class="card-body">  
                                                <p class="card-text">
                                                    <a href="product-details.php?id=<?php echo $product['id']?>"><?php echo $product['name']?></a>
                                                    <p>&#2547;<?php echo $product['price']?></p>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pl-0">
                            <div class="offer">
                                <img class="img-fluid" src="images/side-1.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Mobile accessories -->
            <section class="mobile-accessories">
                <div class="common-block">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pr-0">
                            <div class="category">
                                <!-- Category Title -->
                                <div class="category-title">
                                    <div class="d-flex flex-row justify-content-center">
                                        <div class="p-2 d-flex align-items-center">
                                            <img class="img-fluid" src="images/icon-2.png">
                                        </div>
                                        <div class="p-2 d-flex align-items-center">
                                            <h3>Mobile Accessories</h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- Category Menu -->
                                <div class="category-menu">
                                    <div class="d-flex flex-column">
                                    <?php
                                    $sub_category_res = mysqli_query($con,"select sub_category.*,category.* from sub_category,category where category.category='mobile accessories' and category.id=sub_category.category_id and sub_category.status='1'");
                                    if(mysqli_num_rows($sub_category_res) > 0)
                                    {
                                        while($sub_category_rows = mysqli_fetch_assoc($sub_category_res))
                                        {
                                            echo '<a href="subcategory-products.php?subcategory='.$sub_category_rows['sub_category'].'">'.$sub_category_rows['sub_category'].'</a>';
                                        }  
                                    }
                                    ?>
                                    </div>                                      
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 px-0">
                            <!-- Category Products -->
                            <div class="products">
                                <div class="card-group text-center">
                                <?php
                                $get_product=get_product($con,'mobile accessories','','','','3');
                                foreach($get_product as $product){
                                ?>
                                    <div class="card">
                                        <a class="p-0" href="product-details.php?id=<?php echo $product['id']?>">
                                            <img class="card-img-top img-fluid" src="<?php echo $product['image']?>" alt="Card image cap">
                                            <div class="card-body">  
                                                <p class="card-text">
                                                    <a href="product-details.php?id=<?php echo $product['id']?>"><?php echo $product['name']?></a>
                                                    <p>&#2547;<?php echo $product['price']?></p>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                                </div>
                                <div class="card-group text-center">
                                <?php
                                $get_product=get_product($con,'mobile accessories','','','1','3');
                                foreach($get_product as $product){
                                ?>
                                    <div class="card">
                                        <a class="p-0" href="product-details.php?id=<?php echo $product['id']?>">
                                            <img class="card-img-top img-fluid" src="<?php echo $product['image']?>" alt="Card image cap">
                                            <div class="card-body">  
                                                <p class="card-text">
                                                    <a href="product-details.php?id=<?php echo $product['id']?>"><?php echo $product['name']?></a>
                                                    <p>&#2547;<?php echo $product['price']?></p>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pl-0">
                            <div class="offer">
                                <img class="img-fluid" src="images/side-2.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Computer Accessories -->
            <section class="computer-accessories">
                <div class="common-block">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pr-0">
                            <div class="category">
                                <!-- Category Title -->
                                <div class="category-title">
                                    <div class="d-flex flex-row justify-content-center">
                                        <div class="p-2 d-flex align-items-center">
                                            <img class="img-fluid" src="images/icon-3.png">
                                        </div>
                                        <div class="p-2 d-flex align-items-center">
                                            <h3>Computer Accessories</h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- Category Menu -->
                                <div class="category-menu">
                                    <div class="d-flex flex-column">
                                    <?php
                                    $sub_category_res = mysqli_query($con,"select sub_category.*,category.* from sub_category,category where category.category='computer accessories' and category.id=sub_category.category_id and sub_category.status='1'");
                                    if(mysqli_num_rows($sub_category_res) > 0)
                                    {
                                        while($sub_category_rows = mysqli_fetch_assoc($sub_category_res))
                                        {
                                            echo '<a href="subcategory-products.php?subcategory='.$sub_category_rows['sub_category'].'">'.$sub_category_rows['sub_category'].'</a>';
                                        }  
                                    }
                                    ?>
                                    </div>                                      
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 px-0">
                            <!-- Category Products -->
                            <div class="products">
                                <div class="card-group text-center">
                                <?php
                                $get_product=get_product($con,'computer accessories','','','','3');
                                foreach($get_product as $product){
                                ?>
                                    <div class="card">
                                        <a class="p-0" href="product-details.php?id=<?php echo $product['id']?>">
                                            <img class="card-img-top img-fluid" src="<?php echo $product['image']?>" alt="Card image cap">
                                            <div class="card-body">  
                                                <p class="card-text">
                                                    <a href="product-details.php?id=<?php echo $product['id']?>"><?php echo $product['name']?></a>
                                                    <p>&#2547;<?php echo $product['price']?></p>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                                </div>
                                <div class="card-group text-center">
                                <?php
                                $get_product=get_product($con,'computer accessories','','','1','3');
                                foreach($get_product as $product){
                                ?>
                                    <div class="card">
                                        <a class="p-0" href="product-details.php?id=<?php echo $product['id']?>">
                                            <img class="card-img-top img-fluid" src="<?php echo $product['image']?>" alt="Card image cap">
                                            <div class="card-body">  
                                                <p class="card-text">
                                                    <a href="product-details.php?id=<?php echo $product['id']?>"><?php echo $product['name']?></a>
                                                    <p>&#2547;<?php echo $product['price']?></p>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pl-0">
                            <div class="offer">
                                <img class="img-fluid" src="images/side-3.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Laptop -->
            <section class="laptop">
                <div class="common-block">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pr-0">
                            <div class="category">
                                <!-- Category Title -->
                                <div class="category-title">
                                    <div class="d-flex flex-row justify-content-center">
                                        <div class="p-2 d-flex align-items-center">
                                            <img class="img-fluid" src="images/icon-4.png">
                                        </div>
                                        <div class="p-2 d-flex align-items-center">
                                            <h3>Laptop</h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- Category Menu -->
                                <div class="category-menu">
                                    <div class="d-flex flex-column">
                                    <?php
                                    $sub_category_res = mysqli_query($con,"select sub_category.*,category.* from sub_category,category where category.category='computers' and category.id=sub_category.category_id and sub_category.status='1'");
                                    if(mysqli_num_rows($sub_category_res) > 0)
                                    {
                                        while($sub_category_rows = mysqli_fetch_assoc($sub_category_res))
                                        {
                                            echo '<a href="subcategory-products.php?subcategory='.$sub_category_rows['sub_category'].'">'.$sub_category_rows['sub_category'].'</a>';
                                        }  
                                    }
                                    ?>
                                    </div>                                      
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 px-0">
                            <!-- Category Products -->
                            <div class="products">
                                <div class="card-group text-center">
                                <?php
                                $get_product=get_product($con,'computers','','','','3');
                                foreach($get_product as $product){
                                ?>
                                    <div class="card">
                                        <a class="p-0" href="product-details.php?id=<?php echo $product['id']?>">
                                            <img class="card-img-top img-fluid" src="<?php echo $product['image']?>" alt="Card image cap">
                                            <div class="card-body">  
                                                <p class="card-text">
                                                    <a href="product-details.php?id=<?php echo $product['id']?>"><?php echo $product['name']?></a>
                                                    <p>&#2547;<?php echo $product['price']?></p>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                                </div>
                                <div class="card-group text-center">
                                <?php
                                $get_product=get_product($con,'computers','','','1','3');
                                foreach($get_product as $product){
                                ?>
                                    <div class="card">
                                        <a class="p-0" href="product-details.php?id=<?php echo $product['id']?>">
                                            <img class="card-img-top img-fluid" src="<?php echo $product['image']?>" alt="Card image cap">
                                            <div class="card-body">  
                                                <p class="card-text">
                                                    <a href="product-details.php?id=<?php echo $product['id']?>"><?php echo $product['name']?></a>
                                                    <p>&#2547;<?php echo $product['price']?></p>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pl-0">
                            <div class="offer">
                                <img class="img-fluid" src="images/side-4.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Lifestyle -->
            <section class="lifestyle">
                <div class="common-block">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pr-0">
                            <div class="category">
                                <!-- Category Title -->
                                <div class="category-title">
                                    <div class="d-flex flex-row justify-content-center">
                                        <div class="p-2 d-flex align-items-center">
                                            <img class="img-fluid" src="images/icon-5.jpg">
                                        </div>
                                        <div class="p-2 d-flex align-items-center">
                                            <h3>Lifestyle</h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- Category Menu -->
                                <div class="category-menu">
                                    <div class="d-flex flex-column">
                                    <?php
                                    $sub_category_res = mysqli_query($con,"select sub_category.*,category.* from sub_category,category where category.category='lifestyle' and category.id=sub_category.category_id and sub_category.status='1'");
                                    if(mysqli_num_rows($sub_category_res) > 0)
                                    {
                                        while($sub_category_rows = mysqli_fetch_assoc($sub_category_res))
                                        {
                                            echo '<a href="subcategory-products.php?subcategory='.$sub_category_rows['sub_category'].'">'.$sub_category_rows['sub_category'].'</a>';
                                        }  
                                    }
                                    ?>
                                    </div>                                      
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 px-0">
                            <!-- Category Products -->
                            <div class="products">
                                <div class="card-group text-center">
                                <?php
                                $get_product=get_product($con,'lifestyle','','','','3');
                                foreach($get_product as $product){
                                ?>
                                    <div class="card">
                                        <a class="p-0" href="product-details.php?id=<?php echo $product['id']?>">
                                            <img class="card-img-top img-fluid" src="<?php echo $product['image']?>" alt="Card image cap">
                                            <div class="card-body">  
                                                <p class="card-text">
                                                    <a href="product-details.php?id=<?php echo $product['id']?>"><?php echo $product['name']?></a>
                                                    <p>&#2547;<?php echo $product['price']?></p>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                                </div>
                                <div class="card-group text-center">
                                <?php
                                $get_product=get_product($con,'lifestyle','','','1','3');
                                foreach($get_product as $product){
                                ?>
                                    <div class="card">
                                        <a class="p-0" href="product-details.php?id=<?php echo $product['id']?>">
                                            <img class="card-img-top img-fluid" src="<?php echo $product['image']?>" alt="Card image cap">
                                            <div class="card-body">  
                                                <p class="card-text">
                                                    <a href="product-details.php?id=<?php echo $product['id']?>"><?php echo $product['name']?></a>
                                                    <p>&#2547;<?php echo $product['price']?></p>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pl-0">
                            <div class="offer">
                                <img class="img-fluid" src="images/side-5.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer>
            <!-- Top footer part-->
            <section class="top-footer">
                <div class="common-block">
                    <div class="row text-center">
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pr-0">
                            <div class="lists">
                                <ul>
                                    <li><h2 class="lists-title">GET TO KNOW US</h2></li>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Cookie Policy</a></li>
                                    <li><a href="#">Warranty Policy</a></li>
                                    <li><a href="#">Shipping Policy</a></li>
                                    <li><a href="#">Why Shop with Us</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Returns and Replacement</a></li>
                                    <li><a href="#">Terms &amp; Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 px-0">
                            <div class="lists">
                                <ul>
                                    <li><h2 class="lists-title">LET US HELP YOU</h2></li>
                                    <li><a href="#">Your Orders</a></li>
                                    <li><a href="#">Fastpick</a></li>
                                    <li><a href="#">How to Place an Order</a></li>
                                    <li><a href="#">Terms &amp; Conditions for Service</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 px-0">
                            <div class="lists">
                                <ul>
                                    <li><h2 class="lists-title">GET IN TOUCH WITH US</h2></li>
                                    <li><a href="user-contact-form.php">Contact Us</a></li>
                                    <li><a href="#">Webbuy Blog</a></li>
                                    <li><h2 class="lists-title extra-gap">PAYMENT METHODS</h2></li>
                                    <div class="payment-img">
                                        <li><img src="images/bKash.png"/></li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pl-0">
                            <div class="lists">
                                <ul>
                                    <li><h2 class="lists-title">Webbuy.com</h2></li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>+8809666745745</li>
                                    <li><i class="fa fa-envelope" aria-hidden="true"></i>support@webbuy.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>                    
                </div>
            </section>

            <!-- Middle footer part-->
            <section class="middle-footer">
                <div class="common-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 pr-0">
                            <div class="d-flex flex-row">
                                <div class="newsletter p-2 d-flex align-items-center">
                                    <p class="mb-0">Sign up for newsletter</p>
                                </div>
                                <div class="sign-up-mail p-2">
                                    <form class="form-inline my-2 my-lg-0">
                                        <input class="form-control mr-sm-2" type="search" placeholder="Sign up for your email..." aria-label="Search">
                                        <button class="btn btn-outline-success my-2 my-sm-0 text-uppercase" type="submit">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 pl-0">
                            <div class="d-flex flex-row">
                                <div class="follow-link p-2 d-flex align-items-center">
                                    <p class="mb-0 text-uppercase">follow us</p>
                                </div>
                                <div class="social-links p-2 d-flex align-items-center">
                                    <ul class="mb-0 pl-0">
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Bottom footer part-->
            <section class="bottom-footer">
                <div class="common-block clearfix">
                    <p>&copy; <?php echo date('Y') ?> Webbuy.com | All Rights Reserved.</p>
                </div>
            </section>
        </footer>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="assets/js/myScript.js"></script>

        <!-- <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/myScript.js"></script> -->
    </body>
</html>

ob_end_flush();