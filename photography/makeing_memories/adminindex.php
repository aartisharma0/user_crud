<?php
include("header.php");
if(!isset($_SESSION['admin_email']))
{
    echo "<script>window.location.assign('adminlogin.php?msg=Login Yourself!!')</script>";
}  
?>
<style>
    
	#welcome{
     
        width:100%;
        border:1px solid rgb(255, 219, 88);
        margin:10px;
        padding-top:90px;
        
    }
    .newone{
        border:2px solid rgb(255, 219, 88);
        box-shadow: 5px 5px 9px rgb(255, 219, 88);
        padding:40px;
        margin-top:20px;
        margin-bottom: 20px;
        
    }
    .font3{
        color:black;
        font-weight:400px;
        font-size:30px;
    }
 
    
</style>
 <!-- Header Start -->
 <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Admin Dashboard</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Home</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white p-3 w-100" src="img/hero-1.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white p-3 w-100" src="img/hero-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <?php if(isset($_GET['msg'])){?>
            <div class="alert alert-primary alert-dismissible " role="alert">
                <strong><?php echo $_GET['msg'];?></strong>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
            </div>
            <?php
                }
            ?>
<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="text-primary text-uppercase mb-2">Welcome Admin</h1>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
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
                    <a href="manage_user.php"> <h1 class="text-dark text-center">Total Users</h1>
                    <?php
                        $query="SELECT * from `user`";
                        include('config.php');
                        $res=mysqli_query($conn,$query);
                        $data=mysqli_num_rows($res);
                        echo "<h1 class='text-dark text-center mt-3'>".$data."</h1>";
                        ?>
                    </a>
                </div>
            </div>
        <div class="row mb-5 d-flex justify-content-around">
            <div class="col-md-6 newone font3">
                <a href="manage_designer.php"> <h1 class="text-dark text-center">Total Photograhers</h1>
                <?php
                        $query="SELECT * from `photographer`";
                        include('config.php');
                        $res=mysqli_query($conn,$query);
                        $data=mysqli_num_rows($res);
                        echo "<h1 class='text-dark text-center mt-3'>".$data."</h1>";
                        ?>
                </a>
            </div>
            <div class="col-md-5 newone font3">
                <a href="manage_booking.php"> <h1 class="text-dark text-center">Total Bookings</h1>
                
                <?php
                        $query="SELECT * from `booking`";
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
include("footer.php");
?>