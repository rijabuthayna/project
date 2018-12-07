<?php
//SectionDelete.php
//This script will take a section then delete the course

$courseid=$_POST['Cnumber'];
$Skey=$_POST['Skey'];
$Semester=$_POST['Semester'];

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

$sql2 = "DELETE FROM section WHERE Cnumber=".$courseid." and Skey='".$Skey."' and Semester='".$Semester."'";


if ($conn->query($sql2) === TRUE) {
echo '<script type="text/javascript">
alert("Section deleted successfully");
location="http://www.dbproject14.net/Project/AdminViewCourses.php";
</script>';
} else {
echo "<br>Error: " . $sql2 . "<br>" . $conn->error;
}

?>