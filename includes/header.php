<?php 
    require('config.php');
    require('functions.php');
    require('add-to-cart.php');

    $category_res=mysqli_query($con, "select * from category where status=1");
    $category_arr=array();
    while($row=mysqli_fetch_assoc($category_res))
    {
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
        <link rel="stylesheet" href="assets/css/reg-login.css"/>
        <link rel="stylesheet" href="assets/css/product.css"/>
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
                                    <li class="nav-item ml-5">
                                        <a class="nav-link yellow-color" id="home" href="home.php">
                                            <i class="fa fa-home" aria-hidden="true"></i> Home
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link purple-color" href="cart.php">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                                            <?php if(isset($_SESSION['USER_LOGIN']))
                                            {
                                                echo '<span id="cart-item-numbers">'.$totalProduct.'</span>';

                                            }
                                            else
                                            {
                                                echo '<span id="cart-item-numbers">0</span>';
                                            }?>
                                        </a>
                                    </li>
                                    <?php if(isset($_SESSION['USER_LOGIN'])){
                                            echo 
                                            '
                                            <li class="nav-item">
                                                <a class="nav-link red-color" href="user-logout.php">
                                                <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                                                </a>
                                            </li>
                                            ';
                                        }?>
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