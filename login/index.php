<?php
    include_once("inicializacao_de_sessao_de_login.php");
    $inicializador = new inicializador_de_sessao_de_login();

    if (isset($_GET["login"])) {
        if ($_GET["login"] == "adm") {
            $inicializador->adm();
            header("form_adm.php");
        } else if ($_GET["login"] == "prof") {
            $inicializador->prof();
            header("form_prof.php");
        }

        unset($_GET);
    } else {
        include_once("../default_paths.php");
        $paths = new default_paths();
        include_once("index.html");
    }
?>