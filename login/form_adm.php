<?php
    include_once("../default_paths.php");
    session_start();

    if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION["descricao"]) && $_SESSION["descricao"] == "admLogin")
        include_once("form_adm.html");
    else {
        echo("<h1>ACESSO NEGADO!</h1>");
        session_destroy();
    }
?>