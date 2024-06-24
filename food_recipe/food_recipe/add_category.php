<?php
include_once("header.php");
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
                    <h2>Category</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->
<?php
            if (isset($_REQUEST["msg"])) {
                echo "<div class='alert alert-info mt-4'>" . $_REQUEST["msg"] . "</div>";
            }
            ?>
<div class='container-fluid p-5'>
    <div class="section-title row text-center">
        <div class="col-md-8 offset-md-2 mt-5 mb-5">
            <h3>Add Category</h3>
        </div>
    </div><!-- end title -->
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <!-- <h4 class="text-dark text-center text-bold py-3">Add Category</h4> -->
           
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Category Name</label>
                    <input type="text" name="category_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="category_image" class="form-control" required>
                </div>
                <center>
                    <button type="submit" class="btn btn-primary my-2" name="submit">Submit</button>
                </center>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php
include_once("footer.php")
?>

<?php
if (isset($_REQUEST["submit"])) {
    $category_name = $_REQUEST["category_name"];

    $file_name = $_FILES['category_image']['name'];
    $file_temp = $_FILES['category_image']['tmp_name'];

    $new_name = rand() . $file_name;
    move_uploaded_file($file_temp, "category/" . $new_name);

    include("config.php");
    $query = "INSERT INTO `category`( `category_name`, `category_image`, `status`) VALUES ('$category_name', '$new_name', 'ACTIVE')";
    $result = mysqli_query($conn, $query);
    if ($result > 0) {
        echo "<script>window.location.assign('add_category.php?msg=Category Added')</script>";
    } else {
        echo mysqli_error($conn);
        echo "<script>window.location.assign('add_category.php?msg=Try again')</script>";
    }
}

?>