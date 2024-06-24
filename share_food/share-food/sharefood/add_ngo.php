<?php include_once 'admin_header.php'; ?>

<div class="container">
    <?php 
        if(isset($_POST) && isset($_POST['sub'])){
            $name = $_POST['name'];
            $city = $_POST['city'];
            $phone = $_POST['phone'];
            $desc = $_POST['desc'];
            include_once "config.php";
            $q = "insert into ngo(name,city,phone,`description`) values('$name','$city','$phone','$desc')";
            $res = mysqli_query($conn,$q);
            if($res>0)
                echo '<p class="alert alert-success">NGO Added</p>';
        }
    ?>  
    <div class="container-fluid mt-3">
        <div class="row">
        <div class="col-md-8 mx-auto">
                <h2 class="text-center">Add NGO</h2>                
               
                <form method="post" enctype="multipart/form-data">
                    <table class="table table-bordered ">
                        <tr>
                            <td class='lead'>Name</td>
                            <td>
                                <input type="text" name="name" id="" required='required' class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td class='lead'>City</td>
                            <td>
                                <input type="text" name="city" id="" required='required' class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td class='lead'>Phone</td>
                            <td>
                                <input type="text" name="phone" id="" required='required' class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td class='lead'>Desc</td>
                            <td>
                                <input type="text" name="desc" id="" required='required' class="form-control">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <input type="submit" name="sub" value="Save NGO" class="btn btn-danger">
                            </td>
                        </tr>
                    </table>   
                </form>    

                 
            </div>
            </div>
           
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>
