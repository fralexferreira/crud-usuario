<?php
include "conexao_banco.php";

    $uuid = $_SESSION['uuid'];

	$permissoes = [];
	$sql = $pdo->prepare("SELECT permissao FROM
 	permissoes WHERE
 	uuid = :uuid");
	$sql->bindValue(':uuid', $uuid);
	$sql->execute();
	if($sql->rowCount()>0){
		$resultado =  $sql->fetchAll();
		
		foreach ($resultado as $key => $value) {
			$permissoes[] = $value['permissao'];
		}

	}else{
		$permissoes = [];
	}
