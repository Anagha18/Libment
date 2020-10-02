<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
</head>
<style type="text/css">

	h1{
		font-family: 'Lobster', cursive;
        color: pink;
        font-size: 60px;
	}
	p{
		font-family: 'Mali', cursive;
        color: #FF7F50;
        font-size: 24px;
	}
.container{
	background-color:   #e7eff6;
	font-family: 'Mali', cursive;
	margin-left: 10px;
	margin-right: 10px;
}
.form_code {
	margin-left: 10px;

}

.container1 {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  margin-left: 20px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container1 input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container1:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container1 input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container1 input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container1 .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
.form_code .search{
	display: block;
	width: 30%;
	margin-top: 2rem;
	margin-left:15px;
	margin-right: auto;
	border-radius: 2rem;
	padding: .6rem;
	border: none;
	outline: none;
}

	
.form_code .button {
	width: 10%;
	display: inline-block;
	text-align: center;
	background-color:pink;
    padding: .6rem;
    margin-top: 1rem;
    margin: 1rem auto 0rem;
    margin-left: 60px;
    margin-bottom: 10px;
    border: none;
    border-radius: .3rem;
	
}
</style>
<body>
  <h1>Search Books and Periodicals</h1>
  <p>You can search Books by it's Title, Author,Publisher,Genre and Periodicals by Title and Volume</p>
  <div class="container">
    
    <form class="form_code" method="POST" action="finalsearch.php">
      <h2><b>Search</b></h2>
      <label class="container1">
  <input type="radio" name="radio" value="b">Books</input>
  <span class="checkmark"></span>
</label>
<label class="container1">
  <input type="radio" name="radio" value="p">Periodicals
  <span class="checkmark"></span>
</label>
      
      <h2><b>By</b></h2>
      <label class="container1">
  <input type="radio" name="radio1" value="t">Title
  <span class="checkmark"></span>
</label>
<label class="container1">
  <input type="radio" name="radio1" value="a">Author(for books)
  <span class="checkmark"></span>
</label><label class="container1">
  <input type="radio" name="radio1" value="pu">Publisher
  <span class="checkmark"></span>
</label>
<label class="container1">
  <input type="radio" name="radio1" value="g">Genre
  <span class="checkmark"></span>
</label>
<label class="container1">
  <input type="radio" name="radio1" value="v">Volume
  <span class="checkmark"></span>
</label>

      
             <!--<input class="search" list="myDatalist" placeholder="Enter name to search"> 
          <datalist id="myDatalist"> 
            <option value="Internet Explorer">
            <option value="Firefox">
            <option value="Chrome">
            <option value="Opera">
            <option value="Safari">
          </datalist><br>-->
          <input class="search" type="text" name="searchby" placeholder="Enter name to search">
          <!--<button type="submit" >Search</button>-->
          <input class="button" type="submit" name="Result" value='Result'></input>
    </form>
    
    
  </div>
  <?php
  if ($_SERVER["REQUEST_METHOD"]=="POST")
  {
$connection=mysqli_connect("localhost","root","1234","librarydatabase");
   if($connection)
   {
    echo "Connection Established <br>"; 
   }
   else{
    die("Connection Failed. reason:".mysqli_connect_error());
   }

if (isset($_POST['Result']))
{
  $name=$_POST["searchby"];

$radioVal = $_POST["radio"];
$radioval1=$_POST["radio1"];
if($radioVal == "b") 
{
  if($radioval1=="t")
  {
    $sql="SELECT Book_Id, ISBN, Book_Name, Book_Language, Book_Availability,Book_Reserve,Auth_Id,Publ_Id FROM NOVEL WHERE Book_Name LIKE '".$name."%'";
  }
  else if($radioval1=="a") 
  {
    $sql="SELECT Book_Id,ISBN, Book_Name, Book_Language,Book_Availability,Book_Reserve,Auth_Id,Publ_Id FROM novel,author WHERE Author_Name ='".$name."' AND Auth_id=author_id";
  }
  else if($radioval1=="pu")
  {
     $sql= "SELECT Book_Id, ISBN, Book_Name, Book_Language,Book_Availability,Book_Reserve,Auth_Id,Publ_Id FROM novel,publisher WHERE Pub_Name LIKE'".$name."%' AND Publ_Id=Pub_Id ";
  }   
  else if($radioval1=="g")
  {
     $sql= "SELECT Book_Id,ISBN,Book_Name,Book_Language, Book_Availability,Book_Reserve,Auth_Id,Publ_Id FROM novel,genre WHERE B_Genre LIKE '".$name."%'";
  }
  else if($radioval1=="v"){
  	echo "You cannot search book by Volume";
  }

  else{
  $sql="SELECT Book_Id, ISBN, Book_Name, Book_Language,Book_Availability,Book_Reserve,Auth_Id,Publ_Id FROM NOVEL WHERE Book_Name LIKE '".$name."%'";
   
}

}


if($radioVal == "p") 
{
  if($radioval1=="t")
  {
    $sql="SELECT * FROM Periodical WHERE Per_Name LIKE'".$name."%'";
  }
  else if($radioval1=="a") 
  { echo "You cannot search periodical by author";}
  
  else if($radioval1=="pu")
  {
    echo "You cannot search periodical by publisher";
  }
  else if($radioval1=="g")
  {
    echo "You cannot search periodical by genre";
  }
  else if($radioval1=="v"){
  	$sql="SELECT * FROM Periodical WHERE Volume='$name'";
  }
  else
  {

  $sql="SELECT * FROM Periodical WHERE Per_Name LIKE '".$name."%'";

  }

}

$results=mysqli_query($connection,$sql);
/*if(mysqli_num_rows($results)>0)
{
  while($row=mysqli_fetch_array($results))
  {
    echo $row[0]." ".$row[1]." ".$row[2]." ".$row[3];
    echo "<br>";
  }
}*/
echo "<table style='border:2px solid black;'><tr><th>BOOK ID</th><th>ISBN</th><th>BOOK NAME</th><th>BOOK LANGUAGE</th><th>BOOK AVAILABILITY</th><th>BOOK RESERVE</th><th>AUTHOR ID</th><th>PUBLISHER ID</th></tr>";
	while($row = mysqli_fetch_array($results)){
		echo "<tr>";
		echo "<td>$row[0]</td>";
		echo "<td>$row[1]</td>";
		echo "<td>$row[2]</td>";
		echo "<td>$row[3]</td>";
		echo "<td>$row[4]</td>";
		echo "<td>$row[5]</td>";
		echo "<td>$row[6]</td>";
		echo "<td>$row[7]</td>";
		
		echo "</tr>";
	}
	echo "</table>";
}
}

?>

</body>
</html>






	<!--<h1>Search Books and Periodicals</h1>
	<div class="container">
		
		<form class="form_code" method="POST" action="finalsearch.php">
			<h2><b>Search</b></h2>
			<label class="container1">
  <input type="radio" name="radio" value="b">Books</input>
  <span class="checkmark"></span>
</label>
<label class="container1">
  <input type="radio" name="radio" value="p">Periodicals
  <span class="checkmark"></span>
</label>
			
			<h2><b>By</b></h2>
			<label class="container1">
  <input type="radio" name="radio1" value="t">Title
  <span class="checkmark"></span>
</label>
<label class="container1">
  <input type="radio" name="radio1" value="a">Author(for books)
  <span class="checkmark"></span>
</label><label class="container1">
  <input type="radio" name="radio1" value="p">Publisher
  <span class="checkmark"></span>
</label>
<label class="container1">
  <input type="radio" name="radio1" value="g">Genre
  <span class="checkmark"></span>
</label>

			
             <input class="search" list="myDatalist" placeholder="Enter name to search"> 
  				<datalist id="myDatalist"> 
    				<option value="Internet Explorer">
    				<option value="Firefox">
    				<option value="Chrome">
   					<option value="Opera">
    				<option value="Safari">
  				</datalist><br>
  				<input class="search" type="text" name="searchby" placeholder="Enter name to search">
  				<button type="submit" >Search</button>
          <input class="button" type="submit" name="Result" value='Result'>Submit</input>
		</form>
		
		
	</div>-->
