<?php 
    if(isset($_REQUEST['donar'])){
        include_once 'config.php';
        $id = $_REQUEST['id'];
        $donarid = $_REQUEST['donarid'];
        $q = "update donate_request set isPending=0,recieverId =$donarid where id=$id";
        mysqli_query($conn,$q);
    echo "<script>window.location.assign('donaterequest.php?msg=Requester Assign&status=success')</script>";
    }
    if(isset($_REQUEST['req'])){
        include_once 'config.php';
        $id = $_REQUEST['id'];
        $donarid = $_REQUEST['donarid'];
        $q = "update donate_request set isPending=0,donarId =$donarid where id=$id";
        mysqli_query($conn,$q);
    echo "<script>window.location.assign('foodrequest.php?msg=Donar Assign&status=success')</script>";
    }
?>