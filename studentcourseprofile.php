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

.b1 {
color:#FFFFFF;
display:inline-block;
padding:0.3em 1.2em;
margin:0 0.1em 0.1em 0;
border:0.16em solid rgba(255,255,255,0);
border-radius:2em;
box-sizing: border-box;
font-size: 16px;
background-color: #4CAF50;
 
}

.b1:hover{
color:#FFFFFF;
background-color:#228300;
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
  left:10.9%;
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


<h2 class="topright3"><a href="http://www.dbproject14.net/Project/Scourselist.php">Logout</a></h2> 
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
$sql = "SELECT * FROM course WHERE Cnumber=".$_POST['Cnumber'];
$result = $conn->query($sql);

//if ($result->num_rows != 1) {
//echo '<script type="text/javascript">
//alert("We have two records with taht course number");
//location="http://www.dbproject14.net/Project/AdminViewCourses.php";
//</script>';
//}

$row = $result->fetch_assoc();

echo"

<h3>Profile of ".$row['Cname'].", ".$_POST['Cnumber']." </h3>

<h4>Unit number is: ".$row['UnitNumber']."</h4>
<h4>Department number is: ".$row['Dnumber']."</h4>

<h4> Section List </h4>";

//we are now connecting again to look at the section

$sql2 = "SELECT * FROM section WHERE Cnumber=".$_POST['Cnumber'];
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
echo "<font size='3'>
	<table style='width:100%';>
  <tr>
    <th>Section key</th>
    <th>Instructor AndrewID(s)</th>
    <th>Add Deadline</th> 
    <th>Student Capacity</th>
    <th>Waitlist Limit</th>
    <th>Section StartDate</th>
    <th>Section EndDate</th>
    <th>Drop Deadline</th>
    <th>Semester</th>
    <th>Register</th>
    <th>View Section profile</th>

  </tr>  ";
while($row2 = $result2->fetch_assoc()) { 
  echo"
  <tr>
    <th>".$row2['Skey'] ."</th><th>";

//WE will have a third connection to read the teaching table
$sql3 = "SELECT * FROM teaches WHERE Cnumber= ".$_POST['Cnumber']." AND Skey='".$row2['Skey']."' AND Semester='".$row2['Semester']."'";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {

while($row3 = $result3->fetch_assoc()) { 
echo $row3['PandrewID'].", ";
}
}
  echo "</th>
    <th>".$row2['adddeadline']."</th> 
    <th>".$row2['studentcap']."</th>
    <th>".$row2['waitlistlim']."</th>
    <th>".$row2['SectionStartDate']."</th>
    <th>".$row2['SectionEndDate']."</th>
    <th>".$row2['dropdeadline']."</th>
    <th>".$row2['Semester']."</th>";
    
    
    
echo"  <th>
<form method='POST' action='SAddReg.php'> 
<input type='hidden' name='Skey' value=".$row2['Skey'].">
<input type='hidden' name='Cnumber' value=".$_POST['Cnumber'].">
<input type='hidden' name='Semester' value=".$row2['Semester'].">
<input type='hidden' name='AndrewID' value='".$_SESSION['username']."'> 
<input type='submit' class='b1' value='Add'> 
</form>  
  </th>";

echo"
<th>
<form method='POST' action='SSectionProfile.php'> 
<input type='hidden' name='Skey' value=".$row2['Skey'].">
<input type='hidden' name='Cnumber' value=".$_POST['Cnumber'].">
<input type='hidden' name='Semester' value=".$row2['Semester'].">
<input type='submit' class='b1' value='View'> 
</form> ";

}
echo "</table>
</font>";
}
else {
echo "<h4>This course does not have any sections yet</h4>";

}

if (isset($row['Description'])){
echo "<h4> Course Description </h4>
<h5> ".$row['Description'] ."</h5>";
}
if (isset($row['KeyTopics'])){
echo "<h4> Key Topics </h4>
<h5> ".$row['KeyTopics'] ."</h5>";
}
if (isset($row['Cgoals'])){
echo "<h4> Course Goals </h4>
<h5> ".$row['Cgoals'] ."</h5>";
}

?>

</div>

</body> 
</html>

















