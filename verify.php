<?php

require 'reuse_files/config.php';
require 'reuse_files/function.inc.php';
 function checkemail($str) {
         return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
   }
if (isset($_POST['email']) && isset($_POST['password'])) {
	$email = get_safe_value($_POST['email']);
	$password = get_safe_value($_POST['password']);
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
}elseif (isset($_POST['password_reset']) && $_POST['password_reset'] != '') {
  if (isset($_POST['day']) && $_POST['day'] != '' && isset($_POST['month']) && $_POST['month'] != '' && isset($_POST['year']) && $_POST['year'] != '') {
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

      $sql= "SELECT user_dob from users";
      $res = mysqli_query($con,$sql);
      $row = mysqli_fetch_assoc($res);
      if ($row['user_dob'] == $final_dob) {
        $arr=array('status'=>'success');
      }else {
        $arr=array('status'=>'error7');
      } 
      echo json_encode($arr);
    }else {
      $arr=array('status'=>'error6');
      echo json_encode($arr);
  }
}

elseif (isset($_POST['change_password']) && $_POST['change_password'] != '') {

  $password_new = get_safe_value($_POST['password_new']);
  $password_confirm = get_safe_value($_POST['password_confirm']);

  if (strlen($password_new) < 6 ) {
    $arr=array('status'=>'error8');
  }else{
      if ($password_new != $password_confirm) {
       $arr=array('status'=>'error9'); 
      }else{
        $password_new = password_hash($password_new, PASSWORD_BCRYPT);
        mysqli_query($con,"update users set password  = '".$password_new."'");
        $arr=array('status'=>'success');
      }
  }
      echo json_encode($arr);
 } 