<?php 
session_start();
$dbServerName = "localhost";
$dbUsername = "inclass6bmulla";
$dbPassword = "admin";
$dbName = "sio_rb";



$andrewID = $_POST['AndrewID']; 
$password = $_POST['password']; 

//this error is true if username is empty
$err01 = false;
$err01S = " "; 
//this error is true if passwords is empty
$err02 = false;
$err02S = " "; 

//this error is true if username does not exist
$err03 = true;



//if empty
if (empty($andrewID)){
$err01=true;
$err01S = "Andrew ID is required,"; 
}
if (empty($password)){
$err02=true;
$err02S = "Password is required,"; 
}

//HEre we check that both user name and password were input
if ($err01 or $err02){
$err03 = false;
echo '<script type="text/javascript">
alert("'.$err01S.$err02S.'");
location="http://www.dbproject14.net/Project/login.html";
</script>';


}
//Is the user an admin?
else{


//starting up the connection
$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM admin";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {

if ($row["AandrewID"]==$andrewID ){

if ($row['aPassword']==$password){

$_SESSION['username']=$andrewID;
$_SESSION['type']='admin';
$err03 = false;
echo '<script type="text/javascript">
location="http://www.dbproject14.net/Project/AdminHomePage.php";
</script>';
}

else{
$err03 = false;
echo '<script type="text/javascript">
alert("Password is incorrect");
location="http://www.dbproject14.net/Project/login.html";
</script>';
}
}
}
}

//checking student
$sql = "SELECT * FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {

if ($row["Sandrewid"]==$andrewID ){

if ($row['SPassword']==$password){

$_SESSION['username']=$andrewID;
$_SESSION['type']='student';
$err03 = false;
echo '<script type="text/javascript">
location="http://www.dbproject14.net/Project/StudentHomePage.php";
</script>';
}

else{
$err03 = false;
echo '<script type="text/javascript">
alert("Password is incorrect");
location="http://www.dbproject14.net/Project/login.html";
</script>';
}
}
}
}

//checking professor
$sql = "SELECT * FROM professor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {

if ($row["PandrewID"]==$andrewID ){

if ($row['pPassword']==$password){

$_SESSION['username']=$andrewID;
$_SESSION['type']='professor';
$err03 = false;
echo '<script type="text/javascript">
location="http://www.dbproject14.net/Project/profhomepage.php";
</script>';
}

else{
$err03 = false;
echo '<script type="text/javascript">
alert("Password is incorrect");
location="http://www.dbproject14.net/Project/login.html";
</script>';
}
}
}
}

$conn->close();
}
//we did not find a username

if ($err03){
echo '<script type="text/javascript">
alert("Andrew ID does not exist");
location="http://www.dbproject14.net/Project/login.html";
</script>';
}
?>
</div>
</body> 
</html> 