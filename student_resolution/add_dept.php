<?php
include("adminheader.php");
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.location.assign('adminlogin.php?msg=Login Yourself!!')</script>";
}
?>
<div class="all-title-box">
    <div class="container text-center">
        <h1>Add Department<span class="m_1">"Empowering Voices, Inspiring Solutions: Campus Resolution Unleashed."</span></h1>
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
                <h3>Add Department</h3>
            </div>
        </div><!-- end title -->

        <div class="row g-0 justify-content-center">
                <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="login-page">
                            <div class="login-title">
                                <div id="loginbox" class="loginbox">
                                    <form method="post" name="login"  enctype="multipart/form-data" >
                                        <fieldset class="input">
                                            <p id="login-form-username">
                                                <label for="modlgn_username">Department name</label>
                                                <input id="modlgn_username" type="text" name="dept_name"
                                                    class="inputbox form-control" autocomplete="off"
                                                    placeholder="Enter Department Name" required>
                                            </p>
                                            <p id="login-form-password">
                                                <label for="modlgn_passwd">Logo</label>
                                                <input id="modlgn_passwd" type="file" name="logo"
                                                    class="inputbox form-control" autocomplete="off"
                                                    placeholder="Enter Password" required>
                                            </p>
                                            <div class=" row my-4">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-3">
                                                    <button class="btn btn-secondary w-100 "  type="submit" name="add">Add</button>
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
if(isset($_REQUEST['add'])){
    $dept_name=$_REQUEST['dept_name'];
    // $name=$_FILES['category_image'];
    // print_r($name);

    if(isset($_FILES['logo'])){
        $name=$_FILES['logo']['name'];
        // print_r($name);
        $tmp_path=$_FILES['logo']['tmp_name'];
        // print_r("<br>".$tmp_path);
        $size=$_FILES['logo']['size'];
        // print_r("<br>".$size);
        $ext=$_FILES['logo']['type'];
        // print_r("<br>".$ext);
        $new_name=rand().".".$name;
        // print_r("<br>".$new_name);
        move_uploaded_file($tmp_path,"dept_images/".$new_name);
        include('config.php');
        $query="INSERT INTO `department`(`dept_name`, `logo`) VALUES ('$dept_name','$new_name')";
        $res=mysqli_query($conn,$query);
        if($res>0){
            echo "<script>window.location.assign('add_dept.php?msg=Department Added Successfully')</script>";
        }
        else{
            echo "<script>window.location.assign('add_dept.php?msg=Department Already Exist!')</script>";
        }
    }
  
}

?>