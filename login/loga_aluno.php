<?php
    include_once("../regras/aluno_regras.php");
    $aluno_regras = new aluno_regras();
    
    if ($aluno_regras->loga($_POST["email"], $_POST["senha"]))
        header("Location: ../index.php");
    else {
        echo("<h1>Erro ao Fazer Login! Verifique o <u>E-mail</u> e a <u>Senha</u> informados.</h1>");
        sleep(2.5);
        header("Location: index.php");
    }
?>