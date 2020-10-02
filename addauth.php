<?php
	$dbuser = "root";
	$dbpass = "";
	$dbhost = "localhost:3306";
	$dbname = "librarydatabase";

	$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

	if($connection){
		echo "Connected to DATABASE<br>";
	}
	else{
		echo "NOT CONNECTED TO DATABASE<br>";
	}


 

	

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$aname = $_POST['aname'];
		$aid = $_POST['aid'];
		$abooks = $_POST['abooks'];
		print("Elements collected author<br>");
		print_r($_POST);
		print("<br>");
	}
else{
		echo "Elements could not be collected<br>";
	}
//$count=count($_POST['genre']);
//change author to have author id, book_loc, genre, novel
	
	$sql = "INSERT librarydatabase.author(Author_Id,Author_Name,Author_books)
	VALUES('$aid','$aname','$abooks')";
	$result = mysqli_query($connection,$sql);
	
	if($result){
		echo "inserted successfully<br>";
	}
	else{
		echo "Could not insert in<br>";
	}
	
	
	$sql = "SELECT * FROM librarydatabase.author";
	$result = mysqli_query($connection,$sql);

	echo "<table style='border:2px solid black;'><tr><th>Author ID</th><th>Author Name</th><th>Books Written</th></tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>$row[Author_Id]</td>";
		echo "<td>$row[Author_Name]</td>";
		echo "<td>$row[Author_books]</td>";
		echo "</tr>";
	}
	echo "</table>";
 
?>
