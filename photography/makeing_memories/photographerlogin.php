<?php
include("loginheader.php");
session_start();

?>
 <!-- Header Start -->
 <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Login</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item active"><a href="photographerlogin.php">Photographer</a></li>
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
                <h1 class="text-primary text-uppercase mb-5">Photographer Login</h1>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                <div class="login-page">
                        <div class="login-title">
                            <div id="loginbox" class="loginbox">
                                <form method="post" name="login" >
                                    <fieldset class="input">
                                        <h6 id="login-form-username">
                                            <label for="modlgn_username">Email</label>
                                            <input id="modlgn_username" type="text" name="email"
                                                class="inputbox form-control" autocomplete="off"
                                                placeholder="Enter Email Address">
                                        </h6>
                                        <h6 id="login-form-password">
                                            <label for="modlgn_passwd">Password</label>
                                            <input id="modlgn_passwd" type="password" name="password"
                                                class="inputbox form-control" autocomplete="off"
                                                placeholder="Enter Password">
                                         </h6>
                                        <div class=" row my-4">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-6  d-flex justify-content-around">
                                                <button class="btn btn-primary"  type="submit" name="login">Login</button>
                                                <span class="mt-2"><a href="photographerregister.php">Not Registered? Register</a></span>
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

<?php
include("footer.php");
?>
<?php
if(isset($_REQUEST['login'])){
	$email=$_REQUEST['email'];
	$password=md5($_REQUEST['password']);
	include('config.php');
	$query="SELECT * from `photographer` WHERE `email`='$email' AND `password`='$password'";
    //echo $query;
	$res=mysqli_query($conn,$query);
    $data=mysqli_fetch_array($res);
	if(mysqli_num_rows($res)>0){
        $_SESSION['pho_email']=$email;
		//echo $_SESSION['email'];
		echo "<script>window.location.assign('photographerindex.php?msg=Login Successfully!!')</script>";
	}
	else{
		echo "<script>window.location.assign('photographerlogin.php?msg=Invalid Email or Password!')</script>";
	}
}
?>