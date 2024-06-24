<?php 
include("adminheader.php");
if(!isset($_SESSION['email'])){
    echo "<script>window.location.assign('adminlogin.php?msg=Login Yourself First!!!')</script>";

}
if(!isset($_GET['id'])){
    echo "<script>window.location.assign('view_course.php?msg=Please Select Course First!!!')</script>";

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
    <?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        include('config.php');
        $query="SELECT * from `subject` WHERE `id`=$id";
        $res=mysqli_query($conn,$query);
        $data=mysqli_fetch_array($res);
    }
?>
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
							<h2>Update Subject</h2>
					</div>
                    <div class="login-page">
                        <div class="login-title">
                            <div id="loginbox" class="loginbox">
                                <form method="post" name="login" enctype="multipart/form-data" >
                                    <fieldset class="input">
                                    <h3 id="login-form-username">
                                            <label for="modlgn_username">Course Name</label>
                                            <select id="modlgn_username" name="course_name"
                                                class="inputbox form-control" autocomplete="off"required>
                                            <option  disabled value="">Select Course</option>
                                            <?php
                                                include('config.php');
                                                $query="SELECT * from `courses`";
                                                $r=mysqli_query($conn,$query);
                                                while($d=mysqli_fetch_array($r)){
                                            ?>
                                            <option <?php if($data['course_name']==$d['id'] ){?>selected <?php } ?>
                                    value="<?php echo $d['course_name']?>"><?php echo $d['course_name']?></option>
                                <?php } ?>
                                            </select>
                                        </h3>
                                        <h3 id="login-form-username">
                                            <label for="modlgn_username">Subject Name</label>
                                            <input id="modlgn_username" type="text" name="subject_name"
                                                class="inputbox form-control" autocomplete="off"
                                                placeholder="Enter subject Name" value="<?php echo $data['subject_name']?>" required>
                                        </h3>
                                        
                                        <h3 id="login-form-password">
                                            <label for="modlgn_passwd">Logo</label>
                                            <input id="modlgn_passwd" type="file" name="logo"
                                                class="inputbox form-control" autocomplete="off"
                                                placeholder="Upload Logo" value="<?php echo $data['logo']?>" >
                                                <input type="hidden" name="hidden_image" class="form-control"
                                                 value="<?php echo $data['logo']?>">
                                                <input type="hidden" name="id" class="form-control" value="<?php echo $data['id']?>">

                                        </h3>
                                        <div class=" row my-4">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-3">
                                                <button class="btn btn-light w-100"  type="submit" name="add">Update</button>
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
    $id=$_REQUEST['id'];
    $course_name=$_REQUEST['course_name'];
    $subject_name=$_REQUEST['subject_name'];
    if(isset($_FILES['logo'])){
       echo $img_name=$_REQUEST['hidden_image'];
        if($_FILES['logo']['name']){
            $name=$_FILES['logo']['name'];
            $tmp_path=$_FILES['logo']['tmp_name'];
            $size=$_FILES['logo']['size'];
            $ext=$_FILES['logo']['type'];
            $new_name=rand().".".$name;
            move_uploaded_file($tmp_path,"subject_images/".$new_name);
        }
        else{
        $new_name=$img_name;
        }
    }
   include('config.php');
   $query="UPDATE `subject` SET `course_name`='$course_name',`subject_name`='$subject_name',`logo`='$new_name' WHERE `id`=$id";
//    echo $query;
   $res=mysqli_query($conn,$query);
   if($res>0){
        echo "<script>window.location.assign('view_subject.php?msg=Subject Updated Successfully!!')</script>";
    }
    else{
        echo "<script>window.location.assign('view_subject.php?msg=Error, Try Again!!')</script>";
    }
  
}

?>