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
// Attempt delete query execution
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$bname = $_POST['bookname'];
		$bid = $_POST['bookid'];
		
		//print("Elements collected<br>");
		//print_r($_POST);
		//print("<br>");
	}
else{
		//echo "Elements could not be collected<br>";
	}
	$sql1 = "DELETE FROM librarydatabase.genre WHERE B_Id='$bid'";
    
$sql2 = "DELETE FROM librarydatabase.b_location WHERE Boo_Id='$bid'";
$sql = "DELETE FROM librarydatabase.novel WHERE Book_Id='$bid'";

if(mysqli_query($connection, $sql1)){
    //echo "Records were deleted successfully.";
} else{
    //echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
}
if(mysqli_query($connection, $sql2)){
   // echo "Records were deleted successfully.";
} else{
    //echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
}
if(mysqli_query($connection, $sql)){
    //echo "Records were deleted successfully.";
} else{
    //echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
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
?>