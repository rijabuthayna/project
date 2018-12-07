<?php
session_start();
if($_SESSION['type']!='student'){
echo '<script type="text/javascript">
alert("You do not have access to this page, log in again");
location="http://www.dbproject14.net/Project/login.html";
</script>';
}
//we add a registration for logged in student


$Skey = $_POST['Skey']; 
$Cnumber = $_POST['Cnumber']; 
$Semester = $_POST['Semester']; 
$AndrewID = $_SESSION['username']; 

//This one is true if AndrewID is empty
$err01=false;
$err01S="";

//This one is true if AndrewID does not exist at all
$err02=false;
$err02S="";

//This one is true if AndrewID is already registered
$err22=false;
$err22S="";

//we check if empty
if (empty($AndrewID)){
$err01=true;
$err01S="Andrew ID i required, ";
}

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
//if it is not empty then does the andrew ID exists in the system?
if (!$err01){
$sql = "SELECT Sandrewid FROM student WHERE Sandrewid = '".$_POST['AndrewID']."'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
$err02=true;
$err02S="Andrew ID does not exist, ";}
}
//Finally if all before is good, is the student already registered?
if(!$err02){
$sql = "SELECT Sandrewid FROM register WHERE Sandrewid = '".$_POST['AndrewID']."' AND Skey = '".$Skey."' and Cnumber = ".$Cnumber." and Semester = '".$Semester."'";
$result = $conn->query($sql);
if ($result->num_rows != 0) {
$err22=true;
$err22S="student is already registered, ";}
}


//This one is true if Registration list is full
$err03=false;


$sectioncap=0;
$sql3 = "SELECT studentcap FROM section WHERE Skey = '".$Skey."' and Cnumber = ".$Cnumber." and Semester = '".$Semester."'";
$result3 = $conn->query($sql3);
while($row3 = $result3->fetch_assoc()) { 
$sectioncap=$row3['studentcap'];
}

$regstudent=0;
$sql4 = "SELECT count(Sandrewid) FROM register WHERE Skey = '".$Skey."' and Cnumber = ".$Cnumber." and Semester = '".$Semester."' and regOrWaitlist='reg'";
$result4 = $conn->query($sql4);
while($row4 = $result4->fetch_assoc()) { 
$regstudent =$row4['count(Sandrewid)'];}

if ($regstudent>= $sectioncap){
$err03=true;
}

//This one is true if wait list is full
$err04=false;



$limitcap=0;
$sql5 = "SELECT waitlistlim FROM section WHERE Skey = '".$Skey."' and Cnumber = ".$Cnumber." and Semester = '".$Semester."'";
$result5 = $conn->query($sql5);
while($row5 = $result5->fetch_assoc()) { 
$limitcap =$row5['waitlistlim'];
}

$WLstudent=0;
$sql6 = "SELECT count(Sandrewid) FROM register WHERE Skey = '".$Skey."' and Cnumber = ".$Cnumber." and Semester = '".$Semester."' and regOrWaitlist='WL'";
$result6 = $conn->query($sql6);
while($row6 = $result6->fetch_assoc()) { 
$WLstudent =$row6['count(Sandrewid)'];
}

if ($WLstudent >= $limitcap){
$err04=true;
}

//This error is true if student it taking this course will make the student go above the max units
$err05=false;
$err05S="";

$smaxunits=0;
$currentunits=0;
$courseunits=0;

$sql7 = "SELECT Smaxunit FROM student WHERE Sandrewid = '".$AndrewID."'";
$result7 = $conn->query($sql7);
while($row7 = $result7->fetch_assoc()){
$smaxunits = $row7['Smaxunits'];
}


$sql8 = "SELECT register.Sandrewid, sum(course.UnitNumber) FROM course, register WHERE course.Cnumber=register.Cnumber and register.regOrWaitlist='reg'
and register.Sandrewid='".$AndrewID."' group by register.Sandrewid";

$result8 = $conn->query($sql8);
$row8 = $result8->fetch_assoc();
$currentunits= $row8['sum(course.UnitNumber)'];

$sql9 = "SELECT course.UnitNumber from course where course.Cnumber=".$Cnumber;

$result9 = $conn->query($sql8);
$row9 = $result9->fetch_assoc();
$courseunits = $row9['course.UnitNumber'];

if ($courseunits+$currentunits>$smaxunits){
$err05=true;
$err05S="unable to register as student will go over units, ";
}

if ($err01  or $err02 or $err22){
echo '<script type="text/javascript">
alert("'.$err01S.$err02S.$err22S.'");
location="http://www.dbproject14.net/Project/Scourselist.php";
</script>';
}
//if student will go over her units
else if($err05){
echo '<script type="text/javascript">
alert("'.$err05S.'");
location="http://www.dbproject14.net/Project/Scourselist.php";
</script>';
}
//if the capacity is full
else if ($err03){

//if waitlist is full
if($err04){
echo '<script type="text/javascript">
alert("Class is full and waitlist is full");
location="http://www.dbproject14.net/Project/Scourselist.php";
</script>';}
//here we add student to waitlist
else {
//we add student to waitlist
$rank= $WLstudent+1;
$sql2 = "INSERT INTO register VALUES ('$AndrewID', '$Skey' , $Cnumber, '$Semester', $rank, 'WL')";

if ($conn->query($sql2) === TRUE) {
echo '<script type="text/javascript">
alert("Class is full student added to waitlist");
location="http://www.dbproject14.net/Project/Scourselist.php";
</script>';
}
}
}

else{
//we add student as a registered student
$sql2 = "INSERT INTO register VALUES ('$AndrewID', '$Skey' , $Cnumber, '$Semester', NULL, 'reg')";

if ($conn->query($sql2) === TRUE) {
echo '<script type="text/javascript">
alert("Student is registered successfully");
location="http://www.dbproject14.net/Project/Scourselist.php";
</script>';
} else {
echo "<br>Error: " . $sql2 . "<br>" . $conn->error;
}
}
?>