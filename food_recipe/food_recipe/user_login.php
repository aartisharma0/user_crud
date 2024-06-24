<?php
    include_once('header.php');
?>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>User Login</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->
    <?php
                        if(isset($_REQUEST["msg"]))
                        {
                            echo "<div class='alert alert-info mt-4'>".$_REQUEST["msg"]."</div>";
                    
                        }
                    ?>
    <div class="container-xxl p-5 my-4">
        <div class="container">
            <div class="section-title row text-center">
        <div class="col-md-8 offset-md-2 mt-5 mb-5">
            <h3>Login</h3>
        </div>
    </div><!-- end title -->
            <div class="row g-5">
                <div class="col-lg-6 mx-auto wow fadeInUp" data-wow-delay="0.1s">
                    
                    <form method="post">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="user_email" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        </div>
                        <center>
                                <button type="submit" name="submit" class="btn btn-primary my-4">Submit</button>
                            </center>
                    </form>
                    <div class="account">
					<p class="text-center">Don't have an Account ?<br><a href="register.php">Create Your Account</a></p>
				</div>
                </div>               
            </div>
        </div>
    </div>
<?php
    include_once('footer.php')
?>
<?php
if(isset($_REQUEST["submit"]))
{
    $user_email = $_REQUEST["user_email"];
    $password = md5($_REQUEST["password"]);

    include("config.php");
    $query = "SELECT * FROM `create_account` WHERE user_email='$user_email' and password='$password'";

    $result = mysqli_query($conn,$query);

    
    if($row = mysqli_fetch_array($result))
    {
        //created a session 
        $_SESSION["user"] ='User';
        $_SESSION["user_email"] = $user_email;
        echo "<script>window.location.assign('index.php?msg=Login Successfully!!')</script>";
    }
    else{
        echo "<script>window.location.assign('user_login.php?msg=Invalid email or password')</script>";
    }

}
?>