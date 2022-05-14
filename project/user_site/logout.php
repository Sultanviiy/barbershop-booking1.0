<?php
	include_once 'session.php';

	session_destroy();

	header("location:../barbershop/index.php");
?>