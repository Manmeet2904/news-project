<?php
include "header.php";

if(isset($_POST['save'])){
    include "config.php";

    $category_name = $_POST['category_name'];

    $sql = "INSERT INTO category (category_name) VALUES ('$category_name')";
    
    if(mysqli_query($con, $sql)){
        header("location: ategory.php");
      }
    mysqli_close($con); // Close the database connection
}
?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Category</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="categdry_name" class="form-control" placeholder="Category Name" required>
                    </div>
                    <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                </form>
                <!-- /Form End -->
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>