<?php
include "conexao_banco.php";
require '../vendor/autoload.php';

use Ramsey\Uuid\Nonstandard\Uuid;

if(isset($_POST['cpf']) && !empty($_POST['cpf'])){

	$nome = addslashes($_POST['nome']);
	$cpf = addslashes($_POST['cpf']);
	$cpf = str_replace('.', '', $cpf);
	$cpf = str_replace(',', '.', $cpf);
	$cpf = str_replace('-', '', $cpf);     
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	$status = addslashes($_POST['status']);
	$permissao = $_POST['permissao'];
	$uuid = Uuid::uuid4();		
	
	//Verifica se já existe um usuario cadastrado com o mesmo CPF
	$usuario = array();
    $sql = "SELECT *
   		   FROM usuario
   		   WHERE cpf = :cpf";
	$sql = $pdo->prepare($sql);
	$sql->bindValue(":cpf", $cpf);
	$sql->execute();
     
     if($sql->rowCount() > 0){
          $usuario = $sql->fetch();
          $resultado = 1;//usuário cadastrado
     }else{
     	  $resultado = 0;//usuário não cadastrado
     }


	if ($resultado == 0) {
		
		$sql =  $pdo->prepare("INSERT INTO
			 usuario
			 SET
			 uuid = :uuid,
			 nome = :nome,
			 cpf = :cpf,
		     email = :email,
		     senha = :senha,
		     status = :status,
		     data_criacao = NOW(),
		     data_atualizacao = NOW()");
		$sql->bindValue(":uuid", $uuid);
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":cpf", $cpf);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", md5($senha));
		$sql->bindValue(":status", $status);
		$sql->execute();
        $id_usuario = $pdo->lastInsertId();

		if (count($permissao) > 0) {
			foreach ($permissao as $key => $item_permissao) {
			 $sql = $pdo->prepare("INSERT INTO
			 permissoes
			 SET
			 id_usuario = :id_usuario,
			 uuid = :uuid,
			 permissao = :permissao");
			 $sql->bindValue(":id_usuario", $id_usuario);
			 $sql->bindValue(":uuid", $uuid);
			 $sql->bindValue(":permissao", $item_permissao);
			 $sql->execute();
			}
		 }

		header("location: /crud_usuarios/index.php");

	}else{
	  echo ("<SCRIPT LANGUAGE='JavaScript'>
	        window.alert('Já existe um usuário cadastrado com este CPF!')
	        window.location.href='/crud_usuarios/index.php';
	        </SCRIPT>");
	    exit();
	}


	}else{
		echo "ERRO";
}

