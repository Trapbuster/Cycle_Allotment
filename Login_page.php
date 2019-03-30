
<!DOCTYPE html>
<html>
<head>  
<link rel="stylesheet" href="../style.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<header>
  <h2>MNNIT CYCLE SOLUTIONS</a> </h2>
</header>

<section>
  <nav>
      <h2>Click Here to Login</h2>

      <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Student Login</button>

      <div id="id01" class="modal">
  
         <form class="modal-content animate" action="" method = "POST">

         <div class="imgcontainer">
         <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
         <img src="C:\Users\ritki\Desktop\Dbms project\login_page\student_login.jpg" alt="Avatar" class="avatar">
         </div>

         <div class="container">
         <label for="uname"><b>Username</b></label>
         <input type="text" placeholder="Enter registration number" name="uname" required>

         <label for="psw"><b>Password</b></label>
         <input type="password" placeholder="Enter Password" name="psw" required>
        
         <button type="submit" name = "login">Login</button>
         <label>
         <input type="checkbox" checked="checked" name="remember"> Remember me
         </label>
         </div>
        </form>
       </div>
  <?php  
    if(isset($_POST["login"])){ 
      if(!empty($_POST['uname']) && !empty($_POST['psw'])){
        $uname = $_POST['uname'];
        $pass = $_POST['psw'];
        $con=mysql_connect('localhost','root','') or die("not working");
        mysql_select_db('Cycles_DB') or die("cannot select DB");
        $query = mysql_query(" SELECT * FROM stu_details WHERE reg_no = '".$uname."' AND pass = '".$pass."' ");
        $numrows = mysql_num_rows($query);
        if($numrows != 0)
        {
          while($row=mysql_fetch_assoc($query))  
          {  
            $dbusername=$row['reg_no'];  
            $dbpassword=$row['pass'];  
            echo "this is the uname: ",$dbusername;
            echo "this is the pass: ",$dbpassword;

          }  
          if($uname == $dbusername && $pass == $dbpassword)  
          {  
          session_start();  
          $_SESSION['sess_user']=$uname;  
        
          /* Redirect browser */  
          header("Location: ../student_login.php");  
          } 
        }
        else {
          echo  nl2br("\nInvalid Username or password\n");
        }
      }
      else{
        echo nl2br("\n All fields are required!\n");
      }
     }
  ?>
     <script>
     // Get the modal
     var modal = document.getElementById('id01');

     // When the user clicks anywhere outside of the modal, close it
     window.onclick = function(event) {
     if (event.target == modal) {
        modal.style.display = "none";
     }
     }
     </script>   

       <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Admin Login</button>

       <div id="id02" class="modal">
  
          <form class="modal-content animate" action="/action_page.php">
          <div class="imgcontainer">
          <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
          <img src="C:\Users\ritki\Desktop\Dbms project\login_page\admin_login.png" alt="Avatar" class="avatar">
          </div>

          <div class="container">
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="uname" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>
        
          <button type="submit">Login</button>
          <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
          </label>
          </div>
      </div>
     </form>
       <script>
       // Get the modal
       var modal = document.getElementById('id02');

      // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
        modal.style.display = "none";
        }
       }
        </script>

       <button onclick="document.getElementById('id03').style.display='block'" style="width:auto;">Signup</button>

       <div id="id03" class="modal">
  
      <form class="modal-content animate" action="" method = "POST">
      <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="name"><b>Name</b></label>
      <input type="text" placeholder="Enter Name" name="name" required>
      
      <label for="reg"><b>Registration Number</b></label>
      <input type="text" placeholder="Enter Registration Number" name="reg" required>
      
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>
      
      <label for="phone"><b>Contact Number</b></label>
      <input type="text" placeholder="Enter Contact Number" name="phone" required>


	  <label for="addr"><b>Hostel</b></label>
      <input type="text" placeholder="Enter hostel name" name="addr" required>
      
      <label for="year"><b>Year</b></label>
      <input type="text" placeholder="Enter Year" name="year" required>


      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
      
      
      <label for="ownership"><b></b></label>
      <h3>Are you an owner?</h3>
      <input type="radio" name="ownership" value="Y" checked> YES<br>
      <input type="radio" name="ownership" value="N"> NO<br>
      <br>
      
      <!-- <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label> -->
      
      
      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn" name = "signup" >Sign Up
        </button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id03');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
      </div>
     </form>
        <script>
       // Get the modal
       var modal = document.getElementById('id03');

      // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
        modal.style.display = "none";
        }
       }
        </script>
  </nav>
  
  <article>
    <p><h3><i>"The greatest achievement of the human spirit is to live up to one's opportunities and make the most of one's resources".</h3></i></p>
    <p>MNNIT believes in this theory of 'Luc de Clapiers' and has been working constantly in managing the resources of the institute efficiently.Every year students
       leave their cycles in the hostel premises.These cycles can be used by the newly admitted students who used to purchase new cycles and can also be alloted to 
       the staffs as well.Carrying the same idea forward, this site has been developed where students will make an entry regarding the details of their cycles.The 
       cycles available for sale can be viewed from the list and can be purchased by contacting the respective owner and admin.This way the ownership can be transferred
       from one to another.Cycles with no owner can be alloted by the admin to the staff as well as to the students.</p>
    <p>Thus the cycles available can be used efficiently in rotation and this will avoid the chaos created when large number of cycles are shifted from the hostels
        every year.</p>
  </article>

</section>

  

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="C:\Users\ritki\Desktop\Dbms project\login_page\MNNIT_Allahabad.jpeg" vspace="50" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="C:\Users\ritki\Desktop\Dbms project\login_page\mnnit2.jpeg" vspace="50" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="C:\Users\ritki\Desktop\Dbms project\login_page\mnnit3.jpg" vspace="50" style="width:100%">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }  
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 4000); // Change image every 2 seconds
}
</script>


<footer>
  <p vspace="50">Created and Developed by students of CSE 3rd year</p>
</footer>

<?php  
if(isset($_POST["signup"])){  
  
if(!empty($_POST['name']) && !empty($_POST['reg'])&& !empty($_POST['email'])
&& !empty($_POST['phone'])&& !empty($_POST['addr'])&& !empty($_POST['year'])
&& !empty($_POST['psw'])
&& !empty($_POST['psw-repeat'])&& !empty($_POST['ownership'])){ 
    $reg=$_POST['reg'];  
    $pass=$_POST['psw'];
    $pass_rep=$_POST['psw-repeat'];
    $phone=$_POST['phone'];
    $addr=$_POST['addr'];
    $year=$_POST['year'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $own=$_POST['ownership'];  
  
    $con=mysql_connect('localhost','root','') or die("not working");
    echo "working"  ;
    mysql_select_db('Cycles_DB') or die("cannot select DB");  
  
    $query=mysql_query("SELECT * FROM stu_details WHERE reg_no='".$reg."'");  
    $numrows=mysql_num_rows($query);  
    if($pass == $pass_rep)
    {
      if($numrows==0)  
    {  
    $sql="INSERT INTO stu_details(nam, reg_no, email,con_no,addres, years, pass, owner_) VALUES('$name', '$reg','$email','$phone','$addr', '$year','$pass','$own')";  
  
    $result=mysql_query($sql);  
        if($result){  
    echo "Account Successfully Created";  
    } else {  
    echo "Failure!";  
    }  
  
    } else {  
    echo "That username already exists! Please try again with another.";  
    } }
    else{
      echo " Passwords do not match!!";
    } 
  
} else {  
    echo "All fields are required!";  
}  
} 
?>  
</body>
</html>
