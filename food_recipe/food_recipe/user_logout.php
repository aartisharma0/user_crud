<?php
session_start();
unset($_SESSION['user_email']);
unset($_SESSION['user']);
echo "<script>window.location.assign('user_login.php?msg=logout succesfully')</script>";
// echo header('location:login.php?msg=logout succesfully');

?>