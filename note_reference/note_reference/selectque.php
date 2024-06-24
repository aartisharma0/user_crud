<?php 
include("header.php");
if(!isset($_SESSION['email'])){
    echo "<script>window.location.assign('userlogin.php?msg=Login Yourself First!!!')</script>";

}
$course=$_GET['course_name'];
$subject=$_GET['subject_name'];
?>
	<!-- Page info -->
	<div class="page-info-section set-bg" data-setbg="img/page-bg/1.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Select</a>
				<span>Notes</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->
	<!-- course section -->
	<div class="container-fluid">
	<section class="course-section spad pb-0">
		<div class="course-warp">                                     
			<div class="row course-items-area">
				<!-- course -->
                <?php
                    $query="SELECT * from `notes` where `course`='$course' and `subject`='$subject' and `type`='Question Paper'";
                    include('config.php');
                    $result=mysqli_query($conn,$query);
                    while($data=mysqli_fetch_array($result)){
                ?>                                   
			<div class="row course-items-area">
				<!-- course -->
				<div class="d-flex justify-content-between col-md-8 mx-auto ">
					<div class="course-item">
						<div class="course-info">
							<div class="course-text">
							<div class="price"><?php echo $data['type']?></div>
							<div class="price h1"><?php echo $data['title']?></div>
								<h6>Course :<?php echo $data['course']."<br>"?> Subject : <?php echo $data['subject']."<br>"?>Semester : <?php echo $data['semester']?></h6>
								<p><?php echo $data['description']?></p>
							</div>
							<div class="course-author">
								<p><a class="btn btn-danger d-flex justify-content-center" href="pdfs/<?php echo $data['pdf']; ?>" target="_blank" >Download File</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
                <?php
                    }
                ?>
            </div>
		</div>
	</section>
	</div>
	<!-- course section end -->


	<!-- banner section -->
	<section class="banner-section spad">
		<div class="container">
			<div class="section-title mb-0 pb-2">
				<h2>Join Our Community Now!</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
			</div>
			<div class="text-center pt-5">
				<a href="#" class="site-btn">Register Now</a>
			</div>
		</div>
	</section>
	<!-- banner section end -->

    <?php 
include("footer.php");

?>