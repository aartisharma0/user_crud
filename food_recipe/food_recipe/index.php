<?php 
include_once ('header.php');
?>

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/bg1.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="hero-slides-content" data-animation="fadeInUp" data-delay="100ms">
                                <h2 data-animation="fadeInUp" data-delay="300ms">Delicios Homemade Burger</h2>
                                <p data-animation="fadeInUp" data-delay="700ms">"Flavors Unleashed: Discover Culinary Delights, One Recipe at a Time. Elevate Your Plate with Our Delectable Collection of Recipes!"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/bg6.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="hero-slides-content" data-animation="fadeInUp" data-delay="100ms">
                                <h2 data-animation="fadeInUp" data-delay="300ms">Delicios Homemade Burger</h2>
                                <p data-animation="fadeInUp" data-delay="700ms">"Flavors Unleashed: Discover Culinary Delights, One Recipe at a Time. Elevate Your Plate with Our Delectable Collection of Recipes!"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/bg7.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="hero-slides-content" data-animation="fadeInUp" data-delay="100ms">
                                <h2 data-animation="fadeInUp" data-delay="300ms">Delicios Homemade Burger</h2>
                                <p data-animation="fadeInUp" data-delay="700ms">"Flavors Unleashed: Discover Culinary Delights, One Recipe at a Time. Elevate Your Plate with Our Delectable Collection of Recipes!"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->
   <?php if(isset($_REQUEST["msg"]))
                        {
                            echo "<div class='alert alert-info mt-4'>".$_REQUEST["msg"]."</div>";
                    
                        }
                    ?>
    <!-- ##### Top Catagory Area Start ##### -->
    <section class="top-catagory-area section-padding-80-0">
        <div class="container">
            <div class="row">
                <!-- Top Catagory Area -->
                <div class="col-12 col-lg-6">
                    <div class="single-top-catagory">
                        <img src="img/bg-img/bg2.jpg" alt="">
                        <!-- Content -->
                        <div class="top-cta-content">
                            <h3>Strawberry Cake</h3>
                            <h6>Simple &amp; Delicios</h6>
                            <a href="receipe-post.php" class="btn delicious-btn">See Full Receipe</a>
                        </div>
                    </div>
                </div>
                <!-- Top Catagory Area -->
                <div class="col-12 col-lg-6">
                    <div class="single-top-catagory">
                        <img src="img/bg-img/bg3.jpg" alt="">
                        <!-- Content -->
                        <div class="top-cta-content">
                            <h3>Chinesse Noodles</h3>
                            <h6>Simple &amp; Delicios</h6>
                            <a href="receipe-post.php" class="btn delicious-btn">See Full Receipe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### Best Receipe Area Start ##### -->
    <section class="best-receipe-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>The best Receipies</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Best Receipe Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-best-receipe-area mb-30">
                        <img src="img/bg-img/r1.jpg" alt="">
                        <div class="receipe-content">
                            <a href="receipe-post.php">
                                <h5>Sushi Easy Receipy</h5>
                            </a>
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Best Receipe Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-best-receipe-area mb-30">
                        <img src="img/bg-img/r2.jpg" alt="">
                        <div class="receipe-content">
                            <a href="receipe-post.php">
                                <h5>Homemade Burger</h5>
                            </a>
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Best Receipe Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-best-receipe-area mb-30">
                        <img src="img/bg-img/r3.jpg" alt="">
                        <div class="receipe-content">
                            <a href="receipe-post.php">
                                <h5>Vegan Smoothie</h5>
                            </a>
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Best Receipe Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-best-receipe-area mb-30">
                        <img src="img/bg-img/r4.jpg" alt="">
                        <div class="receipe-content">
                            <a href="receipe-post.php">
                                <h5>Calabasa soup</h5>
                            </a>
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Best Receipe Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-best-receipe-area mb-30">
                        <img src="img/bg-img/r5.jpg" alt="">
                        <div class="receipe-content">
                            <a href="receipe-post.php">
                                <h5>Homemade Breakfast</h5>
                            </a>
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Best Receipe Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-best-receipe-area mb-30">
                        <img src="img/bg-img/r6.jpg" alt="">
                        <div class="receipe-content">
                            <a href="receipe-post.php">
                                <h5>Healthy Fruit Desert</h5>
                            </a>
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Best Receipe Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <section class="cta-area bg-img bg-overlay" style="background-image: url(img/bg-img/bg4.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Cta Content -->
                    <div class="cta-content text-center">
                        <h2>Gluten Free Receipies</h2>
                        <p>Welcome to our collection of gluten-free recipes designed to cater to your dietary needs without sacrificing flavor and enjoyment. Whether you're gluten-sensitive or simply exploring a healthier lifestyle, our assortment of delectable gluten-free dishes will tantalize your taste buds while keeping you on the path to wellness.</p>
                        <a href="#" class="btn delicious-btn">Discover all the receipies</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### CTA Area End ##### -->

    <!-- ##### Small Receipe Area Start ##### -->
    <section class="small-receipe-area section-padding-80-0">
        <div class="container">
            <div class="row">

                <!-- Small Receipe Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-small-receipe-area d-flex">
                        <!-- Receipe Thumb -->
                        <div class="receipe-thumb">
                            <img src="img/bg-img/sr1.jpg" alt="">
                        </div>
                        <!-- Receipe Content -->
                        <div class="receipe-content">
                            <span>January 04, 2018</span>
                            <a href="receipe-post.php">
                                <h5>Homemade italian pasta</h5>
                            </a>
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                            <p>2 Comments</p>
                        </div>
                    </div>
                </div>

                <!-- Small Receipe Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-small-receipe-area d-flex">
                        <!-- Receipe Thumb -->
                        <div class="receipe-thumb">
                            <img src="img/bg-img/sr2.jpg" alt="">
                        </div>
                        <!-- Receipe Content -->
                        <div class="receipe-content">
                            <span>January 04, 2018</span>
                            <a href="receipe-post.php">
                                <h5>Baked Bread</h5>
                            </a>
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                            <p>2 Comments</p>
                        </div>
                    </div>
                </div>

                <!-- Small Receipe Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-small-receipe-area d-flex">
                        <!-- Receipe Thumb -->
                        <div class="receipe-thumb">
                            <img src="img/bg-img/sr3.jpg" alt="">
                        </div>
                        <!-- Receipe Content -->
                        <div class="receipe-content">
                            <span>January 04, 2018</span>
                            <a href="receipe-post.php">
                                <h5>Scalops on salt</h5>
                            </a>
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                            <p>2 Comments</p>
                        </div>
                    </div>
                </div>

                <!-- Small Receipe Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-small-receipe-area d-flex">
                        <!-- Receipe Thumb -->
                        <div class="receipe-thumb">
                            <img src="img/bg-img/sr4.jpg" alt="">
                        </div>
                        <!-- Receipe Content -->
                        <div class="receipe-content">
                            <span>January 04, 2018</span>
                            <a href="receipe-post.php">
                                <h5>Fruits on plate</h5>
                            </a>
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                            <p>2 Comments</p>
                        </div>
                    </div>
                </div>

                <!-- Small Receipe Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-small-receipe-area d-flex">
                        <!-- Receipe Thumb -->
                        <div class="receipe-thumb">
                            <img src="img/bg-img/sr5.jpg" alt="">
                        </div>
                        <!-- Receipe Content -->
                        <div class="receipe-content">
                            <span>January 04, 2018</span>
                            <a href="receipe-post.php">
                                <h5>Macaroons</h5>
                            </a>
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                            <p>2 Comments</p>
                        </div>
                    </div>
                </div>

                <!-- Small Receipe Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-small-receipe-area d-flex">
                        <!-- Receipe Thumb -->
                        <div class="receipe-thumb">
                            <img src="img/bg-img/sr6.jpg" alt="">
                        </div>
                        <!-- Receipe Content -->
                        <div class="receipe-content">
                            <span>January 04, 2018</span>
                            <a href="receipe-post.php">
                                <h5>Chocolate tart</h5>
                            </a>
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                            <p>2 Comments</p>
                        </div>
                    </div>
                </div>

                <!-- Small Receipe Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-small-receipe-area d-flex">
                        <!-- Receipe Thumb -->
                        <div class="receipe-thumb">
                            <img src="img/bg-img/sr7.jpg" alt="">
                        </div>
                        <!-- Receipe Content -->
                        <div class="receipe-content">
                            <span>January 04, 2018</span>
                            <a href="receipe-post.php">
                                <h5>Berry Desert</h5>
                            </a>
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                            <p>2 Comments</p>
                        </div>
                    </div>
                </div>

                <!-- Small Receipe Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-small-receipe-area d-flex">
                        <!-- Receipe Thumb -->
                        <div class="receipe-thumb">
                            <img src="img/bg-img/sr8.jpg" alt="">
                        </div>
                        <!-- Receipe Content -->
                        <div class="receipe-content">
                            <span>January 04, 2018</span>
                            <a href="receipe-post.php">
                                <h5>Zucchini Grilled on peper</h5>
                            </a>
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                            <p>2 Comments</p>
                        </div>
                    </div>
                </div>

                <!-- Small Receipe Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-small-receipe-area d-flex">
                        <!-- Receipe Thumb -->
                        <div class="receipe-thumb">
                            <img src="img/bg-img/sr9.jpg" alt="">
                        </div>
                        <!-- Receipe Content -->
                        <div class="receipe-content">
                            <span>January 04, 2018</span>
                            <a href="receipe-post.php">
                                <h5>Chicken Salad</h5>
                            </a>
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                            <p>2 Comments</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Small Receipe Area End ##### -->


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
include_once ('footer.php') 
?>