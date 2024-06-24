<?php
include("userheader.php");
if(!isset($_SESSION['user_email']))
{
    // $email=$_SESSION['user_email'];
    echo "<script>window.location.assign('userlogin.php?msg=Login Yourself!!')</script>";
}  
// $email=$_SESSION['user_email'];
// echo $email;
?>
    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Booking</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Booking</li>
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
                <h1 class="text-primary text-uppercase mb-2">Booking</h1>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                <div class="login-page">
                    <div class="login-title">
                        <div id="loginbox" class="loginbox">
                        <?php
                     if($_SESSION['user_email']){
                        $email=$_SESSION['user_email'];
                        include('config.php');
                        $query="SELECT * from `user` WHERE `email`='$email'";
                        $res=mysqli_query($conn,$query);
                        $data1=mysqli_fetch_array($res);
                    }
                ?>
                        <?php
                        if(isset($_REQUEST['pho']) & isset($_REQUEST['theme'])){
                            $email=$_REQUEST['pho'];
                            $tittle=$_REQUEST['theme'];
                            include('config.php');
                            $query="Select * from `work` where `photographer_email`='$email' and `tittle`='$tittle'";
                            $result=mysqli_query($conn,$query);
                            $data=mysqli_fetch_array($result); 
                        }  
                        ?>
                            <form method="post" onsubmit="return validateForm()">
                                <fieldset class="input">
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Name</label>
                                        <input id="nameInput" type="text" name="name"
                                            class="inputbox form-control" autocomplete="off" value="<?php echo $data1['name'] ?>" 
                                            placeholder="Enter Name" required>
                                        <div id="nameError" style="color: red;"></div>
                                    </p>
                                    <p id="login-form-username">
                                        <!-- <label for="modlgn_username">Email</label> -->
                                        <input id="emailInput" type="hidden" name="email"
                                            class="inputbox form-control" autocomplete="off" value="<?php echo $data1['email'] ?>" 
                                            placeholder="Enter Email Address" required>
                                        <div id="emailError" style="color: red;"></div>
                                    </p>
                                    <p id="login-form-password">
                                        <label for="modlgn_passwd">Contact</label>
                                        <input id="contactInput" type="number" name="contact" value="<?php echo $data1['contact'] ?>" 
                                            class="inputbox form-control" autocomplete="off"
                                            placeholder="Enter Contact" required>
                                        <div id="contactError" style="color: red;"></div>
                                    </p>
                                    <p id="login-form-password">
                                        <label for="modlgn_passwd">Address</label>
                                        <textarea id="modlgn_passwd" class="inputbox form-control" autocomplete="off" rows="1" cols="110" 
                                            name="address" placeholder="Enter Your Address" required><?php echo $data1['address'] ?></textarea>
                                    </p>
                                    <p id="login-form-username">
                                        <!-- <label for="modlgn_username">Photographer Email</label> -->
                                        <input id="emailInput" type="hidden" name="emails"
                                            class="inputbox form-control" autocomplete="off" value="<?php echo $data['photographer_email'] ?>" 
                                            placeholder="Enter Email Address" required>
                                        <div id="emailError" style="color: red;"></div>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Theme</label>
                                        <input id="modlgn_username" type="text" name="theme"
                                            class="inputbox form-control" autocomplete="off" value="<?php echo $data['tittle'] ?>" 
                                            placeholder="Enter Email Address" required>
                                        <div id="emailError" style="color: red;"></div>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Date</label>
                                        <input type="date" id="dateInput" name="date" 
                                            class="inputbox form-control" autocomplete="off"
                                            placeholder="Enter Email Address" required>
                                        <div id="dateError" style="color: red;"></div>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Time</label>
                                        <input id="modlgn_username" type="time" name="time"
                                            class="inputbox form-control" autocomplete="off"
                                            placeholder="Enter Time" required>
                                        <div id="emailError" style="color: red;"></div>
                                    </p>
                                    <div class="row my-4">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-6  d-flex justify-content-around">
                                            <button class="btn btn-primary " type="submit" name="book">Book</button>
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
if(isset($_REQUEST['book'])){
    $email=$_SESSION['user_email'];
    // echo $email; 
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $price = $data['price'];
    $contact = $_REQUEST['contact'];
    $address = $_REQUEST['address'];
    $pho = $_REQUEST['emails'];
    $date = $_REQUEST['date'];
    $theme = $_REQUEST['theme'];
    $time = $_REQUEST['time'];
    include('config.php');
    $query = "INSERT into `booking`(`user_name`, `user_email`,`user_contact`, `user_address`,`photographer`,`theme`,`price`,`time`,`date`)VALUES('$name','$email','$contact','$address','$pho','$theme','$price','$time','$date')";
    $res = mysqli_query($conn, $query);
    // echo $query;
    if($res > 0) {
        include('config.php');
        echo "<script>window.location.assign('order.php?msg=Photographer Booked Successfully!!')</script>";
    } else {
        echo "<script>window.location.assign('bookit.php?msg=Error While Booking!')</script>";
    }
}
?>
<script>
function validateForm() {
  var name = document.getElementsByName("name")[0].value;
  var email = document.getElementsByName("email")[0].value;
  var contact = document.getElementsByName("contact")[0].value;
  var selectedDate = new Date(document.getElementById("dateInput").value);
  var currentDate = new Date();

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

  // Validate date
  if (selectedDate <= currentDate) {
    displayError("dateInput", "dateError", "Selected date is invalid. Please choose a date on or after today.");
    return false;
  } else {
    hideError("dateError");
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
