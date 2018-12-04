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
    height: 800px;
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
echo "<h3>Courses Dropped by ".$_SESSION['username']."</h3>";

?>

<br>

	<table style="width:100%" font-size: 24px;>
  <tr>
  <th>Section Key</th>
    <th>Course Number</th>
    <th>Course Name</th>
    <th>Semester Dropped</th>
    <th>Drop Reason</th>
    <th>Drop Date</th>
    
    

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
//$sql = "SELECT Skey,Cnumber,Semester,reason,DropDate FROM dropped  WHERE Sandrewid ='".$_SESSION['username']."'";
$sql = "SELECT dropped.Skey,dropped.Cnumber,course.Cname,dropped.Semester,dropped.reason,dropped.DropDate FROM dropped INNER JOIN course ON dropped.Cnumber=course.Cnumber  WHERE dropped.Sandrewid ='".$_SESSION['username']."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
echo "<tr>".
"<th>".$row["Skey"]."</th>".
  "<th>".$row["Cnumber"]."</th>".
  "<th>".$row["Cname"]."</th>".
  "<th>".$row["Semester"]."</th>".
  "<th>".$row["reason"]."</th>".
  "<th>".$row["DropDate"]."</th> </tr>";



}
} else {
echo "<br>No courses dropped as yet";
}
echo "</table>";
$conn->close();           
?>



</div>

</body> 
</html> 