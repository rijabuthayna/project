<?php
session_start();
if($_SESSION['type']!='professor'){
echo '<script type="text/javascript">
alert("You do not have access to this page, log in again");
location="http://www.dbproject14.net/Project/login.html";
</script>';
}
?>
<html>
<style>
.topleft {

    position: absolute;
    top: 8px;
    left: 5px;
    font-size: 24px;

}
.topleft2 {

    position: absolute;
    top: 29px;
    left: 5px;
    font-size: 24px;

}
.topright {

    position: absolute;
    top: 8px;
    right: 5px;
    font-size: 24px;

}
.topright2 {

    position: absolute;
    top: 29px;
    right: 5px;
    font-size: 24px;

}
.topright3 {

    position: absolute;
    top: 53px;
    right: 5px;
    font-size: 24px;

}
.upper {
font-size: 24px;
position: absolute;
top: 15.5%;
  left: 10.9%;
margin: auto;
    width: 50%;
    height: 600px;
    width: 1000px;
        background-color: #FAF6F1;
        
    color:black;
} 
.upper2 {
font-size: 24px;
position: relative;

margin: auto;
    width: 50%;
    height: 110px;
    width: 1000px;
        background-color: DarkRed;
    color: #FAF6F1;
}
body{
color: #92a8d1;
background-image: url("tprint.png");
} 
/* unvisited link */
a:link {
    color: Black;
}

/* visited link */
a:visited {
    color: Black;
}

/* mouse over link */
a:hover {
    color: #FAF6F1;
}

/* selected link */
a:active {
    color: Black;
}
table, th, td {
    border: 1px solid black;
}


</style>
<head> 
<title></title> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
</head> 
<body> 


<div class="upper2" align="center">
<h2 class="topright">SIO(Student Information Online)</h2>

<h2 class="topright2">
<?php
echo "For ".$_SESSION['username']." !</h2>";

?>


<h2 class="topright3"><a href="http://www.dbproject14.net/Project/logout.php">Logout</a></h2> 
<h2 class="topleft"> Carnegie Mellon University</h2> 

<h2 class="topleft2">  Qatar </h2>
<br/>
<br/>
<br/>
<br/>

</div>

<div class="upper" align="center">
<font size="4">
<table style="width:100%" bgcolor="DarkRed">
  <tr>
  <th> <div class="dropdown">
  
  <div class="dropdown-content">
    <a href="http://www.dbproject14.net/Project/profprofileview.php">My profile</a>
    <br/>
    
  </div>
  </div>
  </th> 
  <th> <div class="dropdown">
  
  <div class="dropdown-content">
    <a href="http://www.dbproject14.net/Project/profviewcourses.php">My Sections & Courses</a>
    
  </div>
  </div>
  </th>
  

    <th> <div class="dropdown">
  
  <div class="dropdown-content">
    <a href="http://www.dbproject14.net/Project/profviewenroll.php">View Regs & Waitlists</a>
    
  </div>
  </div>
  </th>




    <th> <div class="dropdown">
  
  <div class="dropdown-content">
    <a href="http://www.dbproject14.net/Project/profviewdrops.php">View Drops</a>
    
  </div>
  </div>
  </th>
  
  </tr>
  </table>
</font>

<?php
echo "<h3>Waitlisted Students for ". $_SESSION['username']."'s course ".$_POST['CourseNumber']." for Semester ".$_POST['sem']."</h3>";
?>
<table style="width:100%" font-size: 24px;>
  <tr>
  
  
    
  </tr>
  <?php
$dbServerName = "localhost";
$dbUsername = "inclass6bmulla";
$dbPassword = "admin";
$dbName = "sio_rb";

$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$cnumber = $_POST['CourseNumber'];
$section = $_POST['section'];


$sql = "SELECT register.Sandrewid,course.Cname FROM register,course WHERE register.regOrWaitlist='WL' AND register.Cnumber= " .$_POST['CourseNumber']. " AND register.Skey='" .$_POST['section']. "' AND register.Semester='" .$_POST['sem']. "' AND register.Cnumber= course.Cnumber" ; 

$result = $conn->query($sql);


if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
echo "<tr>".
  "<th>".$row["Sandrewid"]."</th> </tr>";
 
 



}
} else {
echo "<br>No one is on the waitlist for this course yet";
}

echo "</table>";
$conn->close();           
?>
</div>
</body>
</html>

