
<?php
    include_once("header.php");
?>
    <div class="container-xxl py-5">
        <div class="container">
            
            <div class="row g-5">
            <div class="col-md-12">
            <h1 class="display-2 text-dark text-center mb-4 animated slideInDown">OPEN DONATIONS</h1>           
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
                </div>
                <div class="col-lg-12 mx-auto wow fadeInUp" data-wow-delay="0.1s">
                <table class="table table-bordered ">
                        <thead class="table-warning">
                        <tr>
                            <th>#</th>
                            <th>Product Name/Type</th>
                            <th>QTY</th>
                            <th>Donar Name</th>
                            <th>Request On</th>
                            <th>Is Reciver Found</th>
                            <th>Reciver Name</th>
                            <th>Recived Date</th>
                        </tr>                
                        </thead>
                        <?php
                        $count = 1;
                        
                        $dId = $_SESSION['userId'];
                        include_once 'config.php';
                        $q = 'SELECT donate_request.*,food_items.*,dd.*,dr.name as drname, dr.id
                        FROM `donate_request` 
                        left join food_items on donate_request.foodId = food_items.id  
                        left join donar_receiver dd on donate_request.donarId = dd.id 
                        left join donar_receiver dr on  donate_request.recieverId = dr.id 
                        where donate_request.isPending=1 and donate_request.isDonateRequest=1';
                        $res = mysqli_query($conn, $q);
                        if ($data = mysqli_fetch_array($res)) {
                            do{
                                ?>
                                    <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $data['item_name']; ?></td>
                                    <td><?php echo $data['qty']; ?></td>
                                    <td><?php echo $data['name']; ?></td>
                                    <td><?php echo $data['donationDate']; ?></td>
                                    <td><?php if($data['isPending']!=1) echo "Yes"; else echo "No"; ?></td>
                                    <td><?php echo $data['drname']; ?></td>
                                    <td><?php if($data['recieverId']!=0) echo $data['requestDate']; ?></td> 
                                                                  </tr>
                                <?php  $count++;
                            }while ($data = mysqli_fetch_array($res));
                        }
                        else{
                            echo '
                                <tr>
                                    <td colspan="8" class="text-center">NO ITEM EXIST</td>
                                </tr>
                            ';
                        }
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

<?php
    if(isset($_REQUEST['submit']))
    {
        $qty = $_REQUEST['qty'];
        $itemId = $_REQUEST['itemId'];
        $dod = ($_REQUEST['dod']);
        $dId = $_SESSION['userId'];
        $query = "INSERT INTO `donate_request`(foodId,`qty`,`donarId`, `donationDate`, `isDonateRequest`, `isPending`) VALUES ('$itemId','$qty','$dId','$dod',1,1)";
        
        include_once('config.php');
        
        $result = mysqli_query($conn,$query);
        if($result>0)
        {
            // echo "Record Inserted";
            echo "<script>window.location.assign('donateitem.php?msg=Successfully donate&status=success')</script>";

        }
        else{
            echo mysqli_error($conn,$query);
            // echo "Record not inserted";
            echo "<script>window.location.assign('register.php?msg=Try Again&status=error')</script>";
        
        }
    }
?>
