<?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'project_3';
 
$a=$_POST['uname'];
$b=$_POST['psw'];

session_start();
$email = $_SESSION['email'];
$psw = $_SESSION['psw'];

$conn = mysqli_connect($host, $username, $password, $dbname);
	$result = mysqli_query($conn,"SELECT * FROM Customer WHERE Customer_email = '$a' OR Customer_email = '$email' AND Password = '$b' OR Password = '$psw'");
	$count  = mysqli_num_rows($result);
	$set = mysqli_fetch_array($result);

	if($count!=0) {
		$message = "You are successfully authenticated!";
		echo $message;
		session_start();
		
		$go = $set['Customer_id'];
		$_SESSION['userid']= $go;
		header("Location: home.php");
	}elseif ($a == "admin" AND $b =="pass123" ){
		$message = "You are successfully authenticated!";
		echo $message;
		header("Location: home.php");
	}else{
		$message = "Invalid Username or Password!";
		echo $message;
		header("Location: index.php");
	}
?>