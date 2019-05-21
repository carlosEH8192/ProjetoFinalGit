<?php 
    include_once("database.php");
    include_once("../model/nome_turma.php");

    class nome_turma_dao {
        private $database;

        public function __construct() { $this->database = new database(); }

        private function cria_nome_turmas_com_mysqli_result($resultado) {
            $nome_turmas = array();
            while ($row = $resultado->fetch_assoc())
                array_push($nome_turmas, new nome_turma($row["nome"]));

            return $nome_turmas;
        }

        public function busca($codigo) {
            $query = "SELECT * FROM nome_turma WHERE codigo = ${codigo}";
            $resultado = $this->database->consulta($query, "Erro ao Buscar Nome de Turma!");
            return $this->cria_nome_turmas_com_mysqli_result($resultado)[0];
        }

        public function busca_varios($filtro) {
            $query = "SELECT * FROM nome_turma";
            $query .= !is_null($filtro) ? " WHERE username LIKE '%${filtro}%'" : null;
            $resultado = $this->database->consulta($query, "Erro ao Buscar Nomes de Turma!");
            return $this->cria_nome_turmas_com_mysqli_result($resultado);
        }

        public function atualiza($codigo, $nome) {
            $query = "UPDATE nome_turma SET nome = '${nome}' WHERE codigo = $codigo";
            return $this->database->consulta($query, "Erro ao Atualizar Nome de Turma!");
        }

        public function insere($nome) {
            $query = "INSERT INTO nome_turma VALUES('${nome}')";
            return $this->database->consulta($query, "Erro ao Inserir Nome de Turma!");
        }

        public function deleta($codigo) {
            $query = "DELETE FROM nome_turma WHERE codigo = $codigo";
            return $this->database->consulta($query, "Erro ao Deletar Nome de Turma!");
        }
    }
?>