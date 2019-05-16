<?php 
    include_once("database.php");
    include_once("../model/turma.php");

    class presenca_dao {
        private $database;

        public function __construct() { $this->database = new database(); }

        public function busca($codigo) {
            $query = "SELECT * FROM turma WHERE codigo = ${codigo}";
            $resultado = $this->database->consulta($query, "Erro ao Buscar Turma!");

            $turma = null;
            if ($row = $resultado->fetch_assoc())
                $turma = new turma($row["cod_nome_turma"], $row["cod_aluno"], $row["cod_professor"], $row["cod_curso"]);

            return $turma;
        }

        public function busca_varios($filtro) {
            $query = "SELECT t.codigo, n_turma.nome, a.nome_completo, p.nome_completo, c.nome " .
                "FROM turma AS t " .
                "INNER JOIN nome_turma AS n_turma ON t.cod_nome_turma = n_turma.codigo " .
                "INNER JOIN aluno AS a ON t.cod_aluno = a.codigo " .
                "INNER JOIN professor AS p ON t.cod_professor = p.codigo " .
                "INNER JOIN curso AS c ON t.cod_curso = c.codigo";
            $query .= !is_null($filtro) ? " WHERE a.nome_completo LIKE '%${filtro}%'" : null;
            $resultado = $this->database->consulta($query, "Erro ao Buscar Turmas!");

            $turmas = array();
            while ($row = $resultado->fetch_assoc())
                array_push($turmas, new turma($row["cod_nome_turma"], $row["cod_aluno"], $row["cod_professor"], $row["cod_curso"]));

            return $turmas;
        }

        public function atualiza($codigo, $cod_nome_turma, $cod_aluno, $cod_professor, $cod_curso) {
            $query = "UPDATE turma SET cod_nome_turma = ${cod_nome_turma}, cod_aluno = ${cod_aluno}, cod_professor = ${cod_professor}, cod_curso = ${cod_curso} " .
                "WHERE codigo = $codigo";
            return $this->database->consulta($query, "Erro ao Atualizar Turma!");
        }

        public function insere($cod_nome_turma, $cod_aluno, $cod_professor, $cod_curso) {
            $query = "INSERT INTO turma(cod_nome_turma, cod_aluno, cod_professor, cod_curso) VALUES(${cod_nome_turma}, ${cod_aluno}, ${cod_professor}, ${cod_curso})";
            return $this->database->consulta($query, "Erro ao Inserir Turma!");
        }

        public function deleta($codigo) {
            $query = "DELETE FROM turma WHERE codigo = $codigo";
            return $this->database->consulta($query, "Erro ao Deletar Turma!");
        }
    }
?>