<!DOCTYPE html>
<html>
<head>
<title>
DELETE BOOK</title>
<style>
body
{
	background-color:lightseagreen;
}
form
{
	font-size:32px;
	font-family:"comic sans ms"
	color:blue;
}
.container
{
	background-color:darkturquoise;
	
  /*  position:fixed;
    top: 50%;
    left: 50%;
    width:40em;
    height:55em;
    margin-top: -25em; 
    margin-left: -25em; 
    border: 1px solid #ccc;
/*set to a negative number 1/2 of your height*/
  /*set to a negative number 1/2 of your width*/
  margin-left: 20%;
  margin-right: 20%;
}
#txt
{
	height:20px;
    font-size:14pt;
    font-family:"comic sans ms";
}
.sub
{
	height:50px;
	width:200px;
	color:white; 
	background-color:pink;
	font-size:30px;
	background-image: url("bk.jpeg");
}
.sel
{
	background-color:lightgreen;
	font-size:20px;
	font-color:white;
}
</style>
</head>
<body>
<center><div class="container">
<h2>Details of Old Book</h2>

<form method="POST" onsubmit="return confirm('Confirm Deletion?');" >
  Book Name:<br>
    <input id="txt" type="text" name="bookname">
  <br>
  Book ID<br>
   <input id="txt" type="number" name="bookid" >
   <br>
   <br><br>
  <input class="sub" type="submit" value="Submit">
  <!-- MEMBERSHIP START AND END DATE-- WHEN THEY SEARCH FOR MEMBER, DOB, MEMBERSHIP END , PASSWORD-->
 
</form> 
</div></center>
<?php
$dbuser = "root";
  $dbpass = "";
  $dbhost = "localhost:3306";
  $dbname = "librarydatabase";
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$connection = mysqli_connect("localhost", "root", "", "librarydatabase");
 
// Check connection
if($connection === false){
    die("ERROR: Could not connect.".mysqli_connect_error());
}
else
{
//echo "Connected to Database";
}
// Attempt delete query execution
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $bname = $_POST['bookname'];
    $bid = $_POST['bookid'];
    
    //print("Elements collected<br>");
    //print_r($_POST);
    //print("<br>");
     $sql1 = "DELETE FROM librarydatabase.genre WHERE B_Id='$bid'";   
$sql2 = "DELETE FROM librarydatabase.b_location WHERE Boo_Id='$bid'";
$sql = "DELETE FROM librarydatabase.novel WHERE Book_Id='$bid'";

if(mysqli_query($connection, $sql1)){
    //echo "Records were deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
}
if(mysqli_query($connection, $sql2)){
   // echo "Records were deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
}
if(mysqli_query($connection, $sql)){
    //echo "Records were deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
}
 $sql = "SELECT * FROM librarydatabase.novel";
  $sql1 = "SELECT * FROM librarydatabase.genre";
  $sql2 = "SELECT * FROM librarydatabase.b_location";
  $result = mysqli_query($connection,$sql);
$result1 = mysqli_query($connection,$sql1);
$result2 = mysqli_query($connection,$sql2);
  //echo "<table style='border:2px solid black;'><tr><th>BOOK ID</th><th>ISBN</th><th>BOOK NAME</th><th>BOOK LANGUAGE</th><th>BOOK AVAILABILITY</th><th>BOOK RESERVE</th><th>AUTHOR ID</th><th>PUBLISHER ID</th></tr>";
  /*while($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>$row[Book_Id]</td>";
    echo "<td>$row[ISBN]</td>";
    echo "<td>$row[Book_Name]</td>";
    echo "<td>$row[Book_Language]</td>";
    echo "<td>$row[Book_Availability]</td>";
    echo "<td>$row[Book_Reserve]</td>";
    echo "<td>$row[Auth_Id]</td>";
    echo "<td>$row[Publ_Id]</td>";
    echo "</tr>";
  }
  echo "</table>";

echo "<table style='border:2px solid black;'><tr><th>BOOK ID</th><th>BOOK GENRE</th></tr>";
  while($row = mysqli_fetch_array($result1)){
    echo "<tr>";
    echo "<td>$row[B_Id]</td>";
    echo "<td>$row[B_Genre]</td>";
    echo "</tr>";
  }
  echo "</table>";
  echo "<table style='border:2px solid black;'><tr><th>BOOK ID</th><th>BOOK LOCATION</th></tr>";
  while($row = mysqli_fetch_array($result2)){
    echo "<tr>";
    echo "<td>$row[Boo_Id]</td>";
    echo "<td>$row[B_Location]</td>";
    echo "</tr>";
  }
  echo "</table>";
   */

// Close connection
mysqli_close($connection);
  }
else{
   // echo "Elements could not be collected<br>";
  }
 
?>
</body>
</html>
