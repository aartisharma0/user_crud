<?php
include("stuheader.php");
if (!isset($_SESSION['stu_email'])) {
    echo "<script>window.location.assign('studentlogin.php?msg=Login Yourself!!')</script>";
}
$email = $_SESSION['stu_email'];
?>
<div class="all-title-box">
    <div class="container text-center">
        <h1>Track Complaints Status<span class="m_1">"Empowering Voices, Inspiring Solutions: Campus Resolution Unleashed."</span></h1>
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
            <h3>Track Complaints Status</h3>
        </div>
    </div><!-- end title -->

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
                                        <th>Type</th>
                                        <th>Subject</th>
                                        <th>Description</th>
                                        <th>Anonymous</th>
                                        <th>Any Information</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include('config.php');
                                    $query = "SELECT * from `complaint` where `user`='$email'";
                                    $res = mysqli_query($conn, $query);
                                    $sno = 1;
                                    while ($data = mysqli_fetch_array($res)) {
                                    ?>
                                        <tr class="row_1 row_gray">
                                            <td>
                                                <span><?php echo $sno; ?></span>
                                            </td>
                                            <td>
                                                <span><?php echo $data['complaint_type']; ?></span>
                                            </td>
                                            <td>
                                                <span><?php echo $data['subject']; ?></span>
                                            </td>
                                            <td>
                                                <span><?php echo $data['description']; ?></span>
                                            </td>
                                            <td>
                                                <span><?php echo $data['anonymous']; ?></span>
                                            </td>
                                            <td>
                                                <span><?php echo $data['any_info']; ?></span>
                                            </td>
                                            <td>
                                                <?php if ($data['attach_image'] === '') { ?>
                                                    <span>Image is not attached</span>

                                                <?php } else { ?>
                                                    <span><img src="complaint_images/<?php echo $data['attach_image']; ?>" class="img-thumbnail" height="100px" width="100px"></span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <span class="badge badge-success"><?php echo $data['status']; ?></span>
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
</div><!-- end container -->
</div><!-- end section -->
<?php
include("footer.php");
?>