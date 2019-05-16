<?php 
    include_once("../dao/professor_dao.php");

    class professor_regras {
        public function loga($email, $senha) {
            $dao = new dao();
            $professor = $dao->busca_por_email_e_senha($email, $senha);
            if (is_null($professor))
                return false;

            session_id("prof");
            session_start();
            $_SESSION["descricao"] = "prof";
            $_SESSION["nome_completo"] = $professor->get_nome_completo();
            $_SESSION["sexo"] = $professor->get_sexo();
            $_SESSION["rg"] = $professor->get_rg();
            $_SESSION["cpf"] = $professor->get_cpf();
            $_SESSION["disciplina"] = $professor->get_disciplina();
            $_SESSION["email"] = $professor->get_email();
            $_SESSION["senha"] = $professor->get_senha();
            session_write_close();

            return true;
        }
    }
?>