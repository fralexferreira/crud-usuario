async function busca(valor) {

    // Acessa o IF quando o usuário digitar mais de 3 caracteres
    if (valor.length >= 3) {

        // Chamar o model de pesquisa responsável em buscar registros no banco de dados
        const dados = await fetch('/crud_usuarios/models/pesquisa.php?texto=' + valor);

        const resposta = await dados.json();

        if (resposta) {
            document.querySelector("#resultado_pesquisa").style.display = "block";
            document.querySelector(".usuarios").style.display = "none";
            var resultado = '';
            for(var i in resposta){
                resultado +='<li class="dado">';
                resultado +='<div class="texto nome">'+resposta[i].nome+'</div>';
                resultado +='<div class="texto cpf">'+resposta[i].cpf+'</div>';
                resultado +='<div class="texto email">'+resposta[i].email+'</div>';
                resultado +='<div class="texto data_criacao">'+resposta[i].data_criacao+'</div>';
                resultado +='<div class="texto status">'+(resposta[i].status == '1')?'Ativo':'Inativo'+'</div>';
                resultado +='<div class="editar"><a href="form_edit.php?u='+resposta[i].uuid+'"><img src="images/editar.svg"></a></div>';
                resultado +='<div class="deletar"><a onclick="return confirm("Tem certeza que deseja excluir?");" href="./models/deletar_usuario.php?u='+resposta[i].uuid+'"><img src="images/deletar.svg"></a></div>';
                resultado += '</li>';
            }
        }

            //Retornar o conteúdo para a página HTML no SELETOR resultado_pesquisa
            document.getElementById("resultado_pesquisa").innerHTML = resultado;

        }else{
            document.querySelector("#resultado_pesquisa").style.display = "none";
            document.querySelector(".usuarios").style.display = "block";
        }


}