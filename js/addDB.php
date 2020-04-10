<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mdt419";
$tablename = "member";

$conn = new mysqli($servername, $username, $password,$dbname);
// add code here
$username = $_GET["username"];
$email = $_GET["email"];
$password = $_GET["password"];
if($conn->connect_error){
	dir("connection failed",$conn->connect_error);
}
$queryDatabaseInsertData = "INSERT INTO $tablename (username,email,password) VALUES('$username','$email','$password')";
if($conn->query($queryDatabaseInsertData) === TRUE){
    echo "New Record created successfully";
    header('Location:../login.html');
    exit;
}else{
    echo "Not created record";
}
$conn->close();
?>