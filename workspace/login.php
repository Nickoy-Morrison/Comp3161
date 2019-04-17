<?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'game';

session_start();

$user=$_POST['username'];
$pass=$_POST['password'];

$_SESSION['username']=$user;
$_SESSION['password']=$pass;


$conn = mysqli_connect($host, $username, $password, $dbname);
	$result = mysqli_query($conn,"SELECT * FROM employee WHERE username = '$user' AND password = '$pass'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		$message = "Invalid Username or Password!";
		echo $message;
		header("Location: admin.php");

	}else {
		$message = "You are successfully authenticated!";
		echo $message;
		header("Location: view.php");
	}
?>