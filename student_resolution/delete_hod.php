<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        include('config.php');
        $q="SELECT * from `hod` where `hod`='$id'";
        $r=mysqli_query($conn,$q);
        $query="DELETE FROM `hod` WHERE `id`=$id";
        $res=mysqli_query($conn,$query);
        if($res>0){
            echo "<script>window.location.assign('manage_hod.php?msg=HOD Deleted Successfully')</script>";
        }
        else{
            echo "<script>window.location.assign('manage_hod.php?msg=Error!!Try Again')</script>";
        }
    }

?>