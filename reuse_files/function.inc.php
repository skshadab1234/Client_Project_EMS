<?php

function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}


function redirect($link){
	?>
	<script>
	window.location.href='<?php echo $link?>';
	</script>
	<?php
	die();
}

function get_employee_details()
{
	global $con;
	$sql="SELECT * From employees where emp_status = 1";
	$data=array();
	$res=mysqli_query($con,$sql);
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;	
}

function get_safe_value($str){
	global $con;
	$str=mysqli_real_escape_string($con,$str);
	return $str;
}

