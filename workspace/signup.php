<?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'game';

$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$age=$_POST['age'];
$contact=$_POST['contact'];
$address=$_POST['address'];
$user=$_POST['username'];
$pass=$_POST['password'];


try {
// Create connection
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO employee(firstname, lastname, age, contact, address, username, password) VALUES ('$fname', '$lname', '$age','$contact','$address','$user', '$pass' )";
$conn->exec($sql);
  echo "New record created successfully";
  header("Location: index.html");
  }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

  $conn = null;
  ?>