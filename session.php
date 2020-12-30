<?php
require 'reuse_files/config.php';

if(isset($_SESSION['USER_ID'])){
	$sql = "SELECT * FROM users where id = '".$_SESSION['USER_ID']."'";
	$res = mysqli_query($con,$sql);
	$admin = mysqli_fetch_assoc($res);
}