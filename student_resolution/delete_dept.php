<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        include('config.php');
        $q="SELECT * from `department` where `department`='$id'";
        $r=mysqli_query($conn,$q);
        $query="DELETE FROM `department` WHERE `id`=$id";
        $res=mysqli_query($conn,$query);
        if($res>0){
            echo "<script>window.location.assign('manage_dept.php?msg=Department Deleted Successfully')</script>";
        }
        else{
            echo "<script>window.location.assign('manage_dept.php?msg=Error!!Try Again')</script>";
        }
    }

?>