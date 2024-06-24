<?php
include("header.php");
if (!isset($_SESSION['nanny_email'])) {
    echo "<script>window.location.assign('nannylogin.php?msg=Login Yourself!!')</script>";
}
$email=$_SESSION['nanny_email'];
?>
<!-- Page Header End -->
<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">Nanny Dashboard</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Nanny</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
<?php if (isset($_GET['msg'])) { ?>
    <div class="alert alert-primary alert-dismissible " role="alert">
        <strong><?php echo $_GET['msg']; ?></strong>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
    </div>
<?php
}
?>
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="text-primary text-uppercase mb-5">Welcome Nanny</h1>
        </div>
        <div class="row g-0 justify-content-center mt-5 mb-5">
                <div class="col-lg-8 wow fadeInUp mt-5 mb-5" data-wow-delay="0.1s">
                <div class="row mb-5 d-flex justify-content-around">
                
                <div class="col-md-5 newone font3">
                    <a href="manage_category.php"> <h1 class="text-dark text-center">Total Parent's</h1>
                    <?php
                        $query="SELECT * from `parent`";
                        include('config.php');
                        $res=mysqli_query($conn,$query);
                        $data=mysqli_num_rows($res);
                        echo "<h1 class='text-dark text-center mt-3'>".$data."</h1>";
                        ?>
                    </a>
                </div>
                <div class="col-md-5 newone font3">
                    <a href="manage_user.php"> <h1 class="text-dark text-center">Total Booking's</h1>
                    <?php
                        $query="SELECT * from `booking` where `nanny_email`='$email'";
                        include('config.php');
                        $res=mysqli_query($conn,$query);
                        $data=mysqli_num_rows($res);
                        echo "<h1 class='text-dark text-center mt-3'>".$data."</h1>";
                        ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- About End -->
<?php
include("footer.php");
?>
