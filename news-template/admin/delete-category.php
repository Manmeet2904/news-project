<?php
include "config.php";

$category_id = $_GET['categry_id'];

$sql = "DELETE FROM categories WHERE category_id = '$category_id'";

if(mysqli_query($con, $sql)){
    header("location: category.php");
} else {
    echo "<p style='color:red; margin:10px 0;'>Can't delete category.</p>";
}

mysqli_close($con);
?>