<?php
$server = "localhost";
$user = "root";
$pass = "mysql";
$db = "crud";

$conn = new mysqli($server, $user, $pass, $db);

if($conn->connect_error){
    die("connection failed: " . $conn->connect_error);
}else{
    //echo "Connection Successfully";
}

?>

