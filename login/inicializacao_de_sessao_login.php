<?php
class inicializador_de_sessao_login {
    public function adm() {
        session_id("admLogin");
        session_start();
        $_SESSION["descricao"] = "admLogin";
        session_write_close();
    }

    public function prof() {
        session_id("profLogin");
        session_start();
        $_SESSION["descricao"] = "profLogin";
        session_write_close();
    }
}
?>