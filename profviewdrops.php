<?php
session_start();
if($_SESSION['type']!='professor'){
echo '<script type="text/javascript">
alert("You do not have access to this page, log in again");
location="http://www.dbproject14.net/Project/login.html";
</script>';
}
?>
<!DOCTYPE html> 
<html>
<style>

.b1 {
color:#FFFFFF;
display:inline-block;
padding:0.3em 1.2em;
margin:0 0.1em 0.1em 0;
border:0.16em solid rgba(255,255,255,0);
border-radius:2em;
box-sizing: border-box;
font-size: 16px;
background-color: #4CAF50;
 
}

.b1:hover{
color:#FFFFFF;
background-color:#228300;
}

/* unvisited link */
a:link {
    color: Black;
}

/* visited link */
a:visited {
    color: Black;
}

/* mouse over link */
a:hover {
    color: #FAF6F1;
}

/* selected link */
a:active {
    color: Black;
}
table, th, td {
    border: 1px solid black;
}
.topleft {

    position: absolute;
    top: 8px;
    left: 5px;
    font-size: 24px;

}
.topleft2 {

    position: absolute;
    top: 29px;
    left: 5px;
    font-size: 24px;

}
.topright {

    position: absolute;
    top: 8px;
    right: 5px;
    font-size: 24px;

}
.topright2 {

    position: absolute;
    top: 29px;
    right: 5px;
    font-size: 24px;

}
.topright3 {

    position: absolute;
    top: 53px;
    right: 5px;
    font-size: 24px;

}
.upper {
font-size: 24px;
position: absolute;
top: 15.5%;
  left: 10.9%;
margin: auto;
    width: 50%;

    width: 1000px;
        background-color: #FAF6F1;
        
    color:black;
} 
.upper2 {
font-size: 24px;
position: relative;

margin: auto;
    width: 50%;
    height: 110px;
    width: 1000px;
        background-color: DarkRed;
    color: #FAF6F1;
}
body{
color: #92a8d1;
background-image: url("tprint.png");
} 

</style> 
<head> 
<title></title> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
</head> 
<body> 
<div class="upper2" align="center">
<h2 class="topright">SIO(Student Information Online)</h2>

<h2 class="topright2">For andrewid </h2> 

<h2 class="topright3"><a href="http://www.dbproject14.net/Project/logout.php">Logout</a></h2> 
<h2 class="topleft"> Carnegie Mellon University</h2> 

<h2 class="topleft2">  Qatar </h2>
<br/>
<br/>
<br/>
<br/>

</div>

<div class="upper" align="center">
<font size="4">
<table style="width:100%" bgcolor="DarkRed">
  <tr>
  <th> <div class="dropdown">
 
  <div class="dropdown-content">
    <a href="http://www.dbproject14.net/Project/profprofileview.php">My profile</a>
    
  </div>
  </div>
  </th> 
  
  <th> <div class="dropdown">
  
  <div class="dropdown-content">
    <a href="http://www.dbproject14.net/Project/profviewcourses.php">My Sections & Courses</a>
    
  </div>
  </div>
  </th>
  

    <th> <div class="dropdown">
  
  <div class="dropdown-content">
    <a href="http://www.dbproject14.net/Project/profviewenroll.php">Enrollments & Registrations</a>
    
  </div>
  </div>
  </th>
  </tr>
  </table>
</font>

<h3>My Courses </h3>
<br>

	<table style="width:100%" font-size: 24px;>
  <tr>
    <th>Course Number</th>
    <th>Course Name</th> 
    <th>Course Section</th>
    <th>Andrew ID's of dropped</th>
    
    

  </tr>
<!-- Sample row -->  
  <tr>
  <th>15150</th>
  <th>ML</th>
  <th> W </th>
  <th>ryoosufa</th>
  
  
  </tr>
<!-- Sample row end --> 
</table>
<br>
<br>
<br>
<br>
</div>
</body> 
</html> 