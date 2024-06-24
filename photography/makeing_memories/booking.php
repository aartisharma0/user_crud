<?php
     include("header.php");
        if(isset($_SESSION['pho_email']))
        {
            $email=$_SESSION['pho_email'];
            // echo $email;
            // $id=$_REQUEST['id'];
?>
<style>
    .container{
        margin-top:30px;
    }
	#welcome{
     
        width:100%;
        border:1px solid gray;
        margin:10px;
        padding-top:90px;
        
    }
    .newone{
        border:2px solid gray;
        box-shadow: 5px 5px 9px gray;
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
                            <li class="breadcrumb-item"><a href="#">Booking </a></li>
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
    <div class="popular-wthree py-5">
        <div class="container py-lg-5 py-md-4 py-3">
            <?php if(isset($_GET['msg'])){?>
                <div class="alert alert-danger alert-dismissible " role="alert">
                    <strong><?php echo $_GET['msg'];?></strong>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                </div>
                <?php
                    }
            ?>
           <div class="container my-5 table-responsive newone" id="welcome">
                     <table class="timetable table table-bordered table-hover table-striped ">
                    <thead>
                        <tr>
                            <th><h3>Sr.No.</h3></th>
                            <th><h3>User Detail</h3></th>
                            <th><h3>Theme</h3></th>
                            <th><h3>Status</h3></th>
                            <th><h3>Action</h3></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('config.php');
                            $query="SELECT * from `booking` where photographer='$email'";
                            // echo $query;
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
                                $data['date']."<br>".$data['time']?> 
                            </td>
                            <td>
                                <?php echo $data['theme'];?>
                            </td>
                            <td>
                                <?php echo $data['status'];?>
                            </td>
                            <td>
                            <?php
                                    if($data['status']=='Pending'){
                                        ?>
                                         <a class="btn btn-success" name="approve" href="inprogress.php?id=<?php echo $data['id']?>">Approve</a>
                                        <a class="btn btn-danger" name="reject" href="reject.php?id=<?php echo $data['id']?>">Decline</a>                                    
                                        <?php
                                    }else if($data['status']=='Approved'){
                                        ?>
                                         <a class="btn btn-success" name="accepted" href="complete.php?id=<?php echo $data['id']?>">Complete</a>

                                         <?php
                                    }
                                    else{
                                        ?>
                                    <?php echo $data['status']; ?>
                                        <?php
                                    }
                                    ?>
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



<?php
include("footer.php");
}
else{
    echo "<script>window.location.assign('photographerlogin.php?msg=Login Yourself!!')</script>";
}  
?>
