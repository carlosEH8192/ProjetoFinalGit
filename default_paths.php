<?php
    $pasta_raiz = "/ProjetoFinalGit/";
    $caminho_completo_pasta_raiz = $_SERVER["DOCUMENT_ROOT"] . "/ProjetoFinalGit/";

    // Caminhos auxiliares;
    $bootstrap = $pasta_raiz . "bootstrap/";
    $bootstrap_css = $bootstrap . "css/bootstrap.min.css";
    $bootstrap_js = $bootstrap . "js/bootstrap.min.js";

    $img = $pasta_raiz . "img/";
    $adjust = $img . "adjust.css";
    $logo_adjust = $img . "logo/logo-adjust.css";
    $background = $img . "background.png";

    $default_css = $pasta_raiz . "default_css/";
    $overflow = $default_css . "overflow_y.css";
    $form = $default_css . "form.css";

    $default_navbars = $caminho_completo_pasta_raiz . "default_navs/";
    $navbar_do_cabecalho = $default_navbars . "navbar_do_cabecalho.php";
    $navbar_do_rodape = $default_navbars . "navbar_do_rodape.php";

    $navbar_do_cabecalho_adm = $default_navbars . "navbar_do_cabecalho_adm.php";
    $navbar_do_cabecalho_prof = $default_navbars . "navbar_do_cabecalho_prof.php";

    $jquery = $pasta_raiz . "jquery.min.js";
    $colors = $pasta_raiz . "colors/colors.css";
    $icones = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css";
?>