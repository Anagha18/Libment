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
		echo "NOT CONNECTED TO DATABASE<br>";
	}


 

	

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$mid = $_POST['mid'];
		$bid = $_POST['bid'];
		$di=$_POST['di'];
		$dd=$_POST['dd'];
		$bf=$_POST['bf'];
		//print("Elements collected<br>");
		//print_r($_POST);
		//print("<br>");

	$sql = "INSERT librarydatabase.borrowed_by(Me_Id,B_Date_Issue,B_Date_Due,B_Fine,Bk_Id)
	VALUES('$mid','$di','$dd','$bf','$bid')";
	$sql1="UPDATE librarydatabase.novel SET Book_Availability='N' WHERE Book_Id='$bid'";
	$result = mysqli_query($connection,$sql);
	$result1 = mysqli_query($connection,$sql1);
	if($result&& $result1){
		//echo "inserted successfully<br>";
	}
	else{
		echo "Could not insert in<br>";
	}
	
	
	$sql = "SELECT * FROM librarydatabase.borrowed_by";
	$result = mysqli_query($connection,$sql);

	echo "<table style='border:2px solid black;width:100%;background-color:pink'><tr><th style='border:2px solid black;'>MEMBER ID</th><th style='border:2px solid black;'>DATE ISSUE</th><th style='border:2px solid black;'>DATE DUE</th><th style='border:2px solid black;'>BOOK FINE</th ><th style='border:2px solid black;'>BOOK ID</th></tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td style='border:2px solid black;'>$row[Me_Id]</td>";
		echo "<td style='border:2px solid black;'>$row[B_Date_Issue]</td>";
		echo "<td style='border:2px solid black;'>$row[B_Date_Due]</td>";
		echo "<td style='border:2px solid black;'>$row[B_Fine]</td>";
		echo "<td style='border:2px solid black;'>$row[Bk_Id]</td>";
		echo "</tr>";
	}
	echo "</table>";
	}
else{
		//echo "Elements could not be collected<br>";
	}
//$count=count($_POST['genre']);
//change author to have author id, book_loc, genre, novel

 
?>
