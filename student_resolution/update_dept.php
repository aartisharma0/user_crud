<?php
include("adminheader.php");
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.location.assign('adminlogin.php?msg=Login Yourself!!')</script>";
}
if (!isset($_GET['id'])) {
    echo "<script>window.location.assign('manage_dept.php?msg=Please Select Department First!!')</script>";
}

?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include('config.php');
    $query = "SELECT * from `department` WHERE `id`=$id";
    $res = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($res);
}
?>
<div class="all-title-box">
    <div class="container text-center">
        <h1>Update Department<span class="m_1">"Empowering Voices, Inspiring Solutions: Campus Resolution Unleashed."</span></h1>
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
                <h3>Update Department</h3>
            </div>
        </div><!-- end title -->

        <div class="row g-0 justify-content-center">
            <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.1s">
                <div class="login-page">
                    <div class="login-title">
                        <div id="loginbox" class="loginbox">
                            <form method="post" name="login" enctype="multipart/form-data">
                                <fieldset class="input">
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Department name</label>
                                        <input id="modlgn_username" type="text" name="dept_name" class="inputbox form-control" autocomplete="off" placeholder="Enter Department Name" value="<?php echo $data['dept_name'] ?>" required>
                                    </p>
                                    <p id="login-form-password">
                                        <label for="modlgn_passwd">Logo</label>
                                        <input id="modlgn_passwd" type="file" name="logo" class="inputbox form-control" autocomplete="off" value="<?php echo $data['logo'] ?>">
                                        <input type="hidden" name="hidden_image" class="form-control" value="<?php echo $data['logo'] ?>">
                                        <input type="hidden" name="id" class="form-control" value="<?php echo $data['id'] ?>">

                                    </p>
                                    <div class=" row my-4">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-3">
                                            <button class="btn btn-secondary w-100 " type="submit" name="add">Update</button>
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
    $id=$_REQUEST['id'];
    $dept_name=$_REQUEST['dept_name'];
    // $name=$_FILES['category_image'];
    // print_r($name);

    if(isset($_FILES['logo'])){
        $img_name=$_REQUEST['hidden_image']; 
        if($_FILES['logo']['name']){
        $name=$_FILES['logo']['name'];
        $tmp_path=$_FILES['logo']['tmp_name'];
        $size=$_FILES['logo']['size'];
        $ext=$_FILES['logo']['type'];
        $new_name=rand().".".$name;
        move_uploaded_file($tmp_path,"dept_images/".$new_name);
        }else{
            $new_name=$img_name;
        }
        include('config.php');
        $query = "UPDATE `department` SET `dept_name`='$dept_name', `logo`='$new_name' WHERE `id`='$id'";
        // echo $query;
        $res=mysqli_query($conn,$query);
        if($res>0){
            echo "<script>window.location.assign('manage_dept.php?msg=Department Updated Successfully')</script>";
        }
        else{
            echo "<script>window.location.assign('manage_dept.php?msg=Error While Updation!!')</script>";
        }
    }
  
}

?>