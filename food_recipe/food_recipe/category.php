<?php
include('header.php');

?>



<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb1.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-text text-center">
                    <h2>Categories</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### About Area Start ##### -->
<section class="about-area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h3>All Categories</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h6 class="sub-heading pb-5">"Elevating Taste, Inspiring Creations: Your Culinary Journey Begins Here."</h6>

                <p class="text-center">"In our recipe treasure trove so grand,
                    A world of flavors at your command.
                    Categories abound, a culinary embrace,
                    Each dish a journey, a unique taste.

                    From appetizers that tantalize the senses,
                    To desserts that create sweet pretenses.
                    Soups and salads, a healthy affair,
                    Main courses with flair, beyond compare.

                    Explore ethnic delights from every nation,
                    Or savor comfort food with anticipation.
                    Vegetarian, vegan, and gluten-free too,
                    Our categories cater to all, a feast for you.

                    So dive into our categories, an edible array,
                    Where recipes bloom, night and day.
                    Embark on a culinary voyage so fine,
                    With each category, a taste divine."</p>
            </div>
        </div>

        <div class="row align-items-center mt-70">
            <!-- Single Cool Fact -->
            <?php
            $query = "SELECT * from `category`";
            include('config.php');
            $result = mysqli_query($conn, $query);
            while ($data = mysqli_fetch_array($result)) {
            ?>
                 <div class="col-md-12 col-sm-6 col-lg-3 mb-4">
                    <a href="view_recipe.php?id=<?php echo $data['category_name'] ?>">
                        <div class="single-cool-fact custom-card">
                            <img src="category/<?php echo $data['category_image'] ?>" alt="" class="img-fluid custom-image">
                            <h3><?php echo $data['category_name'] ?></h3>
                        </div>
                    </a>
                </div>
            <?php } ?>

        </div>


    </div>
</section>
<!-- ##### About Area End ##### -->


<!-- ##### Follow Us Instagram Area Start ##### -->
<div class="follow-us-instagram">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h5>Follow Us Instragram</h5>
            </div>
        </div>
    </div>
    <!-- Instagram Feeds -->
    <div class="insta-feeds d-flex flex-wrap">
        <!-- Single Insta Feeds -->
        <div class="single-insta-feeds">
            <img src="img/bg-img/insta1.jpg" alt="">
            <!-- Icon -->
            <div class="insta-icon">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Insta Feeds -->
        <div class="single-insta-feeds">
            <img src="img/bg-img/insta2.jpg" alt="">
            <!-- Icon -->
            <div class="insta-icon">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Insta Feeds -->
        <div class="single-insta-feeds">
            <img src="img/bg-img/insta3.jpg" alt="">
            <!-- Icon -->
            <div class="insta-icon">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Insta Feeds -->
        <div class="single-insta-feeds">
            <img src="img/bg-img/insta4.jpg" alt="">
            <!-- Icon -->
            <div class="insta-icon">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Insta Feeds -->
        <div class="single-insta-feeds">
            <img src="img/bg-img/insta5.jpg" alt="">
            <!-- Icon -->
            <div class="insta-icon">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Insta Feeds -->
        <div class="single-insta-feeds">
            <img src="img/bg-img/insta6.jpg" alt="">
            <!-- Icon -->
            <div class="insta-icon">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Insta Feeds -->
        <div class="single-insta-feeds">
            <img src="img/bg-img/insta7.jpg" alt="">
            <!-- Icon -->
            <div class="insta-icon">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- ##### Follow Us Instagram Area End ##### -->
<?php
include('footer.php')
?>