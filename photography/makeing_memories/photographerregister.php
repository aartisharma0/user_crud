<?php
include("loginheader.php");
?>
 <!-- Header Start -->
 <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Register</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item active"><a href="photographerlogin.php">Photographer</a></li>
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
    <?php if(isset($_GET['msg'])){?>
        <div class="alert alert-danger alert-dismissible " role="alert">
            <strong><?php echo $_GET['msg'];?></strong>
            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
        </div>
        <?php
            }
        ?>
<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h3 class="text-primary text-uppercase mb-2">Photographer Register</h3>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                <div class="login-page">
                    <div class="login-title">
                        <div id="loginbox" class="loginbox">
                            <form method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
                                <fieldset class="input">
                                    <p>
                                        <label for="nameInput">Name</label>
                                        <input id="nameInput" type="text" name="name"
                                            class="inputbox form-control" autocomplete="off"
                                            placeholder="Enter Name" required>
                                        <div id="nameError" style="color: red;"></div>
                                    </p>
                                    <p>
                                        <label for="emailInput">Email</label>
                                        <input id="emailInput" type="text" name="email"
                                            class="inputbox form-control" autocomplete="off"
                                            placeholder="Enter Email Address" required>
                                        <div id="emailError" style="color: red;"></div>
                                    </p>
                                    <p>
                                        <label for="passwordInput">Password</label>
                                        <input id="passwordInput" type="password" name="password"
                                            class="inputbox form-control" autocomplete="off"
                                            placeholder="Enter Password" required>
                                    </p>
                                    <p>
                                        <label for="contactInput">Contact</label>
                                        <input id="contactInput" type="number" name="contact"
                                            class="inputbox form-control" autocomplete="off"
                                            placeholder="Enter Contact" required>
                                        <div id="contactError" style="color: red;"></div>
                                    </p>
                                    <p>
                                        <label for="imagInput">Photo</label>
                                        <input  type="file" name="pho_image"
                                            class="form-control"
                                            placeholder="Enter imag" required>
                                    </p>
                                    <p>
                                        <label for="addressInput">Address</label>
                                        <textarea id="addressInput" class="inputbox form-control" autocomplete="off" rows="1" cols="83"
                                            name="address" placeholder="Enter Your Address" required></textarea>
                                    </p>
                                    <p>
                                        <label for="aboutInput">About</label>
                                        <textarea id="aboutInput" class="inputbox form-control" autocomplete="off" rows="1" cols="83"
                                            name="about" placeholder="Enter About Yourself" required></textarea>
                                    </p>
                                    <div class="row my-4">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-6 d-flex justify-content-around">
                                            <button class="btn btn-primary" type="submit" name="reg">Register</button>
                                            <span class="mt-2"><a href="photographerlogin.php">Already Registered? Login</a></span>
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
    $about = $_REQUEST['about'];
    if(isset($_FILES['pho_image'])){
        $pho_name=$_FILES['pho_image']['name'];
        print_r($pho_name);
        $tmp_path=$_FILES['pho_image']['tmp_name'];
        $size=$_FILES['pho_image']['size'];
        $ext=$_FILES['pho_image']['type'];
        $new_name=rand().".".$pho_name;
        move_uploaded_file($tmp_path,"pho_images/".$new_name);
    include('config.php');
    $query = "INSERT into `photographer`(`name`, `email`, `password`, `contact`, `address`,`description`,`image`)VALUES('$name','$email','$password','$contact','$address','$about','$new_name')";
    echo $query;
    $res = mysqli_query($conn, $query);
    if($res > 0) {
        include('config.php');
        echo "<script>window.location.assign('photographerlogin.php?msg=Registered Successfully!!')</script>";
    } else {
        echo "<script>window.location.assign('photographerregister.php?msg=Invalid Email or Password!')</script>";
    }
}
}
?>
<script>
function validateForm() {
   var name = document.getElementById("nameInput").value;
    var email = document.getElementById("emailInput").value;
    var contact = document.getElementById("contactInput").value;

    // Validate name
    if (name.trim() === "") {
        displayError("nameError", "Please enter your name.");
        return false;
    } else if (!isAlphabetic(name)) {
        displayError("nameError", "Please enter alphabetic characters only.");
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
    if (contact.trim() === "") {
        displayError("contactError", "Please enter your contact number.");
        return false;
    } else if (!validateContact(contact)) {
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

function validateContact(contact) {
    var pattern = /^(\+?91|0)?[6789]\d{9}$/;
    return pattern.test(contact);
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
