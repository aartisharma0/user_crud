<?php
include_once('header.php');
if (isset($_REQUEST['id'])) {
    include('config.php');
    $query = "SELECT * FROM `recipe` where `category`='$_REQUEST[id]'";
    $result = mysqli_query($conn, $query);
} else {
    include('config.php');
    $query = "SELECT * FROM `recipe`";
    $result = mysqli_query($conn, $query);
}

?>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb1.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-text text-center">
                    <h2>View Recipe</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->
<div class="container">
    <div class="row service-v1 margin-bottom-40">
        <?php
        while ($row = mysqli_fetch_array($result)) {
            $recipe_id = $row['id'];
        ?>
            <div class="col-md-10 my-5 mx-auto">
                <div class="card ">
                    <div class="card-image">
                        <img class="img-responsive img-thumbnail" src="product/<?php echo $row['image'] ?>" alt="" style="height:400px;" width="1000 ">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="<?php echo $row['link'] ?>" frameborder="0"></iframe>
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $row['link'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <div class="row">
                            <div class="col-md-10" style="max-height:100px">
                                <span class="card-title">
                                    <h1><?php echo $row['recipe_name'] ?></h1> <br> <b>Dish Type:</b> <?php echo $row['type'] ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col">
                                <?php echo "<b>Description:</b> ", $row['description'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <?php echo "<b>Preparation Time: </b>", $row['time'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <?php echo "<b>No of Serving: </b>", $row['serving'] ?>
                            </div>
                        </div>
                        <center>
                            <div class="row">
                                <div class="col-md-2 mx-auto">
                                    <a href="comment.php?id=<?php echo $row['id'] ?>" class="btn btn-primary mb-3">Add Comment <i class="fa fa-edit"></i> </a>
                                </div>
                            </div>
                        </center>
                        <div class="row">
                            <div class="col">
                                <?php
                                include('config.php');
                                $comment_query = "SELECT * FROM `comment` WHERE `recipe`='$recipe_id'";
                                $comment_results = mysqli_query($conn, $comment_query);
                                while ($comment_row = mysqli_fetch_array($comment_results)) {
                                    $user_email = $comment_row['user_email'];
                                    $comment = $comment_row['comment'];
                                    $created_at = $comment_row['created_at'];

                                    $user_query = "SELECT `user_name` FROM `create_account` WHERE `user_email`='$user_email'";
                                    $user_result = mysqli_query($conn, $user_query);
                                    $user_data = mysqli_fetch_assoc($user_result);
                                    $user_name = $user_data['user_name'];

                                    echo "<div class='comment'>";
                                    echo "<p class='d-flex justify-content-between'>$user_name  - $comment -  $created_at <hr></p>";
                                    echo "</div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<!-- End Service Blcoks -->
<?php
include_once('footer.php');
?>