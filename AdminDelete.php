<?php
//AdminDelete.php
//This script will take a courseid then delete the course

$AndrewID=$_POST['AndrewID'];

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

$sql2 = "DELETE FROM admin WHERE AandrewID='".$AndrewID."'";


if ($conn->query($sql2) === TRUE) {
echo '<script type="text/javascript">
alert("Admin deleted successfully");
location="http://www.dbproject14.net/Project/AdminViewAdmins.php";
</script>';
} else {
echo "<br>Error: " . $sql2 . "<br>" . $conn->error;
}

?>