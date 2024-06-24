<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        include('config.php');
        $q="SELECT * from `category` where `category`='$id'";
        $r=mysqli_query($conn,$q);
        $query="DELETE FROM `category` WHERE `id`=$id";
        $res=mysqli_query($conn,$query);
        if($res>0){
            echo "<script>window.location.assign('view_category.php?msg=Category Deleted Successfully')</script>";
        }
        else{
            echo "<script>window.location.assign('view_category.php?msg=Error!!Try Again')</script>";
        }
    }

?>