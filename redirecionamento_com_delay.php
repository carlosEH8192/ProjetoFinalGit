<?php 
class redirecionador_com_delay {
    public function renderiza_html_e_redireciona_para_pagina_com_delay($html, $caminho) {
        header("Refresh: 5; Location: ${caminho}");
        echo($html);
        exit();
    }
}
?>