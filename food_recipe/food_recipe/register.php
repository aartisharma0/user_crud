<?php

include('header.php');
?>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-text text-center">
                    <h2>User Register</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->
<div class="ads-grid_shop p-5">
    <div class="shop_inner_inf">
        <?php
        if (isset($_GET['msg'])) {
        ?>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 mt-5">
                    <div class="alert alert-primary alert-dismissible " role="alert">
                        <strong><?php echo $_GET['msg'] ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="inner_section_w3ls">
            <div class="container">
                <div class="section-title row text-center">
                    <div class="col-md-8 offset-md-2 mt-5 mb-5">
                        <h3>Register</h3>
                    </div>
                </div><!-- end title -->
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 contact_grid_right">
                        <form method="post" onsubmit="return validateForm()">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" required>
                                    <div id="nameError" style="color: red;"></div>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Contact</label>
                                <div class="col-sm-10">
                                    <input type="text" name="contact" pattern="[6-9]{1}[0-9]{9}" class="form-control" required>
                                    <div id="contactError" style="color: red;"></div>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Email address</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" required>
                                    <div id="nameError" style="color: red;"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">City</label>
                                <div class="col-sm-10">
                                    <input type="text" name="city" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">State</label>
                                <div class="col-sm-10">
                                    <input type="text" name="state" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Pincode</label>
                                <div class="col-sm-10">
                                    <input type="number" name="pincode" class="form-control" required>
                                    <div id="pincodeError" style="color: red;"></div>

                                </div>
                            </div>
                            <center>
                                <button type="submit" name="login" class="btn btn-primary my-4">Submit</button>
                            </center>
                        </form>
                        <div class="account">
                            <p class="text-center">Already have an Account ?<br><a href="user_login.php">Login to Your Account</a></p>
                        </div>

                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

        </div>
    </div>
    <?php
    include('footer.php');
    ?>
    <?php
    if (isset($_REQUEST['login'])) {
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $password = md5($_REQUEST['password']);
        $contact = $_REQUEST['contact'];
        $city = $_REQUEST['city'];
        $state = $_REQUEST['state'];
        $pincode = $_REQUEST['pincode'];
        include('config.php');
        $query = "INSERT INTO `create_account`(`user_name`, `user_email`, `password`, `contact`, `city`, `state`, `pincode`) VALUES ('$name','$email','$password','$contact','$city','$state','$pincode')";
        // echo $query;
        $res = mysqli_query($conn, $query);
        if ($res > 0) {
            echo "<script>window.location.assign('user_login.php?msg=User Registered Successfully')</script>";
        } else {
            echo "<script>window.location.assign('register.php?msg=User Already Exists.')</script>";
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
            var pincode = document.getElementById("pincode").value;
            if (!/^[1-9][0-9]{5}$/.test(pincode)) {
                document.getElementById("pincodeError").textContent = "Invalid pincode.";
                valid = false;
            } else {
                document.getElementById("pincodeError").textContent = "";
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