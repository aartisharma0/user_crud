<?php include_once 'admin_header.php'; ?>

<div class="container">
    <h2 class="text-center">Manage NGO</h2>
   
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-12 mx-auto">
                    
                    <table class="table table-bordered ">
                    <thead class="table-warning">
                    <tr>
                        <th>#</th>
                        <th>NGO Name</th>
                        <th>NGO City</th>
                        <th>NGO Contact</th>
                        <th>NGO Desc</th>
                    </tr>                
                    </thead>
                    <?php
                    $count = 1;
                    include_once 'config.php';
                    $q = 'SELECT * FROM `ngo`';
                    $res = mysqli_query($conn, $q);
                    while ($data = mysqli_fetch_array($res)) { ?>
                        <tr>
                        <td><?php echo $count ;$count++; ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['city']; ?></td>
                        <td><?php echo $data['phone']; ?></td>
                        <td><?php echo $data['description']; ?></td>
                        
                    </tr>
                    <?php }
                    ?>
                    </table>
                    </div>
            </div>
           
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>
