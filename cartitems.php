<html>
    <head>
        <title> screen </title>
        <link rel="stylesheet" href="styles/viewing.1.css" type="text/css" />
         <script src="//code.jquery.com/jquery-1.10.2.js"></script>
     <script> 
        $(function(){
        $("#header").load("header.1.html"); 
        $("#footer").load("footer.html"); 
        });
</script>
    </head>
    <body>
    	 <div id="header"></div>
    <div class="myGrid">
    <div class="topBox" >
   <img src= "img/welcome.png" id="welcomeimage"/> <br> <br>
   </div>
        
<div class="SideImage">
<?php
    $host = getenv('IP');
    $username = getenv('C9_USER');
    $password = '';
    $dbname = 'project_3';

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
session_start();
$userID =$_SESSION['userid'];

$sql = "SELECT * FROM Product INNER JOIN CartItems on Product.Product_id= CartItems.Product_id INNER JOIN Branch on Branch.br_id = CartItems.br_id INNER JOIN Carttotal on CartItems.Customer_id = $userID";
$result1 = $conn->query($sql);

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each ro
     $row1=mysqli_fetch_assoc($result1);  
    while($row = $result->fetch_assoc()) {
        echo "<br>";
        echo "<div class='growIt'>".$row["Prod_brand"];
        echo $row["Model"]."</div>";
        echo "<div> Cost:";
        echo $row["cost"]."</div>";
        echo "<div> Quantity:";
        echo $row["quantity"] ."</div>";
        echo "<div>From:";
        echo $row["name"] ."</div>";
        echo "<br>";
    }
   
   echo "<div> Total:";
   echo $row1["total"]."</div>";
   echo "<br><a href=purchase.html><button id='colorIt3'> Checkout </button></a><br>";
} else {
    echo "no data";
}
 
   
$conn->close();
?>

</div>
        <div class="centerBox"> <div>
    </div>   
    </body>
</html>