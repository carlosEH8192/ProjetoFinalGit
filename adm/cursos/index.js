var formatoTr = 
    '<tr>'+
        '<th scope="row">@cod</th>' +
        '<td>@nome</td>' +
        '<td>@cargaHoraria</td>' +
        '<td><a href="atualiza_curso.php?codigo=@cod" class="btn btn-default">Editar</a></td>' +
        '<td><button class="btn btn-danger" onclick="crud.deleta(@cod)">Excluir</button></td>' +
    '</tr>\n';

Crud.prototype.geraTrs = function(cursosJson) {
    var tr = null;
    for (var i = 0; i < cursosJson.length; i++) {
        var curso = cursosJson[i];
        tr += this.formatoTr.replace(/@cod/g, curso.codigo)
            .replace('@nome', curso.nome)
            .replace('@cargaHoraria', curso.cargaHoraria);
    }

    return tr;
};

var crud = new Crud('_busca_cursos.php', '_deleta_curso.php', formatoTr, $('#tabela tbody'), $('#inp-filtro'));
crud.busca();