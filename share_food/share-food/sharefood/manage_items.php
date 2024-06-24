<?php include_once 'admin_header.php'; ?>

<div class="container">
    <h2 class="text-center">Manage Food Categories</h2>
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
            <div class="col-md-12">
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
                <table class="table table-bordered ">
                                <thead class="table-warning">
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Item Name</th>
                                    <th>Item Image</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>                
                                </thead>
                                <?php
                                $count = 1;
                                include_once 'config.php';
                                $q = 'SELECT food_items.*,food_category.name FROM `food_items`left join food_category on food_category.id=food_items.category';
                                $res = mysqli_query($conn, $q);
                                while ($data = mysqli_fetch_array($res)) { ?>
                                    <tr>
                                    <td><?php echo $count ;$count++; ?></td>
                                    <td><?php echo $data['name']; ?></td>
                                    <td><?php echo $data['item_name']; ?></td>
                                    <td>
                                    <img src="food_items/<?php echo $data[
                                        'image'
                                    ]; ?>" class="img-fluid" style="height:100px">
                                    </td>
                                    <td><?php echo $data['description']; ?></td>
                                    <td>
                            

                                    <a href="edit_admin_view_category.php?id=<?php echo $data[
                                        'id'
                                    ]; ?>">  
                                        <i class="fa fa-edit text-success"></i>
                                        <a href="delete_food_item.php?id=<?php echo $data[
                                            'id'
                                        ]; ?>">
                                            <i class="fa fa-trash text-danger"></i>
                                        </a>

                                    </td>
                                </tr>
                                <?php }
                                ?>
                </table>
            </div>
           
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>
