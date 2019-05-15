<?php
    session_id("admLogin");
    session_start();

    if(isset($_SESSION["descricao"]) && $_SESSION["descricao"] == "admLogin") {
    	include_once("../default_paths.php");
    	$paths = new default_paths();
        include_once("form_adm.html");
    } else {
        echo("<h1>ACESSO NEGADO!</h1>");
        session_destroy();
    }
?>