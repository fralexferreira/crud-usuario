<?php 
session_start();
if ($_SESSION['uuid']) {
	session_destroy();
	header("Location: /crud_usuarios/login.php");
	exit();
}

