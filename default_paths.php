<?php
class default_paths {
    //region Props Iniciais
    private $pasta_raiz;
    private $caminho_completo_pasta_raiz;

    private $inicio;
    private $quem_somos;
    private $contato;
    private $cadastro;
    //endregion

    //region Props Cursos
    private $cursos;
    private $photoshop;
    private $corel_draw;
    private $ds_max;
    private $informatica_basica;
    //endregion

    // Props Bootstrap
    private $bootstrap;
    private $bootstrap_css;
    private $bootstrap_js;

    //region Props Img e Logo
    private $img;
    private $adjust;
    private $background;
    private $logo;
    private $logo_cabecalho;
    private $logo_adjust;
    //endregion

    // Props Default CSS
    private $default_css;
    private $overflow;
    private $form;

    // Props Default Navabars
    private $default_navbars;
    private $navbar_do_cabecalho;
    private $navbar_do_rodape;

    // Props Finais
    private $jquery;
    private $colors;
    private $icones;

    //region Props Login e Logout
    private $login_aluno;
    private $login_adm;
    private $login_professor;
    private $logout;
    //endregion

    public function __construct() {
        //region Props Iniciais
        $this->pasta_raiz = "/ProjetoFinalGit/";
        $this->caminho_completo_pasta_raiz = $_SERVER["DOCUMENT_ROOT"] . $this->pasta_raiz;
        
        $this->inicio = $this->pasta_raiz . "index.php";
        $this->quem_somos = $this->pasta_raiz . "quem_somos/index.php";
        $this->contato = $this->pasta_raiz . "contato/index.php";
        $this->cadastro = $this->pasta_raiz . "cadastro/index.php";
        //endregion

        //region Props Cursos
        $this->cursos = $this->pasta_raiz . "cursos/";
        $this->photoshop = $this->cursos . "photoshop/index.php";
        $this->corel_draw = $this->cursos . "corel_draw/index.php";
        $this->ds_max = $this->cursos . "3ds_max/index.php";
        $this->informatica_basica = $this->cursos . "informatica_basica/index.php";
        //endregion

        // Props Bootstrap
        $this->bootstrap = $this->pasta_raiz . "bootstrap/";
        $this->bootstrap_css = $this->bootstrap . "css/bootstrap.min.css";
        $this->bootstrap_js = $this->bootstrap . "js/bootstrap.min.js";

        //region Props Img e Logo
        $this->img = $this->pasta_raiz . "img/";
        $this->adjust = $this->img . "adjust.css";
        $this->background = $this->img . "background.png";
        $this->logo = $this->img . "logo/";
        $this->logo_cabecalho = $this->logo . "cb-am.png";
        $this->logo_adjust = $this->logo . "logo-adjust.css";
        //endregion

        // Props Default CSS
        $this->default_css = $this->pasta_raiz . "default_css/";
        $this->overflow = $this->default_css . "overflow_y.css";
        $this->form = $this->default_css . "form.css";

        // Props Default Navbars
        $this->default_navbars = $this->caminho_completo_pasta_raiz . "default_navs/";
        $this->navbar_do_cabecalho = $this->default_navbars . "navbar_do_cabecalho.php";
        $this->navbar_do_rodape = $this->default_navbars . "navbar_do_rodape.php";

        // Props Finais
        $this->jquery = $this->pasta_raiz . "jquery.min.js";
        $this->colors = $this->pasta_raiz . "colors/colors.css";
        $this->icones = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css";

        //region Props Login e Logout
        $this->login_aluno = $this->pasta_raiz . "login/aluno.php";
        $this->login_adm = $this->pasta_raiz . "login/adm.php";
        $this->login_professor = $this->pasta_raiz . "login/professor.php";
        $this->logout = $this->pasta_raiz . "logout/index.php";
        //endregion
    }

    //region Getters Iniciais
    public function get_pasta_raiz() { return $this->pasta_raiz; }
    public function get_inicio() { return $this->inicio; }
    public function get_quem_somos() { return $this->quem_somos; }
    public function get_contato() { return $this->contato; }
    public function get_cadastro() { return $this->cadastro; }
    //endregion

    //region Getters Cursos
    public function get_photoshop() { return $this->photoshop; }
    public function get_corel_draw() { return $this->corel_draw; }
    public function get_ds_max() { return $this->ds_max; }
    public function get_informatica_basica() { return $this->informatica_basica; }
    //endregion

    // Getters Bootstrap
    public function get_bootstrap_css() { return $this->bootstrap_css; }
    public function get_bootstrap_js() { return $this->bootstrap_js; }

    //region Getters Img e Logo
    public function get_adjust() { return $this->adjust; }
    public function get_background() { return $this->background; }
    public function get_logo_cabecalho() { return $this->logo_cabecalho; }
    public function get_logo_adjust() { return $this->logo_adjust; }
    //endregion

    // Getters Default CSS
    public function get_overflow() { return $this->overflow; }
    public function get_form() { return $this->form; }

    // Getters Default Navbars
    public function get_default_navbars() { return $this->default_navbars; }
    public function get_navbar_do_cabecalho() { return $this->navbar_do_cabecalho; }
    public function get_navbar_do_rodape() { return $this->navbar_do_rodape; }

    // Getters Finais
    public function get_jquery() { return $this->jquery; }
    public function get_colors() { return $this->colors; }
    public function get_icones() { return $this->icones; }

    //region Getters Login e Logout
    public function get_login_aluno() { return $this->login_aluno; }
    public function get_login_adm() { return $this->login_adm; }
    public function get_login_professor() { return $this->login_professor; }
    public function get_logout() { return $this->logout; }
    //endregion
}
?>