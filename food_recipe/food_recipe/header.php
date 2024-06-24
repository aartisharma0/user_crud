<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>FlavorFusion</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <i class="circle-preloader"></i>
        <img src="img/core-img/salad.png" alt="">
    </div>

    <!-- Search Wrapper -->
    <div class="search-wrapper">
        <!-- Close Btn -->
        <div class="close-btn"><i class="fa fa-times" aria-hidden="true"></i></div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#" method="post">
                        <input type="search" name="search" placeholder="Type any keywords...">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">


        <!-- Navbar Area -->
        <div class="delicious-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container-fluid">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="deliciousNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="index.html"><img src="img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav p-5">
                                <?php
                                if (isset($_SESSION['admin_email'])) {
                                ?>
                                    <li class="nav-item @@home__active mx-2" style="list-style: none;">
                                        <button class="btn text-dark nav-link"><a href="dashboard.php">Home <span class="sr-only">(current)</span></a></button>
                                    </li>
                                    <div class="dropdown mx-3">
                                        <button class="btn text-dark dropdown-toggle @@home__active nav-link" type="button" data-toggle="dropdown" aria-expanded="false">
                                            Category
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="add_category.php">Add</a>
                                            <a class="dropdown-item" href="manage_category.php">Manage</a>
                                        </div>
                                    </div>
                                    <div class="dropdown mx-2">
                                        <button class="btn text-dark dropdown-toggle @@home__active nav-link" type="button" data-toggle="dropdown" aria-expanded="false">
                                            Recipe
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="add_recipe.php">Add</a>
                                            <a class="dropdown-item" href="manage_recipe.php">Manage</a>
                                        </div>
                                    </div>
                                    <li style="list-style: none;" class="mx-2">
                                        <button class="btn text-dark nav-link"> <a href="view_enquiry.php">Contact</a> </button>
                                    </li>
                                    <li style="list-style: none;" class="mx-2">
                                        <button class="btn text-dark nav-link"> <a href="view_comment.php">Comments</a> </button>
                                    </li>
                                    <li class="nav-item @@contact__active mx-2" style="list-style: none;">
                                        <button class="btn text-dark nav-link">
                                            <a href="logout.php">Logout</a>
                                        </button>
                                    </li>
                                <?php
                                } else {
                                ?>

                                    <li class="nav-item @@contact__active" style="list-style: none;">
                                        <a class="nav-link" href="index.php">Home</a>
                                    </li>
                                    <li class="nav-item @@contact__active" style="list-style: none;">
                                        <a class="nav-link" href="about.php">About</a>
                                    </li>
                                    <li class="nav-item @@contact__active" style="list-style: none;">
                                        <a class="nav-link" href="category.php">Category</a>
                                    </li>
                                    <li class="nav-item @@contact__active" style="list-style: none;">
                                        <a class="nav-link" href="view_recipe.php">Recipe</a>
                                    </li>
                                    <li class="nav-item @@contact__active" style="list-style: none;">
                                        <a class="nav-link" href="contact.php">Contact</a>
                                    </li>
                                    <?php if (isset($_SESSION['user_email'])) { ?>
                                        <li class="nav-item @@contact__active" style="list-style: none;">
                                            <a class="nav-link" href="user_logout.php">Logout</a>
                                        </li>
                                <?php
                                    }
                                }
                                ?>
                                <?php if (!isset($_SESSION['user_email']) || !isset($_SESSION['user_email'])) { ?>
                                    <div class="dropdown mx-2">
                                        <button class="btn text-dark dropdown-toggle @@home__active nav-link" type="button" data-toggle="dropdown" aria-expanded="false">
                                            Login
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="user_login.php">User</a>
                                            <a class="dropdown-item" href="admin.php">Admin</a>
                                        </div>
                                    </div>
                                <?php } ?>
                                </ul>

                                <!-- Newsletter Form -->
                                <!-- <div class="search-btn">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>

                            </div> -->
                                <!-- Nav End -->
                            </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->