<?php 
include("adminheader.php");
if(!isset($_SESSION['email'])){
    echo "<script>window.location.assign('adminlogin.php?msg=Login Yourself First!!!')</script>";

}
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
<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="img/page-bg/4.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Admin</a>
				<span>Home</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->
<?php if(isset($_GET['msg'])){?>
            <div class="alert alert-danger alert-dismissible mt-5 " role="alert">
                <strong><?php echo $_GET['msg'];?></strong>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
            </div>
            <?php
                }
            ?>
<section class="contact-page spad ">
	<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10" >
           <h1 class="text-center mb-5 text-danger">WELCOME ADMIN </h1>
            <div class="row mb-5 d-flex justify-content-around">
                
                    <div class="col-md-5 newone font3">
                        <a href="manage_category.php"> <h3 class="text-dark text-center">Total Courses</h3>
                      <?php
                            $query="SELECT * from `courses`";
                            include('config.php');
                            $res=mysqli_query($conn,$query);
                            $data=mysqli_num_rows($res);
                            echo "<h3 class='text-dark text-center mt-3'>".$data."</h3>";
                            ?>
                        </a>
                    </div>
                    <div class="col-md-5 newone font3">
                        <a href="manage_user.php"> <h3 class="text-dark text-center">Total Subjects</h3>
                     <?php
                            $query="SELECT * from `subject`";
                            include('config.php');
                            $res=mysqli_query($conn,$query);
                            $data=mysqli_num_rows($res);
                            echo "<h3 class='text-dark text-center mt-3'>".$data."</h3>";
                            ?> 
                        </a>
                    </div>
                </div>
            <div class="row mb-5 d-flex justify-content-around">
                <div class="col-md-5 newone font3">
                    <a href="manage_designer.php"> <h3 class="text-dark text-center">Total Notes</h3>
                 <?php
                            $query="SELECT * from `notes`";
                            include('config.php');
                            $res=mysqli_query($conn,$query);
                            $data=mysqli_num_rows($res);
                            echo "<h3 class='text-dark text-center mt-3'>".$data."</h3>";
                            ?> 
                    </a>
                </div>
                <div class="col-md-5 newone font3">
                    <a href="manage_booking.php"> <h3 class="text-dark text-center">Total Users</h3>
                    
                     <?php
                            $query="SELECT * from `users`";
                            include('config.php');
                            $res=mysqli_query($conn,$query);
                            $data=mysqli_num_rows($res);
                            echo "<h3 class='text-dark text-center mt-3'>".$data."</h3>";
                            ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<?php 
include("footer.php");
?>
