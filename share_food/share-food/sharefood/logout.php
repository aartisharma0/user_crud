
<?php 
session_start();
if(isset($_SESSION['adminemail']))
{
    unset($_SESSION['adminemail']);
    echo "<script>window.location.assign('admin_login.php?msg=Logout succesffuly&status=success')</script>";
}
?>