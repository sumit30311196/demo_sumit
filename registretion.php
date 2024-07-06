<?php 
include 'db.php';

session_start();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];

    $duplicate = "SELECT * FROM `form` WHERE `email` = '$email' AND `phone` = '$phone'";
    $dupsql = $conn->query($duplicate);
    $res = mysqli_num_rows($dupsql);

    if($res > 0){
        echo "<script>
                alert('User Already Taken');
                window.location.href = 'index1.php';
            </script>";
    }else{
        $sql = "INSERT INTO `form`(`name`, `email`, `phone`, `password`) VALUES ('$name', '$email', '$phone', '$pass')";
        $qry = $conn->query($sql);

        if ($qry) {
            header("Location: index1.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    exit();
}
$conn->close();
?>