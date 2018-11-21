<?php
//student registration list
session_start();
if (!(isset($_SESSION['regs']))){
$_SESSION['regs']= array();
}
?>
<!DOCTYPE html> 
<html> 
<style>
.upper {
margin: auto;
    width: 50%;
    background-color: white;
height: 1200px;
    width: 900px;
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

<a href="http://www.dbproject14.net/Project/StudentHomePage.html">Student Home Page</a>

	<table style="width:100%">
  <tr>
    <th>CourseNumber</th>
     <th>drop</th>

  </tr>  
  <?php
$AndrewID = $_SESSION['userID'];

  foreach ($_SESSION['regs'][$AndrewID] as $value) {
    echo "<tr><th>".$value,"</th>";

    echo "</th>
      <th> <form action='deleteReg.php' method='post'> 
      <input type='hidden' name='PK' value=".$AndrewID." />
      <input type='hidden' name='CourseNumber' value=". $value . " />
      <input type='submit' value='drop'>
      </form>
      
      </th>
      


      
    </tr>";

}
?>
</table>
</div>
</body> 
</html> 