<?php   
session_start();  
unset($_SESSION['sess_user']);  
session_destroy();  
header("location:login_page/Login_page.php");  
?>  