<?php
    include_once("../default_paths.php");
    include_once("../redirecionamento_com_delay.php");
    $paths = new default_paths();
    $r = new redirecionador_com_delay(); // redirecionador

    if (session_status() == PHP_SESSION_ACTIVE) {
        $html = "<h1>Você já está Logado!</h1>";
        $r->renderiza_html_e_redireciona_para_pagina_com_delay($html, $paths->get_inicio());
    } else
        include_once("adm.html");
?>