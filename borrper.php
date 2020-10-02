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
	
	
	
	$sql = "SELECT Memb_Id,P_Date_Issue,P_Date_Due,P_Fine,Pr_Id,Per_Name FROM librarydatabase.borrows JOIN librarydatabase.periodical ON Periodical_Id=Pr_Id";
	$result = mysqli_query($connection,$sql);
	echo "<table style='border:2px solid black;width:100%;background-color:pink'><tr><th style='border:2px solid black'>MEMBER ID</th><th style='border:2px solid black'>DATE ISSUE</th><th style='border:2px solid black'>DATE DUE</th><th style='border:2px solid black'>FINE</th><th style='border:2px solid black'>PERIODICAL ID</th><th style='border:2px solid black'>PERIODICAL NAME</th></tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td style='border:2px solid black'>$row[Memb_Id]</td>";
		echo "<td style='border:2px solid black'>$row[P_Date_Issue]</td>";
		echo "<td style='border:2px solid black'>$row[P_Date_Due]</td>";
		echo "<td style='border:2px solid black'>$row[P_Fine]</td>";
		echo "<td style='border:2px solid black'>$row[Pr_Id]</td>";
		echo "<td style='border:2px solid black'>$row[Per_Name]</td>";
		echo "</tr>";
	}
	echo "</table>";

 
?>
