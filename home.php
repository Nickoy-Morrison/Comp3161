 <!DOCTYPE html>
 <html>
   <head>
     <title> Compus Store </title>
     <link href="styles/home.css" type="text/css" rel="stylesheet"/>
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
     <div>
    <a href="cartitems.php"><button id="colorIt2"> Go to Cart</button></a><br>
 </div>
  </div>
 <div class="SideImage">
     
  <div clas="inSide">
   <?php
           $host = getenv('IP');
           $username = getenv('C9_USER');
           $password = '';
           $dbname = 'CompuStore';

           $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
             } 

$sql = "SELECT model_id,description,model,price,brand FROM Laptop";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table>";
     echo "<tr id=headr ><th>Brand</th><th>description</th><th>model</th><th>Cost</th></tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr id=headr>";
        echo "<td><a href= viewing.php?ID=".$row["model_id"].">".$row["brand"]."</a></td>";
        echo "<td><a href= viewing.php?ID=".$row["model_id"].">".$row["description"]."</a></td>";
        echo "<td>".$row["model"]."</td>";
        echo "<td> $".$row["price"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<table>";
     echo "<tr id=headr ><th>Brand</th><th>description</th><th>model</th><th>Cost</th></tr>";
     echo "</table>";
}
$conn->close();
?>
  </div>
  
</div>
<
<div id="footer"></div>
</div>
 </body>

</html>