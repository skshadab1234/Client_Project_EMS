<?php
require 'reuse_files/config.php';

if (!empty($_POST['current_password']) || !empty($_POST['new_password']) || !empty($_POST['confirm_password'])) {
	$current_password = mysqli_real_escape_string($con,$_POST['current_password']);
	$new_password = mysqli_real_escape_string($con,$_POST['new_password']);
	$confirm_password = mysqli_real_escape_string($con,$_POST['confirm_password']);

	$sql = "SELECT * FROM users where id = '".$_SESSION['USER_ID']."'";
           $result = mysqli_query($con, $sql);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_assoc($result))  
                {  
                     if(password_verify($current_password, $row["password"]))
                     {
                     	if ($new_password != $confirm_password) {
                     		$arr = array('status'=>'error','msg'=>'Password did not Matched','field'=>'error_field');
                     	}else{
                     		$new_password=password_hash($new_password,PASSWORD_BCRYPT);
                     		mysqli_query($con,"update users set password='$new_password' where id = '".$_SESSION['USER_ID']."'");
	                     	$arr = array('status'=>'success','msg'=>'Password Has Updated','field'=>'success_field');
                     	}
                     }
                     else
                     {
                     	$arr = array('status'=>'error','msg'=>'Current Password is incorrect','field'=>'error_field');
                     }	
                }
           }  

          echo json_encode($arr);         
}