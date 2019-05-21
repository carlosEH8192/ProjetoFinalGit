<?php
    include_once("../../dao/adm_dao.php");
    $dao = new adm_dao();

    $resultado = false;
    $codigo = $_POST["codigo"];
    $username = $_POST["username"];
    $senha = $_POST["senha"];

    if(!is_null($codigo) && !is_null($username) && !is_null($senha))
        $resultado = $dao->atualiza($codigo, $username, $senha);

    echo(strval($resultado));
?>