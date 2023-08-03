<?php
include "models/listar_usuario.php";
include "models/verifica_login.php";
include "models/verifica_permissao.php";

if (!in_array('usuario_editar', $permissoes)) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Voçê não tem essa permissão!')
        window.location.href='/crud_usuarios/index.php';
        </SCRIPT>");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/form.css">
</head>

<body>
    <div id="site">
        <header>
            <a class="voltar" href="index.php"><img src="images/voltar.svg"></a>
            <h1 class="total">Editar usuário</h1>
            <figure></figure>
            <a class="sair" href="./models/logout.php">sair</a>
        </header>
        <form method="POST" id="form" action="/crud_usuarios/models/editar_usuario.php" class="cadastro">
            <input type="hidden" id="input_nome" name="uuid" value="<?php echo $usuario['uuid']; ?>">
            <div class="input">
                <label for="input_nome">Nome:</label>
                <input type="text" id="input_nome" name="nome" placeholder="Digite um nome" value="<?php echo $usuario['nome']; ?>" required="required">
            </div>
            <div class="input">
                <label for="input_cpf">CPF:</label>
                <input type="text" id="input_cpf" name="cpf" placeholder="Digite um CPF" value="<?php echo $usuario['cpf']; ?>" required="required">
            </div>
            <div class="input">
                <label for="input_email">E-mail:</label>
                <input type="text" id="input_email" name="email" placeholder="Digite um e-mail" value="<?php echo $usuario['email']; ?>" required="required">
            </div>
            <div class="input">
                <label for="input_senha">Senha:</label>
                <input type="password" id="input_senha" name="senha" placeholder="Digite uma nova senha">
            </div>

            <div class="select">
                <label for="input_status">Status</label>
                <select name="status" id="input_status" required="required">
                    <option value="">Escolha uma opção</option>
                    <option value="1" <?php echo($usuario['status'] == 1?'selected="selected"':'');?>>Ativo</option>
                    <option value="2" <?php echo($usuario['status'] == 2?'selected="selected"':'');?>>Inativo</option>
                </select>
                <div class="seta"><img src="images/seta.svg" alt=""></div>
            </div>

            <h2>Permissão</h2>
            <div class="permissao">
                <div class="checkbox">
                    <input type="checkbox" id="input_permissao_login" name="permissao[]" value="login" <?php echo(in_array('login',$usuario['permissoes'])?'checked':''); ?>>
                    <div class="check"><img src="images/check.svg"></div>
                    <label for="input_permissao_login">Login</label>
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="input_permissao_usuario_add" name="permissao[]" value="usuario_add" <?php echo(in_array('usuario_add',$usuario['permissoes'])?'checked':''); ?>>
                    <div class="check"><img src="images/check.svg"></div>
                    <label for="input_permissao_usuario_add">Add usuário</label>
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="input_permissao_usuario_editar" name="permissao[]" <?php echo(in_array('usuario_editar',$usuario['permissoes'])?'checked':''); ?> value="usuario_editar">
                    <div class="check"><img src="images/check.svg"></div>
                    <label for="input_permissao_usuario_editar">Editar usuário</label>
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="input_permissao_usuario_deletar" name="permissao[]" <?php echo(in_array('usuario_deletar',$usuario['permissoes'])?'checked':''); ?> value="usuario_deletar">
                    <div class="check"><img src="images/check.svg"></div>
                    <label for="input_permissao_usuario_deletar">Deletar usuário</label>
                </div>
            </div>

            <button>SALVAR</button>
        </form>
    </div>
</body>

</html>

<script type="text/javascript" src="script/valida_formulario.js"></script>
<script type="text/javascript" src="script/validaCPF.js"></script>