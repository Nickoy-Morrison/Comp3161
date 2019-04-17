<?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'game';

$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$address=$_POST['address'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$appoint=$_POST['appointment'];
$actype=$_POST['ACType'];
$unit=$_POST['unit'];

try {
// Create connection
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO customer (firstname, lastname, address, contactnumber, email, appointment, acunittype,  unitservice) VALUES ('$fname', '$lname','$address',$contact, '$email','$appoint', '$actype', '$unit' )";
$conn->exec($sql);
  echo "New record created successfully";
  header("Location:  adminview.php");
  }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

  $conn = null;
  ?>