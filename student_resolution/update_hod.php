<?php
include("adminheader.php");
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.location.assign('adminlogin.php?msg=Login Yourself!!')</script>";
}
if (!isset($_GET['id'])) {
    echo "<script>window.location.assign('manage_dept.php?msg=Please Select Department First!!')</script>";
}

?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include('config.php');
    $query = "SELECT * from `hod` WHERE `id`=$id";
    $res = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($res);
}
?>
<div class="all-title-box">
    <div class="container text-center">
        <h1>Update HOD<span class="m_1">"Empowering Voices, Inspiring Solutions: Campus Resolution Unleashed."</span></h1>
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
                <h3>Update HOD</h3>
            </div>
        </div><!-- end title -->

        <div class="row g-0 justify-content-center">
            <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.1s">
                <div class="login-page">
                    <div class="login-title">
                        <div id="loginbox" class="loginbox">
                            <form method="post" name="login" enctype="multipart/form-data">
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
                                        <label for="modlgn_username">Name</label>
                                        <input id="modlgn_username" type="text" name="name" class="inputbox form-control" autocomplete="off" placeholder="Enter Hod Name" value="<?php echo $data['name'] ?>" required>
                                    <div id="nameError" style="color: red;"></div>

                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Email</label>
                                        <input id="modlgn_username" type="email" name="email" class="inputbox form-control" autocomplete="off" placeholder="Enter Hod Email"value="<?php echo $data['email'] ?>" required>
                                    <div id="emailError" style="color: red;"></div>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Password</label>
                                        <input id="modlgn_username" type="password" name="password" class="inputbox form-control" autocomplete="off" placeholder="Enter Password" required>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Contact</label>
                                        <input id="modlgn_username" type="number" name="contact" class="inputbox form-control" autocomplete="off" placeholder="Enter Contact" value="<?php echo $data['contact'] ?>" required>
                                    <div id="contactError" style="color: red;"></div>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Description</label>
                                        <textarea name="description" cols="30" rows="1" id="modlgn_username" class="inputbox form-control" autocomplete="off" placeholder="Enter Description" required><?php echo $data['description'] ?></textarea>

                                    </p>
                                    <p id="login-form-password">
                                        <label for="modlgn_passwd">Photo</label>
                                        <input id="modlgn_passwd" type="file" name="image" class="inputbox form-control" autocomplete="off" placeholder="Upload Logo" value="<?php echo $data['image'] ?>">
                                        <input id="modlgn_passwd" type="hidden" name="hidden_image" class="inputbox form-control" autocomplete="off" placeholder="Upload Logo" value="<?php echo $data['image'] ?>">
                                        <input id="modlgn_passwd" type="hidden" name="id" class="inputbox form-control" autocomplete="off" placeholder="Upload Logo" value="<?php echo $data['id'] ?>">
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
if(isset($_REQUEST['add'])){
    $id=$_REQUEST['id'];
    $dept_name=$_REQUEST['department'];
    $hname=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $password=md5($_REQUEST['password']);
    $contact=$_REQUEST['contact'];
    $des=$_REQUEST['description'];
    // $name=$_FILES['category_image'];
    // print_r($name);

    if(isset($_FILES['image'])){
        $img_name=$_REQUEST['hidden_image']; 
        if($_FILES['image']['name']){
        $name=$_FILES['image']['name'];
        $tmp_path=$_FILES['image']['tmp_name'];
        $size=$_FILES['image']['size'];
        $ext=$_FILES['image']['type'];
        $new_name=rand().".".$name;
        move_uploaded_file($tmp_path,"hod_images/".$new_name);
        }else{
            $new_name=$img_name;
        }
        include('config.php');
        $query = "UPDATE `hod` SET `dept_name`='$dept_name',`name`='$hname',`email`='$email',`password`='$password',`contact`='$contact',`description`='$des', `image`='$new_name' WHERE `id`='$id'";
        // echo $query;
        $res=mysqli_query($conn,$query);
        if($res>0){
            echo "<script>window.location.assign('manage_hod.php?msg=HOD Updated Successfully')</script>";
        }
        else{
            echo "<script>window.location.assign('manage_hod.php?msg=Error While Updation!!')</script>";
        }
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