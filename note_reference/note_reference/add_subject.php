<?php 
include("adminheader.php");
if(!isset($_SESSION['email'])){
    echo "<script>window.location.assign('adminlogin.php?msg=Login Yourself First!!!')</script>";

}
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
    <?php if(isset($_GET['msg'])){?>
            <div class="alert alert-danger alert-dismissible mt-5 " role="alert">
                <strong><?php echo $_GET['msg'];?></strong>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
            </div>
            <?php
                }
            ?>
<section class="contact-page spad ">
	<div class="container">
			<div class="row mb-5">
				<div class="col-lg-12">
					<div class="contact-form-warp">
                    <div class="section-title text-white text-center">
							<h2>Add Subject</h2>
					</div>
                    <div class="login-page">
                        <div class="login-title">
                            <div id="loginbox" class="loginbox">
                                <form method="post" name="login" enctype="multipart/form-data" >
                                    <fieldset class="input">
                                        <h3 id="login-form-username">
                                            <label for="modlgn_username">Course Name</label>
                                            <select id="modlgn_username" name="course_name"
                                                class="inputbox form-control" autocomplete="off" required>
                                            <option selected disabled value="">Select Course</option>
                                            <?php
                                                include('config.php');
                                                $query="SELECT * from `courses`";
                                                $res=mysqli_query($conn,$query);
                                                while($data=mysqli_fetch_array($res)){
                                            ?>
                                            <option value="<?php echo $data['course_name']?>"><?php echo $data['course_name']?></option>
                                            <?php } ?>
                                            </select>
                                        </h3>
                                            <label for="modlgn_username">Subject Name</label>
                                            <input id="modlgn_username" type="text" name="subject_name"
                                                class="inputbox form-control" autocomplete="off"
                                                placeholder="Enter Subject Name" required>
                                        </h3>
                                        <h3 id="login-form-password">
                                            <label for="modlgn_passwd">Logo</label>
                                            <input id="modlgn_passwd" type="file" name="logo"
                                                class="inputbox form-control" autocomplete="off"
                                                placeholder="Upload Logo" required>
                                        </h3>
                                        <div class=" row my-4">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-3">
                                                <button class="btn btn-light w-100"  type="submit" name="add">Add</button>
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
if(isset($_REQUEST['add'])){
    $course_name=$_REQUEST['course_name'];
    $subject_name=$_REQUEST['subject_name'];
    if(isset($_FILES['logo'])){
        $name=$_FILES['logo']['name'];
        $tmp_path=$_FILES['logo']['tmp_name'];
        $size=$_FILES['logo']['size'];
        $ext=$_FILES['logo']['type'];
        $new_name=rand().".".$name;
        move_uploaded_file($tmp_path,"subject_images/".$new_name);
        include('config.php');
        $query="INSERT INTO `subject`(`course_name`,`subject_name`,`logo`) VALUES ('$course_name','$subject_name','$new_name')";
        // echo $query;
        $res=mysqli_query($conn,$query);
        if($res>0){
            echo "<script>window.location.assign('add_subject.php?msg=Subject Added Successfully!!')</script>";
        }
        else{
            echo "<script>window.location.assign('add_subject.php?msg=Subject Already Exist!!')</script>";
        }
    }
  
}

?>