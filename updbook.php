<!DOCTYPE html>
<html>
<head>
<title>
UPDATE BOOK</title>
<style>
body
{
	background-color:lightseagreen;
}
form
{
	font-size:32px;
	font-family:"comic sans ms"
	color:blue;
}
.container
{
	background-color:darkturquoise;
	
  /*  position:fixed;
    top: 50%;
    left: 50%;
    width:40em;
    height:55em;
    margin-top: -25em; 
    margin-left: -25em; 
    border: 1px solid #ccc;
/*set to a negative number 1/2 of your height*/
  /*set to a negative number 1/2 of your width*/
  margin-left: 20%;
  margin-right: 20%;
}
#txt
{
	height:20px;
    font-size:14pt;
    font-family:"comic sans ms";
}
.sub
{
	height:50px;
	width:200px;
	color:white; 
	background-color:pink;
	font-size:30px;
	background-image: url("bk.jpeg");
}
.sel
{
	background-color:lightgreen;
	font-size:20px;
	font-color:white;
}
</style>
</head>
<body>
<center><div class="container">
<h2>Details of Old Book</h2>

<form method="POST" onsubmit="return confirm('Confirm Updation?');" action="updbook.php" >
  Book Name:<br>
    <input id="txt" type="text" name="bookname">
  <br>
  Book Author<br>
   <input id="txt" type="number" name="author" >
   <br>
  Book ID<br>
   <input id="txt" type="number" name="bookid" >
   <br>
  ISBN<br>
   <input id="txt" type="number" name="isbn" >
   <BR>
   Branch:<br>
   <input type="text" id="txt" name="branch">
   <br>
   Genre: (ctrl+select)<br><!-- check box for multiple required-->
   <select class="sel" name="genre" size="8" multiple>
    <option value="Adventure">Adventure</option>
    <option value="Action">Action</option>
    <option value="Romance">Romance</option>
    <option value="Drama">Drama</option>
    <option value="Fiction">Fiction</option>
    <option value="Non-Fiction">Non-Fiction</option>
    <option value="Comedy">Comedy</option>
    <option value="Adult">Adult</option>
    <option value="Teens">Teens</option>
  </select><br>
  Availability:<br>
  <select class="sel" name="avail" size="2" >
    <option value="y">Yes</option>
    <option value="n">No</option>
  </select><br>
  Reserved:<br>
  <select class="sel" name="res" size="2" >
    <option value="y">Yes</option>
    <option value="n">No</option>
  </select><br>
   Language:<br>
   <input type="text" id="txt" name="language">
   <br>
    Publisher<br>
   <input id="txt" type="number" name="publ" >
   <br><br>
  <input class="sub" type="submit" value="Submit">
  <!-- MEMBERSHIP START AND END DATE-- WHEN THEY SEARCH FOR MEMBER, DOB, MEMBERSHIP END , PASSWORD-->
 
</form> 
</div></center>
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
    $genre = $_POST['genre'];
    $language = $_POST['language'];
    $publisher = $_POST['publ'];
    $avail=$_POST['avail'];
    $res=$_POST['res'];
     $sql1="UPDATE librarydatabase.novel SET Book_Id='$bid', ISBN='$isbn', Book_Name='$bname',Book_Language='$language', Book_Availability='$avail', Book_Reserve='$res', Auth_Id='$author', Publ_Id='$publisher' WHERE Book_Id='$bid'";
  $result = mysqli_query($connection,$sql1);
  $sql2="UPDATE librarydatabase.genre SET B_Id='$bid',B_Genre='$genre' WHERE B_Id='$bid'";
  $result1 = mysqli_query($connection,$sql2);
  $sql3="UPDATE librarydatabase.b_location SET Boo_Id='$bid', B_Location='$branch' WHERE Boo_Id='$bid'";
  $result2 = mysqli_query($connection,$sql3);
if(mysqli_query($connection,$sql1)){
    //echo "yes<br>";
  }
else{
    //echo "no<br>";
  }
  $sql = "SELECT * FROM librarydatabase.novel";
  $sql1 = "SELECT * FROM librarydatabase.genre";
  $sql2 = "SELECT * FROM librarydatabase.b_location";
  $result = mysqli_query($connection,$sql);
$result1 = mysqli_query($connection,$sql1);
$result2 = mysqli_query($connection,$sql2);
    //print("Elements collected<br>");
    //print_r($_POST);
    //print("<br>");
  }
else{
    //echo "Elements could not be collected<br>";
  }
 
 
  ?>


</body>
</html>
