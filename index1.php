<?php 
  include 'header.php'; 
  include 'db.php'; 

  session_start();
  // Check if the user is logged in
  if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect to the login page
    header('Location: login.php');
    exit;
  }

  $sql = "SELECT * FROM `form`";
  $result = $conn->query($sql);

?>

    <div class="container">
      <div class="crud">    
        <div class="header d-flex justify-content-between p-2 ">
          <div class="crud_op float-start">
            <h3>CRUD OPARATION</h3>
          </div>
          <div class="add float-end ">
              <button class="btn1 p-2 text-white" data-bs-toggle="modal" data-bs-target="#myModal"><a>Add New <i class="fa-solid fa-plus"></i></a></button>
          </div>
        </div>
          <div class="row">
          <div class="col-12 tbcrud">
            <table>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <!-- <th>Password</th> -->
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
              if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['phone']; ?></td>
                  
                  <td>
                    <button class="edit" title="edit" ><a href="edit.php?id=<?php echo $row['id']; ?>">Edit <i class="fa-solid fa-pen-to-square" style="color: #2E86C1;"></i></a></button>
                    <button class="delete" title="delete"><a href="delete.php?id=<?php echo $row['id']; ?>">Delete <i class="fa-solid fa-trash" style="color: #fff;"></i></a></button>
                  </td>
                </tr>
                <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
          <div class="add text-end"><br>
              <button class="btn1 p-2 text-white" ><i class="fa-solid fa-right-from-bracket"></i> <a href="logout.php">Logout </a></button>
          </div>
        </div>
      </div>
    </div>
    
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="registretion.php" method="POST">
        <div class="mb-3 mt-3">
          <label for="name" class="form-label">Name:</label>
          <input type="text" class="form-control" id="email" placeholder="Enter Name" name="name" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" class="form-control" id="pwd" placeholder="Enter Email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone No:</label>
          <input type="tel" class="form-control" id="ph" placeholder="Enter Phone No." name="phone" required>
        </div>
        <div class="mb-3">
          <label for="pwd" class="form-label">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass" required>
        </div>
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="submit" name="submit" class="btn btn-primary">SUBMIT</button>
      </div>
      </form>
    </div>
  </div>
</div>


<?php include 'footer.php' ?>