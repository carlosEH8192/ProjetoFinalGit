<?php 
class verificador_de_sessao {
    public function __construct($session_id) {
        session_id($session_id);
        session_start();
    }

    public function variavel_descricao_existe() {
        return isset($_SESSION["descricao"]);
    }

    public function variavel_descricao_eh_igual_a($valor) {
        $eh_igual_a = $_SESSION["descricao"] == $valor;
        if (!$eh_igual_a)
            session_destroy();

        return $eh_igual_a;
    }
}
?>