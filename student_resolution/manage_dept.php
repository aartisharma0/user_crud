<?php
include("adminheader.php");
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.location.assign('adminlogin.php?msg=Login Yourself!!')</script>";
}
?>

<div class="all-title-box">
    <div class="container text-center">
        <h1>Manage Department<span class="m_1">"Empowering Voices, Inspiring Solutions: Campus Resolution Unleashed."</span></h1>
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
                <h3>Manage Department</h3>
            </div>
        </div><!-- end title -->

        <div class="row g-0 justify-content-center">
            <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-0 justify-content-center">
                    <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="row mb-5 d-flex justify-content-around">
                            <div class="container my-5 table-responsive newone" id="welcome">
                                <table class="timetable table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr.No.</th>
                                            <th>Department Name</th>
                                            <th>Department Image</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include('config.php');
                                        $query = "SELECT * from `department`";
                                        $res = mysqli_query($conn, $query);
                                        $sno = 1;
                                        while ($data = mysqli_fetch_array($res)) {
                                        ?>
                                            <tr class="row_1 row_gray">
                                                <td>
                                                    <span><?php echo $sno; ?></span>
                                                </td>
                                                <td>
                                                    <span><?php echo $data['dept_name']; ?></span>
                                                </td>
                                                <td>
                                                    <span><img src="dept_images/<?php echo $data['logo']; ?>" class="img-thumbnail" height="100px" width="100px"></span>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success" href="update_dept.php?id=<?php echo $data['id'] ?>"><i class="fa fa-edit"></i></a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-danger" href="delete_dept.php?id=<?php echo $data['id'] ?>"><i class="fa fa-trash"></i></a>
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