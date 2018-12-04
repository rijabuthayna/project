<?php
$AndrewID = $_POST['AndrewID']; 
$password = $_POST['password']; 

//This one is true if AndrewID is empty
$err01=false;
$err01S="";

//This one is true if password is empty
$err02=false;
$err02S="";

//This one is true if AndrewID exists
$err03=false;
$err03S="";

if (empty($AndrewID)){
$err01=true;
$err01S="Andrew ID is required, ";
}

if (empty($password)){
$err02=true;
$err02S="password is required, ";
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
$sql = "SELECT Aandrewid FROM admin WHERE Aandrewid ='".$AndrewID."'";
$result = $conn->query($sql);

if ($result->num_rows != 0) {
$err03=true;
$err03S="Andrew ID already exists, ";}
}

if ($err01  or $err02 or $err03 ){
echo '<script type="text/javascript">
alert("'.$err01S.$err02S.$err03S.'");
location="http://www.dbproject14.net/Project/AddAdminForm.php";
</script>';

}

else{
$sql2 = "INSERT INTO admin VALUES ('$AndrewID', '$password')";
if ($conn->query($sql2) === TRUE) {
echo '<script type="text/javascript">
alert("New admin added successfully");
location="http://www.dbproject14.net/Project/AddAdminForm.php";
</script>';
} else {
echo "<br>Error: " . $sql2 . "<br>" . $conn->error;
}
}
?>