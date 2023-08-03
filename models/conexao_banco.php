<?php
//Conexão com bando de dados utilizando PDO
$server = "localhost";
$user = "root";
$password = "";
$dbname = "tabela";
$pdo = new PDO("mysql:dbname=".$dbname.";host=".$server,$user,$password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>