<?php
    include_once("../../dao/adm_dao.php");
    $dao = new adm_dao();

    $resultado = false;
    $username = $_POST["username"];
    $senha = $_POST["senha"];

    if(!is_null($username) && !is_null($senha))
        $resultado = $dao->insere($username, $senha);

    echo($resultado);
?>