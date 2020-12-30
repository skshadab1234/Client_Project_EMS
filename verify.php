<?php

require 'reuse_files/config.php';
 function checkemail($str) {
         return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
   }
if (isset($_POST['email']) && isset($_POST['password'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	if(empty($email) && empty($password)){
		$arr = array('status'=>'error1');
	}elseif (empty($email)) {
		$arr = array('status'=>'error2');
	}elseif(!checkemail($email)){
		$arr=array('status'=>'error3');
	}elseif (empty($password)) {
		$arr = array('status'=>'error4');
	}else{
			$query = "SELECT * FROM users WHERE email = '$email'";  
           $result = mysqli_query($con, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_assoc($result))  
                {  
                     if(password_verify($password, $row["password"]))  
                     {  
                          $_SESSION["USER_EMAIL"] = $email; 
                          $_SESSION["USER_ID"] = $row['id'];  
                            $arr=array('status'=>'success','msg'=>'Wait a minute....redirecting','field'=>'signup_success');
                     }  
                     else  
                     {  
                          //return false;  
                     $arr=array('status'=>'error5');
                     }  
                }  
           } 
	}

	echo json_encode($arr);
}