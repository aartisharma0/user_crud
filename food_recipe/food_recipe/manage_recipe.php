<?php
include_once('header.php');
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.location.assign('admin.php?msg=Login Yourself!!')</script>";
}
?>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb2.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-text text-center">
                    <h2>Recipe</h2>
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
<div class='container-fluid p-5 my-5'>
    <div class="section-title row text-center">
        <div class="col-md-8 offset-md-2 mt-5 mb-5">
            <h3>Manage Recipe</h3>
        </div>
    </div><!-- end title -->
    <div class='row'>
        <div class='col-md-12'>
            <div class="table-responsive">
                <table class='table table-bordered table-hover table-striped'>
                    <tr>
                        <th>SNo</th>
                        <th>Category</th>
                        <th>Recipe Name</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Preparation Time</th>
                        <th>No of servings</th>
                        <th>Thumbnail</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    <?php
                    $sno = 1;
                    include('config.php');
                    $query = 'SELECT * FROM `recipe`';
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<tr>';
                        echo '<td>' . $sno . '</td>';
                        echo '<td>' . $row['category'] . '</td>';
                        echo '<td>' . $row['recipe_name'] . '</td>';
                        echo '<td>' . $row['type'] . '</td>';
                        echo '<td>' . $row['description'] . '</td>';
                        echo '<td>' . $row['time'] . '</td>';
                        echo '<td>' . $row['serving'] . '</td>';
                        echo '<td><img src="product/' . $row['image'] . '" width="150px"></td>';
                        echo '<td><center><a href="edit_recipe.php?id=' . $row['id'] . '"><i class="fa fa-edit text-success "></i></a></center></td>';
                        echo '<td><center><a href="delete_recipe.php?id=' . $row['id'] . '"><i class="fa fa-trash text-danger "></i></a></center></td>';
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
