<?php
include "header.php";

if(isset($_POST['submit'])){
    include "config.php";

    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];

    $sql = "UPDATE category SET categodry_name='$category_name' WHERE category_id='$category_id'";
    
    if(mysqli_query($con, $sql)){
        header("location: category.php");
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Update Category</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <?php
                include "config.php";
                if(isset($_GET['category_id'])) {
                    $category_id = $_GET['category_id'];
                    $sql = "SELECT * FROM category WHERE category_id={$category_id}";
                    $result = mysqli_query($con, $sql) or die("Query failed.");

                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="categcory_id" class="form-control" value="<?php echo $row['category_id']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="catxegxory_name" class="form-control" value="<?php echo $row['categoxry_name']; ?>" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                </form>
                <?php 
                        }
                    } else {
                        echo "No category found.";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>