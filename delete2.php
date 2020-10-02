<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "librarydatabase";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$bname = $_POST['bookname'];
		$author = $_POST['author'];
		$bid = $_POST['bookid'];
		$isbn = $_POST['isbn'];
		$branch = $_POST['branch'];
		$genre = $_POST['genre'];
		$language = $_POST['language'];
		$publisher = $_POST['publ'];
		$avail=$_POST['avail'];
		$res=$_POST['res'];

		print("Elements collected<br>");
		print_r($_POST);
		print("<br>");
	}
else{
		echo "Elements could not be collected<br>";
	}
// sql to delete a record
$sql1 = "DELETE FROM librarydatabase.genre WHERE B_Id='$bid'";
$sql2 = "DELETE FROM librarydatabase.b_location WHERE Boo_Id='$bid'";
$sql = "DELETE FROM librarydatabase.novel WHERE Book_Id='$bid'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?> 