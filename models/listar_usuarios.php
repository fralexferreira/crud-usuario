<?php
include "conexao_banco.php";

// Limita o número de registros a serem mostrados por página
$limite = 5;

// Se p não existe atribui 1 a variável p
$p = (isset($_GET['p'])) ? (int)$_GET['p'] : 1;

// Atribui a variável inicio o inicio de onde os registros vão ser
// mostrados por página, exemplo 0 à 10, 11 à 20 e assim por diante
$inicio = ($p * $limite) - $limite;

//lista todos os usuários
$sql = $pdo->query("SELECT *
 	FROM usuario
  	ORDER BY data_criacao DESC
   	LIMIT ".$inicio.",".$limite);
 	$usuarios = $sql->fetchAll();

//conta a quantidade de usuários
$sql = $pdo->query("SELECT count(*) as q FROM usuario");
$quantidade = $sql->fetch();

//Mostra a quantdade de paginas dividindo a quantidade total de resultados pelo limite imposto
$qtdePag = ceil($quantidade['q']/$limite); 

?>