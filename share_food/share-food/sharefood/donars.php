<?php include_once 'admin_header.php'; ?>

<div class="container">
   <h2 class="text-center">All Donars List</h2>
    <div class="container-fluid mt-3">
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>                
                </thead>
                <?php
                $count = 1;
                include_once 'config.php';
                $q = 'SELECT * FROM `donar_receiver` where isRegisterAsDonar=1';
                $res = mysqli_query($conn, $q);
                while ($data = mysqli_fetch_array($res)) { ?>
                    <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['gender']; ?></td>
                    <td><?php echo $data['contact']; ?></td>
                    <td><?php echo $data['address']; ?></td>                    
                </tr>
                <?php  $count++;}
                ?>
</table>
    </div>
</div>
<?php include_once 'footer.php'; ?>
