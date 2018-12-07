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

<table style="width:100%" bgcolor="DarkRed">
  <tr>
    <th><a href="http://www.dbproject14.net/Project/studentprofileview.php">View Profile</a></th>
    <th><a href="http://www.dbproject14.net/Project/studentgrades.php"> My Grades </a> </th>
    <th><a href="http://www.dbproject14.net/Project/Scourselist.php">Course List</a></th>
    <th><a href="http://www.dbproject14.net/Project/StudentRegistrationList.php">Registrations</a></th> 
    <th><a href="http://www.dbproject14.net/Project/studentcoursedrops.php">View Course Drops </a> </th>

   

  </tr>
  </table>

<?php
echo "<h2>Grades for ".$_SESSION['username']."</h2>";

?>
<br>
<h3>These are your taken courses & grades from past semesters! </h3>
<br>

	<table style="width:100%" font-size: 24px;>
  <tr>
  <th>Course Number</th>
  <th>Course Name</th>
  <th>Grade</th>
  <th>Grade Type</th>
  
  <th>Semester Taken</th>
    
 
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

$sql = "SELECT taken.Cnumber,course.Cname,taken.grade,taken.GradeOrPassFail,taken.TakenSemester FROM taken INNER JOIN course ON taken.Cnumber=course.Cnumber WHERE taken.Sandrewid ='".$_SESSION['username']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
echo "<tr>".
  "<th>".$row["Cnumber"]."</th>".
  "<th>".$row["Cname"]."</th>".
  "<th>".$row["grade"]."</th>".
  "<th>".$row["GradeOrPassFail"]."</th>".
  "<th>".$row["TakenSemester"]."</th> </tr>";



}
} else {
echo "<br>No grades to show for now";
}
echo "</table>";
$conn->close();           
?>
</br>
</br>
</br>
</br>

</div>
</body> 
</html> 