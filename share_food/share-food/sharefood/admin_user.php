

<?php
    include_once("header.php");
    if(isset($_SESSION['adminemail']))
    {  
        //store
        $email = $_SESSION['adminemail'];
    }
    else{
        //url redirection
        echo "<script>window.location.assign('adminlogin.php?msg=Unauthenticated&status=error')</script>";
    }
?>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">Manage User</h1>
           
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8 mx-auto wow fadeInUp" data-wow-delay="0.1s">

                    <?php
                        if(isset($_REQUEST['msg']) )
                        {   
                            if($_REQUEST['status'] == "success")
                            {
                                echo "<div class='alert alert-success'>".$_REQUEST['msg']."</div>";

                            }
                            else{
                                
                                echo "<div class='alert alert-danger'>".$_REQUEST['msg']."</div>";
                            }
                        }
                    ?>
                    
                    <table class="table table-striped table-hover table-primary">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                           $count =1;
                           include_once("config.php");
                           $query = "SELECT * FROM `register`";
                           $res = mysqli_query($conn,$query);
                           while($data = mysqli_fetch_array($res))
                            {
                           ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $data["name"]; ?></td>
                                <td><?php echo $data["email"]; ?></td>
                                <td><?php echo $data["contact"]; ?></td>
                                <td>
                                    <a href="edit_user.php?id=<?php echo $data['id']; ?>">
                                        <i class="fa fa-edit text-info"></i>
                                    </a>


                                    <a href="delete_user.php?id=<?php echo $data['id']?>">
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                            $count++;
                            }
                            ?>
                        </tbody>
                    </table>
                            
                    <select>
                        <option selected disabled>Select USer</option>
                        <?php
                           $count =1;
                           include_once("config.php");
                           $query = "SELECT * FROM `register`";
                           $res = mysqli_query($conn,$query);
                           while($data = mysqli_fetch_array($res))
                            {
                                echo "<option value='$data[email]'>".$data['name']."</option>";
                            }
                           ?>
                    </select>
                </div>
               
            </div>
        </div>
    </div>
    <!-- Contact End -->

<?php
    include_once("footer.php");
