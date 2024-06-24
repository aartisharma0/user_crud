<?php
include_once('header.php');
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.location.assign('admin.php?msg=Login Yourself!!')</script>";
}
?>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-text text-center">
                    <h2>Enquiry</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->
<?php if (isset($_GET['msg'])) { ?>
                <div class="alert alert-primary alert-dismissible mt-4" role="alert">
                    <strong><?php echo $_GET['msg']; ?></strong>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                </div>
            <?php
            }
            ?>
<div class='container-fluid p-5'>
<div class="section-title row text-center">
        <div class="col-md-8 offset-md-2 mt-5 mb-5">
            <h3>Manage Enquiry</h3>
        </div>
    </div><!-- end title -->
    <div class='row'>
        <div class='col-md-2'></div>
        <div class='col-md-8 table-responsive'>
            
            <table class='table table-bordered table-hover table-striped'>
                <tr>
                    <th>SNo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>
                <?php
                $sno = 1;
                include('config.php');
                $query = 'SELECT * FROM `enquiry`';
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>';
                    echo '<td>' . $sno . '</td>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['subject'] . '</td>';
                    echo '<td>' . $row['message'] . '</td>';
                    echo '</tr>';
                    $sno++;
                }
                ?>
            </table>
        </div>
        <div class='col-md-2'></div>
    </div>
</div>

<?php
include_once('footer.php');
?>