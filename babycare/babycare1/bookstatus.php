<?php
include("header.php");
if (!isset($_SESSION['parent_email'])) {
    echo "<script>window.location.assign('parentlogin.php?msg=Login Yourself!!')</script>";
}
$email=$_SESSION['parent_email'];

?>
<!-- Page Header End -->
<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">Track Status</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Parent</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Booking Status</li>
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
            <h1 class="text-primary text-uppercase mb-5">Booking Status</h1>
        </div>
        <div class="row text-center mt-5">
        <?php
                    $query="SELECT * from `booking`where `parent_email`='$email'";
                    include('config.php');
                    $result=mysqli_query($conn,$query);
                    while($data=mysqli_fetch_array($result)){
                ?>
        <div class="col-lg-4 col-sm-7 mt-5 mb-5 serv-block wow fadeInUp " data-wow-delay="0.1s">
                        <div class=" card  popular-wthree-text me-5" >
                            <h5><?php echo "Booked Nanny : ".$data['nanny_email']?></h5>
                            <p><?php echo "Date : ".$data['datefrom']." - ".$data['dateto'];?></p>
                            <center><span class="btn btn-primary mt-3 mb-3  w-50"><?php echo $data['status'] ?></span></center>
                        </div>
                </div>
        <?php }?>
    </div>
</div>
<!-- About End -->
<?php
include("footer.php");
?>
