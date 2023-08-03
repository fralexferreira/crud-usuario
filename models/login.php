<?php
include "conexao_banco.php";
session_start();


if(isset($_POST['cpf']) && !empty($_POST['cpf'])){
	
	$cpf = addslashes($_POST['cpf']);
	$cpf = str_replace('.', '', $cpf);
	$cpf = str_replace(',', '.', $cpf);
	$cpf = str_replace('-', '', $cpf);
	$senha = addslashes($_POST['senha']);

		$sql = $pdo->prepare("SELECT * FROM
			 usuario WHERE
			 cpf = :cpf AND
			 senha = :senha");
        	$sql->bindValue(':cpf', $cpf);
        	$sql->bindValue(':senha', md5($senha));
        	$sql->execute();

        	$permissoes = [];
        	if($sql->rowCount()>0){
        		$row = $sql->fetch();

        		$sql = $pdo->prepare("SELECT * FROM
				 permissoes WHERE
				 uuid = :uuid");
	        	$sql->bindValue(':uuid', $row['uuid'] );
	        	$sql->execute();
	        	if($sql->rowCount()>0){
	        		$permissoes =  $sql->fetchAll();

		        	if (!in_array('login', $permissoes)) {
		        		$_SESSION['uuid'] = $row['uuid'];
	        			$_SESSION['error'] = '';
						header("Location: /crud_usuarios/index.php");
						exit;
					}else{
						$_SESSION['error'] = 'Você não tem permissão para fazer login';
						header("Location: /crud_usuarios/index.php");
					}
				
				}else{
						$_SESSION['error'] = 'Você não tem permissão para fazer login';
						header("Location: /crud_usuarios/index.php");
				}
        		
			}else{
				$_SESSION['error'] = 'CPF e/ou senha errados.';
				header("Location: /crud_usuarios/login.php");
			}

}

?>