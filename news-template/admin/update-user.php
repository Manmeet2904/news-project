<?php
include "header.php"; 

if(isset($_POST['submit'])) {
 include "config.php";

 $userid = $_POST['user_id'];
 $fname = $_POST['f_name'];
$lname = $_POST['l_name'];
$user = $_POST['username'];
$role = $_POST['role'];
 

$userid = mysqli_real_escape_string($con, $userid);
$fname = mysqli_real_escape_string($con, $fname);
$lname = mysqli_real_escape_string($con, $lname);
$user = mysqli_real_escape_string($con, $user);
 $role = mysqli_real_escape_string($con, $role);


 $sql = "UPDATE users SET first_name='$fname', last_name='$lname', username='$user', role='$role' WHERE user_id='$userid'";
 $result = mysqli_query($con, $sql);

 
if(mysqli_query($con, $sql)){
 header("location: users.php");
}
}

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  <?php 
                  include "config.php";
                  $user_id = $_GET['id'];
                  $sql = "select * from users where user_id ={$user_id}";
                  $result = mysqli_query($con,$sql) or die("query failed.");
                  if(mysqli_num_rows($result) >0){
                    while($row = mysqli_fetch_assoc($result)){

                
                  
                  ?>
                  <form  action="<?php $_SERVER['PHP_SELF'];?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $row['user_id']?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $row['f_name']?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['first_name']?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                   <?php
                          if($row['role']== 1){
                                echo "<option value='0'>normal User</option>
                              <option value='1' selected>Admin</option>";
                              }else{
                                echo "<option value='0' selected>normal User</option>
                              <option value='1'>Admin</option>";
                              }
                              
                            //   <option value="">normal User</option>
                            //   <option value="1">Admin</option>
                        ?>
                            </select>
                        
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Updated" required />
                  </form>
                  <!-- /Form -->
                  <?php
                  }
                 } ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
