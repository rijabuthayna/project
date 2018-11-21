<?php
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
<a href="http://www.dbproject14.net/Project/StudentHomePage.html">Student Home Page</a>
<?php
if ((isset($_SESSION['userID']))){

$CourseNumber = $_POST['CourseNumber']; 
$AndrewID = $_SESSION['userID'];

//error 1 for course doesn't exist
$err01 = false;
$err01S = "";

//error 2 for double registration
$err02 = false;
$err02S = "";

if ($CourseNumber == "" or $AndrewID == ""){echo "<br> Please enter the required fields";}

//check for error  1
if (!(isset($_SESSION['courses'][$CourseNumber]))){
   $err01=true;
   $err01S = "<br>Course does not exist.";
}

//check for error 2
if (isset($_SESSION['regs'][$AndrewID]) and in_array($CourseNumber, $_SESSION['regs'][$AndrewID])){
   $err02=true;
   $err02S = "<br>student already registered.";
}

//check if errors there and print them
if ($err01 or $err02){
  echo $err01S;
  echo $err02S;
}

//no errors then go to else statement
else {
if (!(isset($_SESSION['regs'][$AndrewID]))){
$_SESSION['regs'][$AndrewID]= array();
}
array_push($_SESSION['regs'][$AndrewID],$CourseNumber);


echo "<br><p style='color:Tomato;'><b>New registration created.</b></p>";}

}

else{
echo "<br><p style='color:Tomato;'><b>ERROR LOG IN AGAIN.</b></p>";
}

?>
</div>
</body> 
</html> 