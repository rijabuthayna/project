<?php
session_start();
$dbServerName = "localhost";
$dbUsername = "inclass6bmulla";
$dbPassword = "admin";
$dbName = "sio_rb";

$OldPass = $_POST['OldPass']; 
$NewPass = $_POST['NewPass']; 
$andrewID = $_SESSION['username'];

//starting up the connection
$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT pPassword FROM professor WHERE PandrewID ='".$andrewID."'";
$result = $conn->query($sql);


if ($result->num_rows != 1) {
echo '<script type="text/javascript">
alert("Something went wrong");
location="http://www.dbproject14.net/Project/login.html";
</script>';

}
$row = $result->fetch_assoc();
if ($row['pPassword']!=$OldPass){
echo '<script type="text/javascript">
alert("You input the wrong old password, log in again");
location="http://www.dbproject14.net/Project/login.html";
</script>';
}


else {



$sql = "UPDATE professor SET pPassword ='".$NewPass."'WHERE PandrewID ='".$andrewID."'";
if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>
alert('Password change was successful');
location='http://www.dbproject14.net/Project/profchangepass.php';
</script>";
} else {
echo '<script type="text/javascript">
alert("Password change was not successful");
location="http://www.dbproject14.net/Project/profchangepass.php"';
}
}
$conn->close();
?>