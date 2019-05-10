<?php
    include_once("ProjetoFinalGit/deus/Deus.php");    
    $deus = new Deus();

    $username = $_POST["username"];
    $senha = $_POST["senha"];

    $resultado = false;

    if(!is_null($username) && !is_null($senha))
    	$resultado = $deus->insere_adm($username, $senha);

    print($resultado);
?>