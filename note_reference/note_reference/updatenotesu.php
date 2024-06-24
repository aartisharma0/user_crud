<?php 
include("header.php");
if(!isset($_SESSION['email'])){
    echo "<script>window.location.assign('userlogin.php?msg=Login Yourself First!!!')</script>";

}
if(!isset($_GET['id'])){
    echo "<script>window.location.assign('view_notes.php?msg=Please Select Something First!!!')</script>";

}
?>

<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="img/page-bg/4.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Update</a>
				<span>Notes</span>
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
             <?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        include('config.php');
        $query="SELECT * from `notes` WHERE `id`=$id";
        $res=mysqli_query($conn,$query);
        $data=mysqli_fetch_array($res);
    }
?>
<section class="contact-page spad ">
	<div class="container">
			<div class="row mb-5">
				<div class="col-lg-12">
					<div class="contact-form-warp">
                    <div class="section-title text-white text-center">
							<h2>Update Notes</h2>
					</div>
                    <div class="login-page">
                        <div class="login-title">
                            <div id="loginbox" class="loginbox">
                                <form method="post" name="login" enctype="multipart/form-data" >
                                    <fieldset class="input">
                                        <h3 id="login-form-username">
                                            <label for="modlgn_username">Title</label>
                                            <input id="modlgn_username" type="text" name="title"
                                                class="inputbox form-control" autocomplete="off"
                                                placeholder="Enter Title"  value="<?php echo $data['title'] ?>" required>
                                        </h3>
                                        <h3 id="login-form-username">
                                            <label for="modlgn_username">Type</label>
                                                <select id="modlgn_username" type="text" name="type"
                                                class="inputbox form-control" autocomplete="off" required>
                                                    <option disabled>Select Type</option>
                                                    <option selected ><?php echo $data['type'] ?></option>
                                                    <option >Question Paper</option>
                                                    <option >Notes</option>
                                                    <option >Syllabus</option>
                                                </select>
                                        </h3>
                                        <h3 id="login-form-username">
                                            <label for="modlgn_username">Course</label>
                                            <select id="modlgn_username" name="course"
                                                class="inputbox form-control" autocomplete="off"required>
                                            <option  disabled value="">Select Course</option>
                                            <?php
                                                include('config.php');
                                                $query="SELECT * from `courses`";
                                                $r=mysqli_query($conn,$query);
                                                while($d=mysqli_fetch_array($r)){
                                            ?>
                                            <option <?php if($data['course']==$d['id'] ){?>selected <?php } ?>
                                    value="<?php echo $d['course_name']?>"><?php echo $d['course_name']?></option>
                                <?php } ?>
                                            </select>
                                        </h3>
                                        <h3 id="login-form-username">
                                            <label for="modlgn_username">Subject</label>
                                            <select id="modlgn_username" name="subject"
                                                class="inputbox form-control" autocomplete="off" required>
                                            <option  disabled >Select Subject</option>
                                            <?php
                                                include('config.php');
                                                $query="SELECT * from `subject`";
                                                $r=mysqli_query($conn,$query);
                                                while($d=mysqli_fetch_array($r)){
                                            ?>
                                            <option <?php if($data['subject']==$d['id'] ){?>selected <?php } ?>
                                    value="<?php echo $d['subject_name']?>"><?php echo $d['subject_name']?></option>
                                <?php } ?>
                                            </select>
                                        </h3>
                                        <h3 id="login-form-username">
                                            <label for="modlgn_username">Semester</label>
                                            <input id="modlgn_username" type="number" name="semester"
                                                class="inputbox form-control" autocomplete="off"
                                                placeholder="Enter Your Semester" value="<?php echo $data['semester'] ?>" required>
                                        </h3>
                                        <h3 id="login-form-username">
                                            <label for="modlgn_username">Description</label>
                                            <textarea rows="1" cols="15" name="des" class="inputbox form-control"
                                                    autocomplete="off" placeholder="Enter Description About Notes in 30-40 Words"
                                                    maxlength="200" required></textarea>
                                            <p class="description-help">Enter 30 to 40 words (approximately).</p>
                                        </h3>
                                        <h3 id="login-form-username">
                                            <label for="modlgn_username">PDF</label>
                                            <input id="modlgn_username" type="file" name="pdf"
                                                class="inputbox form-control" autocomplete="off"
                                                placeholder="Upload Your Pdf">
                                                <input type="hidden" name="hidden_image" class="form-control"
                                                    value="<?php echo $data['pdf'] ?>">
                                                <input type="hidden" name="id" class="form-control" value="<?php echo $data['id'] ?>">
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
    $title=$_REQUEST['title'];
    $type=$_REQUEST['type'];
    $course_name=$_REQUEST['course'];
    $subject_name=$_REQUEST['subject'];
    $semester=$_REQUEST['semester'];
    $des=$_REQUEST['des'];
    $user_email=$_SESSION['email'];
    $user_type=$_SESSION['user_type'];
    $id=$_REQUEST['id'];
    if(isset($_FILES['pdf'])){
        $img_name=$_REQUEST['hidden_image'];
        if($_FILES['pdf']['name']){
            $name=$_FILES['pdf']['name'];
            $tmp_path=$_FILES['pdf']['tmp_name'];
            $size=$_FILES['pdf']['size'];
            $ext=$_FILES['pdf']['type'];
            $new_name=rand().".".$name;
            move_uploaded_file($tmp_path,"pdfs/".$new_name);
        }
        else{
        $new_name=$img_name;
        }
        include('config.php');
        $query = "UPDATE `notes` SET `title`='$title',`type`='$type',`course`='$course_name',`subject`='$subject_name',`semester`='$semester',`description`='$des',`pdf`='$new_name',`user_email`='$user_email',`user_type`='$user_type' WHERE `id`=$id";

        // echo $query;
        $res=mysqli_query($conn,$query);
        if($res>0){
            echo "<script>window.location.assign('viewnotesu.php?msg=Note Updated Successfully')</script>";
        }
        else{
            echo "<script>console.log($res)</script>";
            echo "<script>window.location.assign('viewnotesu.php?msg=Something Went Wrong!!')</script>";
        }
    }
}

?>