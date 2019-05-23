<?php
    include_once("../../dao/aluno_dao.php");
    $dao = new aluno_dao();

    $resultado = null;
    if (isset($_GET["codigo"]))
        $resultado = $dao->busca(intval($_GET["codigo"]));
    else if (isset($_GET["filtro"])) {
        $resultado = $dao->busca_varios($_GET["filtro"]);
    }
    
    echo(json_encode($resultado));
?>