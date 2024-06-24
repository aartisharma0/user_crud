<?php
include("header.php");
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.location.assign('adminlogin.php?msg=Login Yourself!!')</script>";
}
?>
<!-- Page Header End -->
<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">Manage Nanny</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Manage Nanny</li>
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
    <div class="container-fluid">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="text-primary text-uppercase mb-2">Manage Nanny</h1>
        </div>
        <div class="row g-0 justify-content-center">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-0 justify-content-center">
                    <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="row mb-5 d-flex justify-content-around">
                            <div class="container-fluid my-5 table-responsive newone" id="welcome">
                                <table class="timetable table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr.No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Qualification</th>
                                            <th>Adhar Card Number</th>
                                            <th>Pan Card Number</th>
                                            <th>Date Of Birth</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                            <th>Photo</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include('config.php');
                                        $query = "SELECT * from `nanny`";
                                        $res = mysqli_query($conn, $query);
                                        $sno = 1;
                                        while ($data = mysqli_fetch_array($res)) {
                                        ?>
                                            <tr class="row_1 row_gray">
                                                <td>
                                                    <span><?php echo $sno; ?></span>
                                                </td>
                                                <td>
                                                    <span><?php echo $data['name']; ?></span>
                                                </td>
                                                <td>
                                                    <span><?php echo $data['email']; ?></span>
                                                </td>
                                                <td>
                                                    <span><?php echo $data['contact']; ?></span>
                                                </td>
                                                <td>
                                                    <span><?php echo $data['qualification']; ?></span>
                                                </td>
                                                <td>
                                                    <span><?php echo $data['adharcard_id']; ?></span>
                                                </td>
                                                <td>
                                                    <span><?php echo $data['pan_id']; ?></span>
                                                </td>
                                                <td>
                                                    <span><?php echo $data['dob']; ?></span>
                                                </td>
                                                <td>
                                                    <span><?php echo $data['gender']; ?></span>
                                                </td>
                                                <td>
                                                    <span><?php echo $data['address']; ?></span>
                                                </td>
                                                <td>
                                                <span><img src="nanny_images/<?php echo $data['image']; ?>" class="img-thumbnail" height="100px" width="100px"></span>

                                                </td>
                                                <td>
                                                    <a class="btn btn-success" href="update_nanny.php?id=<?php echo $data['id'] ?>"><i class="fa fa-edit"></i></a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-danger" href="delete_nanny.php?id=<?php echo $data['id'] ?>"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            $sno = $sno + 1;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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
