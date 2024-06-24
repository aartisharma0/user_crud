<?php
include("adminheader.php");
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.location.assign('adminlogin.php?msg=Login Yourself!!')</script>";
}
if (!isset($_GET['id'])) {
    echo "<script>window.location.assign('manage_dept.php?msg=Please Select Item First!!')</script>";
}

?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include('config.php');
    $query = "SELECT * from `complaint` WHERE `id`=$id";
    $res = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($res);
}
?>
<div class="all-title-box">
    <div class="container text-center">
        <h1>Assign Complaint<span class="m_1">"Empowering Voices, Inspiring Solutions: Campus Resolution Unleashed."</span></h1>
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
                <h3>Assign Complaint</h3>
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
                                        <label for="modlgn_username">Hod</label>
                                        <select name="hod" id="modlgn_username" class="inputbox form-control" autocomplete="off" required>
                                            <option selected disabled value="">Select Hod</option>
                                            <?php
                                            include('config.php');
                                            $query = "SELECT * from `hod`";
                                            $res = mysqli_query($conn, $query);
                                            while ($da = mysqli_fetch_array($res)) {
                                            ?>
                                                <option value="<?php echo $da['email'] ?>"><?php echo $da['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </p>
                                    <div class=" row my-4">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-3">
                                            <button class="btn btn-secondary w-100 " type="submit" name="add">Assign</button>
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
if (isset($_REQUEST['add'])) {
    $id = $data['id'];
    $department = $_REQUEST['department'];
    $hod = $_REQUEST['hod'];
    $status = 'Assigned';
    
        include('config.php');
        $query = "UPDATE `complaint` SET `dept_name`='$department',`hod`='$hod',`status`='$status' WHERE `id`='$id'";
        // echo $query;
        $res = mysqli_query($conn, $query);
        if ($res > 0) {
            echo "<script>window.location.assign('manage_complaints.php?msg=Complaint Assigned Successfully')</script>";
        } else {
            echo "<script>window.location.assign('manage_complaints.php?msg=Error While Assinging!!')</script>";
        }
    }

?>