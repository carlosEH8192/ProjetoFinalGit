<?php
    include_once("../../default_paths.php");
    include_once("../../redirecionamento_com_delay.php");
    include_once("../verificacao.php");

    $paths = new default_paths();
    if ((new verificacao())->sessao()) {
        $username = $_SESSION["username"];
        include_once("update_aluno.html");
    } else {
        $html = "<h1>Acesso Negado!</h1>";
        (new redirecionador_com_delay())->renderiza_html_e_redireciona_para_pagina_com_delay($html, $paths->get_inicio());
    }
?>