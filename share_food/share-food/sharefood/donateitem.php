
<?php
    include_once("header.php");
?>
    <div class="container-xxl py-5">
        <div class="container">
            
            <div class="row g-5">
            <div class="col-md-12">
            <h1 class="display-2 text-dark text-center mb-4 animated slideInDown">DONATE ITEM NOW</h1>           
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
                    <form method="post">
                        <div class="row ">
                            

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="QTY" name="qty">
                                    <label for="name">Quantity</label>
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select required='required' class="form-control" name="itemId">
                                    <?php
                                        $count = 1;
                                        include_once 'config.php';
                                        $q = 'SELECT food_items.*,food_category.name FROM `food_items` left join food_category on food_category.id=food_items.category';
                                        $res = mysqli_query($conn, $q);
                                        while ($data = mysqli_fetch_array($res)) { ?>
                                            <option value="<?php echo $data['id']; ?>">
                                            <?php echo $data['item_name']."(".$data['name'].")"; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="contact">Item</label>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="name" placeholder="Date You to Donate" name="dod">
                                    <label for="name">Date You to Donate</label>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <button class="btn btn-primary rounded-pill py-3 px-5" type="submit" name="submit">Submit</button>
                            </div>
                        </div>
                    </form>
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
