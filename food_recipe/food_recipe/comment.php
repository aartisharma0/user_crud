<?php
    include_once("header.php");
    if (!isset($_SESSION['user_email'])) {
        echo "<script>window.location.assign('user_login.php?msg=Login Yourself!!')</script>";
    }
?>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Add Comment</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->
<div class = 'container-fluid p-5'>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <!-- <h4 class="text-dark text-center text-bold py-3">Add Category</h4> -->
            <?php
            if(isset($_REQUEST["msg"]))
            {
                echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";  
            }
            ?>
            <form method="post"  enctype="multipart/form-data">
                <div class="form-group">
                        <label for="">Comment</label>
                        <textarea name="comment" cols="30" rows="1" id="modlgn_username" class="inputbox form-control" autocomplete="off" placeholder=" Write Your Comment" required></textarea>
                </div>
                <center>
                <button type="submit" class="btn btn-primary my-2" name="submit">Add</button>
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
if(isset($_REQUEST["submit"]))
{
    $user_email=$_SESSION['user_email'];
    $recipe=$_GET['id'];
    $comment = $_REQUEST["comment"];

    include("config.php");
        $query = "INSERT INTO `comment`( `user_email`, `recipe`, `comment`) VALUES ('$user_email', '$recipe', '$comment')";
        $result = mysqli_query($conn,$query);
        if($result>0)
        {
            echo "<script>window.location.assign('view_recipe.php?msg=Comment Added')</script>";
        }
        
        else{
            echo mysqli_error($conn);
            echo "<script>window.location.assign('view_recipe.php?msg=Try again')</script>";
        }
}

?>