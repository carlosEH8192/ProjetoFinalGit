<?php
    include_once("ProjetoFinalGit/deus/Deus.php");
    $deus = new Deus();

    $codigo = $_POST["codigo"];
    $nome = $_POST["nome"];

    $resultado = false;

    if(!is_null($codigo) && !is_null($nome))
        $resultado = $deus->update_nome_turma($codigo, $nome);

    print($resultado);
?>