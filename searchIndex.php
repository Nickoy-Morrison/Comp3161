
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
  <img src= "img/welcome.png" id="welcomeimage"/> <br> <br>
</div>
<div class="SideBox">
  <div clas="inSide">
            <?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname1 = 'Branch_1';
$dbname2 = 'Branch_2';
$dbname3 = 'Branch_3';

$conn1 = mysqli_connect($host, $username, $password, $dbname1);
$conn2 = mysqli_connect($host, $username, $password, $dbname2);
$conn3 = mysqli_connect($host, $username, $password, $dbname3);

$output='';

if(isset($_POST['Firstname'])){
    $search=$_POST['Firstname'];
    $result1 = mysqli_query($conn1,"SELECT * FROM Product WHERE Prod_brand LIKE '%$search%' or Model LIKE '%$search%' ");
    $result2 = mysqli_query($conn2,"SELECT * FROM Product WHERE Prod_brand LIKE '%$search%' or Model LIKE '%$search%' ");
    $result3 = mysqli_query($conn3,"SELECT * FROM Product WHERE Prod_brand LIKE '%$search%' or Model LIKE '%$search%' ");
	$count1  = mysqli_num_rows($result1);
	$count2  = mysqli_num_rows($result2);
	$count3  = mysqli_num_rows($result3);
	
    if($count1==0 and $count2==0 and $count3==0) {
		$output='there was no search results!';

	}else {
	    echo "<table><tr><th>Brand</th><th>Description</th><th>model</th><th>Cost</th><th>Branches</th></tr>";
	while($row = mysqli_fetch_array($result1)){
    // output data of each row
    while($row = $result1->fetch_assoc()) {
        echo "<tr><td>".$row["Prod_brand"]."</td><td>".$row["Product_descri"]."</td><td>".$row["Model"]."</td><td>".$row["Product_price"]."</td><td>". $dbname1."</td></tr>";
    }}
        
	while($row = mysqli_fetch_array($result2)){
    while($row = $result2->fetch_assoc()) {
       echo "<tr><td>".$row["Prod_brand"]."</td><td>".$row["Product_descri"]."</td><td>".$row["Model"]."</td><td>".$row["Product_price"]."</td><td>".$dbname2."</td></tr>";
    }}
        
	while($row = mysqli_fetch_array($result3)){
    while($row = $result3->fetch_assoc()) {
        echo "<tr><td>".$row["Prod_brand"]."</td><td>".$row["Product_descri"]."</td><td>".$row["Model"]."</td><td>".$row["Product_price"]."</td><td>".$dbname3."</td></tr>";
    }}
    
    echo "</table>";
		
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