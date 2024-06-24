<?php
include("hodheader.php");
if (!isset($_SESSION['hod_email'])) {
    echo "<script>window.location.assign('hodlogin.php?msg=Login Yourself!!')</script>";
}
$email=$_SESSION['hod_email'];
?>
<style>
    #welcome {

        width: 100%;
        border: 1px solid skyblue;
        margin: 10px;
        padding-top: 90px;

    }

    .newone {
        border: 2px solid skyblue;
        box-shadow: 5px 5px 9px skyblue;
        padding: 40px;
        margin-top: 20px;
        margin-bottom: 20px;

    }

    .font3 {
        color: black;
        font-weight: 400px;
        font-size: 30px;
    }
</style>
<div class="all-title-box">
    <div class="container text-center">
        <h1>HOD Dashboard<span class="m_1">"Empowering Voices, Inspiring Solutions: Campus Resolution Unleashed."</span></h1>
    </div>
</div>
<?php if (isset($_GET['msg'])) { ?>
    <div class="alert alert-primary alert-dismissible mt-5" role="alert">
        <strong><?php echo $_GET['msg']; ?></strong>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
    </div>
<?php
}
?>
<div id="overviews" class="section lb">
    <div class="container">
    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="text-primary text-uppercase mb-2">Welcome Head of Department</h1>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row mb-5 d-flex justify-content-around">
                
                <div class="col-md-5 newone font3">
                    <a href="manage_category.php"> <h1 class="text-dark text-center">Total Department's</h1>
                    <?php
                        $query="SELECT * from `department`";
                        include('config.php');
                        $res=mysqli_query($conn,$query);
                        $data=mysqli_num_rows($res);
                        echo "<h1 class='text-dark text-center mt-3'>".$data."</h1>";
                        ?>
                    </a>
                </div>
                <div class="col-md-5 newone font3">
                    <a href="manage_user.php"> <h1 class="text-dark text-center">Total Hod's</h1>
                    <?php
                        $query="SELECT * from `hod`";
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
                <a href="manage_designer.php"> <h1 class="text-dark text-center">Total Student's</h1>
                <?php
                        $query="SELECT * from `student`";
                        include('config.php');
                        $res=mysqli_query($conn,$query);
                        $data=mysqli_num_rows($res);
                        echo "<h1 class='text-dark text-center mt-3'>".$data."</h1>";
                        ?>
                </a>
            </div>
            <div class="col-md-5 newone font3">
                <a href="manage_booking.php"> <h1 class="text-dark text-center">Total Complaint's</h1>
                
                <?php
                        $query="SELECT * from `complaint` where `hod`='$email'";
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
    </div><!-- end container -->
</div><!-- end section -->
<?php
include("footer.php");
?>