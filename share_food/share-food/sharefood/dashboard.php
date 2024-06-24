<?php
include_once 'header.php';
//check session
if (isset($_SESSION['useremail'])) {
    //store
    $email = $_SESSION['useremail'];
} else {
    //url redirection
    echo "<script>window.location.assign('adminlogin.php?msg=Unauthenticated&status=error')</script>";
}
?>
<h1 class="text-center">Welcome <?php echo $email;
//use session
?></h1>
<!-- <div class="container mt-5" >
    <div class="row">
        <div class="col-md-6 text-center"><div class="alert alert-info mx- 1 dash-card"> <a href='manage_categories.php'> Manage Food Categories </a></div></div>
        <div class="col-md-6 text-center"><div class="alert alert-info mx-1 dash-card"> <a href='manage_items.php'> Manage Food Items</a>  </div></div>
    </div>
    <div class="row">
        <div class="col-md-6 text-center"><div class="alert alert-info mx- 1 dash-card"> <a href='manage_donors.php'> Manage Food Donors </a></div></div>
        <div class="col-md-6 text-center"><div class="alert alert-info mx-1 dash-card"> <a href='manage_recepients.php' > Manage Food Receipients</a>  </div></div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center"><div class="alert alert-info mx- 1 dash-card"> <a href='manage_requests.php'> Manage Food Requests </a></div></div>
        <!-- <div class="col-md-6 text-center"><div class="alert alert-info mx-1 dash-card"> <a> Manage Food Receipients</a>  </div></div> -->
    </div> -->
</div>

<?php include_once 'footer.php';
?>
