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
  .cl2
  {
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
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color:rgb(238,232,170); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
<body>
  <h1>Search Books and Periodicals</h1>
  <p>You can search Books by it's Title, Author,Publisher,Genre and Periodicals by Title and Volume</p>
  <div class="container">
    
    <form class="form_code" method="POST" action="search.php">
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
$connection=mysqli_connect("localhost","root","","librarydatabase");
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
    $sql="SELECT Book_Id, ISBN, Book_Name, Book_Language, Book_Availability,Book_Reserve,Auth_Id,Publ_Id, Author_Name,Pub_Name FROM NOVEL, AUTHOR,PUBLISHER WHERE Book_Name LIKE '".$name."%' AND Author_id=Auth_id AND Pub_Id=Publ_Id";
    $idis="SELECT Book_Id FROM NOVEL WHERE Book_Name LIKE'".$name."%'"; 
  }
  else if($radioval1=="a") 
  {
    $sql="SELECT Book_Id,ISBN, Book_Name, Book_Language,Book_Availability,Book_Reserve,Auth_Id,Publ_Id,Author_Name,Pub_Name FROM novel,author,publisher WHERE Author_Name ='".$name."' AND Auth_id=author_id AND Pub_Id=Publ_Id";
  }
  else if($radioval1=="pu")
  {
     $sql= "SELECT Book_Id, ISBN, Book_Name, Book_Language,Book_Availability,Book_Reserve,Auth_Id,Publ_Id,Author_name, Pub_Name FROM novel,publisher,author WHERE Pub_Name LIKE'".$name."%' AND Publ_Id=Pub_Id AND Author_id=Auth_Id";
  }   
  else if($radioval1=="g")
  {
     $sql= "SELECT Book_Id,ISBN,Book_Name,Book_Language, Book_Availability,Book_Reserve,Auth_Id,Publ_Id,Author_Name,Pub_Name FROM novel,genre,author  WHERE B_Genre LIKE '".$name."%' AND Book_Id=b_id AND Author_id=Auth_Id AND Pub_Id=Publ_Id";
  }
  else if($radioval1=="v"){
  	echo "You cannot search book by Volume";
  }

  else{
  $sql="SELECT Book_Id, ISBN, Book_Name, Book_Language,Book_Availability,Book_Reserve,Auth_Id,Publ_Id,Author_Name,Pub_Name FROM NOVEL,AUTHOR,PUBLISHER WHERE Book_Name LIKE '".$name."%' AND Author_id=Auth_id AND Pub_Id=Publ_Id ";
   
}


}


if($radioVal == "p") 
{
  if($radioval1=="t")
  {
    $sql="SELECT Periodical_Id,Per_Name,Price,Volume,Author_name FROM Periodical,author WHERE Per_Name LIKE '".$name."%' AND author_id IN (select a_id from writes where p_id=periodical_id)";
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
  	$sql="SELECT Periodical_id  Per_Name,Price,Volume,Author_name FROM Periodical,author WHERE Volume='$name' AND author_id IN (select a_id from writes where p_id=periodical_id)";
  }
  else
  {

  $sql="SELECT  periodical_id Per_Name,Price,Volume,Author_name FROM Periodical,author WHERE Per_Name LIKE'".$name."%' AND author_id IN (select a_id from writes where p_id=periodical_id)";

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
if ($radioVal=="p")
{
echo "<table style='border:2px solid black;'><tr><th>periodical ID</th><th>periodical name</th><th>price</th><th>volume</th><th>author names</th>
</tr>";
	while($row = mysqli_fetch_array($results)){
		echo "<tr>";
		echo "<td>$row[0]</td>";
		echo "<td>$row[1]</td>";
		echo "<td>$row[2]</td>";
		echo "<td>$row[3]</td>";
		echo "<td>$row[4]</td>";
		
		echo "</tr>";
	}
	echo "</table>";
}
if ($radioVal=="b")
{echo "<table style='border:2px solid black;'><tr><th>BOOK ID</th><th>ISBN</th><th>BOOK NAME</th><th>BOOK LANGUAGE</th><th>BOOK AVAILABILITY</th><th>BOOK RESERVE</th><th>AUTHOR ID</th><th>PUBLISHER ID</th><th>AuthorName</th><th>PublisherName</th>
</tr>";
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
    echo "<td>$row[8]</td>";
    echo "<td>$row[9]</td>";
    
    echo "</tr>";
  }
  echo "</table>";

}

}
}

?><button id="myBtn">Request a book</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <center><form method="POST" action="reserve.php">
      Member Id:<br>
      <input class=".cl2" type="text" name="mid">
      <br>
      Book Id:<br>
      <input class=".cl2" type="text" name="bid">
      <br>
      <br>
      <input type="submit" value="Request!">
    </form></center>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
