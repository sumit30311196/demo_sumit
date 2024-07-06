<?php 
    include 'header.php';
    include 'db.php';

    session_start();

    // Check if the user is already logged in, if yes, redirect them to main.php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        header('Location: index1.php');
        exit;
    }

    if(isset($_POST['submit'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM `form` WHERE `email`='$user' AND `password`='$pass'";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_num_rows($result);

    if($res > 0){
        $_SESSION['logged_in'] = true;
        header("location: index1.php");
        exit;
    }else{
        header("location: login.php");
        $_SESSION['message']="Incorrect Username or Password."; 
        exit();
    }
}

if(isset($_SESSION['message'])){
    $error = $_SESSION['message'];
    unset($_SESSION['message']);
}

$conn->close();

?>

<div class="bg">
    <div class="login-reg">     
        <div class="log" id="sign">
            <h2 class="text-center">User Login</h2>
            <span></span><br>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="log_in">
                <label for="">Username :</label><br>
                <input type="text" name="user" placeholder="Enter Username" class="form-control" Required><br>
                <label for="">Password :</label><br>
                <input type="password" placeholder="Enter Password" id="password" class="form-control mb-3 password" name="pass" Required>
                <input type="checkbox" onclick="show()"> Show Password <br><br>
                <?php
                    if(isset($error)){
                        //$error = $_SESSION["message"];
                        echo "<div class='alert alert-danger text-center'>$error</div>";
                    }
                ?> 
                <input type="submit" name="submit" value="LOGIN" class="button button-primary">
            </form><br>
 
            <p align="center">Don't Have An Account <a href="signup.php" class="text-primary">Sign up</a></p>
        </div>
        
    </div>
</div>


<?php include 'footer.php'; ?>

