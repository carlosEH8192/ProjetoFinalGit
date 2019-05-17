<?php 
class redirecionador {
    public function redireciona_para_pagina_inicial_se_alguma_sessao_existir($inicio) {
        if (session_status() == PHP_SESSION_ACTIVE) {
            header("Refresh: 5; Location: ${inicio}");
            echo("<h1>Você já está Logado!</h1>");
            exit();
        }
    }
}
?>