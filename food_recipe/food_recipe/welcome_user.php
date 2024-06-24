<?php
    include_once("header.php");
    //check session
    if(isset($_SESSION["user_email"]))
    {
        //storage
        $user_email = $_SESSION['user_email'];
    }
    else{
        echo "<script>window.location.assign('user_login.php?msg=please login first to access this page')</script>";
    }

?>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Welcome <?php echo $user_email; //usage ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->
<h1 style="text-align:center"> <?php echo $user_email; //usage ?> </h1>
<?php
    include_once("footer.php");
?>