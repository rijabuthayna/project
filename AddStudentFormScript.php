<?php
//AddStudentFormScript.php
$AndrewID = $_POST['AndrewID']; 
$firstname = $_POST['firstname']; 
$lastname = $_POST['lastname']; 
$birthdate = $_POST['birthdate']; 
$gender = $_POST['gender']; 
$preferredname = $_POST['preferredname']; 
$maxunits = $_POST['maxunits']; 
$nationality = $_POST['nationality']; 
$password = $_POST['password']; 

//This one is true if AndrewID is empty
$err01=false;
$err01S="";

//This one is true if firstname is empty
$err02=false;
$err02S="";

//This one is true if lastname is empty
$err03=false;
$err03S="";

//This one is true if birthdate is empty
$err04=false;
$err04S="";

//This one is true if gender is empty
$err05=false;
$err05S="";

//This one is true if maxunits is empty
$err06=false;
$err06S="";

//This one is true if password is empty
$err07=false;
$err07S="";

//This one is true if birthdate is not the right format
$err08=false;
$err08S="";

//This one is true if maxunits is not a number 
$err09=false;
$err09S="";


//This one is true if firstname does not contain a number 
$err10=false;
$err10S="";

//This one is true if lastname does not contain a number 
$err11=false;
$err11S="";

//This one is true if AndrewID exsists
$err12=false;
$err12S="";

//This one is true if nationality contains a number
$err13=false;
$err13S="";

if (empty($AndrewID)){
$err01=true;
$err01S="Andrew ID is required, ";
}

if (empty($firstname)){
$err02=true;
$err02S="first name is required, ";
}
else if ((!preg_match("/^[a-zA-Z ]*$/",$firstname)) or is_numeric($firstname)) {
   $err10=true;
   $err10S = "first name must be text with no numbers, ";

}

if (empty($lastname)){
$err03=true;
$err03S="last name is required, ";
}
else if ((!preg_match("/^[a-zA-Z ]*$/",$lastname)) or is_numeric($lastname)) {
   $err11=true;
   $err11S = "last name must be text with no numbers, ";

}

if (empty($birthdate)){
$err04=true;
$err04S="birthdate is required, ";
}
else if (!(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$birthdate))){
   $err08=true;
   $err08S = "date is in wrong format, ";
}

if (empty($gender)){
$err05=true;
$err05S="gender is required, ";
}

if (empty($maxunits)){
$err06=true;
$err06S="maxunits is required, ";
}

if (empty($password)){
$err07=true;
$err07S="password is required, ";
}

if (!empty($nationality) and (!preg_match("/^[a-zA-Z ]*$/",$nationality)) or is_numeric($nationality)) {
   $err13=true;
   $err13S = "nationality must be text with no numbers.";
}

if (!$err06 and !is_numeric($maxunits)){
   $err09=true;
   $err09S = "max units must be a number, ";
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

if (!$err01){
$sql = "SELECT Sandrewid FROM student WHERE Sandrewid = '".$_POST['AndrewID']."'";
$result = $conn->query($sql);
if ($result->num_rows != 0) {
$err12=true;
$err12S="Andrew ID already exists, ";}
}
if ($err01  or $err02 or $err03 or $err04 or $err05 or $err06 or $err07 or $err08 or $err09 or $err10 or $err11 or $err12 or $err13){
echo '<script type="text/javascript">
alert("'.$err01S.$err02S.$err03S.$err04S.$err05S.$err06S.$err07S.$err08S.$err09S.$err10S.$err11S.$err12S.$err13S.'");
location="http://www.dbproject14.net/Project/AddStudentForm.php";
</script>';

}
else{
//now we can safely insert the student
if(empty($nationality) and empty($preferredname)){
$sql2 = "INSERT INTO student VALUES ('$AndrewID', '$firstname' , '$lastname', '$birthdate', '$gender', NULL, '$maxunits', NULL, '$password')";
}
else if(empty($preferredname)){
$sql2 = "INSERT INTO student VALUES ('$AndrewID', '$firstname' , '$lastname', '$birthdate', '$gender', NULL, '$maxunits', '$nationality', '$password')";
}
else if(empty($nationality)){
$sql2 = "INSERT INTO student VALUES ('$AndrewID', '$firstname' , '$lastname', '$birthdate', '$gender', '$preferredname', '$maxunits', NULL, '$password')";
}
else{
$sql2 = "INSERT INTO student VALUES ('$AndrewID', '$firstname' , '$lastname', '$birthdate', '$gender', '$preferredname', '$maxunits', '$nationality', '$password')";
}


if ($conn->query($sql2) === TRUE) {
echo '<script type="text/javascript">
alert("New student added successfully");
location="http://www.dbproject14.net/Project/AddStudentForm.php";
</script>';
} else {
echo "<br>Error: " . $sql2 . "<br>" . $conn->error;
}

}

?>