<?php
    include 'header.php';
    include 'db.php';
    session_start();

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];

    $duplicate = "SELECT * FROM `form` WHERE `email` = '$email' AND `phone` = '$phone'";
    $dupsql = $conn->query($duplicate);
    $res = mysqli_num_rows($dupsql);

    if($res > 0){
        // echo "<script>
        //         alert('User Already Taken');
        //         window.location.href = 'login.php';
        //     </script>";
        header("Location: signup.php");
        $_SESSION['msg']="Email or Phone Number Already Taken";
        exit();
    }else{
        $sql = "INSERT INTO `form`(`name`, `email`, `phone`, `password`) VALUES ('$name', '$email', '$phone', '$pass')";
        $qry = $conn->query($sql);

        if ($qry) {
            header("Location: signup.php");
            $_SESSION['success']="Registered Successfully";
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    //exit();
}
if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}
if(isset($_SESSION["success"])){
    $success = $_SESSION["success"];
    unset($_SESSION["success"]); // Unset the session variable
}

$conn->close();

?>


<div class="bg">
    <div class="login-reg">    
        <div class="sign_up" id="signup">
        <h2 class="text-center">User Sign Up</h2>
            <span></span><br>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="sgg">
                <label for="">Name :</label><br>
                <input type="text" name="name" placeholder="Enter Name" class="form-control" Required><br>
                <label for="">Email :</label><br>
                <input type="email" name="email" placeholder="Enter Email" class="form-control" Required><br>
                <label for="">Phone :</label><br>
                <input type="tel" name="phone" placeholder="Enter Phone" class="form-control" Required><br>
                <label for="">Password :</label><br>
                <input type="password" placeholder="Enter Password" id="pass2" class="form-control mb-2" name="pass" Required>
                <input type="checkbox" onclick="myshow()"> Show Password <br><br>
                    <?php if(isset($success)) { 
                        //$success = $_SESSION["success"];
                        echo "<div class='alert alert-success text-center'>$success</div>";
                    }if(isset($msg)){
                        echo "<div class='alert alert-warning text-center'>$msg</div>";
                    }
                    ?> 
                <label for=""class="d-flex">
                    <input type="submit" name="signup" value="SIGNUP" class="button button-primary">
                </label>
            </form><br>
            <p align="center">Already Have An Account <a href="login.php" class="text-primary">Sign in</a></p>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>