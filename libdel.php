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
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Attempt delete query execution
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $lid = $_POST['lid'];
    $ln = $_POST['lname'];
    $lp = $_POST['lpswd'];
    $lloc=$_POST['lloc'];
    print("Elements collected<br>");
    print_r($_POST);
    print("<br>");
  }
else{
    echo "Elements could not be collected<br>";
  }
$sql1 = "DELETE FROM librarydatabase.libr_location WHERE Li_Id='$lid'";//AND Mbr_Name='$mname'AND Type='--null--'"
$sql =  "DELETE FROM librarydatabase.librarian WHERE Lib_Id='$lid' AND Lib_Name='$ln' AND Lib_psswd='$lp'";//in the create statement, change b2p2 whatever and b1p1 to type.. 
if(mysqli_query($connection, $sql)){
    echo "Records were deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
}
if(mysqli_query($connection, $sql1)){
    echo "Records were deleted successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($connection);
}
$sql = "SELECT * FROM librarydatabase.librarian";
  $sql1 = "SELECT * FROM librarydatabase.libr_location";
  
  $result = mysqli_query($connection,$sql);
  $result1 = mysqli_query($connection,$sql1);

  
echo "<table style='border:2px solid black;'><tr><th>LIBRARIAN ID</th><th>LIBRARIAN NAME</th><th>LIBRARIAN PASSWAORD</th></tr>";
  while($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>$row[Lib_Id]</td>";
    echo "<td>$row[Lib_Name]</td>";
    echo "<td>$row[Lib_psswd]</td>";
    echo "</tr>";
  }
  echo "</table>";


echo "<table style='border:2px solid black;'><tr><th>LIBRARIAN ID</th><th>LIBRARIAN</th></tr>";
  while($row = mysqli_fetch_array($result1)){
    echo "<tr>";
    echo "<td>$row[Li_Id]</td>";
    echo "<td>$row[Li_Loc]</td>";
    echo "</tr>";
  }
  echo "</table>";
?>