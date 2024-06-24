<?php
include("stuheader.php");
if (!isset($_SESSION['stu_email'])) {
    echo "<script>window.location.assign('studentlogin.php?msg=Login Yourself!!')</script>";
}
?>

<div class="all-title-box">
    <div class="container text-center">
        <h1>Contact<span class="m_1">"Empowering Voices, Inspiring Solutions: Campus Resolution Unleashed."</span></h1>
    </div>
</div>
<?php if (isset($_GET['msg'])) { ?>
    <div class="alert alert-primary alert-dismissible mt-5" role="alert">
        <strong><?php echo $_GET['msg']; ?></strong>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
    </div>
<?php
}
?>

<div id="contact" class="section wb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Need Help? Sure we are Online!</h3>
            <p class="lead">Dear students, your voices matter, loud and clear,
                If questions arise, don't hesitate, come near.
                We're here to assist, support, and guide,
                Every query, concern, we'll help you decide.

                No matter how big or small the case,
                Reach out to us, we'll embrace.
                Together, we'll find solutions bright,
                Making your academic journey take flight.

                Don't let doubts linger, don't delay,
                Contact us today, don't be astray.
                Your success and happiness are what we pursue,
                For every challenge, we're here, just for you.

                So, drop us a line, give us a call,
                Your questions, we'll help you forestall.
                Be it day or night, we're at your aid,
                Together, we'll conquer any shade.</p>
        </div><!-- end title -->
        <?php
        if ($_SESSION['stu_email']) {
            $email = $_SESSION['stu_email'];
            include('config.php');
            $query = "SELECT * from `student` WHERE `email`='$email'";
            $res = mysqli_query($conn, $query);
            $data1 = mysqli_fetch_array($res);
        }
        ?>
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="contact_form">
                    <div id="message"></div>
                    <form id="contactform" method="post">
                        <div class="row row-fluid">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="text" name="name" id="first_name" class="form-control" placeholder="Your Name" value="<?php echo $data1['name'] ?>" readonly>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="email" name="email" id="email" class="form-control" value="<?php echo $data1['email'] ?>" placeholder="Your Email" readonly>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <input type="text" name="subject" id="phone" class="form-control" placeholder="Your Subject">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <textarea class="form-control" name="message" id="comments" rows="6" placeholder="Give us more details.."></textarea>
                            </div>
                            <div class="text-center pd">
                                <button name="add" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- end col -->
            <!-- <div class="col-xl-6 col-md-12 col-sm-12">
                <div class="map-box">
                    <div id="custom-places" class="small-map"></div>
                </div>
            </div> -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<div class="parallax section dbcolor">
    <div class="container">
        <div class="row logos">
            <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                <a href="#"><img src="images/logo_01.png" alt="" class="img-repsonsive"></a>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                <a href="#"><img src="images/logo_02.png" alt="" class="img-repsonsive"></a>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                <a href="#"><img src="images/logo_03.png" alt="" class="img-repsonsive"></a>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                <a href="#"><img src="images/logo_04.png" alt="" class="img-repsonsive"></a>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                <a href="#"><img src="images/logo_05.png" alt="" class="img-repsonsive"></a>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                <a href="#"><img src="images/logo_06.png" alt="" class="img-repsonsive"></a>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->
<?php
include("footer.php");
?>
<?php
if (isset($_REQUEST['add'])) {
    include("config.php");
    $user_name = $_REQUEST['name'];
    $user_email = $_REQUEST['email'];
    $subject = $_REQUEST['subject'];
    $message = $_REQUEST['message'];
    $query = "INSERT INTO `enquiry`(`name`, `email`, `subject`, `message`) VALUES ('$user_name','$user_email','$subject','$message')";
    echo $query;
    $res = mysqli_query($conn, $query);
    if ($res > 0) {
        echo "<script>window.location.assign('add_enquiry.php?msg=Thanks for Contacting Us, We Will Get it touch with you Shortly!!')</script>";
    } else {
        echo "<script>console.log($res)</script>";
        echo "<script>window.location.assign('add_enquiry.php?msg=Something Went Wrong!!')</script>";
    }
}
?>