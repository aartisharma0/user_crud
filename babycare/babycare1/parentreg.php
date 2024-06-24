<?php
include("header.php");
?>
<!-- Page Header End -->
<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">Register Parent</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Parent</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Registeration</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
<?php if (isset($_GET['msg'])) { ?>
    <div class="alert alert-primary alert-dismissible " role="alert">
        <strong><?php echo $_GET['msg']; ?></strong>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
    </div>
<?php
}
?>
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="text-primary text-uppercase mb-2">Register</h1>
        </div>
        <div class="row g-0 justify-content-center">
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                <div class="login-page">
                    <div class="login-title">
                        <div id="loginbox" class="loginbox">
                            <form method="post" name="login" onsubmit=" return validateForm()"  >
                                <fieldset class="input">
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Name</label>
                                        <input id="modlgn_username" type="text" name="name" class="inputbox form-control" autocomplete="off" placeholder="Enter Name" required>
                                    <div id="nameError" style="color: red;"></div>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Email</label>
                                        <input id="modlgn_username" type="email" name="email" class="inputbox form-control" autocomplete="off" placeholder="Enter Email Address" required>
                                    <div id="emailError" style="color: red;"></div>

                                    </p>
                                    <p id="login-form-password">
                                        <label for="modlgn_passwd">Password</label>
                                        <input id="modlgn_passwd" type="password" name="pwd" class="inputbox form-control" autocomplete="off" placeholder="Enter Password" required>
                                    </p>
                                    <p id="login-form-password">
                                        <label for="modlgn_passwd">Contact</label>
                                        <input id="modlgn_passwd" type="number" name="contact" class="inputbox form-control" autocomplete="off" placeholder="Enter Contact" required>
                                    <div id="contactError" style="color: red;"></div>

                                    </p>
                                    <p id="login-form-password">
                                        <label for="modlgn_passwd">Address</label>
                                        <textarea id="aboutInput" class="inputbox form-control" autocomplete="off" rows="1" cols="83" name="address" placeholder="Enter Your Address" required></textarea>
                                    </p>
                                    <p id="login-form-password">
                                        <label for="modlgn_passwd">Gender</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                        <input id="modlgn_passwd" type="radio" name="gender" value="Male" class="mt-2" autocomplete="off" required>
                                        <label for="modlgn_passwd">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input id="modlgn_passwd" type="radio" name="gender" value="Female" class="mt-2" autocomplete="off" required>
                                        <label for="modlgn_passwd">Female</label>

                                    </p>
                                    <p id="login-form-password">
                                        <label for="modlgn_passwd">Adharcard Number</label>
                                        <input id="modlgn_passwd" type="number" name="adhar" class="inputbox form-control" autocomplete="off" placeholder="Enter Adhar Card Number" required>
                                        <div id="adharError" style="color: red;"></div>

                                    </p>
                                    <p id="login-form-password">
                                        <label for="modlgn_passwd">Pan Card Number</label>
                                        <input id="modlgn_passwd" type="text" name="pan" class="inputbox form-control" autocomplete="off" placeholder="Enter Pan Card Number" required>
                                        <div id="panError" style="color: red;"></div>

                                    </p>
                                    <div class=" row my-4">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-3">
                                            <button class="btn btn-primary w-100 " type="submit" name="add">Register</button>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <span class="d-flex justify-content-center"><a href="parentlogin.php">Already have an Account? Login</a></span>
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
<!-- About End -->
<?php
include("footer.php");
?>
<?php
if (isset($_REQUEST['add'])) {
    $hname = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $pwd = md5($_REQUEST['pwd']);
    $contact = $_REQUEST['contact'];
    $address = $_REQUEST['address'];
    $gender = $_REQUEST['gender'];
    $adhar = $_REQUEST['adhar'];
    $pan = $_REQUEST['pan'];
        include('config.php');
        $query = "INSERT INTO `parent`( `name`,`email`,`password`,`contact`,`address`,`gender`,`adharcard_id`,`pan_id`) VALUES ('$hname','$email','$pwd','$contact','$address','$gender','$adhar','$pan')";
        // echo $query;
        $res = mysqli_query($conn, $query);
        // echo $res;

        if ($res > 0) {
            echo "<script>window.location.assign('parentlogin.php?msg=Register Successfully')</script>";
        } else {
            echo "<script>window.location.assign('parentreg.php?msg=Email Already Exist!')</script>";
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
            // Validate Aadhaar Card number
    var adhar = document.getElementsByName("adhar")[0].value;
    if (!validateAadhar(adhar)) {
        displayError("adharError", "Please enter a valid Aadhaar Card number.");
        return false;
    } else {
        hideError("adharError");
    }

    var pan = document.getElementsByName("pan")[0].value;
    if (!validatePan(pan)) {
        displayError("panError", "Please enter a valid Pan Card number.");
        return false;
    } else {
        hideError("panError");
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
    function validateAadhar(adhar) {
    var pattern = /^\d{12}$/;
    return pattern.test(adhar);
}

function validatePan(pan) {
    var pattern = /^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/;
    return pattern.test(pan);
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