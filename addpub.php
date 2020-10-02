	
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
		$pname = $_POST['pname'];
		$pid = $_POST['pid'];
		//print("Elements collected<br>");
		//print_r($_POST);
		//print("<br>");
	}
else{
		//echo "Elements could not be collected<br>";
	}
//$count=count($_POST['genre']);
//change author to have author id, book_loc, genre, novel
	
	$sql = "INSERT librarydatabase.publisher(Pub_Id,Pub_Name)
	VALUES('$pid','$pname')";
	$result = mysqli_query($connection,$sql);
	
	if($result){
		echo "<h1>INSERTED!</h1><br>";
	}
	else{
		echo "<h1>ID already Exists</h1><br>";
	}
	
	
	$sql = "SELECT * FROM librarydatabase.author";
	$result = mysqli_query($connection,$sql);
 
?>
