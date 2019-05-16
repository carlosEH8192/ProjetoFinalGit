<?php
    include_once("verificacao_de_sessao.php");
    $v = new verificador_de_sessao("profLogin"); // Verificador

    if($v->variavel_descricao_existe() && $v->variavel_descricao_eh_igual_a("profLogin")) {
        include_once("../default_paths.php");
        $paths = new default_paths();
        include_once("form_prof.html");
    } else {
        echo("<h1>ACESSO NEGADO!</h1>");
        sleep(2.5);
        header("Location: index.php");
    }
?>