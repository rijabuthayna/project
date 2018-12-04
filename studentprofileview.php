<?php
session_start();
if($_SESSION['type']!='student'){
echo '<script type="text/javascript">
alert("You do not have access to this page, log in again");
location="http://www.dbproject14.net/Project/login.html";
</script>';
}
?>
<!DOCTYPE html> 
<html>
<style>


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

</style> 
<head> 
<title></title> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
</head> 
<body> 
<div class="upper2" align="center">
<h2 class="topright">SIO(Student Information Online)</h2>

<h2 class="topright2">For andrewid </h2> 

<h2 class="topright3"><a href="http://www.dbproject14.net/Project/logout.php">Logout</a></h2> 
<h2 class="topleft"> Carnegie Mellon University</h2> 

<h2 class="topleft2">  Qatar </h2>
<br/>
<br/>
<br/>
<br/>

</div>

<div class="upper" align="center">

<table style="width:100%" bgcolor="DarkRed">
  <tr>
    <th><a href="http://www.dbproject14.net/Project/studentprofileview.php">View Profile</a></th>
    <th><a href="http://www.dbproject14.net/Project/studentgrades.php"> My Grades </a> </th>
    <th><a href="http://www.dbproject14.net/Project/Scourselist.php">Course List</a></th>
    <th><a href="http://www.dbproject14.net/Project/StudentRegistrationList.php">Registrations</a></th> 
    <th><a href="http://www.dbproject14.net/Project/studentcoursedrops.php">View Course Drops </a> </th>

    
  </tr>
  </table>



<h2> Student Profile </h2>

<?php
echo "<h3>Your Andrew ID is ".$_SESSION['username']."</h3>";

?>
<br/>
<table style="width:100%" font-size: 24px;>
  <tr>
  <th>First name</th>
  <th>Last name</th>
  <th>Contact Number</th>
  <th>DOB</th>
  
  <th>Gender</th>
  <th>Preferred name</th>
  <th>Max units carried</th>
  <th>Nationality</th>
    
 
  </tr>



<?php
$andrewID = $_SESSION['username']; 

$dbServerName = "localhost";
$dbUsername = "inclass6bmulla";
$dbPassword = "admin";
$dbName = "sio_rb";

// create connection
$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//sql statement to select one guest based on last name
//$sql = "SELECT Cnumber,grade,GradeOrPassFail,TakenSemester FROM taken  WHERE Sandrewid ='".$_SESSION['username']."'";

$sql = "SELECT student.Sfirstname,student.Slastname,studentPhoneNumber.Sphonenumber,student.Sbirthdate,student.Sgender,student.Spreferredname,student.Smaxunit,Snationality FROM  student INNER JOIN  studentPhoneNumber ON  student.Sandrewid= studentPhoneNumber.Sandrewid  WHERE  student.Sandrewid ='".$_SESSION['username']."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
echo "<tr>".
  "<th>".$row["Sfirstname"]."</th>".
  "<th>".$row["Slastname"]."</th>".
  "<th>".$row["Sphonenumber"]."</th>".
  "<th>".$row["Sbirthdate"]."</th>".
  "<th>".$row["Sgender"]."</th>".
  "<th>".$row["Spreferredname"]."</th>".
  "<th>".$row["Smaxunit"]."</th>".
  
  "<th>".$row["Snationality"]."</th> </tr>";



}
} else {
echo "<br>No info entered";
}
echo "</table>";
$conn->close();           
?>
<br/>
<a href="http://www.dbproject14.net/Project/profchangepass.php">Change My Password</a>

</div>
</body> 
</html> 