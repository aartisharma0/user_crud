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
                    <h2>Comments</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->
<?php
if (isset($_REQUEST['msg'])) {
    echo "<div class='alert alert-info mt-4'>" . $_REQUEST['msg'] . '</div>';
}
?>
<div class='container-fluid p-5'>
    <div class="section-title row text-center">
        <div class="col-md-8 offset-md-2 mt-5 mb-5">
            <h3>Manage Enquiry</h3>
        </div>
    </div><!-- end title -->
    <div class='row'>
        <div class="col-md-2"></div>
        <div class='col-md-8 table-responsive'>
            <div class='table-responsive'>
                <table class='table table-bordered table-hover table-striped'>
                    <tr>
                        <th>SNo</th>
                        <th>User</th>
                        <th>Recipe</th>
                        <th>Comment</th>
                    </tr>
                    <?php
                    $sno = 1;
                    include('config.php');
                    $query = 'SELECT c.*, r.recipe_name FROM `comment` c JOIN `recipe` r ON c.recipe = r.id';
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<tr>';
                        echo '<td>' . $sno . '</td>';
                        echo '<td>' . $row['user_email'] . '</td>';
                        echo '<td>' . $row['recipe_name'] . '</td>';
                        echo '<td>' . $row['comment'] . '</td>';
                        echo '</tr>';
                        $sno++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include_once('footer.php');
?>