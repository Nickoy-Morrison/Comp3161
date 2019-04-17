<?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'CompuStore';
 
$a=$_POST['uname'];
$b=$_POST['psw'];

session_start();
$email = $_SESSION['email'];
$psw = $_SESSION['psw'];

$conn = mysqli_connect($host, $username, $password, $dbname);
	$result = mysqli_query($conn,"SELECT * FROM CustomerAccount WHERE email = '$a' OR email = '$email' AND password = '$b' OR password = '$psw'");
	$count  = mysqli_num_rows($result);
	$set = mysqli_fetch_array($result);

	if($count!=0) {
		$message = "You are successfully authenticated!";
		echo $message;
		session_start();
		
		$go = $set['acc_id'];
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