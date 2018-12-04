<?php
//AddSectionFormScript.php

$Cnumber = $_POST['Cnumber']; 
$Skey = $_POST['Skey']; 
$AddDeadline = $_POST['AddDeadline']; 
$StudentCap = $_POST['StudentCap']; 
$WaitlistLim = $_POST['WaitlistLim']; 
$SectionStart = $_POST['SectionStart']; 
$SectionEnd = $_POST['SectionEnd']; 
$DropDead = $_POST['DropDead']; 
$Semester = $_POST['Semester']; 

//This one is true if Cnumber is empty
$err01=false;
$err01S="";

//This one is true if Cnumber is not a number
$err10=false;
$err10S="";

//This one is true if Cnumber does not exist
$err11=false;
$err11S="";

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

// Cnumber check ups
if (empty($Cnumber)){
$err01=true;
$err01S="course number is required, ";
}
else if (!is_numeric($Cnumber)){
$err10=true;
$err10S="course number must be a number, ";
}

if (!$err01 and !$err10){
$sql = "SELECT Cnumber FROM course WHERE Cnumber=".$Cnumber;
$result = $conn->query($sql);

if ($result->num_rows !=1) {
$err11=true;
$err11S="Course number does not exists, ";}
}


//This one is true if Skey is empty
$err02=false;
$err02S="";

//This one is true if Skey is over 10 characters
$err12=false;
$err12S="";

//This one is true if Skey already exists
$err22=false;
$err22S="";

if (empty($Skey)){
$err02=true;
$err02S="Section key is required, ";
}
else if (strlen($Skey)>9){
$err12=true;
$err12S="Length of Section key must not exceed 9 characters, ";
}
if (!$err02 and !$err12){
$sql = "SELECT Skey FROM section WHERE Cnumber=".$Cnumber." AND Skey='".$Skey."'";
$result = $conn->query($sql);

if ($result->num_rows != 0) {
$err22=true;
$err22S="Section Key already exists in that course, ";}
}

//This one is true if AddDeadline is empty
$err03=false;
$err03S="";

//This one is true if AddDeadline is not a date
$err13=false;
$err13S="";

if (empty($AddDeadline)){
$err03=true;
$err03S="Add Deadline is required, ";
}
else if (!(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$AddDeadline))){
$err13=true;
$err13S="Add Deadline is in wrong format, ";
}


//This one is true if StudentCap is empty
$err04=false;
$err04S="";

//This one is true if StudentCap is not a number
$err14=false;
$err14S="";

if (empty($StudentCap)){
$err04=true;
$err04S="Student Capacity is required, ";
}
else if (!is_numeric($StudentCap)){
$err14=true;
$err14S="Student Capacity must be a number, ";
}

//This one is true if WaitlistLim is empty
$err05=false;
$err05S="";

//This one is true if WaitlistLim is not a number
$err15=false;
$err15S="";

if (empty($WaitlistLim)){
$err05=true;
$err05S="Waitlist limit is required, ";
}
else if (!is_numeric($WaitlistLim)){
$err15=true;
$err15S="Waitlist limit must be a number, ";
}

//This one is true if SectionStart is empty
$err06=false;
$err06S="";

//This one is true if SectionStart is not a date
$err16=false;
$err16S="";

if (empty($SectionStart)){
$err06=true;
$err06S="Section Start date is required, ";
}
else if (!(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$SectionStart))){
$err16=true;
$err16S="Section Start date is in wrong format, ";
}

//This one is true if SectionEnd is empty
$err07=false;
$err07S="";

//This one is true if SectionEnd is not a date
$err17=false;
$err17S="";

if (empty($SectionEnd)){
$err07=true;
$err07S="Section End date is required, ";
}
else if (!(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$SectionEnd))){
$err17=true;
$err17S="Section End date is in wrong format, ";
}

//This one is true if DropDead is empty
$err08=false;
$err08S="";

//This one is true if DropDead is not a date
$err18=false;
$err18S="";

if (empty($DropDead)){
$err08=true;
$err08S="Drop Deadline is required, ";
}
else if (!(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$DropDead))){
$err18=true;
$err18S="Drop Deadline is in wrong format, ";
}

//This one is true if Semester is empty
$err09=false;
$err09S="";

//This one is true if Semester is not in the type F/S NN
$err19=false;
$err19S="";

if (empty($Semester)){
$err09=true;
$err09S="Semester is required, ";
}
else if(!(preg_match("/^(S|F)[1-2][0-9]$/", $Semester))){
$err19=true;
$err19S="Semester is in wrong format, ";
}

if ($err01  or $err02 or $err03 or $err04 or $err05 or $err06 or $err07 or $err08 or $err09 or $err10 or $err11 or $err12 or $err13
or $err14  or $err15 or $err16 or $err17 or $err18 or $err19 or $err22){
echo '<script type="text/javascript">
alert("'.$err01S.$err02S.$err03S.$err04S.$err05S.$err06S.$err07S.$err08S.$err09S.$err10S.$err11S.$err12S.$err13S.
$err14S.$err15S.$err16S.$err17S.$err18S.$err19S.$err22S.'");
location="http://www.dbproject14.net/Project/AdminViewCourses.php";
</script>';

}

else{
$sql2 = "INSERT INTO section VALUES ('$Skey', '$Cnumber' , '$AddDeadline', '$WaitlistLim', '$StudentCap', '$DropDead', '$SectionStart', '$SectionEnd', '$Semester')";

if ($conn->query($sql2) === TRUE) {
echo '<script type="text/javascript">
alert("New section added successfully");
location="http://www.dbproject14.net/Project/AdminViewCourses.php";
</script>';
} else {
echo "<br>Error: " . $sql2 . "<br>" . $conn->error;
}

}
?>