<?php
    include_once("../../dao/aluno_dao.php");
    $dao = new aluno_dao();

    $resultado = false;
    if (!is_null($_POST["codigo"]))
    	$resultado = $dao->deleta($_POST["codigo"]);

    echo($resultado);
?>