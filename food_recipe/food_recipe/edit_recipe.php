<?php
include_once("header.php");
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.location.assign('admin.php?msg=Login Yourself!!')</script>";
}
if (!isset($_GET['id'])) {
    echo "<script>window.location.assign('manage_recipe.php?msg=Select Recipe First!!')</script>";
}
include("config.php");
$q = "select * from recipe where id='$_REQUEST[id]'";
$exec = mysqli_query($conn, $q);
if ($data = mysqli_fetch_array($exec)) {
    $cat_name = $data['category'];
    $prod_name = $data['recipe_name'];
    $type = $data['type'];
    $descrp = $data['description'];
    $time = $data['time'];
    $serving = $data['serving'];
    $prod_img = $data['image'];
    $link = $data['link'];
    // echo $link;
}
?>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb2.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-text text-center">
                    <h2>Edit Recipe</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->
<div class='container-fluid p-5'>
<div class="section-title row text-center">
        <div class="col-md-8 offset-md-2 mt-5 mb-5">
            <h3>Update Recipe</h3>
        </div>
    </div><!-- end title -->
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
            if (isset($_REQUEST["msg"])) {
                echo "<div class='alert alert-info'>" . $_REQUEST["msg"] . "</div>";
            }
            ?>
            <form method="post" enctype="multipart/form-data" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
                <div class="form-group">
                    <label for="">Category Name</label>
                    <select name="category" class=" form-control" autocomplete="off" required>
                        <option selected disabled value="">Select Category</option>
                        <?php
                        include('config.php');
                        $query = "SELECT * FROM `category`";
                        $res = mysqli_query($conn, $query);
                        while ($data = mysqli_fetch_array($res)) {
                            $selected = ($data['category_name'] == $cat_name) ? 'selected' : '';
                        ?>
                            <option value="<?php echo $data['category_name']; ?>" <?php echo $selected; ?>><?php echo $data['category_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Recipe Name</label>
                    <input type="text" name="recipe_name" class="form-control" value="<?php echo $prod_name; ?>">
                </div>
                <div class="form-group">
                    <label for="">Type</label>
                    <input type="text" name="type" class="form-control" value="<?php echo $type; ?>">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control" value="<?php echo $descrp; ?>">
                </div>
                <div class="form-group">
                    <label for="">Preparation Time</label>
                    <input type="text" name="time" class="form-control" value="<?php echo $time; ?>">
                </div>
                <div class="form-group">
                    <label for="">No of Servings</label>
                    <input type="text" name="serving" class="form-control" value="<?php echo $serving; ?>">
                </div>
                <div class="form-group">
                    <label for="">Video Link</label>
                    <input type="text" name="link" value="<?php echo $link; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                    <input type="hidden" name="hidden_product_image" class="form-control" value="<?php echo $prod_img; ?>">
                </div>
                <center>
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
                </center>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php
include_once("footer.php");
?>

<?php
if (isset($_REQUEST["submit"])) {
    $id = $_REQUEST["id"];
    $category = $_REQUEST["category"];
    $product_name = $_REQUEST["recipe_name"];
    $type = $_REQUEST["type"];
    $description = $_REQUEST["description"];
    $time = $_REQUEST["time"];
    $serving = $_REQUEST["serving"];
    $link = $_REQUEST["link"];

    // skip this code if there is no image start
    $hidden_product_image = $_REQUEST["hidden_product_image"];
    if ($_FILES['image']['name']) {
        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];

        $new_name = rand() . $file_name;
        move_uploaded_file($file_temp, "product/" . $new_name);
    } else {
        // echo "no image";
        $new_name = $hidden_product_image;
    }
    // skip this code if there is no image  end

    include("config.php");
    $query = "UPDATE `recipe` SET `category`='$category',`recipe_name`='$recipe_name',`type`='$type',`description`='$description',`time`='$time',`serving`='$serving',`link`='$link',`image`='$new_name' where id='$id'";

    $result = mysqli_query($conn, $query);

    // print_r($result);
    if ($result > 0) {
        echo "<script>window.location.assign('manage_recipe.php?msg=Category Updated')</script>";
    } else {
        echo "<script>window.location.assign('manage_recipe.php?msg=Try Again')</script>";
    }
}
?>