<?php
include("stuheader.php");
if (!isset($_SESSION['stu_email'])) {
    echo "<script>window.location.assign('studentlogin.php?msg=Login Yourself!!')</script>";
}
$email=$_SESSION['stu_email'];
?>
<div class="all-title-box">
    <div class="container text-center">
        <h1>Add Complaint<span class="m_1">"Empowering Voices, Inspiring Solutions: Campus Resolution Unleashed."</span></h1>
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
        <<div class="section-title text-center">
            <h3>Add Complaint</h3>
            <p class="lead">Dear students, your voices matter, loud and clear,
                If questions arise, don't hesitate, come near.
                We're here to assist, support, and guide,
                Every query, concern, we'll help you decide.

                No matter how big or small the case,
                Reach out to us, we'll embrace.
                Together, we'll find solutions bright,
                Making your academic journey take flight.

                Don't let doubts linger, don't delay,
                Contact us today, don't be astray.
                Your success and happiness are what we pursue,
                For every challenge, we're here, just for you.

                So, drop us a line, give us a call,
                Your questions, we'll help you forestall.
                Be it day or night, we're at your aid,
                Together, we'll conquer any shade.</p>
        </div><!-- end title -->

        <div class="row g-0 justify-content-center">
            <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.1s">
                <div class="login-page">
                    <div class="login-title">
                        <div id="loginbox" class="loginbox">
                            <form method="post" name="login" enctype="multipart/form-data" onsubmit="return validateForm()">
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
                                                <option value="<?php echo $d['dept_name'] ?>"><?php echo $d['dept_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Complaint Type</label>
                                        <select name="type" id="modlgn_username" class="inputbox form-control" autocomplete="off" required>
                                            <option selected disabled>Select Type</option>
                                            <option>Infrastructure Related</option>
                                            <option>Teacher Related</option>
                                            <option>Student Related</option>
                                            <option>Ragging Related</option>
                                            <option>Other</option>
                                        </select>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Student Email</label>
                                        <input id="modlgn_username" type="email" name="email" class="inputbox form-control" value="<?php echo $email?>" autocomplete="off" placeholder="Enter Email" required readonly>
                                    <div id="emailError" style="color: red;"></div>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Subject</label>
                                        <input id="modlgn_username" type="text" name="subject" class="inputbox form-control" autocomplete="off" placeholder="Enter Subject" required>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Description</label>
                                        <textarea name="description" cols="30" rows="1" id="modlgn_username" class="inputbox form-control" autocomplete="off" placeholder="Enter Description" required></textarea>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Any Information</label>
                                        <textarea name="anyinfo" cols="30" rows="1" id="modlgn_username" class="inputbox form-control" autocomplete="off" placeholder="Enter any other Information" required></textarea>
                                    </p>
                                    <p id="login-form-password">
                                        <label for="modlgn_passwd">Attach Image</label>
                                        <input id="modlgn_passwd" type="file" name="image" class="inputbox form-control" autocomplete="off" placeholder="Upload Logo">
                                    </p>
                                    <p id="login-form-username d-flex justify-content-start">
                                        <label for="modlgn_username">Anonymous</label>
                                        <div id="login-form-username d-flex justify-content-start">
                                            <input  type="radio" name="anynonmous" class=" justify-content-end" value="Yes" autocomplete="off" required><lable>Yes</lable>
                                            <input  type="radio" name="anynonmous" class=" justify-content-end" value="No" autocomplete="off"required><lable>No</lable>
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
    $type = $_REQUEST['type'];
    $department = $_REQUEST['department'];
    $email = $_REQUEST['email'];
    $subject = $_REQUEST['subject'];
    $des = $_REQUEST['description'];
    $anyinfo = $_REQUEST['anyinfo'];
    $anynonmous = $_REQUEST['anynonmous'];

    if ($_FILES['image']['name']) {
        $name = $_FILES['image']['name'];
        $tmp_path = $_FILES['image']['tmp_name'];
        $size = $_FILES['image']['size'];
        $ext = $_FILES['image']['type'];
        $new_name = rand() . "." . $name;
        move_uploaded_file($tmp_path, "complaint_images/" . $new_name);
    }else{
        $new_name="";
    }
        include('config.php');
        $query = "INSERT INTO `complaint`(`dept_name`,`complaint_type`, `description`, `subject`, `attach_image`, `anonymous`, `any_info`, `user`) VALUES ('$department','$type','$des','$subject','$new_name','$anynonmous','$anyinfo','$email')";
        // echo $query;
        $res = mysqli_query($conn, $query);
        if ($res > 0) {
            echo "<script>window.location.assign('add_comp.php?msg=Complaint Added Successfully')</script>";
        } else {
            echo "<script>window.location.assign('add_comp.php?msg=Error While Adding Complaint!')</script>";
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
        var letters = /^[A-Za-z]+\s[A-Za-z]+\.?$/;
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