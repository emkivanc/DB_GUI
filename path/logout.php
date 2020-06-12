<?php
	session_start();
	require_once("../connection/conn.php");
	session_destroy();
	header("Location: ../nasa_adminpage.php");
?>