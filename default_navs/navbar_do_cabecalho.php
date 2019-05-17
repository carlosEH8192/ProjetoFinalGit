<?php
    if (session_status() == PHP_SESSION_NONE)
        session_start();

    $descricao_existe_e_eh_aluno = isset($_SESSION["descricao"]) && $_SESSION["descricao"] == "aluno";
    include_once("navbar_do_cabecalho.html");
?>