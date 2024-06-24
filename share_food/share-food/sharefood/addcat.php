<?php include_once 'admin_header.php'; ?>

<div class="container">
    <?php 
        if(isset($_POST) && isset($_POST['sub'])){
            $name = $_POST['name'];
            $fname = $_FILES['image']['name'];
            $ftmp = $_FILES['image']['tmp_name'];
            $f = rand(1,10000000).$fname;
            move_uploaded_file($ftmp,"category/".$f);
            include_once "config.php";
            $q = "insert into food_category(name,image) values('$name','$f')";
            $res = mysqli_query($conn,$q);
            if($res>0)
                echo '<p class="alert alert-success">Food Category Added</p>';
        }
    ?>  
    <div class="container-fluid mt-3">
        <div class="row">
        
           
            <div class="col-md-6 offset-3">
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
                <h2 class="text-center">Add Food Category</h2>
                
               
                <form method="post" enctype="multipart/form-data">
                    <table class="table table-bordered ">
                        <tr>
                            <td class='lead'>Name</td>
                            <td>
                                <input type="text" name="name" id="" required='required' class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td class='lead'>Image</td>
                            <td>
                                <input type="file" name="image" id="" required='required' class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="sub" value="Save Category" class="btn btn-danger">
                            </td>
                        </tr>
                    </table>   
                </form>    

                 
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>
