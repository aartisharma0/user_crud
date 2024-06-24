<?php 
include("header.php");
if(!isset($_SESSION['email'])){
    echo "<script>window.location.assign('userlogin.php?msg=Login Yourself First!!!')</script>";

}
?>

<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="img/page-bg/4.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Add</a>
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
<section class="contact-page spad ">
	<div class="container">
			<div class="row mb-5">
				<div class="col-lg-12">
					<div class="contact-form-warp">
                    <div class="section-title text-white text-center">
							<h2>Add Notes</h2>
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
                                                placeholder="Enter Title" required>
                                        </h3>
                                        <h3 id="login-form-username">
                                            <label for="modlgn_username">Type</label>
                                                <select id="modlgn_username" type="text" name="type"
                                                class="inputbox form-control" autocomplete="off" required>
                                                    <option selected disabled>Select Type</option>
                                                    <option >Question Paper</option>
                                                    <option >Notes</option>
                                                    <option >Syllabus</option>
                                                </select>
                                        </h3>
                                        <h3 id="login-form-username">
                                            <label for="modlgn_username">Course</label>
                                            <select id="modlgn_username" name="course"
                                                class="inputbox form-control" autocomplete="off"required>
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
                                        <h3 id="login-form-username">
                                            <label for="modlgn_username">Subject</label>
                                            <select id="modlgn_username" name="subject"
                                                class="inputbox form-control" autocomplete="off" required>
                                            <option selected disabled value="">Select Subject</option>
                                            <?php
                                                include('config.php');
                                                $query="SELECT * from `subject`";
                                                $res=mysqli_query($conn,$query);
                                                while($data=mysqli_fetch_array($res)){
                                            ?>
                                            <option value="<?php echo $data['subject_name']?>"><?php echo $data['subject_name']?></option>
                                            <?php } ?>
                                            </select>
                                        </h3>
                                        <h3 id="login-form-username">
                                            <label for="modlgn_usersem">Semester</label>
                                            <input id="modlgn_usersem" type="number" name="semester" class="inputbox form-control" min="1" max="8"
                                                autocomplete="off" placeholder="Enter Your Semester" required>
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
                                                placeholder="Upload Your Pdf" required>
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
    $title=$_REQUEST['title'];
    $type=$_REQUEST['type'];
    $course_name=$_REQUEST['course'];
    $subject_name=$_REQUEST['subject'];
    $semester=$_REQUEST['semester'];
    $des=$_REQUEST['des'];
    $user_email=$_SESSION['email'];
    $user_type=$_SESSION['user_type'];
    if(isset($_FILES['pdf'])){
        $namepdf=$_FILES['pdf']['name'];
        $tmp_pathpdf=$_FILES['pdf']['tmp_name'];
        $sizepdf=$_FILES['pdf']['size'];
        $extpdf=$_FILES['pdf']['type'];
        $new_namepdf=rand().".".$namepdf;
        move_uploaded_file($tmp_pathpdf,"pdfs/".$new_namepdf);
        include('config.php');
        $query="INSERT INTO `notes`(`title`, `course`, `subject`, `semester`, `description`, `pdf`, `user_email`, `user_type`,`type`) VALUES ('$title','$course_name','$subject_name','$semester','$des','$new_namepdf','$user_email','$user_type','$type')";
        // echo $query;
        $res=mysqli_query($conn,$query);
        if($res>0){
            echo "<script>window.location.assign('addnotesu.php?msg=Notes Added Successfully')</script>";
        }
        else{
            echo "<script>window.location.assign('addnotesu.php?msg=Error While Adding Course!')</script>";
        }
    }
  
}

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#modlgn_usersem').on('input', function () {
            var value = parseInt($(this).val());
            if (isNaN(value) || value < 1 || value > 8) {
                $(this).val('');
            }
        });
    });
</script>
