<?php
class verificacao {
    public function sessao() {
        session_id("adm");
        session_start();

        if(isset($_SESSION["descricao"]) && $_SESSION["descricao"] == "adm")
            return true;
        else {
            session_destroy();
            return false;
        }
    }
}
?>