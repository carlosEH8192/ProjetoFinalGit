<?php
    include_once("ProjetoFinalGit/deus/Deus.php");
    $deus = new Deus();

    $nome = $_POST["nome"];
    $carga_horaria = $_POST["cargaHoraria"];

    $resultado = false;

    if(
        !is_null($nome) &&
        !is_null($carga_horaria)
      )
    {
        $resultado = $deus->insere_curso($nome, $carga_horaria);
    }

    print($resultado);
?>