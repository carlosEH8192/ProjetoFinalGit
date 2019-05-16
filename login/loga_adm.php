<?php
    include_once("../regras/adm_regras.php");
    $regras = new adm_regras();

    if ($regras->loga($_POST["username"], $_POST["senha"]))
        header("Location: ../adm/index.php");
    else {
        echo("<h1>Erro ao Fazer Login! Verifique o <u>Username</u> e a <u>Senha</u> informados.</h1>");
        sleep(2.5);
        header("Location: index.php");
    }
?>