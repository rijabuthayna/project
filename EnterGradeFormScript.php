<?php
//Enter grade form script
$AndrewID = $_POST['AndrewID']; 
$CourseID = $_POST['CourseID']; 
$GOPF = $_POST['GOPF']; 
$grade = $_POST['grade']; 
$tsem = $_POST['tsem']; 

$dbServerName = "localhost";
$dbUsername = "inclass6bmulla";
$dbPassword = "admin";
$dbName = "sio_rb";
$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//This one is true if AndrewID is empty
$err01=false;
$err01S="";

if (empty($AndrewID)){
$err01=true;
$err01S="Andrew ID is required, ";
}

//This one is true if CourseID is empty
$err02=false;
$err02S="";

if (empty($CourseID)){
$err02=true;
$err02S="Course ID is required, ";
}


//This one is true if grade is empty
$err04=false;
$err04S="";
//This one is true if grade is not in the correct format one single Capital letter if GOPF is rgade and P or F if GOPF is passfail
$err08=false;
$err08S="";
if (empty($grade)){
$err04=true;
$err04S="Grade is required, ";
}
else if ($GOPF=='G'){
if (!(preg_match("/^[ABCDFR]$/", $grade))){
$err08=true;
$err08S="grade is in wrong format must be (A,B,C,D,F, or R), ";
}
}
else if ($GOPF=='PF'){
if (!(preg_match("/^(P|F)$/", $grade))){
$err08=true;
$err08S="grade is in wrong format must be P or F, ";
}
}
//This one is true if tsem is empty
$err05=false;
$err05S="";
//This one is true if tsem is not in the correct format F16
$err09=false;
$err09S="";
if (empty($tsem)){
$err05=true;
$err05S="taken semester is required, ";
}

else if(!(preg_match("/^(S|F)[1-2][0-9]$/", $tsem))){
$err09=true;
$err09S="taken semester is in wrong format, ";
}

//This one is true if AndrewID does not exist
$err06=false;
$err06S="";

if (!$err01){
$sql = "SELECT Sandrewid FROM student WHERE Sandrewid = '".$_POST['AndrewID']."'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
$err06=true;
$err06S="Andrew ID does not exist, ";}
}


//This one is true if Cnumber is not a number
$err07=false;
$err07S="";
if (!$err02){
if (!is_numeric($CourseID)){
   $err07=true;
   $err07S = "Course ID must be a number, ";
}}

//This one is true if CourseID does not exist
$err03=false;
$err03S="";

if (!$err07){
$sql3 = "SELECT Cnumber FROM course WHERE Cnumber=".$CourseID;
$result3 = $conn->query($sql3);

if ($result3->num_rows == 0) {
$err03=true;
$err03S="Course ID does not exist, ";}
}


//This one is true if courseID and Andrew ID exist in taken
$err10=false;
$err10S="";
$sql = "SELECT Cnumber,Sandrewid,TakenSemester FROM taken WHERE Cnumber=".$CourseID." AND Sandrewid= '".$AndrewID."' AND TakenSemester='".$tsem."'" ;
$result = $conn->query($sql);

if ($result->num_rows != 0) {
$err10=true;
$err10S="Grade for this student in this course will be updated, ";}


if ($err01  or $err02 or $err03 or $err04 or $err05 or $err06 or $err07 or $err08 or $err09){
echo '<script type="text/javascript">
alert("'.$err01S.$err02S.$err03S.$err04S.$err05S.$err06S.$err07S.$err08S.$err09S.'");
location="http://www.dbproject14.net/Project/EnterGrade.php";
</script>';
}
else if($err10){
//echo "update";
$sql4="UPDATE taken
SET grade='".$grade."', GradeOrPassFail='".$GOPF."'
WHERE Sandrewid='".$AndrewID."' AND Cnumber=".$CourseID." AND TakenSemester='".$tsem."'";
if ($conn->query($sql4) == TRUE) {

echo '<script type="text/javascript">
alert("'.$err10S.'");
location="http://www.dbproject14.net/Project/EnterGrade.php";
</script>';

} else {
echo "Error updating record: " . $conn->error;
}
}
else{
//here we just insert
echo "all good";
$sql5="INSERT INTO taken VALUES('$AndrewID','$CourseID','$grade','$GOPF','$tsem')";
if ($conn->query($sql5) == TRUE) {
$err11S="New grade added sucessfully";
echo '<script type="text/javascript">
alert("'.$err11S.'");
location="http://www.dbproject14.net/Project/EnterGrade.php";
</script>';
}
else {
echo "Error updating record: " . $conn->error;
}
}
?>