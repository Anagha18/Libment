<!DOCTYPE html>
<html>
<head><title>Request!</title></head>
<body background="pink">
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

		print("Elements collected<br>");
		print_r($_POST);
		print("<br>");
	}
else{
		echo "Elements could not be collected<br>";
	}
/*$result = mysqli_query($connection,$sql);
if($result){
		echo "yes<br>";
	}
else{
		echo "no<br>";
	}
$sql="SELECT * FROM $novel";
//$result=mysqli_query($sql);*/

/* Count table rows */
//$count=mysql_num_rows($result);
/*?>
<?php*/

/* Check if button name "Submit" is active, do this */
//if(isset($_POST['Submit']))
//{
	$sql1="UPDATE librarydatabase.novel SET Book_Reserve='Y' WHERE Book_Id='$bid'";
	$result = mysqli_query($connection,$sql1);
if(mysqli_query($connection,$sql1)){
		echo "yes connected <br>";
	}
else{
		echo "no not connected <br>";
	}
	$sql = "SELECT * FROM librarydatabase.novel";
	$result = mysqli_query($connection,$sql);
	echo "<table  style='border:2px solid black;width:100%;'><tr cellpadding=10px><th styletext-align='center'>BOOK ID</th><th text-align='center'>ISBN</th><th text-align='center'>BOOK NAME</th><th text-align='center'>BOOK LANGUAGE</th><th text-align='center'>  BOOK AVAILABILITY</th><th text-align='center'>   BOOK RESERVE</th><th text-align='center'>  AUTHOR ID</th><th text-align='center'>  PUBLISHER ID</th></tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr >";
		echo "<td style='border:2px solid black;'>$row[Book_Id]</td>";
		echo "<td style='border:2px solid black;'>$row[ISBN]</td>";
		echo "<td style='border:2px solid black;'>$row[Book_Name]</td>";
		echo "<td style='border:2px solid black;text-align:'center''>$row[Book_Language]</td>";
		echo "<td style='border:2px solid black;'>$row[Book_Availability]</td>";
		echo "<td style='border:2px solid black;'>$row[Book_Reserve]</td>";
		echo "<td style='border:2px solid black;'>$row[Auth_Id]</td>";
		echo "<td style='border:2px solid black;'>$row[Publ_Id]</td>";
		echo "</tr>";
	}
	echo "</table>";


	?>
</body>
</html>
	<!--//$count=count($_POST[]);
	//}
//for($i=0;$i<$count;$i++){
//$sql1="UPDATE $novel SET Book_Id='$bid', ISBN='$isbn', Book_Name='$bname',Book_Language='$language', Book_Availability='$avail', Book_Reserve='$res', Auth_Id='$author', Publ_Id='$publ' WHERE Book_Id='$bid'";
//$result1=mysqli_query($sql1);
//}


//echo $count;
//mysqli_close();

<table width="500" border="0" cellspacing="1" cellpadding="0">
<form name="form1" method="post" action="">
<tr>
<td>
<table width="500" border="0" cellspacing="1" cellpadding="0">

<tr>
<td align="center"><strong>Book Id</strong></td>
<td align="center"><strong>ISBN</strong></td>
<td align="center"><strong>Book Name</strong></td>
<td align="center"><strong>Book Language</strong></td>
<td align="center"><strong>Availability</strong></td>
<td align="center"><strong>Reserved</strong></td>
<td align="center"><strong>Author Id</strong></td>
<td align="center"><strong>Publisher Id</strong></td>
</tr>
-->

