
<!DOCTYPE html>
<html>
<head>
  <link href="styles/index.css" type="text/css" rel="stylesheet"/>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
     <script> 
        $(function(){
        $("#header").load("header.html"); 
        $("#footer").load("footer.html"); 
        });
  </script>
</head>
 <body>
     <div id="header"></div>
     
<div class="myGrid">
   <div class="topBox">
  <img src= "workspace/img/welcome.png" id="welcomeimage"/> <br> <br>
</div>
<div class="SideBox">
  <div clas="inSide">
            <?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname1 = 'Branch1';
$dbname2 = 'Branch2';
$dbname3 = 'Branch3';

$conn1 = mysqli_connect($host, $username, $password, $dbname1);
$conn2 = mysqli_connect($host, $username, $password, $dbname2);
$conn3 = mysqli_connect($host, $username, $password, $dbname3);

$output='';

if(isset($_POST['Firstname'])){
    $search=$_POST['Firstname'];
    $result1 = mysqli_query($conn1,"SELECT * FROM Laptop WHERE brand LIKE '%$search%' or model LIKE '%$search%' ");
    $result2 = mysqli_query($conn2,"SELECT * FROM Laptop WHERE brand LIKE '%$search%' or model LIKE '%$search%' ");
    $result3 = mysqli_query($conn3,"SELECT * FROM Laptop WHERE brand LIKE '%$search%' or model LIKE '%$search%' ");
	$count1  = mysqli_num_rows($result1);
	$count2  = mysqli_num_rows($result2);
	$count3  = mysqli_num_rows($result3);
	
    if($count1==0 and $count2==0 and $count3==0) {
		$output='there was no search results!';

	}else {
	while($row = mysqli_fetch_array($result1)){
		 echo "<table><tr><th>Id</th><th>Firstname</th><th>Lastname</th><th>address</th><th>contactnumber</th><th>email</th><th>appointment</th><th>acunittype</th><th>unitservice</th></tr>";
    // output data of each row
    while($row = $result1->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td>" . $row["address"]. "</td><td>" . $row["contactnumber"]. "</td><td>" . $row["email"]. "</td><td>" . $row["appointment"]. "</td><td>" . $row["acunittype"]. "</td><td>" . $row["unitservice"]. "</td></tr>";
    }
    while($row = $result2->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td>" . $row["address"]. "</td><td>" . $row["contactnumber"]. "</td><td>" . $row["email"]. "</td><td>" . $row["appointment"]. "</td><td>" . $row["acunittype"]. "</td><td>" . $row["unitservice"]. "</td></tr>";
    }
    while($row = $result3->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td>" . $row["address"]. "</td><td>" . $row["contactnumber"]. "</td><td>" . $row["email"]. "</td><td>" . $row["appointment"]. "</td><td>" . $row["acunittype"]. "</td><td>" . $row["unitservice"]. "</td></tr>";
    }
    echo "</table>";
		}
}
    
}
?>
  </div>
</div>

<div id="footer"></div>
</div>

</div>
</body>

</html>