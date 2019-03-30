<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:Login_page.php");  
} else {  
?> 
<!DOCTYPE html>
<html>
<head>  
<link rel="stylesheet" href="cycle_style.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<form action="" method="POST" style="border:1px solid #ccc">
  <div class="container">
    <h1>Add Cycle</h1>
    <p>Please fill details of your cycle in this form.</p>
    <hr>

    <label for="brand"><b>Brand's Name</b></label>
    <input type="text" placeholder="Enter Brand's Name" name="brand" required>

    <label for="model"><b>Model's Name</b></label>
    <input type="text" placeholder="Enter Model's Name" name="model" required>

	<label for="color"><b>Color of Cycle</b></label>
    <input type="text" placeholder="Enter Color of Cycle" name="color" required>
    
    <label for="suspension" required><b>Have Suspensions:</b></label><br>    
  <input type="radio" name="sus" value="Y">Yes<br>
  <input type="radio" name="sus" value="N">No<br>
  <br>
  
	<label for="sub_cat" required><b>Geared:</b></label><br>    
  <input type="radio" name="gear" value="Y">Geared<br>
  <input type="radio" name="gear" value="N">Non-geared<br><br>
  
  <label for="sale" required><b>For Sale:</b></label><br>   
  <input type="radio" name="sale" value="Y">Yes<br>
  <input type="radio" name="sale" value="N">No<br>
  <br>
   <label for="image" ><b>Upload cycle's image:</b></label><br><br>
  <input type="file" name="pic" accept="image/*">
  
  <input type="submit" value="Submit"><br><br>
        

    <div class="clearfix">
      <button type="submit" class="cancelbtn" name = "cancel">Cancel</button>
      <button type="submit" class="signupbtn" name = "add">Add</button>
    </div>
  </div>
</form>
<?php 
  $un = $_SESSION['sess_user'];
  if(isset($_POST["cancel"])){
    echo "working";
    header("location: login_page/Profile.php");
  }
  else if(isset($_POST["add"])){
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $color = $_POST['color'];
    $sus = $_POST['sus'];
    $gear = $_POST['gear'];
    $sale = $_POST['sale'];
    $retrieve_id_query = mysql_query("SELECT reg_no FROM stu_details WHERE reg_no = """);
    $add_cycle_query = mysql_query("INSERT INTO cycle_detail(reg_no,brand, model, color, Suspension, geared, sale, ) VALUES('$un','$brand','$model','$color','$sus','$gear','$sale')");
  }
?>
</body>
</html>
<?php
}
?>
