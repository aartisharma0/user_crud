
<?php
    include_once("header.php");
?>
    <div class="container-xxl py-5">
        <div class="container">
            
            <div class="row g-5">
            <div class="col-md-12">
            <h1 class="display-2 text-dark text-center mb-4 animated slideInDown">REGISTER NOW</h1>           
            <?php if (isset($_REQUEST['msg'])) {
                    if ($_REQUEST['status'] == 'success') {
                        echo "<div class='alert alert-success'>" .
                            $_REQUEST['msg'] .
                            '</div>';
                    } else {
                        echo "<div class='alert alert-danger'>" .
                            $_REQUEST['msg'] .
                            '</div>';
                    }
                } ?>
                </div>
                <div class="col-lg-12 mx-auto wow fadeInUp" data-wow-delay="0.1s">
                    <form method="post">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name" name="name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="contact" placeholder="Your Contact" name="contact">
                                    <label for="contact">Your Contact</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="email" placeholder="Your Addresss" name="address">
                                    <label for="text">Your Address</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-control" name="regas">
                                        <option value="1">Donar</option>
                                        <option value="0">Requester</option>
                                    </select>
                                    <label for="text">Register As</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-control" name="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <label for="text">Gender</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email" name="email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" placeholder="Your password" name="password">
                                    <label for="password">Your password</label>
                                </div>
                            </div>
                           
                            <div class="col-12">
                                <button class="btn btn-primary rounded-pill py-3 px-5" type="submit" name="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
    <!-- Contact End -->

<?php
    include_once("footer.php");
?>

<?php
    if(isset($_REQUEST['submit']))
    {
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $password = md5($_REQUEST['password']);
        $contact = $_REQUEST['contact'];
        $address = $_REQUEST['address'];
        $gender = $_REQUEST['gender'];
        if($_REQUEST['regas']==1){
            $query = "INSERT INTO `donar_receiver`(isRegisterAsDonar,`status`,`name`, `email`, `password`, `contact`, `address`, `gender`) 
            VALUES (1,1,'$name','$email','$password','$contact','$address','$gender')";
        }else{
            $query = "INSERT INTO `donar_receiver`(isRegisterAsReceiver,`status`,`name`, `email`, `password`, `contact`, `address`, `gender`) 
            VALUES (1,1,'$name','$email','$password','$contact','$address','$gender')";
        }
        include_once('config.php');
        
        $result = mysqli_query($conn,$query);
        if($result>0)
        {
            // echo "Record Inserted";
            echo "<script>window.location.assign('register.php?msg=Register Successfull&status=success')</script>";

        }
        else{
            echo mysqli_error($conn,$query);
            // echo "Record not inserted";
            echo "<script>window.location.assign('register.php?msg=Try Again&status=error')</script>";
        
        }
    }
?>
