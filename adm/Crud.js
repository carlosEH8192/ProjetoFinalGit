class Crud {
    constructor(uriBusca, uriDeleta, formatoTr, $tbody, $inputFiltra) {
        this.uriBusca = uriBusca;
        this.uriDeleta = uriDeleta;
        this.formatoTr = formatoTr; // Formato da Table Row
        this.$tbody = $tbody; // Elemento tbody dos registros filtrados;
        this.$inputFiltra = $inputFiltra; // Elemento Input de Filtragem;
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
    geraTrs(jsonResposta) { throw 'Função "geraTrs(jsonResposta)" deve ser implementada antes de ser usada.' }

    deleta(codigo) {
        $.post(this.uriDeleta, { codigo: codigo }, () => { this.busca(); });
    }
}