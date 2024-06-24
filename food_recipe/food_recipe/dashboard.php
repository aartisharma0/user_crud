<?php
include('header.php');
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.location.assign('admin.php?msg=Login Yourself!!')</script>";
}
?>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->
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
    <div class="container-fluid">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="text-primary text-uppercase mb-5">Welcome Admin</h1>
        </div>
        <div class="row g-0 justify-content-center mt-5 mb-5">
                <div class="col-lg-8 wow fadeInUp mt-5 mb-5" data-wow-delay="0.1s">
                <div class="row mb-5 d-flex justify-content-around">
                
                <div class="col-md-5 newone font3">
                    <a href="manage_category.php"> <h1 class="text-dark text-center">Total Category</h1>
                    <?php
                        $query="SELECT * from `category`";
                        include('config.php');
                        $res=mysqli_query($conn,$query);
                        $data=mysqli_num_rows($res);
                        echo "<h1 class='text-dark text-center mt-3'>".$data."</h1>";
                        ?>
                    </a>
                </div>
                <div class="col-md-5 newone font3">
                    <a href="manage_user.php"> <h1 class="text-dark text-center">Total Recipe</h1>
                    <?php
                        $query="SELECT * from `recipe`";
                        include('config.php');
                        $res=mysqli_query($conn,$query);
                        $data=mysqli_num_rows($res);
                        echo "<h1 class='text-dark text-center mt-3'>".$data."</h1>";
                        ?>
                    </a>
                </div>
            </div>
                <div class="row mb-5 d-flex justify-content-around">
                
                <div class="col-md-4 newone font3">
                    <a href="manage_category.php"> <h1 class="text-dark text-center">Total User</h1>
                    <?php
                        $query="SELECT * from `create_account`";
                        include('config.php');
                        $res=mysqli_query($conn,$query);
                        $data=mysqli_num_rows($res);
                        echo "<h1 class='text-dark text-center mt-3'>".$data."</h1>";
                        ?>
                    </a>
                </div>
                <div class="col-md-6 newone font3">
                    <a href="manage_user.php"> <h1 class="text-dark text-center">Total Comment</h1>
                    <?php
                        $query="SELECT * from `comment`";
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
<?php
include('footer.php');
?>