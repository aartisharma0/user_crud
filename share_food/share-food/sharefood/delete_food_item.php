<?php
if ($_REQUEST['id']) {
    $id = $_REQUEST['id'];
    include_once 'config.php';
    $query = "DELETE FROM `food_items` WHERE id='$id'";
    $res = mysqli_query($conn, $query);
    if ($res > 0) {
        echo "<script>window.location.assign('manage_items.php?msg=Record Deleted Successfully&status=success')</script>";
    } else {
        echo "<script>window.location.assign('manage_items.php?msg=Try Again&status=error')</script>";
    }
} else {
    echo "<script>window.location.assign('manage_items.php')</script>";
}
?>
