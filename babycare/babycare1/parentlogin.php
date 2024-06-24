<?php
include("header.php");
?>
<!-- Page Header End -->
<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">Parent Login</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Parent</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Login</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
<?php if (isset($_GET['msg'])) { ?>
    <div class="alert alert-primary alert-dismissible " role="alert">
        <strong><?php echo $_GET['msg']; ?></strong>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
    </div>
<?php
}
?>
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="text-primary text-uppercase mb-2">Parent Login</h1>
        </div>
        <div class="row g-0 justify-content-center">
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                <div class="login-page">
                    <div class="login-title">
                        <div id="loginbox" class="loginbox">
                            <form method="post" name="login">
                                <fieldset class="input">
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Email</label>
                                        <input id="modlgn_username" type="text" name="email" class="inputbox form-control" autocomplete="off" placeholder="Enter Email Address" required>
                                    </p>
                                    <p id="login-form-password">
                                        <label for="modlgn_passwd">Password</label>
                                        <input id="modlgn_passwd" type="password" name="password" class="inputbox form-control" autocomplete="off" placeholder="Enter Password" required>
                                    </p>
                                    <div class=" row my-4 d-flex ">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-3 ">
                                            <button class="btn btn-primary w-100 d-flex justify-content-center" type="submit" name="login">Login</button>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <span class="d-flex justify-content-center"><a href="parentreg.php">Not have Account? Register</a></span>
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
<!-- About End -->
<?php
include("footer.php");
?>
<?php
if(isset($_REQUEST['login'])){
	$email=$_REQUEST['email'];
	$password=md5($_REQUEST['password']);
	include('config.php');
	$query="SELECT * from `parent` WHERE `email`='$email' AND `password`='$password'";
    // echo $query;
	$res=mysqli_query($conn,$query);
	if(mysqli_num_rows($res)>0){
        $_SESSION['parent_email']=$email;
        $_SESSION['user_type']='parent';
		echo "<script>window.location.assign('index.php?msg=Login Successfully!!')</script>";
	}
	else{
		echo "<script>window.location.assign('parentlogin.php?msg=Invalid Email or Password!')</script>";
	}
}
?>