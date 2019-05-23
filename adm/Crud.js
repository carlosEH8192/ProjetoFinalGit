class Crud {
    constructor(uriBusca, uriDeleta, formatoTr, $tbody, $inputFiltra) {
        this.uriBusca = uriBusca; // URI de Busca de Registros;
        this.uriDeleta = uriDeleta; // URI de Remoção de Registros;
        this.formatoTr = formatoTr; // Formato da Table Row que é inserido na tbody da Tabela dos Registros Filtrados;
        this.$tbody = $tbody; // Tbody da Tabela dos Registros Filtrados;
        this.$inputFiltra = $inputFiltra; // Elemento Input de Filtro;
    }

    filtra(evento) {
        if (evento.which == 13)
            this.busca();
    }

    busca() {
        var filtro = (this.$inputFiltra.val() != null) ? this.$inputFiltra.val() : null;
        $.get(this.uriBusca, { filtro: filtro }, (jsonResposta) => {
            this.montaTabela(JSON.parse(jsonResposta));
        });
    }

    montaTabela(jsonResposta) {
        this.$tbody.empty();
        var trs = this.geraTrs(jsonResposta);
        this.$tbody.html(trs);
    }

    // Função deve ser implementada
    geraTrs(jsonResposta) { throw 'Função "geraTrs(jsonResposta)" deve ser implementada antes de ser usada.'; }

    deleta(codigo) {
        $.post(this.uriDeleta, { codigo: codigo }, () => { this.busca(); });
    }
}