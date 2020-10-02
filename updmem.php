<!DOCTYPE html>
<html>
<head>
<title>
UPDATE MEMBER</title>
<style>
body
{
	background-color:lightseagreen;
	
}
form
{
font-size:25px;
	font-family:"comic sans ms";
  color:black;
}
.container
{
	background-color:darkturquoise;
	
    /*position:fixed;
    top: 50%;
    left: 50%;
    width:40em;
    height:55em;
    margin-top: -20em; 
    margin-left: -25em; 
    border: 1px solid #ccc;
  /*set to a negative number 1/2 of your width*/ /*set to a negative number 1/2 of your height----  change these to centre on the page...*/
margin-right:20%;
margin-left:20%;
}
#txt
{
	height:25px;
    font-size:14pt;
    font-family:"comic sans ms";
}
.sub
{
	height:50px;
	width:300px;
	color:white; 
	background-color:pink;
	font-size:30px;
	background-image: url("bk.jpeg");
}
</style>
</head>
<body>
<center><div class="container">
<h2>Details of Old Member</h2>

<form method="POST" action="updmem.php">
   Name:<br>
    <input id="txt" type="text" name="mname">
  <br>
  Email ID<br>
   <input id="txt" type="email" name="mail" >
   <br>
  Contact Number<br>
   <input id="txt" type="number" name="cont_number" >
   <BR>
   DOB:<br>
  <input type="date" id="txt" name="bday">
  <br>
  Membership Type:<br>
  <select name="type">
  <option value="--null--" checked>--null--</option>
  <option value="1">2 books and 2 periodicals</option>
  <option value="0">1 book and 1 periodical</option>
  </select>
   <br>
   Membership Start:<br>
   <input type="date" id="txt" name="memstrt">
   <br>
   Membership End:<br>
   <input type="date" id="txt" name="memfin"><br>
   Member ID<br>
   <input id="txt" type="number" name="memid" >
   <BR>
   Member Password:<br>
   <input type="password" id="txt" name="mempswd">
   <BR><br>
  <input class="sub" type="submit" value="Submit" name="Submit">
  <!-- MEMBERSHIP START AND END DATE-- WHEN THEY SEARCH FOR MEMBER, DOB, MEMBERSHIP END , PASSWORD-->
 
</form> 
</div></center>
<?php

$dbuser = "root";
  $dbpass = "";
  $dbhost = "localhost:3306";
  $dbname = "librarydatabase";

  $connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

  if($connection){
    //echo "Connected to DATABASE<br>";
  }
  else{
    //echo "NOT CONNECTED TO DATABASE<br>";
  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $mname = $_POST['mname'];
    $mail = $_POST['mail'];
    $cno = $_POST['cont_number'];
    $bday = $_POST['bday'];
    $type = $_POST['type'];
    $ms = $_POST['memstrt'];
    $mf = $_POST['memfin'];
    $mid=$_POST['memid'];
    $mp=$_POST['mempswd'];
    //print("Elements collected<br>");
    //print_r($_POST);
    //print("<br>");
    $sql = "UPDATE librarydatabase.member SET Mem_Id='$mid',Mem_Name='$mname',Mem_Email='$mail',Mem_Contact='$cno',M_DOB='$bday',Membership_start='$ms', Membership_End='$mf',Mem_psswd='$mp' WHERE Mem_Id='$mid'";
$sql1 = "UPDATE  librarydatabase.member_card SET Mbr_Id='$mid', Mbr_Name='$mname', Type='$type' WHERE Mbr_Id='$mid'";
$result = mysqli_query($connection,$sql);
$result1 = mysqli_query($connection,$sql1);
if(mysqli_query($connection,$sql1)){
    //echo "yes<br>";
  }
else{
    //echo "no<br>";
  }
if(mysqli_query($connection,$sql)){
   // echo "yes<br>";
    
  }
else{
   // echo "no<br>";
  }
  $sql = "SELECT * FROM librarydatabase.member";
  $sql1 = "SELECT * FROM librarydatabase.member_card";
  $result = mysqli_query($connection,$sql);
  $result1=mysqli_query($connection,$sql1);
  }
else{
   // echo "Elements could not be collected<br>";
  }
  ?>
  


</body>
</html>

