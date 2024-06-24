<?php
include("header.php");
if (!isset($_SESSION['nanny_email'])) {
    echo "<script>window.location.assign('nannylogin.php?msg=Login Yourself!!')</script>";
}
?>

<?php
if (isset($_SESSION['nanny_email'])) {
    $email = $_SESSION['nanny_email'];
    include('config.php');
    $query = "SELECT * from `nanny` WHERE `email`='$email'";
    $res = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($res);
}
?>
<style>
    .gradient-custom {
        /* fallback for old browsers */
        background: #f6d365;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
    }
</style>
<!-- Page Header End -->
<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">Profile</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Nanny</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Profile</li>
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
            <h1 class="text-primary text-uppercase mb-5">Profile</h1>
        </div>
        <div class="row g-0 justify-content-center">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <section class="vh-100" style="background-color: #f4f5f7;">
                    <div class="container h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col col-lg-8 mb-4 mb-lg-0">
                                <div class="card mb-3" style="border-radius: .5rem;">
                                    <div class="row g-0">
                                        <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                            <img src="nanny_images/<?php echo $data['image']; ?>" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                            <h5><?php echo $data['name'] ?></h5>
                                            <a href="update_profile.php" class="btn"><i class="far fa-edit mb-5"></i></a>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body p-4">
                                                <h6>Information</h6>
                                                <hr class="mt-0 mb-4">
                                                <div class="row pt-1">
                                                    <div class="col-6 mb-3">
                                                        <h6>Email</h6>
                                                        <p class="text-muted"><?php echo $data['email'] ?></p>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <h6>Phone</h6>
                                                        <p class="text-muted"><?php echo $data['contact'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row pt-1">
                                                    <div class="col-6 mb-3">
                                                        <h6>D.O.B</h6>
                                                        <p class="text-muted"><?php echo $data['dob'] ?></p>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <h6>Gender</h6>
                                                        <p class="text-muted"><?php echo $data['gender'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row pt-1">
                                                    <div class="col-6 mb-3">
                                                        <h6>Adhar Card</h6>
                                                        <p class="text-muted"><?php echo $data['adharcard_id'] ?></p>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <h6>Pan Card</h6>
                                                        <p class="text-muted"><?php echo $data['pan_id'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row pt-1">
                                                    <div class="col-10 mb-3">
                                                        <h6>Qualification</h6>
                                                        <p class="text-muted"><?php echo $data['qualification'] ?></p>
                                                    </div>
                                                </div>
                                                <h6>Address</h6>
                                                <hr class="mt-0 mb-4">
                                                <div class="row pt-1">
                                                    <div class="col-10 mb-3">
                                                        <p class="text-muted"><?php echo $data['address'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
<?php
include("footer.php");
?>