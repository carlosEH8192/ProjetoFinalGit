<?php
    include_once("../default_paths.php");

    $username = $_SESSION["username"];
    $adm = $pasta_raiz . "adm/";
    $gestao_adms = $adm . "adms/index.php";
    $gestao_alunos = $adm . "alunos/index.php";
    $gestao_cursos = $adm . "cursos/index.php";
    $gestao_nomes_turma = $adm . "nomesTurma/index.php";
    $gestao_professores = $adm . "professores/index.php";
    $gestao_turmas = $adm . "turmas/index.php";

    include_once("navbar_do_cabecalho_adm.html");
?>