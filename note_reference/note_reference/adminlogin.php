<?php 
include("loginheader.php");
session_start();
?>

<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="img/page-bg/4.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Admin</a>
				<span>Login</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->
<section class="contact-page spad ">
    <?php if(isset($_GET['msg'])){?>
            <div class="alert alert-danger alert-dismissible mt-5 " role="alert">
                <strong><?php echo $_GET['msg'];?></strong>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
            </div>
            <?php
                }
            ?>
	<div class="container">
        
			<div class="row mb-5">
				<div class="col-lg-12">
					<div class="contact-form-warp">
                    <div class="section-title text-white text-center">
							<h2>Admin Login</h2>
					</div>
                    <div class="login-page">
                        <div class="login-title">
                            <div id="loginbox" class="loginbox">
                                <form method="post" name="login" >
                                    <fieldset class="input">
                                        <h3 id="login-form-username">
                                            <label for="modlgn_username">Email</label>
                                            <input id="modlgn_username" type="email" name="email"
                                                class="inputbox form-control" autocomplete="off"
                                                placeholder="Enter Email Address" required>
                                        </h3>
                                        <h3 id="login-form-password">
                                            <label for="modlgn_passwd">Password</label>
                                            <input id="modlgn_passwd" type="password" name="password"
                                                class="inputbox form-control" autocomplete="off"
                                                placeholder="Enter Password" required>
                                        </h3>
                                        <div class=" row my-4">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-3">
                                                <button class="btn btn-light w-100"  type="submit" name="login">Login</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    </div>
</section>
<?php 
include("footer.php");
?>
<?php
if(isset($_REQUEST['login'])){
	$email=$_REQUEST['email'];
	$password=md5($_REQUEST['password']);
	include('config.php');
	$query="SELECT * from `admin` WHERE `email`='$email' AND `password`='$password'";
    echo $query;
	$res=mysqli_query($conn,$query);
	if(mysqli_num_rows($res)>0){
        $_SESSION['email']=$email;
        $_SESSION['user_type']='admin';
		//echo $_SESSION['email'];
		echo "<script>window.location.assign('adminindex.php?msg=Login Successfully!!')</script>";
	}
	else{
		echo "<script>window.location.assign('adminlogin.php?msg=Invalid Email or Password!')</script>";
	}
}
?>