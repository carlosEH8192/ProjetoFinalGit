<?php
    include_once("../../dao/adm_dao.php");
    $dao = new adm_dao();

    $resultado = false;

    $codigo = $_POST["codigo"];
    if (!is_null($codigo))
        $resultado = $dao->deleta($codigo);

    echo($resultado);
?>