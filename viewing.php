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
            <img src= "workspace/img/welcome.png" id="welcomeimage"/> <br> <br>
        </div>
        
        <div class="SideImage">
            <?php
    $host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'CompuStore';

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
session_start();
$gid = $_GET["ID"];
$_SESSION['uid']= $gid ;



$sql = "SELECT * FROM Laptop WHERE model_id LIKE '%$gid%' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each ro
       
    while($row = $result->fetch_assoc()) {
        echo "<div><div id='growIt'>".$row["brand"]."</div>";
        echo "<a href=cartitems.php><button id='colorIt2'> Go to Cart </button></a><br>";
        echo $row["model"]."</div><br>";
        echo "<div>$".$row["price"]."</div><br>";
        echo "<div><h4> Description </h4>";
        echo $row["description"] ."</div><br>";
        echo "<form method=POST action=cart.php>";
        echo "<label for=Qty><b>QTY</b></label><br>";
        echo "<input type=text placeholder=0 name=Qty value=1><br><br>";
        echo "<input type=submit id=colorIt name=Buy_Now value=Buy_Now >  ";
        echo "<input type=submit id=colorIt name=Add_to_cart value=Add_to_cart name=Add_to_cart></form>";
       session_start();
		
		$_SESSION['cost']= $row["price"];
    }
} else {
    echo "no data";
}
$conn->close();
?>
</div>
<div class="centerBox"> </div>
    </div>   
    </body>
</html>