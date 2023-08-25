<?php
include 'config.php';
session_start();
if(isset($_FILES['fileToUpload'])){
    $errors= array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions)===false)
    {
        $errors[]= "this extension file not allowed , please choose a JPG or PNG file";
    }
    if($file_size >2097152){
        $errors[]= "file size must be 2mb or lower.";
    }
    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"upload/".$file_name);
    }else{
        print_r($errors);
        die();
    }
}


$title= mysqli_real_escape_string($con,$_POST['post_title']);
$description= mysqli_real_escape_string($con,$_POST['postdesc']);
$category= mysqli_real_escape_string($con,$_POST['category']);
$date= date("d M, Y");

$author=$_SESSION['user_id'];

$sql = " insert into post(title,desrsiption,category,post_date ,author,post_img) values('{$title}', '{$description}' , {$category} , '{$date}' , '{$author}' , '{$file_name}');";

$sql .="update  category set post= post + 1 where category_id={$category}";
if(mysqli_multi_query($con,$sql)){
    header("location:post.php");
}else{
    echo "<div class='alert alert-success'>Query failed.</div>";

}



?>