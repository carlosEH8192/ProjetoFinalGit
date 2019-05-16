<?php
    include_once("../dao/aluno_dao.php");    

    class aluno_regras {
        public function loga($email, $senha) {
            $dao = new aluno_dao();
            $aluno = $dao->busca_por_email_e_senha($email, $senha);            
            if (is_null($aluno))
                return false;

            session_id("aluno");
            session_start();
            $_SESSION["descricao"] = "aluno";
            $_SESSION["nome_completo"] = $aluno->get_nome_completo();
            $_SESSION["sexo"] = $aluno->get_sexo();
            $_SESSION["telefone_celular"] = $aluno->get_telefone_celular();
            $_SESSION["fixo"] = $aluno->get_telefone_fixo();
            $_SESSION["rg"] = $aluno->get_rg();
            $_SESSION["cpf"] = $aluno->get_cpf();
            $_SESSION["email"] = $aluno->get_email();
            $_SESSION["senha"] = $aluno->get_senha();
            session_write_close();

            return true;
        }
    }
?>