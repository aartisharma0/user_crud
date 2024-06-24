
<?php 
session_start();
if(isset($_SESSION['useremail']))
{
    unset($_SESSION['useremail']);
    unset($_SESSION['userId']);
    unset($_SESSION['isRegisterAsDonar']);
    echo "<script>window.location.assign('login.php?msg=Logout succesffuly&status=success')</script>";
}
?>