<?php 
include("loginheader.php");
session_start();
?>

<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="img/page-bg/4.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="#">User</a>
				<span>Register</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->
<section class="contact-page spad ">
    <?php if(isset($_GET['msg'])){?>
            <div class="alert alert-danger alert-dismissible mt-5 " role="alert">
                <strong><?php echo $_GET['msg'];?></strong>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
            </div>
            <?php
                }
            ?>
	<div class="container">
        
			<div class="row mb-5">
				<div class="col-lg-12">
					<div class="contact-form-warp">
                    <div class="section-title text-white text-center">
							<h2>User Register</h2>
					</div>
                    <div class="login-page">
                        <div class="login-title">
                            <div id="loginbox" class="loginbox">
                                <form method="post"  onsubmit="return validateForm()" >
                                    <fieldset class="input">
                                        <h3 id="login-form-username">
                                            <label for="modlgn_username">Name</label>
                                            <input id="modlgn_username" type="text" name="name"
                                                class="inputbox form-control" autocomplete="off"
                                                placeholder="Enter Name " required>
                                        <div id="nameError" style="color: red;"></div>

                                        </h3>
                                        <h3 id="login-form-username">
                                            <label for="modlgn_username">Email</label>
                                            <input id="modlgn_username" type="email" name="email"
                                                class="inputbox form-control" autocomplete="off"
                                                placeholder="Enter Email Address" required>
                                        <div id="emailError" style="color: red;"></div>

                                        </h3>
                                        <h3 id="login-form-password">
                                            <label for="modlgn_passwd">Password</label>
                                            <input id="modlgn_passwd" type="password" name="password"
                                                class="inputbox form-control" autocomplete="off"
                                                placeholder="Enter Password" required>
                                        </h3>
                                        <h3 id="login-form-password">
                                            <label for="modlgn_passwd">Contact</label>
                                            <input id="modlgn_passwd" type="number" name="contact"
                                                class="inputbox form-control" autocomplete="off"
                                                placeholder="Enter Contact Number" required>
                                        <div id="contactError" style="color: red;"></div>
                                        </h3>
                                        <h3 id="login-form-password">
                                            <label for="modlgn_passwd">Qulification</label>
                                            <input id="modlgn_passwd" type="text" name="qualification"
                                                class="inputbox form-control" autocomplete="off"
                                                placeholder="Enter Your Qulification" required>
                                        </h3>
                                        <div class=" row my-4">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-3 d-flex justify-content-between">
                                                <button class="btn btn-light w-100"  type="submit" name="reg">Register</button><span><a href="userlogin.php" class="btn btn-light mx-3">Already Have An Account? Login</a></span>
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
if(isset($_REQUEST['reg'])){
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$contact=$_REQUEST['contact'];
	$qulaification=$_REQUEST['qualification'];
	$password=md5($_REQUEST['password']);
	include('config.php');
	$query="INSERT into `users` ( `name`, `email`, `password`, `contact`, `qualification`) values ('$name','$email','$password','$contact','$qulaification')";
    // echo $query;
	$res=mysqli_query($conn,$query);
	if($res>0){
		echo "<script>window.location.assign('userlogin.php?msg=Registered Successfully!!')</script>";
	}
	else{
		echo "<script>window.location.assign('userregister.php?msg=User Already Exists!')</script>";
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
