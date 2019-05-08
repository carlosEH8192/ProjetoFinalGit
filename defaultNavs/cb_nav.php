<?php
    $inicio = $pasta_raiz . "index.php";
    $quem_somos = $pasta_raiz . "quem_somos/index.php";
    $contato = $pasta_raiz . "contato/index.php";
    $cadastro = $pasta_raiz . "cadastro/index.php";
    
    $cursos = $pasta_raiz . "cursos";
    $photoshop = $cursos . "/photoshop/index.php";
    $corel_draw = $cursos . "/corel_draw/index.php";
    $ds_max = $cursos . "/3ds_max/index.php";
    $informatica_basica = $cursos . "/informatica_basica/index.php";

    $logo_cabecalho = $img . "/logo/cb-am.png";

    // CAMINHO PARA INCLUDE
    $login_nav_ovrd = $default_navbars . "loginNavOvrd/";

    $ss_ativa = session_status() == PHP_SESSION_ACTIVE;
    $ss_nenhuma = session_status() == PHP_SESSION_NONE;

    if($ss_nenhuma) {
        session_id("aluno");
        session_start();

        $ss_ativa = true;
        $ss_nenhuma = false;
    }

    $validacao_existe_eh_aluno =  isset($_SESSION["validacao"]) && $_SESSION["validacao"] == "aluno";        
    if($validacao_existe_eh_aluno) {
        // Caminho completo do arquivo HTML (começa com "C:/htodcs/ProjetoFinalGit/") contendo a Navbar de Aluno/Usuário logado (usado para fazer INCLUDE);
        $logged_in_nav = $login_nav_ovrd . "logged_in_nav.html";
        
        // Caminho do arquivo PHP (começa com "/ProjetoFinalGit/") que faz Logout do Sistema (utilizado em um <a>);
        $logout = $pasta_raiz . "logout/index.php";
        
        $primeiro_nome = explode(' ', $_SESSION["nome_completo"]);
        $primeiro_nome = $primeiro_nome[0];
    } else {
        // Caminho completo do arquivo HTML contendo a Navbar de Aluno/Usuário deslogado (usado para fazer INCLUDE);
        $def_login_nav = $login_nav_ovrd . "def_login_nav.html";
        
        // Caminho do arquivo PHP (começa com "/ProjetoFinalGit/") que faz Login no Sistema (utilizado em um <a>);
        $login = $pasta_raiz . "login/index.php";

        $validacao_existe_eh_adm_login = isset($_SESSION["validacao"]) && $_SESSION["validacao"] == "admLogin";
        $validacao_existe_eh_prof_login = isset($_SESSION["validacao"]) && $_SESSION["validacao"] == "profLogin";

        if($ss_ativa && !$validacao_existe_eh_adm_login && !$validacao_existe_eh_prof_login) {
            session_unset();
            session_destroy();
        }
    }

    include_once("cb_nav.html");
?>