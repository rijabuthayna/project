<?php
$AndrewID = $_POST['AndrewID']; 
$firstname = $_POST['firstname']; 
$lastname = $_POST['lastname']; 
$password = $_POST['password']; 
$dnumber = $_POST['dnumber']; 

//This one is true if AndrewID is empty
$err01=false;
$err01S="";

//This one is true if firstname is empty
$err02=false;
$err02S="";

//This one is true if lastname is empty
$err03=false;
$err03S="";

//This one is true if password is empty
$err04=false;
$err04S="";

//This one is true if dnumber is empty
$err05=false;
$err05S="";

//This one is true if dnumber is a number
$err06=false;
$err06S="";

//This one is true if firstname is a text with no numbers
$err07=false;
$err07S="";

//This one is true if lastname is a text with no numbers
$err08=false;
$err08S="";

//This one is true if AndrewID exists
$err09=false;
$err09S="";

if (empty($AndrewID)){
$err01=true;
$err01S="Andrew ID is required, ";
}

if (empty($firstname)){
$err02=true;
$err02S="first name is required, ";
}
else if ((!preg_match("/^[a-zA-Z ]*$/",$firstname)) or is_numeric($firstname)) {
   $err07=true;
   $err07S = "first name must be text with no numbers, ";

}

if (empty($lastname)){
$err03=true;
$err03S="last name is required, ";
}
else if ((!preg_match("/^[a-zA-Z ]*$/",$lastname)) or is_numeric($lastname)) {
   $err08=true;
   $err08S = "last name must be text with no numbers, ";

}

if (empty($password)){
$err04=true;
$err04S="password is required, ";
}


if (empty($dnumber)){
$err05=true;
$err05S="department number is required, ";
}
else if (!is_numeric($dnumber)){
$err06=true;
$err06S="dnumber must be a number, ";
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
$sql = "SELECT Pandrewid FROM professor WHERE Pandrewid = '".$_POST['AndrewID']."'";
$result = $conn->query($sql);
if ($result->num_rows != 0) {
$err09=true;
$err09S="Andrew ID already exists, ";}
}

if ($err01  or $err02 or $err03 or $err04 or $err05 or $err06 or $err07 or $err08 or $err09){
echo '<script type="text/javascript">
alert("'.$err01S.$err02S.$err03S.$err04S.$err05S.$err06S.$err07S.$err08S.$err09S.'");
location="http://www.dbproject14.net/Project/AddProfForm.php";
</script>';
}

else{
//now we can safely insert the admin

$sql2 = "INSERT INTO professor VALUES ('$AndrewID', '$firstname' , '$lastname', '$password', '$dnumber')";

if ($conn->query($sql2) === TRUE) {
echo '<script type="text/javascript">
alert("New professor added successfully");
location="http://www.dbproject14.net/Project/AddProfForm.php";
</script>';
} else {
echo "<br>Error: " . $sql2 . "<br>" . $conn->error;
}

}





?>