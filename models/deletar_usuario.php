<?php
include "conexao_banco.php";
include "verifica_login.php";
include "verifica_permissao.php";

if (!in_array('usuario_deletar', $permissoes)) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Voçê não tem essa permissão!')
        window.location.href='/crud_usuarios/index.php';
        </SCRIPT>");
    exit();
}

if(isset($_GET['u']) && !empty($_GET['u'])){

	$uuid = $_GET['u'];

 		$sql = "DELETE FROM usuario WHERE uuid = :uuid";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(':uuid', $uuid);
            $sql->execute();

        $sql = "DELETE FROM permissoes WHERE uuid = :uuid";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(':uuid', $uuid);
            $sql->execute();

		header("location: /crud_usuarios/index.php");

	}else{
		echo "ERRO";
}
