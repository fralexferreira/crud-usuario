<?php
include "conexao_banco.php";

if(isset($_POST['cpf']) && !empty($_POST['cpf'])){

	$nome = addslashes($_POST['nome']);
	$cpf = addslashes($_POST['cpf']);
	$cpf = str_replace('.', '', $cpf);
	$cpf = str_replace(',', '.', $cpf);
	$cpf = str_replace('-', '', $cpf);     
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	$status = addslashes($_POST['status']);
	$uuid = addslashes($_POST['uuid']);
	$permissao = $_POST['permissao'];

		//BUSCA INFORMAÇÕES DO USUÁRIO ANTES DA EDIÇÃO
		$sql = "SELECT *
			   FROM usuario
			   WHERE uuid = :uuid";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":uuid", $uuid);
		$sql->execute();
		    if($sql->rowCount() > 0){
		        $usuario = $sql->fetch();
		    }

	if (empty($senha)) {
	    $password = $usuario['senha']; //pega a mesma senha do usuário 
	}else{
		$password = md5($senha); //edita a senha do usuário
	}
		
		$sql =  $pdo->prepare("UPDATE usuario
			 SET
			 uuid = :uuid,
			 nome = :nome,
			 cpf = :cpf,
		     email = :email,
		     senha = :senha,
		     status = :status,
		     data_atualizacao = NOW()
		     WHERE uuid = :uuid");
		$sql->bindValue(":uuid", $uuid);
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":cpf", $cpf);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", $password);
		$sql->bindValue(":status", $status);
		$sql->execute();

        //DELETA AS PERMISSOES ANTIGAS E ADICIONA NOVAS PERMISSOES
        $sql = "DELETE FROM permissoes WHERE id_usuario = :id_usuario";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(':id_usuario', $usuario['id']);
            $sql->execute();

		if (count($permissao) > 0) {

			foreach ($permissao as $key => $item_permissao) {
			 $sql = $pdo->prepare("INSERT INTO
			 permissoes
			 SET
			 id_usuario = :id_usuario,
			 uuid = :uuid,
			 permissao = :permissao");
			 $sql->bindValue(":id_usuario", $usuario['id']);
			 $sql->bindValue(":uuid", $uuid);
			 $sql->bindValue(":permissao", $item_permissao);
			 $sql->execute();
			}
		 }

		header("location: /crud_usuarios/index.php");

	}else{
		echo "ERRO";
}
