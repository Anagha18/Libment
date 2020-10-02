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
		
		$mid = $_POST['memid'];
		print("Elements collected<br>");
		print_r($_POST);
		print("<br>");
		$sql1 = "DELETE FROM librarydatabase.member_card WHERE Mbr_Id='$mid'";//AND Mbr_Name='$mname'AND Type='--null--'"
$sql =  "DELETE FROM librarydatabase.member WHERE Mem_Id='$mid'";//in the create statement, change b2p2 whatever and b1p1 to type.. 
if(mysqli_query($connection, $sql)){
   // echo "Records were deleted successfully.";
} else{
    //echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
}
if(mysqli_query($connection, $sql1)){
   // echo "Records were deleted successfully.";
} else{
   // echo "ERROR: Could not execute $sql. " . mysqli_error($connection);
}
$sql = "SELECT * FROM librarydatabase.member";
$sql1 = "SELECT * FROM librarydatabase.member_card";
$result = mysqli_query($connection,$sql);
$result1 = mysqli_query($connection,$sql1);
 echo "<table style='border:2px solid black;'><tr><th>MEMBER ID</th><th>MEMBER NAME</th><th>MEMEBER EMAIL </th><th>CONTACT NUMBER</th><th>DOB</th><th>MEMBERSHIP START DATE</th><th>MEMBERSHIP END DATE</th><th>MEMBER PASSWORD</th></tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>$row[Mem_Id]</td>";
		echo "<td>$row[Mem_Name]</td>";
		echo "<td>$row[Mem_Email]</td>";
		echo "<td>$row[Mem_Contact]</td>";
		echo "<td>$row[M_DOB]</td>";
		echo "<td>$row[Membership_start]</td>";
		echo "<td>$row[Membership_End]</td>";
		echo "<td>$row[Mem_psswd]</td>";
		echo "</tr>";
	}
	echo "</table>";
echo "<table style='border:2px solid black;'><tr><th>MEMBER ID</th><th>MEMBER NAME</th><th>Type</th></tr>";
	while($row = mysqli_fetch_array($result1)){
		echo "<tr>";
		echo "<td>$row[Mbr_Id]</td>";
		echo "<td>$row[Mbr_Name]</td>";
		echo "<td>$row[Type]</td>";
		echo "</tr>";
	}
	echo "</table>";
// Close connection
mysqli_close($connection);
	}
else{
		echo "Elements could not be collected<br>";
	}


?>