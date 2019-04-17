<?php
           $host = getenv('IP');
           $username = getenv('C9_USER');
           $password = '';
           $dbname = 'Bank';
           $dbmainname = 'CompuStore';
           
           $cardnum=$_POST['uname'];
           $mth=$_POST['Exp'];
           $yr=$_POST['yr'];
           
           
           session_start();
           $modelid=$_SESSION['uid'];
           $userID =$_SESSION['userid'];
           $cost =$_SESSION['cost'];
           $QTY =$_SESSION['qty'];
           
           
           $conn = mysqli_connect($host, $username, $password, $dbname);
           $conn1 = mysqli_connect($host, $username, $password, $dbmainname);
	$result = mysqli_query($conn,"SELECT * FROM CreditDetails WHERE card_num = '$cardnum' AND expiration_month = '$mth' AND expiration_year = '$yr' ");
	$count  = mysqli_num_rows($result);
	$set = mysqli_fetch_array($result);

	if($count!=0) {
	    $conn1 = mysqli_connect($host, $username, $password, $dbmainname);
	    $result = mysqli_query($conn1,"SELECT * FROM CreditCardDetails WHERE card_num = '$cardnum' ");
	             $count  = mysqli_num_rows($result);
	             $set = mysqli_fetch_array($result);

	             if($count!=0) {
               echo "User exist!";
              }else{
              try {
              // Create connection
              $conn1 = new PDO("mysql:host=$host;dbname= $dbmainname, $username, $password);

              // set the PDO error mode to exception
              $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = "INSERT INTO CreditCardDetails VALUES ($cardnum,(int)$mth,(int)$yr)";
             $conn1->exec($sql);
              echo "New record created successfully";
             }
              catch(PDOException $e)
              {
             echo $sql . "<br>" . $e->getMessage();
              }
                  
              }
               
              $conn1 = mysqli_connect($host, $username, $password, $dbmainname);
              $result1 = mysqli_query($conn1,"SELECT * FROM CustomerCreditCard WHERE acc_id = '$userID' ");
	             $count  = mysqli_num_rows($result1);
	       
	             if($count!=0) {
               echo "User exist!";
              }else{
              try {
              // Create connection
              $conn1 = new PDO("mysql:host=$host;dbname= $dbmainname", $username, $password);

              // set the PDO error mode to exception
              $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = "INSERT INTO CustomerCreditCard VALUES ($userID,$cardnum";
             $conn1->exec($sql);
              echo "New record created successfully";
             }
              catch(PDOException $e)
              {
             echo $sql . "<br>" . $e->getMessage();
              }
              }
              $conn1 = mysqli_connect($host, $username, $password, $dbmainname);
            $sql = "SELECT * FROM Laptop INNER JOIN CartItems on Laptop.model_id= CartItems.model_id INNER JOIN Branch on Branch.br_id = CartItems.br_id INNER JOIN Carttotal on CartItems.acc_id = $userID";
          
            $result = $conn1->query($sql);

            if ($result->num_rows > 0) {
                // output data of each ro
           while($row = $result->fetch_assoc()) {
               try {
            // set the PDO error mode to exception
            $model= $row["model_id"];
            $br= $row["br_id"];
            $cost=$row["cost"];
            $total=$row["total"];
            $conn1 = mysqli_connect($host, $username, $password, $dbmainname);
            $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CALL addPurchasedItem('$userID', '$mode', '$br',  '$cost')";
            $conn1->exec($sql);
            echo "New record created successfully";
            
             }
            catch(PDOException $e)
             {
            echo $sql . "<br>" . $e->getMessage();
                }
            
             }
            }
            
          $letter1 = chr(mt_rand(65,90));
          $letter2 = chr(mt_rand(97,122));
          $num=mt_rand(62004,6200000000); 
          $date=date("Y-M-D");
          $track =$letter1.$letter2.$num;
          
            try {
            4conn1 = mysqli_connect($host, $username, $password, $dbmainname);

            // set the PDO error mode to exception
            $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO Receipt VALUES ('$track')";
            $conn1->exec($sql);
            echo "New record created successfully";
            
            try {
            4conn1 = mysqli_connect($host, $username, $password, $dbmainname);

            // set the PDO error mode to exception
            $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO Checkout VALUES ('$userID','$track','$total',$date)";
            $conn1->exec($sql);
            echo "New record created successfully";
            header("Location: home.php");
             }
            catch(PDOException $e)
             {
            echo $sql . "<br>" . $e->getMessage();
                }
            
            
            
             }
            catch(PDOException $e)
             {
            echo $sql . "<br>" . $e->getMessage();
                }
           
	}else{
		$message = "Invalid Username or Password!";
		echo $message;
		header("Location: purchase.html");
	}
           
          
           
          	
  

?>

         