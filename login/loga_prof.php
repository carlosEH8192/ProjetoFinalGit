<?php
    include_once("../regras/professor_regras.php");
    $regras = new professor_regras();

    if ($regras->login($_POST["email"], $_POST["senha"]))
        header("Location: ../profesor/index.php");
    else {
        echo("<h1>Erro ao Fazer Login! Verifique o <u>E-mail</u> e a <u>Senha</u> informados.</h1>");
        sleep(2.5);
        header("Location: form_prof.php");
    }
?>