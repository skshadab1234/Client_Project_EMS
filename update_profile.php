<?php
include_once 'reuse_files/constant.inc.php';
include_once 'reuse_files/function.inc.php';
//include database configuration file
include_once 'reuse_files/config.php';
$valid_extensions = array('jpeg', 'jpg', 'png'	); // valid extensions


if(!empty($_POST['first_name']) || !empty($_POST['last_name']) || !empty($_POST['email']) || !empty($_POST['day']) || !empty($_POST['month']) || !empty($_POST['year']))
{
	// print_r($_POST);
	// die();
$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

$res = mysqli_query($con,"select picture_link from users where id = 1");
$row = mysqli_fetch_assoc($res);
	$emp_profile_update  ='';
	if($_FILES['image']['name']!=''){
		$emp_profile="media/";
		$emp_profile.=rand(111111111,999999999).'_'.$_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'],$emp_profile);
		$delete_img = getcwd().'/'.$row['picture_link'];
		unlink($delete_img);
		$emp_profile_update=", picture_link='$emp_profile'";
	}else
	{
		$emp_profile="";
		$emp_profile = $row['picture_link'];
		$emp_profile_update=", picture_link='$emp_profile'";
 	}



// get uploaded file's extension
$ext = strtolower(pathinfo($emp_profile, PATHINFO_EXTENSION));

// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
echo "<img src='$emp_profile' / class='profile-user-img img-fluid img-circle'>";
$first_name = get_safe_value($_POST['first_name']);
$last_name = get_safe_value($_POST['last_name']);
$email = get_safe_value($_POST['email']);

 $day = get_safe_value($_POST['day']);
$month = get_safe_value($_POST['month']);
$year = get_safe_value($_POST['year']);

if ($month < 10) {
$month = "0".$month;
}

if ($day < 10) {
$day = '0'.$day;
}

$final_dob = $year.'-'.$month.'-'.$day;

//insert form data in the database
$sql = "UPDATE users SET  first_name = '$first_name', last_name = '$last_name', email =  '$email' $emp_profile_update,user_dob = '$final_dob',status = 1";
mysqli_query($con,$sql);
// echo $insert?'ok':'err';
}
else 
{
echo 'invalid';
}
}

?>