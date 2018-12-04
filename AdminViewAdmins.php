<?php
session_start();
if($_SESSION['type']!='admin'){
echo '<script type="text/javascript">
alert("You do not have access to this page, log in again");
location="http://www.dbproject14.net/Project/login.html";
</script>';
}
?>
<!DOCTYPE html> 
<html>
<style>
/* Admin View Admins */
/*dropdown list*/
.dropbtn {
background-color:DarkRed;
    color: Black;
    padding: 16px;
    font-size: 16px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

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

.dropdown-content a:hover {color:DarkRed;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {color:#FAF6F1;}
/*dropdown list*/

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

<h2 class="topright2">For <?php echo $_SESSION['username'];?> </h2> 

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
  <button class="dropbtn">View Profile</button>
  <div class="dropdown-content">
    <a href="http://www.dbproject14.net/Project/AdminProfileView.php">Profile View</a>
    <a href="http://www.dbproject14.net/Project/AdminChangePass.php">Change Password</a>
  </div>
  </div>
  </th> 
  
  <th> <div class="dropdown">
  <button class="dropbtn">Courses</button>
  <div class="dropdown-content">
    <a href="http://www.dbproject14.net/Project/AdminViewCourses.php">View Courses</a>
    <a href="http://www.dbproject14.net/Project/AddCourseForm.php">Add Course</a>
  </div>
  </div>
  </th>
  
    <th> <div class="dropdown">
  <button class="dropbtn">Students</button>
  <div class="dropdown-content">
    <a href="http://www.dbproject14.net/Project/AdminViewStudents.php">View Students</a>
    <a href="http://www.dbproject14.net/Project/AddStudentForm.php">Add Student</a>
    <a href="http://www.dbproject14.net/Project/EnterGrade.php">Enter Grade Form</a>
  </div>
  </div>
  </th>

    <th> <div class="dropdown">
  <button class="dropbtn">Employees</button>
  <div class="dropdown-content">
    <a href="http://www.dbproject14.net/Project/AdminViewAdmins.php">View Admins</a>
    <a href="http://www.dbproject14.net/Project/AddAdminForm.php">Add Admin</a>
    <a href="http://www.dbproject14.net/Project/AdminViewProfessors.php">View Professors</a>
    <a href="http://www.dbproject14.net/Project/AddProfForm.php">Add Professor</a>
  </div>
  </div>
  </th>
  
  
  


  </tr>
  </table>
</font>

<h3>View Admins </h3>
<br>
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
$sql = "SELECT * FROM admin";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "

<font size='4'>
	<table style='width:100%';>
  <tr>
    <th>Andrewid</th>
    <th>Delete</th>
    
  </tr>";
  
while($row = $result->fetch_assoc()) {
echo "
  <tr>
   <th>".$row['AandrewID']."</th>

  <th>
<form method='POST' action='AdminDelete.php'> 
<input type='hidden' name='AndrewID' value=".$row['AandrewID'].">
<input type='submit' class='b1' value='Delete'> 
</form>  
  </th>   
  </tr>";
}
echo"
</table>
</font>";
}
else{
echo "<br>We do not have any admins currently, it is probably because you deleted them all including yourself.<br>
email bmulla@qatar.cmu.edu and she will add you back again";
}
?>
<br>
<br>
<br>
<br>
</div>
</body> 
</html> 