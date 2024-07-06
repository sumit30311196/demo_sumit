<?php
include 'header.php';
include 'db.php';

if (isset($_POST['update'])) {
      // Sanitize input data
      $idd = mysqli_real_escape_string($conn, $_POST['id']);
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $phone = mysqli_real_escape_string($conn, $_POST['phone']);
      $pass = mysqli_real_escape_string($conn, $_POST['pass']);
  
      // Update query
      $updateQuery = "UPDATE `form` SET `name`='$name', `email`='$email', `phone`='$phone', `password`='$pass' WHERE `id`='$idd'";
  
      if ($conn->query($updateQuery) === TRUE) {
          header("Location: index1.php");
          
      } else {
          echo "Error updating record: " . $conn->error;
      }
  }
  
  // Close the connection when done
  

$id = $_GET['id'];
$sql = "SELECT * FROM `form` WHERE id = $id";
$result = $conn->query($sql);
while($row = mysqli_fetch_array($result)){
?>


<div class="container">
      <div class="edit_form">
      <h2 class="text-center">User Edit</h2>
            <span></span><br>
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <div class="mb-3 mt-3">
          <label for="name" class="form-label">Name:</label>
          <input type="hidden" class="form-control" id="email" placeholder="Enter Name" name="id" value="<?php echo $row['id']; ?>">
          <input type="text" class="form-control" id="email" placeholder="Enter Name" name="name" value="<?php echo $row['name']; ?>">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" class="form-control"  placeholder="Enter Email" name="email" value="<?php echo $row['email']; ?>">
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone No:</label>
          <input type="tel" class="form-control" id="ph" placeholder="Enter Phone No." name="phone" value="<?php echo $row['phone']; ?>">
        </div>
        <div class="mb-3">
          <label for="pwd" class="form-label">Password:</label>
          <input type="password" class="form-control mb-2" id="pwd" placeholder="Enter password" name="pass" value="<?php echo $row['password']; ?>">
          <input type="checkbox" onclick="myFunction()"> Show Password
        </div>
        
        <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
      </form>
      </div>
      <?php }?>
</div>


<script>
     function myFunction() {
      var x = document.getElementById("pwd");
      if (x.type === "password") {
      x.type = "text";
      } else {
      x.type = "password";
      }
}
</script>
<?php include 'footer.php'; ?>