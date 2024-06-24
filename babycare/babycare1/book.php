<?php
include("header.php");
if (!isset($_SESSION['parent_email'])) {
    echo "<script>window.location.assign('parentlogin.php?msg=Login Yourself!!')</script>";
}
$emailp=$_SESSION['parent_email'];
$emailn=$_GET['nanny'];
if(!isset($_GET['nanny'])){
    echo "<script>window.location.assign('view_nannies.php?msg=Select Nanny First!!')</script>";

}
?>
<!-- Page Header End -->
<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">Booking</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Parent</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
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
            <h1 class="text-primary text-uppercase mb-2">Booking</h1>
        </div>
        <div class="row g-0 justify-content-center">
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                <div class="login-page">
                    <div class="login-title">
                        <div id="loginbox" class="loginbox">
                            <form method="post" name="login" onsubmit="return validateForm()">
                                <fieldset class="input">
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Date From</label>
                                        <input id="modlgn_username" type="date" name="datefrom" class="inputbox form-control" autocomplete="off" placeholder="Enter Date From" required>
                                    <div id="dateFromError" style="color: red;"></div>
                                    </p>
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Date To</label>
                                        <input id="modlgn_username" type="date" name="dateto" class="inputbox form-control" autocomplete="off" placeholder="Enter Date To " required>
                                    <div id="dateToError" style="color: red;"></div>


                                    </p>
                                    <div class=" row my-4">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-3">
                                            <button class="btn btn-primary w-100 " type="submit" name="add">Book</button>
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
    $pemail = $emailp;
    $nemail = $emailn;
    $datefrom = $_REQUEST['datefrom'];
    $dateto = $_REQUEST['dateto'];

        include('config.php');
        $query = "INSERT INTO `booking`( `parent_email`,`nanny_email`,`datefrom`,`dateto`) VALUES ('$pemail','$nemail','$datefrom','$dateto')";
        // echo $query;
        $res = mysqli_query($conn, $query);
        if ($res > 0) {
            echo "<script>window.location.assign('bookstatus.php?msg=Nanny Booked Successfully')</script>";
        } else {
            echo "<script>window.location.assign('book.php?msg=Error While Booking!')</script>";
        }
    }


?>
<script>
function validateForm() {
    var dateFrom = new Date(document.getElementById("modlgn_username").value);
    console.log(dateFrom);
    var dateTo = new Date(document.getElementById("modlgn_username").value); // Changed to "modlgn_username"

    var currentDate = new Date();

    if (dateFrom <= currentDate) {
        displayError("dateFromError", "Please select a date from today or later.");
        return false;
    } else {
        hideError("dateFromError");
    }

    if (dateTo < dateFrom) {
        displayError("dateToError", "Please select a date after the 'Date From'.");
        return false;
    } else {
        hideError("dateToError");
    }

    return true;
}

function displayError(elementId, message) {
    var errorElement = document.getElementById(elementId);
    if (errorElement) {
        errorElement.innerHTML = message; // Changed innerText to innerHTML
    }
}

function hideError(elementId) {
    var errorElement = document.getElementById(elementId);
    if (errorElement) {
        errorElement.innerHTML = ""; // Changed innerText to innerHTML
    }
}
</script>

