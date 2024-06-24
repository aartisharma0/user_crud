<?php 
include("header.php");
if(!isset($_SESSION['email'])){
    echo "<script>window.location.assign('userlogin.php?msg=Login Yourself First!!!')</script>";

}

?>
	<!-- Page info -->
	<div class="page-info-section set-bg" data-setbg="img/page-bg/1.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Contact</a>
				<span>Add Enquiry</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->
	<!-- Page -->
	<section class="contact-page spad pb-0">
		<div class="container">
		<?php if(isset($_GET['msg'])){?>
        <div class="alert alert-danger alert-dismissible " role="alert">
            <strong><?php echo $_GET['msg'];?></strong>
            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
        </div>
        <?php
            }
        ?>

    <?php
                     if($_SESSION['email']){
                        $email=$_SESSION['email'];
                        include('config.php');
                        $query="SELECT * from `users` WHERE `email`='$email'";
                        $res=mysqli_query($conn,$query);
                        $data1=mysqli_fetch_array($res);
                    }
                ?>
			<div class="row">
				<div class="col-lg-8">
					<div class="contact-form-warp">
						<div class="section-title text-white text-left">
						<p class="text-primary text-uppercase mb-2">Contact Us</p>
                <h1 class="display-6 mb-5">If You Have Any Query, Please Contact Us</h1></div>
						<form class="contact-form" method="post">
						<input type="text" class="form-control" name="name" placeholder="Your Name" value="<?php echo $data1['name'] ?>" required>
						<input type="email" class="form-control" name="email" placeholder="Your Email"  value="<?php echo $data1['email'] ?>" required>
						<input type="text" class="form-control" name="subject" placeholder="Subject">
						<textarea class="form-control" placeholder="Leave a message here" name="message" style="height: 200px"></textarea>
						<button class="site-btn" name="add">Sent Message</button>
						</form>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="contact-info-area">
						<div class="section-title text-left p-0">
							<h2>Contact Info</h2>
							<p>Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendi sse cursus faucibus finibus.</p>
						</div>
						<div class="phone-number">
							<span>Direct Line</span>
							<h2>+53 345 7953 32453</h2>
						</div>
						<ul class="contact-list">
							<li>1481 Creekside Lane <br>Avila Beach, CA 931</li>
							<li>+53 345 7953 32453</li>
							<li>yourmail@gmail.com</li>
						</ul>
						<div class="social-links">
							<a href="#"><i class="fa fa-pinterest"></i></a>
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
							<a href="#"><i class="fa fa-linkedin"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div id="map-canvas"></div>
		</div>
	</section>
	<!-- Page end -->


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
<?php 
if(isset($_REQUEST['add'])){
    include("config.php");
    $user_name=$_REQUEST['name'];
    $user_email=$_REQUEST['email'];
    $subject=$_REQUEST['subject'];
    $message=$_REQUEST['message'];
    $query="INSERT INTO `enquiry`(`name`, `email`, `subject`, `message`) VALUES ('$user_name','$user_email','$subject','$message')";
    echo $query;
    $res=mysqli_query($conn,$query);
        if($res>0){
            echo "<script>window.location.assign('contact.php?msg=Thanks for Contacting Us, We Will Get in touch with you Shortly!!')</script>";
        }
        else{
            echo "<script>console.log($res)</script>";
            echo "<script>window.location.assign('contact.php?msg=Something Went Wrong!!')</script>";
        }
}
?>