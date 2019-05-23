var formatoTr =
    '<tr>' +
        '<th scope="row">@cod</th>' +
        '<td>@nomeCompleto</td>' +
        '<td><a href="atualiza_aluno.php?codigo=@cod" class="btn btn-default">Editar</a></td>' +
        '<td><button class="btn btn-danger" onclick="crud.deleta(@cod)">Excluir</td>' +
    '</tr>';

Crud.prototype.geraTrs = function(alunosJson) {
    var tr = null;
    for (var i = 0; i < alunosJson.length; i++) {
        var aluno = alunosJson[i];
        tr += this.formatoTr.replace(/@cod/g, aluno.codigo)
            .replace('@nomeCompleto', aluno.nomeCompleto);
    }

    return tr;
};

var crud = new Crud('_busca_alunos.php', '_deleta_aluno.php', formatoTr, $('#tabela tbody'), $('#inp-filtro'));
crud.busca();