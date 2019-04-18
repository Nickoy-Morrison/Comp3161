<?php
           $host = getenv('IP');
           $username = getenv('C9_USER');
           $password = '';
           $dbname = 'project_3';
           session_start();
           $QTY=$_POST['Qty'];
           $_SESSION['qty']= $QTY;
           
           $userID =$_SESSION['userid'];
          $conn = mysqli_connect($host, $username, $password, $dbname);
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
             }
             if (isset($_POST['Add_to_cart'])) {
              
             	$result = mysqli_query($conn,"SELECT * FROM Carttotal WHERE Customer_id = '$userID' ");
	             $count  = mysqli_num_rows($result);
	             $set = mysqli_fetch_array($result);

	             if($count!=0) {
               echo "User exist!";
              }else{
              try {
              // Create connection
              $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

              // set the PDO error mode to exception
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = "INSERT INTO Carttotal VALUES ('$userID', 0,0.00 )";
             $conn->exec($sql);
              echo "New record created successfully";
             }
              catch(PDOException $e)
              {
             echo $sql . "<br>" . $e->getMessage();
              }
              } 
                  header("Location: cart.1.php");
             } elseif(isset($_POST['Buy_Now'])) {
                 header("Location: purchase.html");
             }
$conn->close();
?>
   