<?php
include("adminheader.php");
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.location.assign('adminlogin.php?msg=Login Yourself!!')</script>";
}
?>
<div class="all-title-box">
    <div class="container text-center">
        <h1>Manage Complaints<span class="m_1">"Empowering Voices, Inspiring Solutions: Campus Resolution Unleashed."</span></h1>
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
                <h3>Manage Complaints</h3>
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
                                            <th>Student</th>
                                            <th>Type</th>
                                            <th>description</th>
                                            <th>Subject</th>
                                            <th>Aonymous</th>
                                            <th>Any Information</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Assign Complaint</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include('config.php');
                                        $query = "SELECT * from `complaint`";
                                        $res_complaint = mysqli_query($conn, $query);
                                        $sno = 1;
                                        while ($data = mysqli_fetch_array($res_complaint)) {
                                            $status = $data['status'];
                                            $anonymous = $data['anonymous'];
                                        ?>
                                            <tr class="row_1 row_gray">
                                                <td>
                                                    <span><?php echo $sno; ?></span>
                                                </td>
                                                <?php
                                                if ($anonymous === 'Yes') {
                                                ?>
                                                    <td>
                                                        <span>Complaint is anonymous</span>
                                                    </td>
                                                <?php
                                                } else {
                                                    include('config.php');
                                                    $query = "SELECT * FROM `student` WHERE `email`='" . mysqli_real_escape_string($conn, $data['user']) . "'";
                                                    $res = mysqli_query($conn, $query);
                                                    $data1 = mysqli_fetch_array($res);
                                                ?>
                                                    <td>
                                                        <span><?php echo $data1['name'] . "<br>" . $data1['email'] . "<br>" . $data1['rollno'] . "<br>" . $data1['dept_name'] . "<br>" . $data1['course'] . "-" . $data1['semester'] . "<br>"; ?></span>
                                                    </td>
                                                <?php
                                                }
                                                ?>
                                                <td>
                                                    <span><?php echo $data['complaint_type']; ?></span>
                                                </td>
                                                <td>
                                                    <span><?php echo $data['description']; ?></span>
                                                </td>
                                                <td>
                                                    <span><?php echo $data['subject']; ?></span>
                                                </td>
                                                <td>
                                                    <span><?php echo $data['anonymous']; ?></span>
                                                </td>
                                                <td>
                                                    <span><?php echo $data['any_info']; ?></span>
                                                </td>
                                                <?php if ($data['attach_image'] == "") { ?>
                                                    <td>
                                                        <span>Image is not Attached</span>
                                                    </td>
                                                <?php } else {
                                                ?>
                                                    <td>
                                                        <span><img src="complaint_images/<?php echo $data['attach_image']; ?>" class="img-thumbnail" height="100px" width="100px"></span>
                                                    </td>
                                                <?php } ?>
                                                <td>
                                                    <span><?php echo $data['status']; ?></span>
                                                </td>
                                                <?php
                                                if ($status === 'Completed') {
                                                ?>
                                                    <td>
                                                        <span class="badge badge-success"><?php echo $data['status']; ?></span>
                                                    </td>
                                                <?php
                                                } else {
                                                ?>
                                                    <td>
                                                        <span> <a class="btn btn-success" href="assign_hod.php?id=<?php echo $data['id'] ?>">Assign</a>
                                                        </span>
                                                    </td>
                                                <?php
                                                }
                                                ?>

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