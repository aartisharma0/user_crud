<?php include_once 'admin_header.php'; ?>

<div class="container">
   <h2 class="text-center">Request Items For Donation</h2>
    <div class="container-fluid mt-3">
    <table class="table table-bordered ">
                <thead class="table-warning">
                <tr>
                    <th>#</th>
                    <th>Product Name/Type</th>
                    <th>QTY</th>
                    <th>Request Person Name</th>
                    <th>Request On</th>
                    <th>Is Donar Found</th>
                    <th>Donar Name</th>
                    <th>Date</th>
                </tr>                
                </thead>
                <?php
                $count = 1;
                include_once 'config.php';
                $q = 'SELECT donate_request.*,food_items.*,dd.*,dr.name as drname, dr.id
                FROM `donate_request` 
                left join food_items on donate_request.foodId = food_items.id  
                left join donar_receiver dd on donate_request.donarId = dd.id 
                left join donar_receiver dr on  donate_request.recieverId = dr.id 
                 where donate_request.isRequest=1';
                $res = mysqli_query($conn, $q);
                while ($data = mysqli_fetch_array($res)) { ?>
                    <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $data['item_name']; ?></td>
                    <td><?php echo $data['qty']; ?></td>
                    <td><?php echo $data['drname']; ?></td>
                    <td><?php if($data['recieverId']!=0) echo $data['requestDate']; ?></td>   
                    <td><?php if($data['isPending']!=1) echo "Yes"; else echo "No"; ?></td> 
                    <td><?php echo $data['name']; ?></td>
                    <td><?php if($data['donarId']!=0) echo $data['donationDate'];  ?></td>
                    </tr>
                <?php  $count++;}
                ?>
</table>
    </div>
</div>
<?php include_once 'footer.php'; ?>
