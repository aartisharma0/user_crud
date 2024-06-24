<?php
include_once 'admin_header.php';
//check session
if (isset($_SESSION['adminemail'])) {
    //store
    $email = $_SESSION['adminemail'];
} else {
    //url redirection
    echo "<script>window.location.assign('adminlogin.php?msg=Unauthenticated&status=error')</script>";
}
?>
<h1 class="text-center">Welcome Admin <?php echo $email;
//use session
?></h1>
<div class="container mt-5" >
    <div class="row">
        <div class="col-md-6 text-center"><div class="alert alert-info mx- 1 "> <a href='manage_categories.php' class="fs-3"> Manage Food Categories </a></div></div>
        <div class="col-md-6 text-center"><div class="alert alert-info mx-1 "> <a href='manage_items.php'class="fs-3"> Manage Food Items</a>  </div></div>
    </div>
    <div class="row">
        <div class="col-md-6 text-center"><div class="alert alert-info mx- 1 "> <a href='manage_donors.php'class="fs-3"> Manage Food Donors </a></div></div>
        <div class="col-md-6 text-center"><div class="alert alert-info mx-1 "> <a href='manage_recepients.php' class="fs-3"> Manage Food Receipients</a>  </div></div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center"><div class="alert alert-info mx- 1 "> <a href='manage_requests.php'class="fs-3"> Manage Food Requests </a></div></div>
        <!-- <div class="col-md-6 text-center"><div class="alert alert-info mx-1 dash-card"> <a> Manage Food Receipients</a>  </div></div> -->
    </div>
</div>

<?php include_once 'footer.php';
?>
