<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        include('config.php');
        $q="SELECT * from `subject` where `subject`='$id'";
        $r=mysqli_query($conn,$q);
        $query="DELETE FROM `subject` WHERE `id`=$id";
        $res=mysqli_query($conn,$query);
        if($res>0){
            echo "<script>window.location.assign('view_subject.php?msg=Subject Deleted Successfully')</script>";
        }
        else{
            echo "<script>window.location.assign('view_subject.php?msg=Error!!Try Again')</script>";
        }
    }

?>