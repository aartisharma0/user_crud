<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TODDLER</title>
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
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <a href="index.php" class="navbar-brand">
                <h1 class="m-0 text-primary"><i class="fa fa-book-reader me-3"></i>TODDLER</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <?php
                if (isset($_SESSION['admin_email'])) {
                ?>
                    <div class="navbar-nav mx-auto">
                        <a href="adminindex.php" class="nav-item nav-link">Home</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Nanny</a>
                            <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                                <a href="add_nanny.php" class="dropdown-item">Add</a>
                                <a href="manage_nanny.php" class="dropdown-item">Manage</a>
                            </div>
                        </div>
                        <a href="view_parents.php" class="nav-item nav-link">Parent</a>
                        <a href="view_bookings.php" class="nav-item nav-link">Booking</a>
                        <a href="view_enquiry.php" class="nav-item nav-link">Enquiry</a>
                        <a href="logout.php" class="nav-item nav-link">Logout</a>
                    </div>
                <?php
                } else if (isset($_SESSION['nanny_email'])) {
                ?>
                    <div class="navbar-nav mx-auto">
                        <a href="nannyindex.php" class="nav-item nav-link">Home</a>
                        <a href="view_nparents.php" class="nav-item nav-link">Parent</a>
                        <a href="bookings.php" class="nav-item nav-link">Booking</a>
                        <a href="profile.php" class="nav-item nav-link">Profile</a>
                        <a href="logout.php" class="nav-item nav-link">Logout</a>
                    </div>
                <?php
                } else {
                ?>
                    <div class="navbar-nav mx-auto">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="view_nannies.php" class="nav-item nav-link">Nanny</a>
                        <a href="bookstatus.php" class="nav-item nav-link">Booking Status</a>
                        <a href="contact.php" class="nav-item nav-link">Contact Us</a>
                        <?php
                        if(isset($_SESSION['parent_email'])){
                        ?>
                        <a href="logout.php" class="nav-item nav-link">Logout</a>
                        <?php }?>
                    </div>
                    <div class="nav-item dropdown">
                            <a href="#" class="btn btn-primary rounded-pill  px-5 d-none d-lg-block nav-link dropdown-toggle" data-bs-toggle="dropdown">Login</a>
                            <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0 px-5">
                                <a href="parentlogin.php" class="dropdown-item">Parent</a>
                                <a href="nannylogin.php" class="dropdown-item">Nanny</a>
                                <a href="adminlogin.php" class="dropdown-item">Admin</a>
                            </div>
                        </div>
                <?php
                }
                ?>
            </div>
        </nav>
        <!-- Navbar End -->