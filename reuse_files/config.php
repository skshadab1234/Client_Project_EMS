<?php
	session_start();
	$con = new mysqli('localhost', 'root','' ,'av_instrumentation_web');
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}	
