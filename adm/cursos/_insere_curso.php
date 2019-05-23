<?php
    include_once("../../dao/curso_dao.php");
    $dao = new curso_dao();

    $resultado = false;

    $nome = $_POST["nome"];
    $carga_horaria = $_POST["cargaHoraria"];

    if (!is_null($nome) && !is_null($carga_horaria))
        $resultado = $dao->insere($nome, $carga_horaria);

    echo($resultado);
?>