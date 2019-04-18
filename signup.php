<?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'project_3';

$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$telephone=$_POST['telephone'];
$email=$_POST['email'];
session_start();

$email=$_POST['email'];
$psw=$_POST['psw'];

$_SESSION['email']= $email;
$_SESSION['psw']= $psw;

try {
// Create connection
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "CALL createACC('$fname', '$lname','$telephone','$email','$psw' )";
$conn->exec($sql);
  echo "New record created successfully";
  header("Location:  login.php");
  }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

  $conn = null;
  ?>