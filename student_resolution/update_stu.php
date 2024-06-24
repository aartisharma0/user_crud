<?php
include("hodheader.php");
if (!isset($_SESSION['hod_email'])) {
    echo "<script>window.location.assign('hodlogin.php?msg=Login Yourself!!')</script>";
}
if (!isset($_GET['id'])) {
    echo "<script>window.location.assign('manage_dept.php?msg=Please Select Department First!!')</script>";
}

?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include('config.php');
    $query = "SELECT * from `student` WHERE `id`=$id";
    $res = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($res);
}
?>
<div class="all-title-box">
    <div class="container text-center">
        <h1>Update Student<span class="m_1">"Empowering Voices, Inspiring Solutions: Campus Resolution Unleashed."</span></h1>
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
                <h3>Update Student</h3>
            </div>
        </div><!-- end title -->

        <div class="row g-0 justify-content-center">
            <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.1s">
                <div class="login-page">
                    <div class="login-title">
                        <div id="loginbox" class="loginbox">
                        <form method="post" name="login"  onsubmit="return validateForm()">
                                <fieldset class="input">
                                <p id="login-form-username">
                                        <label for="modlgn_username">Department name</label>
                                        <select name="department" id="modlgn_username" class="inputbox form-control" autocomplete="off" required>
                                            <option selected disabled value="">Select Department</option>
                                            <?php
                                            include('config.php');
                                            $query = "SELECT * from `department`";
                                            $res = mysqli_query($conn, $query);
                                            while ($d = mysqli_fetch_array($res)) {
                                            ?>
                                                <option <?php if($data['dept_name']==$d['dept_name'] ){?>selected <?php } ?>
                                    value="<?php echo $d['dept_name']?>"><?php echo $d['dept_name']?></option>
                                <?php } ?>
                                        </select>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Course</label>
                                        <input id="modlgn_username" type="text" name="course" value="<?php echo $data['course'] ?>" class="inputbox form-control" autocomplete="off" placeholder="Enter Course" required>
                                    </p>
                                    <p id="login-form-usersem">
                                        <label for="modlgn_usersem">Semester</label>
                                        <input id="modlgn_usersem" type="number" name="sem" value="<?php echo $data['semester'] ?>" class="inputbox form-control" autocomplete="off" min="1" max="8" placeholder="Enter Semester" required>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Roll No</label>
                                        <input id="modlgn_userroll" type="number" name="rolln" value="<?php echo $data['rollno'] ?>" class="inputbox form-control" min="1"autocomplete="off" placeholder="Enter Roll No. " required>

                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Name</label>
                                        <input id="modlgn_username" type="text" name="name" value="<?php echo $data['name'] ?>" class="inputbox form-control" autocomplete="off" placeholder="Enter Student Name" required>
                                    <div id="nameError" style="color: red;"></div>

                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Email</label>
                                        <input id="modlgn_username" type="email" name="email" value="<?php echo $data['email'] ?>" class="inputbox form-control" autocomplete="off" placeholder="Enter Student Email" required>
                                    <div id="emailError" style="color: red;"></div>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Password</label>
                                        <input id="modlgn_username" type="password" name="password"  class="inputbox form-control" autocomplete="off" placeholder="Enter Password" required>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Contact</label>
                                        <input id="modlgn_username" type="number" name="contact" value="<?php echo $data['contact'] ?>" class="inputbox form-control" autocomplete="off" placeholder="Enter Contact" required>
                                    <div id="contactError" style="color: red;"></div>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Father's Name</label>
                                        <input id="modlgn_username" type="text" name="fname"value="<?php echo $data['father_name'] ?>" class="inputbox form-control" autocomplete="off" placeholder="Enter Student Father Name" required>
                                    <div id="nameError" style="color: red;"></div>
                                    </p>
                                    <p id="login-form-username d-flex justify-content-start">
                                        <label for="modlgn_username">Gender</label>
                                        <div id="login-form-username d-flex justify-content-start">
                                            <input  type="radio" name="gender" class=" justify-content-end" value="Male" <?php echo ($data['gender'] === 'Male') ? 'checked' : ''; ?>  autocomplete="off" required><lable>Male</lable>
                                            <input  type="radio" name="gender" class=" justify-content-end" value="Female" <?php echo ($data['gender'] === 'Female') ? 'checked' : ''; ?> autocomplete="off"required><lable>Female</lable>
                                        </div>
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
    $dept_name = $_REQUEST['department'];
    $course = $_REQUEST['course'];
    $sem = $_REQUEST['sem'];
    $rolln = $_REQUEST['rolln'];
    $hname = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = md5($_REQUEST['password']);
    $contact = $_REQUEST['contact'];
    $fname = $_REQUEST['fname'];
    $gender = $_REQUEST['gender'];
    $unique_id=$data['unique_id'];
    // $name=$_FILES['category_image'];
    // print_r($
        include('config.php');
        $query = "UPDATE `student` SET `name`='$hname',`email`='$email',`password`='$password',`contact`='$contact',`father_name`='$fname',`rollno`='$rolln',`dept_name`='$dept_name',`course`='$course',`semester`='$sem',`gender`='$gender',`unique_id`='$unique_id' WHERE `id`='$id'";
        // echo $query;
        $res=mysqli_query($conn,$query);
        if($res>0){
            echo "<script>window.location.assign('manage_stu.php?msg=Student Updated Successfully')</script>";
        }
        else{
            echo "<script>window.location.assign('manage_stu.php?msg=Error While Updation!!')</script>";
        }
    }

?>
<script>
    function validateForm() {
        var name = document.getElementsByName("name")[0].value;
        var email = document.getElementsByName("email")[0].value;
        var contact = document.getElementsByName("contact")[0].value;

        // Validate name
        if (name.trim() === "") {
            displayError("nameError", "Please enter your name.");
            return false;
        } else if (!isAlphabetic(name)) {
            displayError("nameError", "Please enter alphabetic characters only for Name.");
            return false;
        } else {
            hideError("nameError");
        }

        // Validate email
        if (email.trim() === "") {
            displayError("emailError", "Please enter your email address.");
            return false;
        } else if (!validateEmail(email)) {
            displayError("emailError", "Please enter a valid email address.");
            return false;
        } else {
            hideError("emailError");
        }

        // Validate contact
        var pattern = /^(\+?91|0)?[6789]\d{9}$/;
        if (!pattern.test(contact)) {
            displayError("contactError", "Please enter a valid Indian contact number.");
            return false;
        } else {
            hideError("contactError");
        }

        return true; // Form is valid
    }

    function isAlphabetic(input) {
        var letters = /^[A-Za-z\s]+$/;
        return letters.test(input);
    }

    function validateEmail(email) {
        var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return pattern.test(email);
    }

    function displayError(errorId, errorMessage) {
        var errorElement = document.getElementById(errorId);
        errorElement.textContent = errorMessage;
        errorElement.style.display = "block";
    }

    function hideError(errorId) {
        var errorElement = document.getElementById(errorId);
        errorElement.style.display = "none";
    }
</script>
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
<script>
    $(document).ready(function () {
        $('#modlgn_userroll').on('input', function () {
            var value = parseInt($(this).val());
            if (isNaN(value) || value < 1) {
                $(this).val('');
            }
        });
    });
</script>