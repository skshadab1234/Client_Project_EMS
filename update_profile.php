<?php
include_once 'reuse_files/constant.inc.php';
//include database configuration file
include_once 'reuse_files/config.php';
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = 'media/'; // upload directory

if(!empty($_POST['first_name']) || !empty($_POST['last_name']) || !empty($_POST['email']))
{
$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

// can upload same image using rand function
$final_image = rand(1000,1000000).$img;

// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_image); 
if(move_uploaded_file($tmp,$path)) 
{
echo "<img src='$path' / class='profile-user-img img-fluid img-circle'>";
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];

//insert form data in the database
$sql = "UPDATE users SET  first_name = '$first_name', last_name = '$last_name', email =  '$email', picture_link = '$path',status = 1";
mysqli_query($con,$sql);
// echo $insert?'ok':'err';
}
} 
else 
{
echo 'invalid';
}
}

?>