<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>share food</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start-->
        <!-- <div id="spinner" class="Manage bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <a href="index.php" class="navbar-brand">
                <h1 class="m-0 text-primary"><i class="fa fa-book-reader me-3"></i>Share Food Share Happiness</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            Category
                        </a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <!-- <a href="facility.php" class="dropdown-item">LOGIN</a> -->
                            <a href="addcat.php" class="dropdown-item">Add Category</a>
                            <a href="manage_categories.php" class="dropdown-item">Manage Category</a>
                            <!-- <a href="manage_categories.php" class="dropdown-item">Delete Category</a> -->

                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            NGO
                        </a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <!-- <a href="facility.php" class="dropdown-item">LOGIN</a> -->
                            <a href="add_ngo.php" class="dropdown-item">Add NGO</a>
                            <a href="manage_ngo.php" class="dropdown-item">Manage NGO</a>
                            <!-- <a href="manage_categories.php" class="dropdown-item">Delete Category</a> -->

                        </div>
                    </div>
                    <!-- <a href="manage_ngo.php" class="nav-item nav-link">NGO</a> -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        Food Items
                        </a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <!-- <a href="facility.php" class="dropdown-item">LOGIN</a> -->
                            <a href="additem.php" class="dropdown-item">Add Items</a>
                            <a href="manage_items.php" class="dropdown-item">Manage Items</a>
                            <!-- <a href="manage_items.php" class="dropdown-item">Delete Items</a> -->

                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">User</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <!-- <a href="facility.php" class="dropdown-item">LOGIN</a> -->
                            <a href="donars.php" class="dropdown-item">Donar List</a>
                            <a href="rec.php" class="dropdown-item">Reciever List</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Requests</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <!-- <a href="facility.php" class="dropdown-item">LOGIN</a> -->
                            <a href="donaterequest.php" class="dropdown-item">Already Donated</a>
                            <a href="newRequest.php" class="dropdown-item">New Donate Req</a>
                            <a href="newrequesterreq.php" class="dropdown-item">Request for Donation</a>
                            <a href="foodrequest.php" class="dropdown-item">New Requestss</a>
                        </div>
                    </div>
                </div>
                <?php 
                    if(isset($_SESSION['adminemail'])){
                        echo '<a href="logout.php" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">LOGOUT<i class="fa fa-arrow-right ms-3"></i></a>';

                    }else{
                        echo '<a href="admin_login.php" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">LOGIN<i class="fa fa-arrow-right ms-3"></i></a>';
                    }
                ?>
                
            </div>
        </nav>
        <!-- Navbar End -->
