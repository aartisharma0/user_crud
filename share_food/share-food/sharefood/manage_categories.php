<?php include_once 'admin_header.php'; ?>

<div class="container">
    <h2 class="text-center">Manage Food Categories</h2>
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
            <div class="col-md-8 offset-2">
                
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
                    <th>Category Image</th>
                    <th>Action</th>
                </tr>                
                </thead>
                <?php
                $count = 1;
                include_once 'config.php';
                $q = 'SELECT * FROM `food_category`';
                $res = mysqli_query($conn, $q);
                while ($data = mysqli_fetch_array($res)) { ?>
                    <tr>
                    <td><?php echo $count ;$count++; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td>
                      <img src="category/<?php echo $data[
                          'image'
                      ]; ?>" class="img-fluid" style="height:100px">
                    </td>
                    <td>
                        <a href="delete_category.php?id=<?php echo $data[
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
