<?php 
    include_once("database.php");
    include_once("../model/professor.php");

    class presenca_dao {
        private $database;

        public function __construct() { $this->database = new database(); }

        private function cria_professor_com_mysqli_result($resultado) {
            $professores = array();
            while ($row = $resultado->fetch_assoc()) {
                $professor_builder = new professor_builder();
                $professor_builder->nome_completo($row["nome_completo"])
                    ->sexo($row["sexo"])
                    ->rg($row["rg"])
                    ->cpf($row["cpf"])
                    ->disciplina($row["disciplina"])
                    ->email($row["email"])
                    ->senha($row["senha"]);

                $professor = $professor_builder->constroi();
                array_push($professores, $professor);
            }

            return $professores;
        }

        public function busca($codigo) {
            $query = "SELECT * FROM professor WHERE codigo = ${codigo}";
            $resultado = $this->database->consulta($query, "Erro ao Buscar Professor!");
            return $this->cria_professor_com_mysqli_result($resultado)[0];
        }

        public function busca_varios($filtro) {
            $query = "SELECT p.codigo, p.dia, a.nome_completo, n_turma.nome " .
                "FROM professor as p " .
                "INNER JOIN aluno AS a ON p.cod_aluno = a.codigo " .
                "INNER JOIN nome_turma AS n_turma ON p.cod_nome_turma = n_turma.codigo";
            $query .= !is_null($filtro) ? " WHERE a.nome_completo LIKE '%${filtro}%'" : null;
            
            $resultado = $this->database->consulta($query, "Erro ao Buscar Professores!");
            return $this->cria_professor_com_mysqli_result($resultado);
        }

        public function atualiza($codigo, $nome_completo, $sexo, $rg, $cpf, $disciplina, $email, $senha) {
            $query = "UPDATE professor SET nome_completo = '${nome_completo}', sexo = '${sexo}', rg = '${rg}', cpf = '${cpf}', disciplina = '${disciplina}', " .
                "email = '${email}', senha = '${senha}' " .
                "WHERE codigo = $codigo";

            return $this->database->consulta($query, "Erro ao Atualizar Professor!");
        }

        public function insere($nome_completo, $sexo, $rg, $cpf, $disciplina, $email, $senha) {
            $query = "INSERT INTO professor(nome_completo, sexo, rg, cpf, disciplina, email, senha) " .
                "VALUES('${nome_completo}','${sexo}', '${rg}', '${cpf}', '${disciplina}', '${email}', '${senha}')";
            
            return $this->database->consulta($query, "Erro ao Inserir Professor!");
        }

        public function deleta($codigo) {
            $query = "DELETE FROM professor WHERE codigo = $codigo";
            return $this->database->consulta($query, "Erro ao Deletar Professor!");
        }
    }
?>