<?php
require_once "models/listar_usuarios.php";
include "models/verifica_login.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div id="site">
        <header>
            <h1>USUÁRIOS</h1>
            <form class="busca" action="" method="POST">
                <i><img src="images/lupa.svg"></i>
                <input type="text" name="pesquisa" placeholder="Pesquisar..."
                 onkeyup="busca(this.value)">
            </form>
            <figure></figure>
            <a class="sair" href="./models/logout.php">sair</a>
        </header>
        <ul>
            <li class="titulo">
                <div class="texto nome">Nome</div>
                <div class="texto cpf">CPF</div>
                <div class="texto email">E-MAIL</div>
                <div class="texto data">DATA</div>
                <div class="texto status">STATUS</div>
                <div class="editar"></div>
                <div class="deletar"></div>
            </li>

            <div id="resultado_pesquisa"></div>
            <div class="usuarios">
            
                <?php foreach($usuarios as $key => $dado): ?>
                    <li class="dado">
                        <div class="texto nome"><?php echo $dado['nome'];?></div>
                        <div class="texto cpf"><?php echo $dado['cpf'];?></div>
                        <div class="texto email"><?php echo $dado['email'];?></div>
                        <div class="texto data"><?php  echo date('d/m/Y H:i:s', strtotime($dado['data_criacao'])); ?></div>
                        <div class="texto status"><?php echo $dado['status'] == 1 ? 'Ativo':'Inativo';?></div>
                        <div class="editar"><a href="form_edit.php?u=<?php echo $dado['uuid'];?>"><img src="images/editar.svg"></a></div>
                        <div class="deletar"><a onclick="return confirm('Tem certeza que deseja excluir?');" href="./models/deletar_usuario.php?u=<?php echo $dado['uuid'];?>"><img src="images/deletar.svg"></a></div>
                    </li>
                <?php endforeach;?>
            </div>
        </ul>
        <div class="pagina">
        <p class="resultado"><?php echo $quantidade['q']; ?> resultados</p>
        <a href="index.php?p=<?php echo($p>1)?$p-1:1;?>">Anterior</a>
        <a href="index.php?p=<?php echo($p<$qtdePag)?$p+1:$qtdePag;?>">Próxima</a>
        </div>
        <a href="form_add.php" class="botao_add">Adicionar novo</a>
    </div>
</body>

</html>


<script type="text/javascript" src="script/script_busca.js"></script>

