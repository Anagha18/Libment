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


 

	

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$bname = $_POST['bookname'];
		$author = $_POST['author'];
		$bid = $_POST['bookid'];
		$isbn = $_POST['isbn'];
		$branch = $_POST['branch'];
		$genre = $_POST['genre'];// try $genre[] -- it kind of worked
		$language = $_POST['language'];
		$publisher = $_POST['publ'];
		$avail=$_POST['avail'];
		$res=$_POST['res'];
		//print("Elements collected<br>");
		//print_r($_POST);
		//print("<br>");
			$sql = "INSERT librarydatabase.novel(Book_Id,ISBN,Book_Name,Book_Language,Book_Availability,Book_Reserve,Auth_Id,Publ_Id)
	VALUES('$bid','$isbn','$bname','$language','$avail','$res','$author','$publisher')";
	//for($i=0;$i<$count;$i++){
	$sql1 = "INSERT librarydatabase.genre(B_Id,B_Genre)
	VALUES('$bid','$genre')";
    //}
	$sql2 = "INSERT librarydatabase.b_location(Boo_Id,B_Location)
	VALUES('$bid','$branch')";
	$result = mysqli_query($connection,$sql);
	$result1 = mysqli_query($connection,$sql1);
	$result2 = mysqli_query($connection,$sql2);
	if($result){
		//echo "inserted successfully<br>";
	}
	else{
		//echo "Could not insert in<br>";
	}
	
	
	$sql = "SELECT * FROM librarydatabase.novel";
	$sql1 = "SELECT * FROM librarydatabase.genre";
	$sql2 = "SELECT * FROM librarydatabase.b_location";
	$result = mysqli_query($connection,$sql);
$result1 = mysqli_query($connection,$sql1);
$result2 = mysqli_query($connection,$sql2);
	echo "<table style='border:2px solid black;background-color:pink;width:100%'><tr><th>BOOK ID</th><th style='border:2px solid black;'>ISBN</th><th style='border:2px solid black;'>BOOK NAME</th><th style='border:2px solid black;'>BOOK LANGUAGE</th><th style='border:2px solid black;'>BOOK AVAILABILITY</th><th style='border:2px solid black;'>BOOK RESERVE</th><th style='border:2px solid black;'>AUTHOR ID</th><th style='border:2px solid black;'>PUBLISHER ID</th></tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td style='border:2px solid black;'>$row[Book_Id]</td>";
		echo "<td style='border:2px solid black;'>$row[ISBN]</td>";
		echo "<td style='border:2px solid black;'>$row[Book_Name]</td>";
		echo "<td style='border:2px solid black;'>$row[Book_Language]</td>";
		echo "<td style='border:2px solid black;'>$row[Book_Availability]</td>";
		echo "<td style='border:2px solid black;'>$row[Book_Reserve]</td>";
		echo "<td style='border:2px solid black;'>$row[Auth_Id]</td>";
		echo "<td style='border:2px solid black;'>$row[Publ_Id]</td>";
		echo "</tr>";
	}
	echo "</table>";
echo "<br><br>";
echo "<table style='border:2px solid black;background-color:pink;width:100%'><tr><th style='border:2px solid black;'>BOOK ID</th><th style='border:2px solid black;'>BOOK GENRE</th></tr>";
	while($row = mysqli_fetch_array($result1)){
		echo "<tr>";
		echo "<td style='border:2px solid black;'>$row[B_Id]</td>";
		echo "<td style='border:2px solid black;'>$row[B_Genre]</td>";
		echo "</tr>";
	}

	echo "</table>";
	echo "<br><br>";
	echo "<table style='border:2px solid black;background-color:pink;width:100%;align:center'><tr><th style='border:2px solid black;'>BOOK ID</th><th style='border:2px solid black;'>BOOK LOCATION</th></tr>";
	while($row = mysqli_fetch_array($result2)){
		echo "<tr>";
		echo "<td style='border:2px solid black;'>$row[Boo_Id]</td>";
		echo "<td style='border:2px solid black;'>$row[B_Location]</td>";
		echo "</tr>";
	}
	echo "</table>";
	}
else{
		//echo "Elements could not be collected<br>";
	}
//$count=count($_POST['genre']);
	


 
?>
