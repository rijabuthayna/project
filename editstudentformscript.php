<?php
// add student form script
session_start();
if (!(isset($_SESSION['students']))){
$_SESSION['students']= array();
}
if(!isset($_SESSION['users'])){
  $_array01= array("type"=>"admin", "password" =>"admin");
  $_SESSION['users'] = array("admin"=> $_array01);
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

//You do this if no violation of validation
$Andrewid = $_POST['Andrewid']; 
$StudentFName = $_POST['StudentFName']; 
$StudentLName = $_POST['StudentLName']; 
$StudentYear = $_POST['StudentYear']; 
$Major = $_POST['Major']; 
$BirthDate= $_POST['BirthDate']; 
$Password = $_POST['Password'];
$element= array("StudentFName" => $StudentFName, "StudentLName" => $StudentLName, "StudentYear" => $StudentYear, 
"Major" => $Major, "BirthDate" => $BirthDate);

$err01 = false;
$err01S = "";

if ($Andrewid == "" or $StudentFName == "" or $StudentLName == "" or $StudentYear == "" or $Major == "" or $BirthDate == "" or $Password == ""){
$err01 = true;
$err01S = "<br>please fill in all fields";

}

$err03 = false;
$err03S = "";

if (!(filter_var($StudentYear, FILTER_VALIDATE_INT))) {
    $err03 = true;
    $err03S ="<br>Year must be a number";
}

//error 2 would be true if that Andrew ID does not exist
$err02 = false;
$err02S = "";

//checking error 2
if (!(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$BirthDate))){
   $err02=true;
   $err02S = "<br>date is in wrong format.";
}

$err04 = false;
$err04S = "";

//checking error 4
if ((!preg_match("/^[a-zA-Z ]*$/",$StudentFName)) or is_numeric($StudentFName)) {
   $err04=true;
   $err04S = "<br>Students names must be text with no numbers.";

}

$err05 = false;
$err05S = "";

//checking error 4
if ((!preg_match("/^[a-zA-Z ]*$/",$StudentLName)) or is_numeric($StudentLName)) {
   $err05=true;
   $err05S = "<br>Students names must be text with no numbers.";

}

//check errors and if they exist print them
if ($err01){
  echo $err01S;
}
else if ($err02 or $err03 or $err04 or $err05){
  echo $err02S;
  echo $err03S;
  echo $err04S;
  echo $err05S;
}

//if no errors then you go aheaad and continue with everything else
else {

$_SESSION['students'][$Andrewid]=$element;

$_SESSION['users'][$Andrewid]=array('type'=>'student', 'password'=>$Password);

echo "<br><p style='color:Tomato;'><b>Student edited.</b></p>";
}
?>
</div>
</body> 
</html> 