<?php
include("stuheader.php");
?>
<div class="all-title-box">
    <div class="container text-center">
        <h1>Student Login<span class="m_1">"Empowering Voices, Inspiring Solutions: Campus Resolution Unleashed."</span></h1>
    </div>
</div>
<?php if (isset($_GET['msg'])) { ?>
    <div class="alert alert-primary alert-dismissible mt-5" role="alert">
        <strong><?php echo $_GET['msg']; ?></strong>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
    </div>
<?php
}
?>
<div id="overviews" class="section lb">
    <div class="container">
        <div class="section-title row text-center">
            <div class="col-md-8 offset-md-2">
                <h3>Student Login</h3>
            </div>
        </div><!-- end title -->

        <div class="row g-0 justify-content-center">
                <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="login-page">
                            <div class="login-title">
                                <div id="loginbox" class="loginbox">
                                    <form method="post" name="login" >
                                        <fieldset class="input">
                                            <p id="login-form-username">
                                                <label for="modlgn_username">Email</label>
                                                <input id="modlgn_username" type="text" name="email"
                                                    class="inputbox form-control" autocomplete="off"
                                                    placeholder="Enter Email Address" required>
                                            </p>
                                            <p id="login-form-password">
                                                <label for="modlgn_passwd">Password</label>
                                                <input id="modlgn_passwd" type="password" name="password"
                                                    class="inputbox form-control" autocomplete="off"
                                                    placeholder="Enter Password" required>
                                            </p>
                                            <div class=" row my-4">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-3">
                                                    <button class="btn btn-secondary w-100 "  type="submit" name="login">Login</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
    </div><!-- end container -->
</div><!-- end section -->
<?php 
include("footer.php");
?>
<?php
if(isset($_REQUEST['login'])){
	$email=$_REQUEST['email'];
	$password=md5($_REQUEST['password']);
	include('config.php');
	$query="SELECT * from `student` WHERE `email`='$email' AND `password`='$password'";
    // echo $query;
	$res=mysqli_query($conn,$query);
	if(mysqli_num_rows($res)>0){
        $_SESSION['stu_email']=$email;
        $_SESSION['user_type']='student';
		echo "<script>window.location.assign('index.php?msg=Login Successfully!!')</script>";
	}
	else{
		echo "<script>window.location.assign('studentlogin.php?msg=Invalid Email or Password!')</script>";
	}
}
?>