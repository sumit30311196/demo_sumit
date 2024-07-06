<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM `form` WHERE id = $id";

$result = $conn->query($sql);

if($result){
    header("Location: index.php"); 
}

?>