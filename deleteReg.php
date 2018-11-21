<?php
//deletereg.php
session_start();

?>
<!DOCTYPE html> 
<html> 
<style>
.upper {
margin: auto;

    width: 50%;
    background-color: white;


height: 200px;
    width: 500px;


} 
body{
background-color: DarkRed;
}
</style> 
<head> 
<title></title> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
</head> 
<body> 
<div class="upper" align="center">



<?php
$PK = $_POST['PK']; 
$CourseNumber = $_POST['CourseNumber']; 

if (!(isset($_SESSION['users']))){
 echo "ERROR ARRAY 'users' DOES NOT EXIST IN SESSION";
}

if (!(isset($_SESSION['userID']))){
 echo "ERROR ARRAY 'usersID' DOES NOT EXIST IN SESSION";
}

if (($_SESSION['users'][$_SESSION['userID']]['type'])=='admin'){
 echo "<a href='http://www.dbproject14.net/Project/AdminHomePage.html'>Admin Home Page</a>";
}
else {
echo "<a href='http://www.dbproject14.net/Project/StudentHomePage.html'>Student Home Page</a>";
}

if (!(isset($_SESSION['users'][$PK]['type']))){
 echo "ERROR ARRAY userss type is not set";
}

if (!(isset($_SESSION['regs']))){
 echo "ERROR ARRAY regs DOES NOT EXIST IN SESSION";
}



if (($key = array_search($CourseNumber, $_SESSION['regs'][$PK])) !== false) {
    unset($_SESSION['regs'][$PK][$key]);
    echo "<br> <p style='color:Tomato;'><b> ", $CourseNumber, " is dropped.</b></p>";
}
else {
echo "<br> <p style='color:Tomato;'><b> Course number ", $CourseNumber, " does not exist.</b></p>";

}




?>
</div>
</body> 
</html> 