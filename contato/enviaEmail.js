var form = document.forms[0];

function enviaEmail() {
    var post = {
        'nomeCompleto': form["inp-nome-completo"].value,
        'email': form["inp-email"].value,
        'assunto': form["inp-assunto"].value,
        'mensagem': form["txt-mensagem"].value
    };

    acionaLoading();

    $.ajax({
        type: "POST",
        url: "envia_email.php",
        data: post,
        success: function() {
            form.reset();
            alert('E-mail enviado com sucesso!');
        },
        error: function() {
            alert('Não foi possível enviar o e-mail!');
        }
    });

    desacionaLoading();
}

function acionaLoading() {
    form.submit.value = 'Carregando';
    form.submit.disabled = true;
}

function desacionaLoading() {
    form.submit.value = 'Enviar';
    form.submit.disabled = false;
}