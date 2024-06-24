<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        include('config.php');
        $q="SELECT * from `work` where `work`='$id'";
        $r=mysqli_query($conn,$q);
        $query="DELETE FROM `work` WHERE `id`=$id";
        $res=mysqli_query($conn,$query);
        if($res>0){
            echo "<script>window.location.assign('manage_work.php?msg=Work Deleted Successfully')</script>";
        }
        else{
            echo "<script>window.location.assign('manage_work.php?msg=Error!!Try Again')</script>";
        }
    }

?>