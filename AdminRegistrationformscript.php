<?php
//add registration form script

session_start();
if (!(isset($_SESSION['regs']))){
$_SESSION['regs']= array();
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
$AndrewID = $_POST['Andrewid']; 
//error 1 would be true if that the course number does not exist in session
$err01 = false;
$err01S = "";
//error 2 would be true if that Andrew ID does not exist
$err02 = false;
$err02S = "";
//error 3 would be true if registrarion already exists
$err03 = false;
$err03S = "";

//checking error  1
if (!(isset($_SESSION['courses'][$CourseNumber]))){
   $err01=true;
   $err01S = "<br>Course does not exist.";
}

//checking error 2
if (!(isset($_SESSION['students'][$AndrewID]))){
   $err02=true;
   $err02S = "<br>Andrew ID does not exist.";
}

if (isset($_SESSION['regs'][$AndrewID]) and in_array($CourseNumber, $_SESSION['regs'][$AndrewID])){
   $err03=true;
   $err03S = "<br>student already registered.";
}

//check errors and if they exist print them
if ($err01 or $err02 or $err03){
  echo $err01S;
  echo $err02S;
  echo $err03S;
}
//if no errors then you go aheaad and continue with everything else
else {
//These are the things you do if everything is fine and info is good
if (!(isset($_SESSION['regs'][$AndrewID]))){
$_SESSION['regs'][$AndrewID]= array();
}
array_push($_SESSION['regs'][$AndrewID],$CourseNumber);

echo "<br><p style='color:Tomato;'><b>New registration created.</b></p>";
//end of These are the things you do if everything is fine and info is good
}
?>
</div>
</body> 
</html> 