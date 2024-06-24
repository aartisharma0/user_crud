<?php 
include("header.php");
if(!isset($_SESSION['email'])){
    echo "<script>window.location.assign('userlogin.php?msg=Login Yourself First!!!')</script>";

}
$email=$_SESSION['email'];
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
				<span>Notes</span>
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
					<h2 >Manage Notes</h2>
                    <span class="mt-2">
					<a href="addnotesu.php" class="site-btn header-btn">Add Material</a>
                    </span>
				</div>
                <div class="container my-5 table-responsive newone" id="welcome">
                     <table class="timetable table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Course</th>
                            <th>Subject</th>
                            <th>Semester</th>
                            <th>Description</th>
                            <th>PDF</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('config.php');
                            $query="SELECT * from `notes` where `user_email`='$email'";
                            $res=mysqli_query($conn,$query);
                            $sno=1;
                            while($data=mysqli_fetch_array($res)){
                        ?>
                        <tr class="row_1 row_gray">
                            <td>
                            <span ><?php echo $sno;?></span>
                            </td>
                            <td>
                            <span ><?php echo $data['title'];?></span> 
                            </td>
                            <td>
                            <span ><?php echo $data['type'];?></span> 
                            </td>
                            <td>
                            <span ><?php echo $data['course'];?></span> 
                            </td>
                            <td>
                            <span ><?php echo $data['subject'];?></span> 
                            </td>
                            <td>
                            <span ><?php echo $data['semester'];?></span> 
                            </td>
                            <td>
                            <span><?php echo $data['description'];?></span> 
                            </td>
                            <td>
                            <span ><a href="pdfs/<?php echo $data['pdf']; ?>" target="_blank" >Download File</a></span>
                            </td>
                            <td>
                                <a class="btn btn-success" href="updatenotesu.php?id=<?php echo $data['id']?>"><i class="fa fa-edit"></i></a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="deletenotesu.php?id=<?php echo $data['id']?>"><i class="fa fa-trash"></i></a>
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
