<?php
include_once("header.php");
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.location.assign('admin.php?msg=Login Yourself!!')</script>";
}
?>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb1.jpg);">
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
if (isset($_REQUEST["msg"])) {
    echo "<div class='alert alert-info mt-4'>" . $_REQUEST["msg"] . "</div>";
}
?>
<div class='container-fluid p-5 my-5'>
    <div class="section-title row text-center">
        <div class="col-md-8 offset-md-2 mt-5 mb-5">
            <h3>Add Recipe</h3>
        </div>
    </div><!-- end title -->
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <!-- <h4 class="text-dark text-center text-bold py-3">Add Product</h4> -->

            <form method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group orm-control">
                    <label for="modlgn_username">Category</label>
                    <select name="category" class=" form-control" autocomplete="off" required>
                        <option selected disabled value="">Select Category</option>
                        <?php
                        include('config.php');
                        $query = "SELECT * from `category`";
                        $res = mysqli_query($conn, $query);
                        while ($data = mysqli_fetch_array($res)) {
                        ?>
                            <option value="<?php echo $data['category_name'] ?>"><?php echo $data['category_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group orm-control">
                    <label for="">Recipe Name</label>
                    <input type="text" name="recipe_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Dish Type</label>
                    <select name="type" class="form-control" autocomplete="off" required>
                        <option selected disabled value="">Select type</option>
                        <option value="Vegitarian">Vegitarian</option>
                        <option value="Non-Vegitarian">Non-Vegitarian</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" cols="30" rows="1" id="modlgn_username" class="inputbox form-control" autocomplete="off" placeholder="Enter Description" required></textarea>

                </div>
                <div class="form-group">
                    <label for="">Preparation Time</label>
                    <input type="text" name="time" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">No. of servings</label>
                    <input type="number" name="serving" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Video Link</label>
                    <input type="text" name="link" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control" required>
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
include_once("footer.php");
?>

<?php
if (isset($_REQUEST["submit"])) {
    $category = $_REQUEST["category"];
    $recipe_name = $_REQUEST["recipe_name"];
    $type = $_REQUEST["type"];
    $description = $_REQUEST["description"];
    $time = $_REQUEST["time"];
    $serving = $_REQUEST["serving"];
    $link = $_REQUEST["link"];

    $file_name = $_FILES['image']['name'];
    $file_temp = $_FILES['image']['tmp_name'];

    $new_name = rand() . $file_name;
    move_uploaded_file($file_temp, "product/" . $new_name);


    include("config.php");
    $query = "INSERT INTO `recipe`(`category`, `recipe_name`,`type`, `description`,`time`,`serving`,`link`,`image`) VALUES ('$category','$recipe_name','$type','$description','$time','$serving','$link','$new_name')";
    $result = mysqli_query($conn, $query);
    if ($result > 0) {
        echo "<script>window.location.assign('add_recipe.php?msg=Recipe Added')</script>";
    } else {
        echo mysqli_error($conn);
        echo "<script>window.location.assign('add_recipe.php?msg=Try again')</script>";
    }
}

?>