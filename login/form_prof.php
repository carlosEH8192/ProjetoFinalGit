<?php
    session_id("profLogin");
    session_start();

    if(isset($_SESSION["descricao"]) && $_SESSION["descricao"] == "profLogin") {
    	include_once("../default_paths.php");
    	$paths = new default_paths();
        include_once("form_prof.html");
    }
    else {
        echo("<h1>ACESSO NEGADO!</h1>");
        session_destroy();
    }
?>