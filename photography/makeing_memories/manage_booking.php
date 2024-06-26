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
                    <h1 class="display-4 mb-3 animated slideInDown"> Booking</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Booking</a></li>
                            <li class="breadcrumb-item"><a href="#">Detail</a></li>
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
                <h1 class="text-primary text-uppercase mb-2">Booking Detail</h1>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row mb-5 d-flex justify-content-around">
                <div class="container my-5 table-responsive newone" id="welcome">
                     <table class="timetable table table-bordered table-hover table-striped ">
                    <thead>
                        <tr>
                            <th><h3>Sr.No.</h3></th>
                            <th><h3>User Detail</h3></th>
                            <th><h3>Photographer Detail</h3></th>
                            <th><h3>Theme</h3></th>
                            <th><h3>Status</h3></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('config.php');
                            $query="SELECT * from `booking`";
                            $res=mysqli_query($conn,$query);
                            $sno=1;
                            // echo $res;
                            if ($res) {
                                // echo $res;
                            while($data=mysqli_fetch_array($res)){
                        ?>
                        <tr class="row_1 row_gray">
                            <td>
                                <?php echo $sno;?>
                            </td>
                            <td>
                            <?php echo $data['user_name']."<br>".
                                $data['user_email']."<br>".
                                $data['user_contact']."<br>".
                                $data['user_address']."<br>".
                                "&#8377;".$data['price']."<br>".
                                $data['date']."<br>".
                                $data['time'];?> 
                            </td>
                            <td>
                                <?php echo $data['photographer'];
                                ?> 
                            </td>
                            <td>
                                <?php echo $data['theme'];?>
                            </td>
                            <td>
                                <?php echo $data['status'];?>
                            </td>
                        </tr>
                        <?php
                            $sno=$sno+1;
                            }
                        }
                        ?>
                                            </tbody>
                                        </table>
                                    </div>
               </div>
        </div>
    </div>
 </div>
</div>

<?php
include("footer.php");
?>
