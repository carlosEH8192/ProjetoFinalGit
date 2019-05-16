<?php
    include_once("../dao/adm_dao.php");    

    class adm_regras {
        public function loga($username, $senha) {
            $dao = new adm_dao();
            $adm = $dao->busca_por_username_e_senha($username, $senha);
            if (is_null($adm))
                return false;

            session_id("adm");            
            session_start();
            $_SESSION["descricao"] = "adm";
            $_SESSION["username"] = $adm->get_username();
            $_SESSION["senha"] = $adm->get_senha();
            session_write_close();

            return true;
        }
    }
?>