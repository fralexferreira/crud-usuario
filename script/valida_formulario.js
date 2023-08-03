const formulario = document.querySelector("#form");

formulario.onsubmit = evento => {

    var nome = document.querySelector("#input_nome");
    var cpf = document.querySelector("#input_cpf");
    var email = document.querySelector("#input_email");
    var senha = document.querySelector("#input_senha");
    var status = document.querySelector("#input_status");

    if (nome.value === "") {
    	evento.preventDefault();
        nome.style.borderColor = "#ff0000";
		return;
    }

    if (cpf.value === "") {
    	evento.preventDefault();
        cpf.style.borderColor = "#ff0000";
        return;
    }

    if (email.value === "") {
    	evento.preventDefault();
        email.style.borderColor = "#ff0000";
		return
	}

    let required = senha.getAttribute('data-required');
    if (required) {
        if (senha.value === "") {
        	evento.preventDefault();
            senha.style.borderColor = "#ff0000";
             return;
        }
    }

    if (status.value === "") {
    	evento.preventDefault();
        status.style.borderColor = "#ff0000";
        return;
    }

}