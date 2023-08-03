<?php
include "conexao_banco.php";
$uuid = $_GET['u'];

//lista usuario individual
   $usuario = array();
    $sql = "SELECT *
   		   FROM usuario
   		   WHERE uuid = :uuid";
	$sql = $pdo->prepare($sql);
	$sql->bindValue(":uuid", $uuid);
	$sql->execute();
     
     if($sql->rowCount() > 0){
          $usuario = $sql->fetch();
		  $sql = "SELECT permissao
		   		   FROM permissoes
		   		   WHERE id_usuario = :id_usuario";
		  $sql = $pdo->prepare($sql);
		  $sql->bindValue(":id_usuario", $usuario['id']);
		  $sql->execute();
			  if($sql->rowCount() > 0){
	          	$resultado = $sql->fetchAll();
		          	foreach ($resultado as $key => $value) {
		          		$usuario['permissoes'][] = $value['permissao'];
		          	}
	 		  }else{
	 		  	$usuario['permissoes'][] = [];
	 		  }
		
      }

 
?>