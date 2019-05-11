<?php
    include_once("../deus/Deus.php");
    $deus = new Deus();
    
    $username = $_POST["username"];
    $senha = $_POST["senha"];
    
    if ($deus->loga_adm($username, $senha))
        header("Location: ../adm/index.php");
    else
        echo("<h1>Erro ao fazer Login! Favor verificar dados informados.</h1>");
?>