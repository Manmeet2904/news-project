<?php
include "config.php";
if($_SESSION['user_role']=='0'){
    header("location:post.php");
 }
$userid=$_GET['id'];
$sql="delte from user where user_id='$userid'";
if(mysqli_query($con,$sql)){
    header("location:users.php");
}
else{
    echo"<p style='color:red; margin:10px 0;'>Can\'t delete user record.</p>";
}
mysqli_close($con);
?>