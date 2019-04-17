<!DOCTYPE html>
<html>
<head>
  <link href="styles/Admin.css" type="text/css" rel="stylesheet"/>
</head>
 <body>
<div class="myGrid">
  <div class"topBox">
  <img src= "img/page.jpg" id="firstImg"/> <br> <br>
  </div>
<div class="SideBox">
    <img src="img/Admin.jpg" id="SecondImg"/>
</div>
  <div class="SearchList">
 <a href="signUp.html"><button id="employee" type="submit">add employee</button></a>
 <a href="register.html"><button id="customer" type="submit">add customer</button></a>
 <a href="logout.html"><button id="logout" type="submit">Logout</button></a>
<br> <br> <br ><br>
</div>
<div class="CenterBox">
<form method="post" action="adminsearch.php">
    <p>Customer Search: </p> <input id = "search" type = "text" name = "Firstname" placeholder = "firstname">
    <input id="admin" type="submit" name="search">
</form>
    <br ><br><br>
    <a href="deleteview.php"><button id="admin" type="submit">delete</button></a>
    <br ><br><br >
      <?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'game';

$conn = mysqli_connect($host, $username, $password, $dbname);
$output='';

if($_POST['Firstname'] = ''){
    header("Location: deleteview.php");
}

if(isset($_POST['Firstname'])){
    $search=$_POST['Firstname'];
    $result = mysqli_query($conn,"SELECT * FROM customer WHERE firstname LIKE '%$search%' or lastname LIKE '%$search%' or id LIKE '%$search%'  ");
	$count  = mysqli_num_rows($result);
    if($count==0) {
		$output='there was no search results!';

	}else {
		while($row = mysqli_fetch_array($result)){
		 echo "<table><tr><th>Id</th><th>Firstname</th><th>Lastname</th><th>address</th><th>contactnumber</th><th>email</th><th>appointment</th><th>acunittype</th><th>unitservice</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td>" . $row["address"]. "</td><td>" . $row["contactnumber"]. "</td><td>" . $row["email"]. "</td><td>" . $row["appointment"]. "</td><td>" . $row["acunittype"]. "</td><td>" . $row["unitservice"]. "</td></tr>";
    }
    echo "</table>";
		}
}
    
}
?>
   
</div>

</div>
</body>
</html>