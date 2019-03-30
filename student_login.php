<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:Login_page.php");  
} else {  
?> 
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

/* Style tab links */
.tablink {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 14px;
  width: 14.28%;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  display: none;
  padding: 100px 20px;
  height: 100%;
}
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
#Profile {background-color: silver;}
#Addition_of_cycle {background-color: white;}
#Transfer_of_ownership {background-color: white;}
#Deletion_of_cycle {background-color: silver;}
#Allotment_Application {background-color: white;}
#Available_Cycles {background-color: silver;}
#Logout{background-color: silver;}
</style>
</head>
<body>

<button class="tablink" onclick="openPage('Profile', this, 'silver')" id="defaultOpen">Profile</button>
<button class="tablink" onclick="openPage('Addition_of_cycle', this, 'silver')">Add cycle</button>
<button class="tablink" onclick="openPage('Transfer_of_ownership', this, 'silver')" >Transfer ownership</button>
<button class="tablink" onclick="openPage('Deletion_of_cycle', this, 'silver')">Delete Cycle</button>
<button class="tablink" onclick="openPage('Allotment_Application', this, 'silver')">Allotment Application</button>
<button class="tablink" onclick="openPage('Available_Cycles', this, 'silver')">Available Cycles</button>
<button action = "logout.php" class="tablink" onclick="openPage('Logout', this, 'silver')">Logout!</button>

<div id="Profile" class="tabcontent">
  <h3>Profile</h3>
  <p>Home is where the heart is..</p>
</div>

<div id="Addition_of_cycle" class="tabcontent">
  <form action="" method = "post" style="border:1px solid #ccc">
  <div class="container">
    <h1 align="center">Add Cycle</h1>
    <h3 align="center">Please fill details of your cycle in this form.</h3>
    <hr>

    <label for="brand"><b>Brand's Name</b></label>
    <input type="text" placeholder="Enter Brand's Name" name="brand" required>

    <label for="model"><b>Model's Name</b></label>
    <input type="text" placeholder="Enter Model's Name" name="model" required>

	<label for="color"><b>Color of Cycle</b></label>
    <input type="text" placeholder="Enter Color of Cycle" name="color" required>
    
    <label for="suspension"><b>Have Suspensions:</b></label><br>    

    <input type="radio" name="sus" value="Y" required>Yes<br>
    <input type="radio" name="sus" value="N">No<br>
    <br>
  
    <label for="sub_cat" required><b>Select sub-catagory:</b></label><br>    

    <input type="radio" name="gear" value="Y" required>Geared<br>
    <input type="radio" name="gear" value="N">Non-geared<br><br>
  
    <label for="sale" required><b>For Sale:</b></label><br>    

    <input type="radio" name="avail" value="Y" required>Yes<br>
    <input type="radio" name="avail" value="N">No<br>
    <br>

    <label for="image" ><b>Upload cycle's image:</b></label><br><br>
  
    <input type="file" name="pic" accept="image/*">
  
    <input type="submit" value="Submit">
    <br><br>
        

    <div class="clearfix">
      <button type="button" class="cancelbtn" name= "cancel" onclick="openPage('Profile', this, 'Red')">Cancel</button>
      <button type="submit" class="signupbtn" name= "add">Add</button>
    </div>
  </div>
</form>
<?php 
  $un = $_SESSION['sess_user'];
  // echo $un;
  $con=mysql_connect('localhost','root','') or die("not working");
  mysql_select_db('Cycles_DB') or die("cannot select DB");

  // $retrieve_id_query = mysql_query(" SELECT reg_no FROM stu_details WHERE reg_no = '".$un."' ");
  // echo $retrieve_id_query;
  //   while($row=mysql_fetch_assoc($retrieve_id_query))
  //   {
  //   $un2 = $row['reg_no'];
  //   echo $un2;
  //   }
  if(isset($_POST["add"])){
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $color = $_POST['color'];
    $sus = $_POST['sus'];
    $gear = $_POST['gear'];
    $sale = $_POST['avail'];
    echo $brand,$model,$color,$sus,$gear,$sale;
    
    $add_cycle_query = mysql_query("INSERT INTO cycle_detail(cycle_id,reg_no,brand, model, color, Suspension, geared, sale, images) VALUES('','$un','$brand','$model','$color','$sus','$gear','$sale','')");
  }
?>
  
</div>

<div id="Transfer_of_ownership" class="tabcontent">
  <form action="" method = "POST" style="border:1px solid #ccc">
  <div class="container">
    <h1 align="center">Transfer Ownership</h1>
    <h3 align="center">Please fill details of transferring cycle's ownership in this form.</h3>
    <hr>

    <label for="bid"><b>Buyer's Registration Number</b></label>
    <input type="text" placeholder="Enter Buyer's Registration Nummber" name="bid" required>

    <label for="cid"><b>Unique Cycle Id</b></label>
    <input type="text" placeholder="Enter Unique Cycle Id" name="cid" required>

	<label for="date"><b>Request Date</b></label>
    <input type="text" placeholder="Enter Request Date (yyyy-mm-dd)" name="date" required>
    
    <label for="price"><b>Cycle's selling Price</b></label>
    <input type="text" placeholder="Enter Cycle's selling Price" name="price" required>
  <br>
        
    <div class="clearfix">
      <button type="submit" class="cancelbtn" name="cancel" onclick="openPage('Profile', this, 'Red')">Cancel</button>
      <button type ="submit"  class="signupbtn" name="send">Send Request</button>
    </div>
</div>
</form>
</div>

<?php 
  $un = $_SESSION['sess_user'];
  echo $un;
  $con=mysql_connect('localhost','root','') or die("not working");
  mysql_select_db('Cycles_DB') or die("cannot select DB");
  // $retrieve_id_query = mysql_query(" SELECT reg_no FROM stu_details WHERE reg_no = '".$un."' ");
  // echo $retrieve_id_query;
  //   while($row=mysql_fetch_assoc($retrieve_id_query))
  //   {
  //   $un2 = $row['reg_no'];  
  //   echo $un2;}
  if(isset($_POST["send"])){
    echo "wroking";
    $buyer_id = $_POST['bid'];
    $cycle_id = $_POST['cid'];
    $date = $_POST['date'];
    $price = $_POST['price'];
    $t_ownership = mysql_query("INSERT INTO transfer_ownership(cycle_id,sell_id,buyer_id, req_date, price) VALUES('$cycle_id','$un','$buyer_id','$date','$price')");
  } 
  else {
    echo "Error";
  }
?>
<div id="Deletion_of_cycle" class="tabcontent">
<form action="" method = "POST" style="border:1px solid #ccc">
  <div class="container">
    <h1 align="center">Deletion of Cycle</h1>
    <label for="id"><b>Cycle's ID</b></label>
    <input type="text" placeholder="Enter Cycle's ID" name="cyid" required>
  <br>
        
    <div class="clearfix">
      <button type="submit" class="cancelbtn" name="cancel" onclick="openPage('Profile', this, 'Red')">Cancel</button>
      <button type ="submit"  class="signupbtn" name="delete">Delete</button>
    </div>
</div>
</form>
</div>
<?php 
  $un = $_SESSION['sess_user'];
  echo $un;
  $con=mysql_connect('localhost','root','') or die("not working");
  mysql_select_db('Cycles_DB') or die("cannot select DB");
  // $retrieve_id_query = mysql_query(" SELECT reg_no FROM stu_details WHERE reg_no = '".$un."' ");
  // echo $retrieve_id_query;
  //   while($row=mysql_fetch_assoc($retrieve_id_query))
  //   {
  //   $un2 = $row['reg_no'];  
  //   echo $un2;}
  if(isset($_POST["delete"])){
    echo "wroking";
    $cycl_id = $_POST['cyid'];
    $checking = mysql_query("SELECT * FROM cycle_detail WHERE cycle_id = '".$cycl_id."'");
    $numrowsy=mysql_num_rows($checking);
    if($numrowsy== 0)
    {
      echo "ID GALAT!";
    }
    else{
      $del = mysql_query("DELETE FROM cycle_detail WHERE cycle_id ='".$cycl_id."'");
      echo "DONE";
    }
  } 
  else {
    echo "Error";
  }
?>

<div id="Allotment_Application" class="tabcontent">
  <form id = "usrform" action="" method = "POST" style="border:1px solid #ccc">
  <div class="container">
    <h1 align="center">Application for Allotment</h1>
    <h3 align="center">Fill the form to request for allotment.</h3>
    <hr>
    <label for="duration" required><b>Allotment Duration</b></label><br> 
    <input type="text" placeholder="Duration(months)" name="duration" required>
    
     <label for="comments" required><b>Reasons(for allotment)</b></label><br> 
  <textarea rows="4" cols="50" name="commment" form="usrform" required>
   Enter text here</textarea>  

    <div class="clearfix">
      <button type="button" class="cancelbtn" onclick="openPage('Profile', this, 'Red')">Cancel</button>
      <button type="submit" class="signupbtn" name = "req">Request</button>
    </div>
  </div>
</form>
</div>
<?php
$un = $_SESSION['sess_user'];
echo $un;
$con=mysql_connect('localhost','root','') or die("not working");
mysql_select_db('Cycles_DB') or die("cannot select DB");
// $retrieve_id_query = mysql_query(" SELECT reg_no FROM stu_details WHERE reg_no = '".$un."' ");
// echo $retrieve_id_query;
//   while($row=mysql_fetch_assoc($retrieve_id_query))
//   {
//   $un2 = $row['reg_no'];  
//   echo $un2;}
if(isset($_POST["req"])){
  echo "wrrrroking";
  $dur = $_POST['duration'];
  $comments = stripslashes($_POST['commment']);
  //$checking = mysql_query("SELECT * FROM cycle_detail WHERE cycle_id = '".$cycl_id."'");
  //$numrowsy=mysql_num_rows($checking);
  //if($numrowsy== 0)
  // {
  //   echo "ID GALAT!";
  // }
  // else
    $request = mysql_query("INSERT INTO allotment_app(reg_no,allotment_duration,reason) VALUES('$un','$dur','$comments')");
    echo "DONE";
  // }
} 
else {
  echo " this Error";
}


?>

<div id="Available_Cycles" class="tabcontent">
  <h3>List of Cycles Available</h3>
  <p>Who we are and what we do.</p>
</div>

<div id="Logout" class="tabcontent">
  <h3><a href = "logout.php">Logout!</a></h3>
</div>

<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</body>
</html> 
<?php
}
?>