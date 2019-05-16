<?php 
    include_once("database.php");
    include_once("../model/aluno.php");
    include_once("../builder/aluno_builder.php");
    
    class aluno_dao {
        private $database;

        public function __construct() { $this->database = new database(); }

        private function constroi_aluno_usando_fetch_assoc($row) {
            $aluno_builder = new aluno_builder();
            $aluno_builder->nome_completo($row["nome_completo"])
                ->sexo($row["sexo"])
                ->telefone_celular($row["telefone_celular"])
                ->telefone_fixo($row["telefone_fixo"])
                ->rg($row["rg"])
                ->cpf($row["cpf"])
                ->email($row["email"])
                ->senha($row["senha"]);

            return $aluno_builder->constroi();
        }

        public function busca($codigo) {
            $query = "SELECT * FROM aluno WHERE codigo = ${codigo}";
            $resultado = $this->database->consulta($query, "Erro ao Buscar Aluno!");

            $aluno = null;
            if ($row = $resultado->fetch_assoc())
                $aluno = $this->constroi_aluno_usando_fetch_assoc($row);

            return $aluno;
        }

        public function busca_varios($filtro) {
            $query = "SELECT * FROM aluno";
            $query .= !is_null($filtro) ? " WHERE username LIKE '%${filtro}%'" : null;
            $resultado = $this->database->consulta($query, "Erro ao Buscar Alunos!");

            $adms = array();
            while ($row = $resultado->fetch_assoc()) {
                $adm = $this->constroi_aluno_usando_fetch_assoc($row);
                array_push($adms, $adm));
            }

            return $adms;
        }

        public function atualiza($codigo, $nome_completo, $sexo, $telefone_celular, $telefone_fixo, $rg, $cpf, $email, $senha) {
            $query = "UPDATE aluno SET nome_completo = '${nome_completo}', sexo = '${sexo}', telefone_celular = '${telefone_celular}', " .
                "telefone_fixo = '${telefone_fixo}', rg = '${rg}', cpf = '${cpf}', email = '${email}', senha = '${senha}' ".
                "WHERE codigo = ${codigo}";

            return $this->database->consulta($query, "Erro ao Atualizar Aluno!");
        }

        public function insere($nome_completo, $sexo, $telefone_celular, $telefone_fixo, $rg, $cpf, $email, $senha) {
            $query = "INSERT INTO aluno(nome_completo, sexo, telefone_celular, telefone_fixo, rg, cpf, email, senha) " .
                "VALUES('${nome_completo}', '${sexo}', '${telefone_celular}', '${telefone_fixo}', '${rg}', '${cpf}', '${email}', '${senha}')";

            return $this->database->consulta($query, "Erro Inserir Aluno!");
        }

        public function deleta($codigo) {
            $query = "DELETE FROM aluno WHERE codigo = $codigo";
            return $this->database->consulta($query, "Erro ao Deletar Aluno!");
        }
    }
?>