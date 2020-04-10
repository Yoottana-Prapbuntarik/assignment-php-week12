<?php
// add code here
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mdt419";
$tablename = "member";
//get value form 
$getUsernameUser = $_GET['username'];
$getPasswordUser = $_GET['password'];

$conn = new mysqli($servername, $username, $password,$dbname);

if($conn->connect_error){
	dir("connection failed",$conn->connect_error);
}

$sql = "SELECT id, username,img, password FROM $tablename";
$results = $conn->query($sql);
if($results->num_rows > 0){  
	$username = "";
	$password = "";
	$images = "";
	while($row = $results->fetch_assoc()){
		$username = $row["username"];
		$password = $row["password"];
		$images = $row["img"];
		if($getUsernameUser == $username&& $getPasswordUser == $password){
		$_SESSION ["username"] = $getUsernameUser;
		$_SESSION ["password"] = $getPasswordUser;
		$_SESSION ["img"] = $images;
		header('Location:../feed.php');
		exit;
	}else{
		header('Location:../login.html');
		}
	}
}

$conn->close();
?>