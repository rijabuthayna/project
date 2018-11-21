<?php
//delete.php
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
<a href="http://www.dbproject14.net/Project/AdminHomePage.html">Admin Home Page</a>


<?php


$PK = $_POST['PK']; 
$ARRAY = $_POST['ARRAY']; 


if (!(isset($_SESSION[$ARRAY]))){
 echo "ERROR ARRAY". $ARRAY. "DOES NOT EXIST IN SESSION";
}

unset($_SESSION[$ARRAY][$PK]);

echo "<br> <p style='color:Tomato;'><b> ", $PK, " is deleted.</b></p>";
?>
</div>
</body> 
</html> 