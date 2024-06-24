<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        include('config.php');
        $q="SELECT * from `notes` where `notes`='$id'";
        $r=mysqli_query($conn,$q);
        $query="DELETE FROM `notes` WHERE `id`=$id";
        $res=mysqli_query($conn,$query);
        if($res>0){
            echo "<script>window.location.assign('viewnotesu.php?msg=Notes Deleted Successfully')</script>";
        }
        else{
            echo "<script>window.location.assign('viewnotesu.php?msg=Error!!Try Again')</script>";
        }
    }

?>