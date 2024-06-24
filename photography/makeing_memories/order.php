<?php
     include("userheader.php");
        if(isset($_SESSION['user_email']))
        {
            $email=$_SESSION['user_email'];
            // echo $email;
?>
<style>
    .container{
        margin-top:30px;
    }
	#welcome{
     
        width:100%;
        border:1px solid yellowgreen;
        margin:10px;
        padding-top:90px;
        
    }
    .newone{
        border:2px solid yellowgreen;
        box-shadow: 5px 5px 9px yellowgreen;
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
                    <h1 class="display-4 mb-3 animated slideInDown">Track Booking</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Booking</li>
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
                <div class="alert alert-danger alert-dismissible " role="alert">
                    <strong><?php echo $_GET['msg'];?></strong>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                </div>
                <?php
                    }
            ?>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="text-primary text-uppercase mb-5x">Booking</h1>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.1s">
                        <?php
                            include('config.php');
                            $query=$query="SELECT * from `booking` where `user_email`='$email'";
                            $res=mysqli_query($conn,$query);
                            $sno=1;
                            while($data=mysqli_fetch_array($res)){
                        ?>
                <div class="card mb-3">
                    <div class="card-body bg-primary">
                        <h1 class="card-title">Theme <?php echo $data['theme']?></h1>
                        <p class="card-text">Photographer Detail-- <?php echo "<br>".$data['photographer']."<br>"?></p>
                        <p class="card-text">Total Amount-- <?php echo "<br>&#8377;".$data['price']."<br>"?></p>
                        <p class="card-text"><?php echo $data['date']?></p>
                        <button class="btn btn-success"><?php echo $data['status']?></button>
                    </div>
                 </div>
                        <?php
                            }
                        ?>
                                    </div>
        </div>
    </div>
           
        </div>




<?php
include("footer.php");
}
else{
    echo "<script>window.location.assign('userlogin.php?msg=Login Yourself!!')</script>";
}  
?>