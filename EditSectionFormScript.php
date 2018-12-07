<?php
//EditSectionFormScript.php

$AddDeadline = $_POST['AddDeadline']; 
$StudentCap = $_POST['StudentCap']; 
$WaitlistLim = $_POST['WaitlistLim']; 
$SectionStart = $_POST['SectionStart']; 
$SectionEnd = $_POST['SectionEnd']; 
$DropDead = $_POST['DropDead']; 



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




if ($err03 or $err04 or $err05 or $err06 or $err07 or $err08  or $err13 or $err14  or $err15 or $err16 or $err17 or $err18 ){
echo '<script type="text/javascript">
alert("'.$err03S.$err04S.$err05S.$err06S.$err07S.$err08S.$err13S.$err14S.$err15S.$err16S.$err17S.$err18S.'");
location="http://www.dbproject14.net/Project/AdminViewCourses.php";
</script>';

}

else{
$sql2 = "UPDATE section 
SET adddeadline='".$AddDeadline."', studentcap=".$StudentCap .", waitlistlim=".$WaitlistLim.", SectionStartDate='".$SectionStart."', SectionEndDate='".$SectionEnd."',dropdeadline='".$DropDead."'
WHERE 
Skey='".$_POST['Skey']."' and Cnumber=".$_POST['Cnumber']." and Semester='".$_POST['Semester']."'";


if ($conn->query($sql2) === TRUE) {
echo '<script type="text/javascript">
alert("Section edited successfully");
location="http://www.dbproject14.net/Project/AdminViewCourses.php";
</script>';
} else {
echo "<br>Error: " . $sql2 . "<br>" . $conn->error;
}

}
?>