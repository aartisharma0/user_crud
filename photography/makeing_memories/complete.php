<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
   include('config.php');
   $query="UPDATE `booking` SET `status`='Completed' WHERE `id`=$id";
   $res=mysqli_query($conn,$query);
   if($res>0){
       echo "<script>window.location.assign('booking.php?msg=Accepted Successfully, Work in Progress!!')</script>";
   }
   else{
       echo "<script>window.location.assign('booking.php?msg=Error!!Try Again')</script>";
   }
}

?>