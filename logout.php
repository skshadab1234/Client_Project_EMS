<?php
	require_once "reuse_files/config.php";
	require_once "reuse_files/constant.inc.php";
	unset($_SESSION['USER_ID']);
	session_destroy();
	header('Location: login'.PHP_EXT);
	exit();
?>