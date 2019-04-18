<?php
           $host = getenv('IP');
           $username = getenv('C9_USER');
           $password = '';
           $dbname = 'Branch_1';
           $dbname1 = 'Branch_2';
           $dbname2 = 'Branch_3';
           $dbmainname = 'project_3';
           session_start();
           $modelid=$_SESSION['uid'];
           $userID =$_SESSION['userid'];
           $cost =$_SESSION['cost'];
           $QTY =$_SESSION['qty'];

           $conn = new mysqli($servername, $username, $password, $dbname);
           $conn1 = new mysqli($servername, $username, $password, $dbname1);
           $conn2 = new mysqli($servername, $username, $password, $dbname2);
          
          	$result = mysqli_query($conn,"SELECT * FROM AmountInStock WHERE Product_id = '$modelid' ");
          	$result1 = mysqli_query($conn1,"SELECT * FROM AmountInStock WHERE Product_id = '$modelid' ");
          	$result2 = mysqli_query($conn2,"SELECT * FROM AmountInStock WHERE Product_id = '$modelid' ");
          
          	$row1=mysqli_fetch_assoc($result);
          	$row2=mysqli_fetch_assoc($result1);
          	$row3=mysqli_fetch_assoc($result2);
          	
          	if($row1['quantity'] > $row2['quantity']  and $row1['quantity'] > $row3['quantity'] ){
          	 $BD=$dbname;
          	 $connM = new mysqli($servername, $username, $password, $dbmainname);
          	 $resultM = mysqli_query($connM,"SELECT * FROM Branch WHERE name Like '%$BD%'");
          	 $row=mysqli_fetch_assoc($resultM);
          	 $brID=$row['br_id'];
          	 
          	 
          	 try {
            // Create connection
            $connw = new PDO("mysql:host=$host;dbname=$dbmainname", $username, $password);

            // set the PDO error mode to exception
            $connw->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CALL getcost($userID,$modelid,$brID,$QTY, $cost)";
            $connw->exec($sql);
            echo "New record created successfully";
            header("Location: home.php");
             }
            catch(PDOException $e)
             {
            echo $sql . "<br>" . $e->getMessage();
                }
          	
          	}elseif($row2['quantity']> $row1['quantity']and $row2['quantity'] > $row3['quantity']){
          	
          	$BD=$dbname1;
          	 $connM = new mysqli($servername, $username, $password, $dbmainname);
          	 $resultM = mysqli_query($connM,"SELECT * FROM Branch WHERE name Like '%$BD%'");
          	 $row=mysqli_fetch_assoc($resultM);
          	 $brID=$row['br_id'];
          	 
          	 
          	  try {
            // Create connection
            $connw = new PDO("mysql:host=$host;dbname=$dbmainname", $username, $password);

            // set the PDO error mode to exception
            $connw->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CALL getcost($userID,$modelid,$brID,$QTY, $cost)";
            $connw->exec($sql);
            echo "New record created successfully";
            header("Location: home.php");
             }
            catch(PDOException $e)
             {
            echo $sql . "<br>" . $e->getMessage();
                }
                
          	 
          	}elseif($row3['quantity'] > $row1['quantity'] and $row3['quantity']> $row2['quantity']){
          	
          	$BD=$dbname2;
          	 $connM = new mysqli($servername, $username, $password, $dbmainname);
          	 $resultM = mysqli_query($connM,"SELECT * FROM Branch WHERE name Like '%$BD%'");
          	 $row=mysqli_fetch_assoc($resultM);
          	 $brID=$row['br_id'];
          	  try {
            // Create connection
            $connw = new PDO("mysql:host=$host;dbname=$dbmainname", $username, $password);

            // set the PDO error mode to exception
            $connw->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CALL getcost($userID,$modelid,$brID,$QTY, $cost)";
            $connw->exec($sql);
            echo "New record created successfully";
            header("Location: home.php");
             }
            catch(PDOException $e)
             {
            echo $sql . "<br>" . $e->getMessage();
                }
          	}else{
          	   header("Location: OutOfstock.html");
          	}

          	
          	

            
$conn->close();
?>
