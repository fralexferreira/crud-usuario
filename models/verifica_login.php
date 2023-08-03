<?php
session_start();

if (!isset($_SESSION['uuid'])) {
	header("Location: /crud_usuarios/login.php");
}