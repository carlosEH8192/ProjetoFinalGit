var formatoTr =
    '<tr>' +
        '<th scope="row">@cod</th>' +
        '<td>@username</td>' +
        '<td><a href="atualiza_adm.php?codigo=@cod" class="btn btn-default">Editar</a></td>' +
        '<td><button class="btn btn-danger" onclick="crud.deleta(@cod)">Excluir</td>' +
    '</tr>';

Crud.prototype.geraTrs = function(admsJson) {
    var tr = null;
    for (var i = 0; i < admsJson.length; i++) {
        var adm = admsJson[i];
        tr += formatoTr.replace(/@cod/g, adm.codigo)
            .replace('@username', adm.username);
    }

    return tr;
};

var crud = new Crud('_busca_adms.php', '_deleta_adm.php', formatoTr, $('#tabela tbody'), $('#inp-filtro'));
crud.busca();