<?php
    if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!='')
    {

    }
    else
    {
        header('location:admin-login.php');
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Lato:wght@400;700&family=Montserrat:wght@400;600;700&family=Mulish:wght@400;600;700&family=Open+Sans:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css"/>
    <link rel="stylesheet" href="assets/css/reg-login.css">
    <link rel="stylesheet" href="assets/css/admin.css"/>
  </head>

  <body>
    <header>
        <div class="common-block">
            <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="#">
                <img src="images/logo_small.png" alt="Webbuy">
            </a>
            <div class="sidebar">
                <button>&#9776;</button>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle welc-admin" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Welcome Admin
                        </a>
                        <div class="dropdown-menu text-center" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="admin-logout.php">
                                <i class="fa fa-power-off" aria-hidden="true"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            </nav>
        </div>
    </header>
    
    <aside class="sidebar-menu">
        <p class="menu-title">Menu <i class="fa fa-times-circle closeMenu" aria-hidden="true"></i></p>
        <div class="sidebar-menu-item d-flex flex-row">
            <ul class="menu">
                <li>
                    <a href="category.php">
                        <div class="hover-effect">Categories Master</div>
                    </a>
                </li>
                <li>
                    <a href="subcategory.php">
                        <div class="hover-effect">Subcategories Master</div>
                    </a>
                </li>
                <li>
                    <a href="product.php">
                        <div class="hover-effect">Product Master</div>
                    </a>
                </li>
                <li>
                    <a href="admin-order.php">
                        <div class="hover-effect">Order Master</div>
                    </a>
                </li>
                <li>
                    <a href="users.php"> 
                        <div class="hover-effect">User Master</div>
                    </a>
                </li>
                <li>
                    <a href="contact-us.php">
                        <div class="hover-effect">Contact Us</div>
                    </a>
                </li>
            </ul>
            <ul class="arrow">
                <li>&gt;</li>
                <li>&gt;</li>
                <li>&gt;</li>
                <li>&gt;</li>
                <li>&gt;</li>
                <li>&gt;</li>
            </ul>
        </div>
    </aside>
    