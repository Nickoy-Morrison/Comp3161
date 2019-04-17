<?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'game';

$id=$_POST['id'];

try {
// Create connection
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "DELETE FROM customer WHERE id=$id";
$conn->exec($sql);
  echo "Record deleted successfully";
  header("Location: adminview.php");
  }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

  $conn = null;
  ?>
  
  
  $conn = new mysqli($servername, $username, $password, $dbname);
           $conn1 = new mysqli($servername, $username, $password, $dbname1);
           $conn2 = new mysqli($servername, $username, $password, $dbname2);
          
          	$result = mysqli_query($conn,"SELECT * FROM AmountInStock WHERE model_id = '$modelid'");
          	$result1 = mysqli_query($conn1,"SELECT * FROM AmountInStock WHERE model_id ='$modelid' ");
          	$result2 = mysqli_query($conn2,"SELECT * FROM AmountInStock WHERE model_id ='$modelid' ");
          
          	$row1=mysqli_fetch_assoc($result);
          	$row2=mysqli_fetch_assoc($result1);
          	$row3=mysqli_fetch_assoc($result2);
          	
          	if($row1['quantity'] > $row2['quantity']  and $row1['quantity'] > $row3['quantity'] ){
          	 $BD=strtolower($dbname);
          	 $connM = new mysqli($servername, $username, $password, $dbmainname);
          	 $resultM = mysqli_query($connM,"SELECT * FROM Branch WHERE name = '$BD'");
          	 $row=mysqli_fetch_assoc($resultM);
          	 echo $row['br_id'];
          	}elseif($row2['quantity']> $row1['quantity']and $row2['quantity'] > $row3['quantity']){
          	
          	$BD=strtolower($dbname1);
          	 $connM = new mysqli($servername, $username, $password, $dbmainname);
          	 $resultM = mysqli_query($connM,"SELECT * FROM Branch WHERE name = '$BD'");
          	 $row=mysqli_fetch_assoc($resultM);
          	 echo $row['br_id'];
          	}elseif($row3['quantity'] > $row1['quantity'] and $row3['quantity']> $row2['quantity']){
          	
          	$BD=strtolower($dbname2);
          	 $connM = new mysqli($servername, $username, $password, $dbmainname);
          	 $resultM = mysqli_query($connM,"SELECT * FROM Branch WHERE name = '$BD'");
          	 $row=mysqli_fetch_assoc($resultM);
          	 echo $row['br_id'];
          	}

          	