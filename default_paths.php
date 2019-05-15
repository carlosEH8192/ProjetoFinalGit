<?php
class default_paths {
    //region Propriedades de Apoio
    private $pasta_raiz;
    private $caminho_completo_pasta_raiz;
    private $bootstrap;
    private $img;
    private $logo;
    private $default_css;
    private $default_navbars;
    //endregion

    //region Propriedades Principais
    private $bootstrap_css;
    private $bootstrap_js;
    private $adjust;
    private $logo_cabecalho;
    private $logo_adjust;
    private $background;
    private $overflow;
    private $form;
    private $navbar_do_cabecalho;
    private $navbar_do_rodape;
    private $jquery;
    private $colors;
    private $icones;
    private $logout;
    //endregion

    public function __construct() {
        $this->pasta_raiz = "/ProjetoFinalGit/";
        $this->caminho_completo_pasta_raiz = $_SERVER["DOCUMENT_ROOT"] . $this->pasta_raiz;
        $this->bootstrap = $this->pasta_raiz . "bootstrap/";
        $this->img = $this->pasta_raiz . "img/";
        $this->logo = $this->img . "logo/";
        $this->default_css = $this->pasta_raiz . "default_css/";
        $this->default_navbars = $this->caminho_completo_pasta_raiz . "default_navs/";

        $this->bootstrap_css = $this->bootstrap . "css/bootstrap.min.css";
        $this->bootstrap_js = $this->bootstrap . "js/bootstrap.min.js";
        $this->adjust = $this->img . "adjust.css";
        $this->logo_cabecalho = $this->logo . "cb-am.png";
        $this->logo_adjust = $this->logo . "logo-adjust.css";
        $this->background = $this->img . "background.png";
        $this->overflow = $this->default_css . "overflow_y.css";
        $this->form = $this->default_css . "form.css";
        $this->navbar_do_cabecalho = $this->default_navbars . "navbar_do_cabecalho.php";
        $this->navbar_do_rodape = $this->default_navbars . "navbar_do_rodape.php";
        $this->jquery = $this->pasta_raiz . "jquery.min.js";
        $this->colors = $this->pasta_raiz . "colors/colors.css";
        $this->icones = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css";
        $this->logout = $this->pasta_raiz . "logout/index.php";
    }

    //region Getters
    public function get_default_navbars() { return $this->default_navbars; }
    public function get_bootstrap_css() { return $this->bootstrap_css; }
    public function get_bootstrap_js() { return $this->bootstrap_js; }
    public function get_adjust() { return $this->adjust; }
    public function get_logo_cabecalho() { return $this->logo_cabecalho; }
    public function get_logo_adjust() { return $this->logo_adjust; }
    public function get_background() { return $this->background; }
    public function get_overflow() { return $this->overflow; }
    public function get_form() { return $this->form; }
    public function get_navbar_do_cabecalho() { return $this->navbar_do_cabecalho; }
    public function get_navbar_do_rodape() { return $this->navbar_do_rodape; }
    public function get_jquery() { return $this->jquery; }
    public function get_colors() { return $this->colors; }
    public function get_icones() { return $this->icones; }
    public function get_logout() { return $this->logout; }
    //endregion
}

    //region Modo antigo de manter controle dos caminhos do Website
    $pasta_raiz = "/ProjetoFinalGit/";
    $caminho_completo_pasta_raiz = $_SERVER["DOCUMENT_ROOT"] . "/ProjetoFinalGit/";

    // Caminhos auxiliares;
    $bootstrap = $pasta_raiz . "bootstrap/";
    $bootstrap_css = $bootstrap . "css/bootstrap.min.css";
    $bootstrap_js = $bootstrap . "js/bootstrap.min.js";

    $img = $pasta_raiz . "img/";
    $adjust = $img . "adjust.css";
    $logo_cabecalho = $img . "logo/cb-am.png";
    $logo_adjust = $img . "logo/logo-adjust.css";
    $background = $img . "background.png";

    $default_css = $pasta_raiz . "default_css/";
    $overflow = $default_css . "overflow_y.css";
    $form = $default_css . "form.css";

    $default_navbars = $caminho_completo_pasta_raiz . "default_navs/";
    $navbar_do_cabecalho = $default_navbars . "navbar_do_cabecalho.php";
    $navbar_do_rodape = $default_navbars . "navbar_do_rodape.php";

    $jquery = $pasta_raiz . "jquery.min.js";
    $colors = $pasta_raiz . "colors/colors.css";
    $icones = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css";

    $logout = $pasta_raiz . "logout/index.php";
    //endregion
?>