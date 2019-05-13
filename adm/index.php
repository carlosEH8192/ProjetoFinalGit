<?php
    include_once("../default_paths.php");
    include_once("verificacao_sessao_adm.php");
    
    if (verifica_sessao_adm()) {
        $navbar_do_cabecalho_adm = $default_navbars . "navbar_do_cabecalho_adm.php";
        include_once("index.html");
    } else
        echo("<h1>Acesso Negado!</h1>");
?>