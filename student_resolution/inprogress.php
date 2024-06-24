<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
   include('config.php');
   $query="UPDATE `complaint` SET `status`='In-Progress' WHERE `id`=$id";
   $res=mysqli_query($conn,$query);
   if($res>0){
       echo "<script>window.location.assign('manage_hodcomplaints.php?msg=Accepted Successfully, Work in Progress!!')</script>";
   }
   else{
       echo "<script>window.location.assign('manage_hodcomplaints.php?msg=Error!!Try Again')</script>";
   }
}

?>