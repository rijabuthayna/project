<?php
//edit course form script
$CourseNumber = $_POST['Cnumber']; 
$CourseName = $_POST['CourseName']; 
$UnitNumber = $_POST['UnitNumber']; 
$DepartmentNumber = $_POST['DepartmentNumber']; 
$Description = $_POST['Description']; 
$KeyTopics = $_POST['KeyTopics']; 
$CourseGoals = $_POST['CourseGoals']; 


//This one is true if CourseName is empty
$err02=false;
$err02S="";

//This one is true if UnitNumber is empty
$err03=false;
$err03S="";

//This one is true if DepartmentNumber is empty
$err04=false;
$err04S="";

//This one is true if Description is empty
$err05=false;
$err05S="";


if (empty($CourseName)){
$err02=true;
$err02S="Course name is required, ";
}

if (empty($UnitNumber)){
$err03=true;
$err03S="Unit number is required, ";
}

if (empty($DepartmentNumber)){
$err04=true;
$err04S="Department number is required, ";
}

if (empty($Description)){
$err05=true;
$err05S="Description is required, ";
}



//error is true if CourseNumber is numeric
$err06=false;
$err06S="";

//error is true if UnitNumber is numeric
$err07=false;
$err07S="";

//error is true if DepartmentNumber is numeric
$err08=false;
$err08S="";


if (!$err03 and !is_numeric($UnitNumber)){
   $err07=true;
   $err07S = "Unit number must be a number, ";
}

if (!$err04 and !is_numeric($DepartmentNumber)){
   $err08=true;
   $err08S = "Department number must be a number, ";
}

//error is true if course number already exists
$err09=false;
$err09S="";

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




if ( $err02 or $err03 or $err04 or $err05 or $err07 or $err08){
echo '<script type="text/javascript">
alert("'.$err02S.$err03S.$err04S.$err05S.$err07S.$err08S.'");
location="http://www.dbproject14.net/Project/AdminViewCourses.php";
</script>';

}
//So now we checked all errors and we know that we can add the course safely
else {

//if(empty($KeyTopics) and empty($CourseGoals)){
//$sql2 = "INSERT INTO course VALUES ('$CourseNumber', '$CourseName' , '$UnitNumber', '$Description', NULL, NULL, '$DepartmentNumber')";
//}
//else if(empty($CourseGoals)){
//$sql2 = "INSERT INTO course VALUES ('$CourseNumber', '$CourseName' , '$UnitNumber', '$Description', '$KeyTopics', NULL, '$DepartmentNumber')";
//}
//else if(empty($KeyTopics)){
//$sql2 = "INSERT INTO course VALUES ('$CourseNumber', '$CourseName' , '$UnitNumber', '$Description', NULL, '$CourseGoals', '$DepartmentNumber')";
//}
//else{
//$sql2 = "INSERT INTO course VALUES ('$CourseNumber', '$CourseName' , '$UnitNumber', '$Description', '$KeyTopics', '$CourseGoals', '$DepartmentNumber')";
//}

$sql2 = "UPDATE course 
SET UnitNumber=".$UnitNumber.", Dnumber=".$DepartmentNumber.", Description='".$Description."', Cgoals='".$CourseGoals."', keyTopics='".$KeyTopics ."', Cname='".$CourseName."'
WHERE Cnumber=".$CourseNumber;

if ($conn->query($sql2) === TRUE) {
echo '<script type="text/javascript">
alert("Course edited successfully");
location="http://www.dbproject14.net/Project/AdminViewCourses.php";
</script>';
} else {
echo "<br>Error: " . $sql2 . "<br>" . $conn->error;
}

}


?>