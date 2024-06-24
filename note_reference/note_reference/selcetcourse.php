<?php 
include("header.php");
if(!isset($_SESSION['email'])){
    echo "<script>window.location.assign('userlogin.php?msg=Login Yourself First!!!')</script>";

}
$course=$_GET['course_name'];
?>
	<!-- Page info -->
	<div class="page-info-section set-bg" data-setbg="img/page-bg/1.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Select</a>
				<span>Subject</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->
	<!-- course section -->
	<section class="course-section spad pb-0">
		<div class="course-warp">                                     
			<div class="row course-items-area">
				<!-- course -->
                <?php
                    $query="SELECT * from `subject` where `course_name`='$course'";
                    include('config.php');
                    $result=mysqli_query($conn,$query);
                    while($data=mysqli_fetch_array($result)){
                ?>
				<div class="mix col-lg-3 col-md-4 col-sm-6">
                <a href="selectnotes.php?course_name=<?php echo $data['course_name']?>&subject_name=<?php echo $data['subject_name']?>">
					<div class="course-item">
						<div class="course-thumb set-bg" data-setbg="subject_images/<?php echo $data['logo']?>">
							<div class="price"><?php echo $data['subject_name']?></div>
						</div>
					</div>
                </a>
				</div>
                <?php
                    }
                ?>
				
		</div>
	</section>
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