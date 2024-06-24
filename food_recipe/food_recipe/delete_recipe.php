<?php
    $id = $_REQUEST['id'];
    include('config.php');
    $query = "DELETE FROM `recipe` WHERE id='$id'";
    $result = mysqli_query($conn,$query);
    if($result>0)
    {
        echo "<script>window.location.assign('manage_recipe.php?msg=Record deleted')</script>";
    }
    else{
        echo "<script>window.location.assign('manage_recipe.php?msg=Try again')</script>";
    }
?>