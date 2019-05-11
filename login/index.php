<?php
    $parametro_login_existe = isset($_GET["login"]);

    if($parametro_login_existe && $_GET["login"] == "adm") {
        session_id("admLogin"); // Id da Session configurada para ser Adm por padrão.        
        
        if ($_GET["login"] == "prof")
            session_id("profLogin");

        session_start();

        if ($_GET["login"] == "adm") {
            $_SESSION["descricao"] = "admLogin";
            session_write_close();
            header("Location: form_adm.php");
        } else if ($_GET["login"] == "prof") {
            $_SESSION["descricao"] = "profLogin";
            session_write_close();
            header("Location: form_prof.php");
        }

        unset($_GET);
    } else if (session_status() == PHP_SESSION_ACTIVE) {
        session_destroy();
    } else {
        include_once("../default_paths.php");
        include_once("index.html");
    }
?>