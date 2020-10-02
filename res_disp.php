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


 

	


//$count=count($_POST['genre']);
//change author to have author id, book_loc, genre, novel
	
	
	
	$sql = "SELECT * FROM librarydatabase.novel WHERE Book_Reserve='y'";
	$result = mysqli_query($connection,$sql);
	echo "<table style='border:2px solid black;width:100%;background-color:pink'><tr><th style='border:2px solid black'>BOOK ID</th><th style='border:2px solid black'>ISBN</th><th style='border:2px solid black'>BOOK NAME</th><th style='border:2px solid black'>BOOK LANGUAGE</th><th style='border:2px solid black'>BOOK AVAILABILITY</th><th style='border:2px solid black'>BOOK RESERVE</th><th style='border:2px solid black'>AUTHOR ID</th><th style='border:2px solid black'>PUBLISHER ID</th></tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td style='border:2px solid black'>$row[Book_Id]</td>";
		echo "<td style='border:2px solid black'>$row[ISBN]</td>";
		echo "<td style='border:2px solid black'>$row[Book_Name]</td>";
		echo "<td style='border:2px solid black'>$row[Book_Language]</td>";
		echo "<td style='border:2px solid black'>$row[Book_Availability]</td>";
		echo "<td style='border:2px solid black'>$row[Book_Reserve]</td>";
		echo "<td style='border:2px solid black'>$row[Auth_Id]</td>";
		echo "<td style='border:2px solid black'>$row[Publ_Id]</td>";
		echo "</tr>";
	}
	echo "</table>";

 
?>
