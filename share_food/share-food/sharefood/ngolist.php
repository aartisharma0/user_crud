
<?php
    include_once("header.php");
?>
    <!-- Contact Start -->
    <div class="container-xxl ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
            <h1 class="display-2 text-dark text-center mb-4 animated slideInDown">NGO LIST</h1>           

                </div>
                <div class="col-md-8 offset-2">
                    <table class="table table-bordered table-responsive table-warning table-striped">
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
    <!-- Contact End -->

<?php
    include_once("footer.php");
?>
