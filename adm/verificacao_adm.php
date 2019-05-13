<?php
public class verificacao_adm {
    private string $caminho_do_arquivo;

    function __construct($caminho_do_arquivo) {
        $this->caminho_do_arquivo = $caminho_do_arquivo;
        include_once("../default_paths.php");
    }

    private function sessao() {
        session_id("adm");
        session_start();

        if(isset($_SESSION["descricao"]) && $_SESSION["descricao"] == "adm")
            return true;
        else {
            session_destroy();
            return false;
        }
    }

    public function mostra_pagina() {
        if (!$this->sessao())
            return false;

        $navbar_do_cabecalho_adm = $default_navbars . "navbar_do_cabecalho_adm.php";
        include_once($this->caminho_do_arquivo);
        return true;
    }
}
?>