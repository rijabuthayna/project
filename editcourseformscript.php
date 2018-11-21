<?php
//edit course form script

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


height: 200px;
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
$CourseNumber = $_POST['CourseNumber']; 
$CourseName = $_POST['CourseName']; 
$InstructorName = $_POST['InstructorName']; 
$Department = $_POST['Department']; 
//error 1 is that course number must be a number
$err01 = false;
$err01S = "";
//error 2 is that instructor name must be text
$err02 = false;
$err02S = "";
//error 3 is that all fields must not be empty
$err03 = false;
$err03S = "";


//checking error  1

if (empty($CourseNumber)){
   $err03 = true;
   $err03S = "<br>all fields must be filled";
}

else if (!is_numeric($CourseNumber)){
   $err01=true;
   $err01S = "<br>Course number must be a number.";

}
if (empty($InstructorName)){
   $err03 = true;
   $err03S = "<br>all fields must be filled";
}
//checking error 2
else if ((!preg_match("/^[a-zA-Z ]*$/",$InstructorName)) or is_numeric($InstructorName)) {
   $err02=true;
   $err02S = "<br>Instructor name must be text with no numbers.";

}

//check errors and if they exist print them
if ( empty($CourseName)){
   $err03 = true;
   $err03S = "<br>all fields must be filled";
}

if ($err01 or $err02 or $err03){
  echo $err01S;
  echo $err02S;
  echo $err03S;

}
//if no errors then you go aheaad and continue with everything else
else {

$element= array("CourseName" => $CourseName, "InstructorName" => $InstructorName, "Department" => $Department);

$_SESSION['courses'][$CourseNumber] = $element;

echo "<br><p style='color:Tomato;'><b>Course edited.</b></p>";
}

?>
</div>
</body> 
</html> 