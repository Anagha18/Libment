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
	
	
	
	$sql = "SELECT Me_Id,B_Date_Issue,B_Date_Due,B_Fine,Bk_Id,Book_Name FROM librarydatabase.borrowed_by JOIN librarydatabase.novel ON Bk_Id=Book_Id";
	$result = mysqli_query($connection,$sql);

	echo "<table style='border:2px solid black;width:100%;background-color:pink'><tr><th style='border:2px solid black'>MEMBER ID</th><th style='border:2px solid black'>DATE ISSUE</th><th style='border:2px solid black'>DATE DUE</th><th style='border:2px solid black'>FINE</th><th style='border:2px solid black'>BOOK ID</th><th style='border:2px solid black'>BOOK Name</th></tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td style='border:2px solid black'>$row[Me_Id]</td>";
		echo "<td style='border:2px solid black'>$row[B_Date_Issue]</td>";
		echo "<td style='border:2px solid black'>$row[B_Date_Due]</td>";
		echo "<td style='border:2px solid black'>$row[B_Fine]</td>";
		echo "<td style='border:2px solid black'>$row[Bk_Id]</td>";
		echo "<td style='border:2px solid black'>$row[Book_Name]</td>";
		echo "</tr>";
	}
	echo "</table>";

 
?>
