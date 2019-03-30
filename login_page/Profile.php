<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:Login_page.php");  
} else {  
?> 
<!DOCTYPE html>
<html>
    <body>
        <h1> Hello! welcome .....<a href = "../logout.php"> LOGOUT! </a> </h1>
        <h2> <a href = "../add_cycle.php"> ADD CYCLES! </a> <br> <a href = "../transfer_ownership.php"> transfer ownership. </a> <br> </h2>
    </body>
</html>
<?php
}
?>
