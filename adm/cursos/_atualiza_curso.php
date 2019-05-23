<?php
    include_once("../../dao/curso_dao.php");
    $dao = new curso_dao();

    $resultado = false;

    $codigo = $_POST["codigo"];
    $nome = $_POST["nome"];
    $carga_horaria = $_POST["cargaHoraria"];

    if(!is_null($codigo) && !is_null($nome) && !is_null($carga_horaria))
        $resultado = $dao->atualiza($codigo, $nome, $carga_horaria);

    echo($resultado);
?>