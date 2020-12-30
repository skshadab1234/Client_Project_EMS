<?php

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