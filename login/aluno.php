<?php
    include_once("../default_paths.php");
    include_once("redirecionamento.php");

    $paths = new default_paths();
    $redirecionador = new redirecionador();
    $redirecionador->redireciona_para_pagina_inicial_se_alguma_sessao_existir($paths->get_inicio());
    include_once("aluno.html");
?>