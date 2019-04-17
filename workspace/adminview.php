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
    <p>Customer Search: </p> <input id = "search" type = "text" name = "Firstname" placeholder = "">
    <input id="admin" type="submit" name="search">
</form>
    <br><br><br>
    <a href="deleteview.php"><button id="admin" type="submit">delete</button></a>
    <br ><br><br >
<?php
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th><th>address</th><th>contactnumber</th><th>email</th><th>appointment</th><th>acunittype</th><th>unitservice</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'game';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, firstname, lastname, address, contactnumber, email, appointment, acunittype,  unitservice FROM customer"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?> 
   
</div>

</div>
</body>
</html>