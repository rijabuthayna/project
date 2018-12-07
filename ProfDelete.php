<?php
//ProfDelete.php


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

$sql2 = "DELETE FROM professor WHERE PandrewID='".$AndrewID."'";


if ($conn->query($sql2) === TRUE) {
echo '<script type="text/javascript">
alert("Professor deleted successfully");
location="http://www.dbproject14.net/Project/AdminViewProfessors.php";
</script>';
} else {
echo "<br>Error: " . $sql2 . "<br>" . $conn->error;
}

?>