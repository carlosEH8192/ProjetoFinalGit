<?php 
class obtentor_de_caminhos {
    public function navbar_do_cabecalho_adm() {
        return (new default_paths())->get_default_navbars() . "navbar_do_cabecalho_adm.php";
    }
}
?>