<?php
    include_once("../../dao/curso_dao.php");
    $dao = new curso_dao();

    $resultado = false;
    if (!is_null($_POST["codigo"]))
    	$resultado = $dao->deleta($_POST["codigo"]);

    echo($resultado);
?>