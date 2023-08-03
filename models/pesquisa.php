<?php
include "conexao_banco.php";

$pesquisa = filter_input(INPUT_GET, "texto", FILTER_DEFAULT);

   $usuarios = array();
    $sql = "SELECT *
 		   FROM usuario
 		   WHERE
       nome LIKE :nome OR
       cpf LIKE :cpf OR
       email LIKE :email
       LIMIT 5";
	$sql = $pdo->prepare($sql);
  $sql->bindValue(":nome", "%".$pesquisa."%");
  $sql->bindValue(":cpf", "%".$pesquisa."%");
  $sql->bindValue(":email", "%".$pesquisa."%");
	$sql->execute();
     
  if($sql->rowCount() > 0){
          $usuarios = $sql->fetchAll();
	}		

echo json_encode($usuarios);
