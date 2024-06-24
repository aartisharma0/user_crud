<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        include('config.php');
        $query="DELETE FROM `nanny` WHERE `id`=$id";
        $res=mysqli_query($conn,$query);
        if($res>0){
            echo "<script>window.location.assign('manage_nanny.php?msg=Nanny Deleted Successfully')</script>";
        }
        else{
            echo "<script>window.location.assign('manage_nanny.php?msg=Error!!Try Again')</script>";
        }
    }

?>