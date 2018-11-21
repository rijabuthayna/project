<?php
//edit course file

session_start();
if (!(isset($_SESSION['courses']))){
$_SESSION['courses']= array();
}
?>
<!DOCTYPE html> 
<html> 
<style>
.upper {
margin: auto;

    width: 50%;
    background-color: white;


height: 1200px;
    width: 500px;


} 
body{
background-color: DarkRed;
}
</style> 
<head> 
<title></title> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
</head> 
<body> 
<div class="upper" align="center">

<a href="http://www.dbproject14.net/Project/AdminHomePage.html">Admin Home Page</a>


<?php

$CourseNumber = $_POST['courseID']; 

if (isset($_SESSION['courses'][$CourseNumber])){

$CourseName = $_SESSION['courses'][$CourseNumber]['CourseName']; 
$InstructorName = $_SESSION['courses'][$CourseNumber]['InstructorName']; 
//$Department = $_SESSION['courses'][$CourseNumber]['Department']; 

echo "<h2> Edit course information of ". $CourseNumber.".</h2>
<form method='POST' action='editcourseformscript.php'> 
	
<input type='hidden' name='CourseNumber' value=".$CourseNumber."> 
<br/>
Course Name:   <input type='text' name='CourseName'  value=".$CourseName."> 
<br/>
InstructorName:        <input type='text' name='InstructorName'  value=".$InstructorName."> 
<br/>
Department:              
  <select name='Department'>
    <option value='IS'>IS</option>
    <option value='BS'>BS</option>
    <option value='CS'>CS</option>
    <option value='BA'>BA</option>
  </select>
<br/> 
<input type='submit' value='Submit'> 
</form> ";



}
else {
echo "<br><p><b>Error Course number not set.</b></p>";
}




?>
</div>
</body> 
</html> 