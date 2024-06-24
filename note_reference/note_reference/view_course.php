<?php 
include("adminheader.php");
if(!isset($_SESSION['email'])){
    echo "<script>window.location.assign('adminlogin.php?msg=Login Yourself First!!!')</script>";

}
?>
    <style>
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
 

 
</style>
<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="img/page-bg/4.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Manage</a>
				<span>Courses</span>
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
			<div class="row mb-5">
				<div class="col-lg-12">
                <div class="section-title d-flex justify-content-around text-danger text-center">
					<h2 >Manage Course</h2>
                    <span class="mt-2">
					<a href="add_course.php" class="site-btn header-btn">Add Course</a>
                    </span>
				</div>
                <div class="container my-5 table-responsive newone" id="welcome">
                    
                     <table class="timetable table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Course Name</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('config.php');
                            $query="SELECT * from `courses`";
                            $res=mysqli_query($conn,$query);
                            $sno=1;
                            while($data=mysqli_fetch_array($res)){
                        ?>
                        <tr class="row_1 row_gray">
                            <td>
                            <span ><?php echo $sno;?></span>
                            </td>
                            <td>
                            <span ><?php echo $data['course_name'];?></span> 
                            </td>
                            <td>
                            <span ><img src="course_images/<?php echo $data['logo']; ?>" class="img-thumbnail"
                                    height="100px" width="100px" ></span>
                            </td>
                            <td>
                                <a class="btn btn-success" href="update_course.php?id=<?php echo $data['id']?>"><i class="fa fa-edit"></i></a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="delete_course.php?id=<?php echo $data['id']?>"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                            $sno=$sno+1;
                            }
                        ?>
                                            </tbody>
                                        </table>
                                    </div>
        
                </div>
            </div>
    </div>
</section>
<?php 
include("footer.php");
?>
