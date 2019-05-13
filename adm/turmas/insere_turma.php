<?php
    include_once("../../default_paths.php");
    include_once("../verificacao.php");
    include_once("../obtentor_de_caminhos.php");

    if (new verificacao()->sessao()) {
        $navbar_do_cabecalho_adm = new obtentor_de_caminhos()->navbar_do_cabecalho();
        include_once("insere_turma.html");
    } else
        echo("<h1>Acesso Negado!</h1>");
?>