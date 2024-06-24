<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Making Memories - Photo Studio</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php 
                    if(isset($_SESSION['admin_email']))
                    {
                    ?>
    <nav class="navbar navbar-expand-lg bg-white navbar-light fixed-top shadow py-lg-0 px-4 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="#" class="navbar-brand d-block d-lg-none">
            <h1 class="text-primary">Making Memories</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between py-4 py-lg-0" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="adminindex.php" class="nav-item nav-link">Home</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                    <div class="dropdown-menu rounded-0 shadow-sm border-0 m-0">
                        <a href="add_category.php" class="dropdown-item">Add</a>
                        <a href="view_category.php" class="dropdown-item">Manage</a>
                    </div>
                </div>
                <a href="manage_booking.php" class="nav-item nav-link">Bookings</a>

            </div>
            <a href="index.php" class="navbar-brand bg-primary py-2 px-4 mx-3 d-none d-lg-block">
                <h1 class="text-white">Making Memories</h1>
            </a>
            <div class="navbar-nav me-auto py-0">
                <a href="manage_user.php" class="nav-item nav-link">User</a>
                <a href="manage_photographer.php" class="nav-item nav-link">Photographer</a>
                <a href="enquiry.php" class="nav-item nav-link">Enquiry</a>
                <a href="logout.php" class="nav-item nav-link">Logout</a>

            </div>
        </div>
    </nav>
    <!-- Navbar End -->
<?php
}
else if(isset($_SESSION['pho_email'])){
?>
 <nav class="navbar navbar-expand-lg bg-white navbar-light fixed-top shadow py-lg-0 px-4 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.php" class="navbar-brand d-block d-lg-none">
            <h1 class="text-primary">Making Memories</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between py-4 py-lg-0" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="photographerindex.php" class="nav-item nav-link">Home</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Work</a>
                    <div class="dropdown-menu rounded-0 shadow-sm border-0 m-0">
                        <a href="add_work.php" class="dropdown-item">Add</a>
                        <a href="manage_work.php" class="dropdown-item">Manage</a>
                    </div>
                </div>
            </div>
            <a href="#" class="navbar-brand bg-primary py-2 px-4 mx-3 d-none d-lg-block">
                <h1 class="text-white">Making Memories</h1>
            </a>
            <div class="navbar-nav me-auto py-0">
                <a href="booking.php" class="nav-item nav-link">Booking</a>
                <a href="logout.php" class="nav-item nav-link">Logout</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
<?php
}
else if(isset($_SESSION['user_email'])){
    ?>
     <nav class="navbar navbar-expand-lg bg-white navbar-light fixed-top shadow py-lg-0 px-4 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.php" class="navbar-brand d-block d-lg-none">
                <h1 class="text-primary">Making Memories</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between py-4 py-lg-0" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="service.php" class="nav-item nav-link">Services</a>
                </div>
                <a href="index.php" class="navbar-brand bg-primary py-2 px-4 mx-3 d-none d-lg-block">
                    <h1 class="text-white">Making Memories</h1>
                </a>
                <div class="navbar-nav me-auto py-0">
                    <a href="order.php" class="nav-item nav-link">Booking</a>
                    
                    <a href="contact.php" class="nav-item nav-link  ">Contact</a>
                <a href="logout.php" class="nav-item nav-link">Logout</a>

                </div>
            </div>
        </nav>
        <!-- Navbar End -->
    <?php
    }
    else{
    ?>
<?php
}
?>