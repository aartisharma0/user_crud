<?php
include("hodheader.php");
if (!isset($_SESSION['hod_email'])) {
    echo "<script>window.location.assign('hodlogin.php?msg=Login Yourself!!')</script>";
}
?>
<div class="all-title-box">
    <div class="container text-center">
        <h1>Add Student<span class="m_1">"Empowering Voices, Inspiring Solutions: Campus Resolution Unleashed."</span></h1>
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
                <h3>Add Student</h3>
            </div>
        </div><!-- end title -->

        <div class="row g-0 justify-content-center">
            <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.1s">
                <div class="login-page">
                    <div class="login-title">
                        <div id="loginbox" class="loginbox">
                            <form method="post" name="login" enctype="multipart/form-data" onsubmit="return validateForm()">
                                <fieldset class="input">
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Department</label>
                                        <select name="department" id="modlgn_username" class="inputbox form-control" autocomplete="off" required>
                                            <option selected disabled value="">Select Department</option>
                                            <?php
                                            include('config.php');
                                            $query = "SELECT * from `department`";
                                            $res = mysqli_query($conn, $query);
                                            while ($data = mysqli_fetch_array($res)) {
                                            ?>
                                                <option value="<?php echo $data['dept_name'] ?>"><?php echo $data['dept_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </p> 
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Course</label>
                                        <input id="modlgn_username" type="text" name="course" class="inputbox form-control" autocomplete="off" placeholder="Enter Course" required>
                                    </p>
                                    <p id="login-form-usersem">
                                        <label for="modlgn_usersem">Semester</label>
                                        <input id="modlgn_usersem" type="number" name="sem" class="inputbox form-control" autocomplete="off" min="1" max="8" placeholder="Enter Semester" required>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Roll No</label>
                                        <input id="modlgn_userroll" type="number" name="rolln" class="inputbox form-control" min="1"autocomplete="off" placeholder="Enter Roll No. " required>

                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Name</label>
                                        <input id="modlgn_username" type="text" name="name" class="inputbox form-control" autocomplete="off" placeholder="Enter Student Name" required>
                                    <div id="nameError" style="color: red;"></div>

                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Email</label>
                                        <input id="modlgn_username" type="email" name="email" class="inputbox form-control" autocomplete="off" placeholder="Enter Student Email" required>
                                    <div id="emailError" style="color: red;"></div>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Password</label>
                                        <input id="modlgn_username" type="password" name="password" class="inputbox form-control" autocomplete="off" placeholder="Enter Password" required>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Contact</label>
                                        <input id="modlgn_username" type="number" name="contact" class="inputbox form-control" autocomplete="off" placeholder="Enter Contact" required>
                                    <div id="contactError" style="color: red;"></div>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Father's Name</label>
                                        <input id="modlgn_username" type="text" name="fname" class="inputbox form-control" autocomplete="off" placeholder="Enter Student Father Name" required>
                                    <div id="nameError" style="color: red;"></div>
                                    </p>
                                    <p id="login-form-username d-flex justify-content-start">
                                        <label for="modlgn_username">Gender</label>
                                        <div id="login-form-username d-flex justify-content-start">
                                            <input  type="radio" name="gender" class=" justify-content-end" value="Male" autocomplete="off" required><lable>Male</lable>
                                            <input  type="radio" name="gender" class=" justify-content-end" value="Female" autocomplete="off"required><lable>Female</lable>
                                        </div>
                                    </p>
                                    
                                    <div class=" row my-4">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-3">
                                            <button class="btn btn-secondary w-100 " type="submit" name="add">Add</button>
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
if (isset($_REQUEST['add'])) {
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
    $unique_id=rand();
        include('config.php');
        $query = "INSERT INTO `student`(`name`,`email`,`password`,`contact`,`father_name`,`rollno`,`dept_name`,`course`,`semester`,`gender`,`unique_id`) VALUES ('$hname','$email','$password','$contact','$fname','$rolln','$dept_name','$course','$sem','$gender','$unique_id')";
        // echo $query;
        $res = mysqli_query($conn, $query);
        if ($res > 0) {
            echo "<script>window.location.assign('add_stu.php?msg=Student Added Successfully')</script>";
        } else {
            echo "<script>window.location.assign('add_stu.php?msg=Student Roll No Already Exist!')</script>";
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