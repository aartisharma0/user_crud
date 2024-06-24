<?php include_once 'admin_header.php'; ?>

<div class="container">
    <!-- <h2 class="text-center">Manage Food Categories</h2> -->
    <?php 
        if(isset($_POST) && isset($_POST['sub'])){
            $name = $_POST['name'];
            $descr = $_POST['descr'];
            $catId = $_POST['catId'];
            $fname = $_FILES['image']['name'];
            $ftmp = $_FILES['image']['tmp_name'];
            $f = rand(1,10000000).$fname;
            move_uploaded_file($ftmp,"food_items/".$f);
            include_once "config.php";
            $q = "insert into food_items(category,item_name,image,description) values('$catId','$name','$f','$descr')";
            $res = mysqli_query($conn,$q);
            if($res>0)
                echo '<p class="alert alert-success">Food Item Added</p>';
        }
    ?>  
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="offset-3 col-md-6 mb-4">
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
                <h2 class="text-center">Add Food Items</h2>              
                <form method="post" enctype="multipart/form-data">
                    <table class="table table-bordered ">
                        <tr>
                            <td class='lead'>Name</td>
                            <td>
                                <input type="text" name="name" id="" required='required' class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td class='lead'>Category Id</td>
                            <td>
                                <select required='required' class="form-control" name="catId">
                                <?php
                                    $count = 1;
                                    include_once 'config.php';
                                    $q = 'SELECT * FROM `food_category`';
                                    $res = mysqli_query($conn, $q);
                                    while ($data = mysqli_fetch_array($res)) { ?>
                                        <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class='lead'>Image</td>
                            <td>
                                <input type="file" name="image" id="" required='required' class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td class='lead'>Description</td>
                            <td>
                                <textarea name="descr" id="" required='required' class="form-control">
                                </textarea>
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
