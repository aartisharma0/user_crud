<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        include('config.php');
        $q="SELECT * from `courses` where `courses`='$id'";
        $r=mysqli_query($conn,$q);
        $query="DELETE FROM `courses` WHERE `id`=$id";
        $res=mysqli_query($conn,$query);
        if($res>0){
            echo "<script>window.location.assign('view_course.php?msg=Course Deleted Successfully')</script>";
        }
        else{
            echo "<script>window.location.assign('view_course.php?msg=Error!!Try Again')</script>";
        }
    }

?>