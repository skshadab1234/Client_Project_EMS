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

function get_employee_detailsByid($id)
{
	global $con;
	$sql=mysqli_query($con,"SELECT * From employees where id = '$id'");
	$row = mysqli_fetch_assoc($sql);
	return $row;
}

function getChildDetailsByEmpId($id){
	global $con;
	$arr=array();
	$res=mysqli_query($con,"select * from employee_child_details where employee_id='$id'");
	while($row=mysqli_fetch_assoc($res)){
		$arr[]=$row;
	}
	return $arr;
}


function totalChildofEmpByid($id)
{
	global $con;
	$res=mysqli_query($con,"select count(*) as total_child from employee_child_details where employee_id='$id'");
	$row=mysqli_fetch_assoc($res);
	return $row['total_child'];
}

function TotalEmployee($status=1)
{
	global $con;
	$res=mysqli_query($con,"select count(*) as TotalEmployee from employees where emp_status='$status'");
	$row=mysqli_fetch_assoc($res);
	return $row['TotalEmployee'];
}

function married_emp($martial_status)
{
	global $con;
	$res=mysqli_query($con,"select count(*) as married from employees where emp_martial_status='$martial_status'");
	$row=mysqli_fetch_assoc($res);
	return $row['married'];
}