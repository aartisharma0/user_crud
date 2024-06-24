<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        include('config.php');
        $q="SELECT * from `student` where `student`='$id'";
        $r=mysqli_query($conn,$q);
        $query="DELETE FROM `student` WHERE `id`=$id";
        $res=mysqli_query($conn,$query);
        if($res>0){
            echo "<script>window.location.assign('manage_stu.php?msg=Student Deleted Successfully')</script>";
        }
        else{
            echo "<script>window.location.assign('manage_stu.php?msg=Error!!Try Again')</script>";
        }
    }

?>