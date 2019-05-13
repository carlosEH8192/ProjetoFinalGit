<?php
    include_once("../default_paths.php");

    $username = $_SESSION["username"];
    $gestao_adms = $pasta_raiz . "/adm/adms/index.php";
    $gestao_alunos = $pasta_raiz . "/adm/alunos/index.php";
    $gestao_cursos = $pasta_raiz . "/adm/cursos/index.php";
    $gestao_nomes_turma = $pasta_raiz . "/adm/nomesTurma/index.php";
    $gestao_professores = $pasta_raiz . "/adm/professores/index.php";
    $gestao_turmas = $pasta_raiz . "/adm/turmas/index.php";

    include_once("navbar_do_cabecalho_adm.html");
?>