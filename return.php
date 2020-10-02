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
		$mid = $_POST['mid'];
		$bid = $_POST['bid'];
		$bf=$_POST['bf'];
		print("Elements collected<br>");
		print_r($_POST);
		print("<br>");
	}
else{
		echo "Elements could not be collected<br>";
	}
//$count=count($_POST['genre']);
//change author to have author id, book_loc, genre, novel
	
	
	$sql1="UPDATE librarydatabase.novel SET Book_Availability='Y' WHERE Book_Id='$bid'";
	$sql= "DELETE FROM librarydatabase.borrowed_by WHERE Me_Id='$mid' AND Bk_Id='$bid'";
	$result = mysqli_query($connection,$sql);
	$result1 = mysqli_query($connection,$sql1);
	if($result){
		//echo "inserted successfully<br>";
	}
	else{
		echo "Could not insert in<br>";
	}
	if( $result1)
	{
		//echo "del succ<br>";
	}
	else
	{
		echo "del unsuccessful<br>";
	}
	
	
	$sql = "SELECT * FROM librarydatabase.borrowed_by";
	$result = mysqli_query($connection,$sql);

	echo "<table style='border:2px solid black;width:100%;background-color:pink'><tr><th style='border:2px solid black;'>MEMBER ID</th><th style='border:2px solid black;'>BOOK FINE</th><th style='border:2px solid black;'>BOOK ID</th></tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td style='border:2px solid black;'>$row[Me_Id]</td>";
		echo "<td style='border:2px solid black;'>$row[B_Fine]</td>";		
		echo "<td style='border:2px solid black;'>$row[Bk_Id]</td>";
		echo "</tr>";
	}
	echo "</table>";
 
?>
