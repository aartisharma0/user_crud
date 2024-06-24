<?php
include("userheader.php");
?>
 <!-- Header Start -->
 <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Register</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item active"><a href="userlogin.php">User</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white p-3 w-100" src="img/hero-1.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white p-3 w-100" src="img/hero-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="text-primary text-uppercase mb-2">User Register</h1>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                <div class="login-page">
                    <div class="login-title">
                        <div id="loginbox" class="loginbox">
                            <form method="post" onsubmit="return validateForm()">
                                <fieldset class="input">
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Name</label>
                                        <input id="modlgn_username" type="text" name="name"
                                            class="inputbox form-control" autocomplete="off"
                                            placeholder="Enter Name" required>
                                        <div id="nameError" style="color: red;"></div>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Email</label>
                                        <input id="modlgn_username" type="text" name="email"
                                            class="inputbox form-control" autocomplete="off"
                                            placeholder="Enter Email Address" required>
                                        <div id="emailError" style="color: red;"></div>
                                    </p>
                                    <p id="login-form-password">
                                        <label for="modlgn_passwd">Password</label>
                                        <input id="modlgn_passwd" type="password" name="password"
                                            class="inputbox form-control" autocomplete="off"
                                            placeholder="Enter Password" required>
                                    </p>
                                    <p id="login-form-password">
                                        <label for="modlgn_passwd">Contact</label>
                                        <input id="modlgn_passwd" type="number" name="contact"
                                            class="inputbox form-control" autocomplete="off"
                                            placeholder="Enter Contact" required>
                                        <div id="contactError" style="color: red;"></div>
                                    </p>
                                    <p id="login-form-password">
                                        <label for="modlgn_passwd">Address</label>
                                        <textarea id="modlgn_passwd" class="inputbox form-control" autocomplete="off" rows="1" cols="110"
                                            name="address" placeholder="Enter Your Address" required></textarea>
                                    </p>
                                    <div class="row my-4">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-6  d-flex justify-content-around">
                                            <button class="btn btn-primary " type="submit" name="reg">Register</button>
                                            <span class="mt-2"><a href="userlogin.php">Already Registered? Login</a></span>
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

<?php
include("footer.php");
?>
<?php
if(isset($_REQUEST['reg'])){
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = md5($_REQUEST['password']);
    $contact = $_REQUEST['contact'];
    $address = $_REQUEST['address'];
    include('config.php');
    $query = "INSERT into `user`(`name`, `email`, `password`,`contact`, `address`)VALUES('$name','$email','$password','$contact','$address')";
    $res = mysqli_query($conn, $query);
    if($res > 0) {
        include('config.php');
        echo "<script>window.location.assign('userlogin.php?msg=Registered Successfully!!')</script>";
    } else {
        echo "<script>window.location.assign('userregister.php?msg=User Already Registered!')</script>";
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
