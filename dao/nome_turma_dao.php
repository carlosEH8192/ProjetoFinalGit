<?php 
    include_once("database.php");
    include_once("../model/nome_turma.php");

    class nome_turma_dao {
        private $database;

        public function __construct() { $this->database = new database(); }

        public function busca($codigo) {
            $query = "SELECT * FROM nome_turma WHERE codigo = ${codigo}";
            $resultado = $this->database->consulta($query, "Erro ao Buscar Nome de Turma!");

            $nome_turma = null;
            if ($row = $resultado->fetch_assoc())
                $adm = new nome_turma($row["nome"]);

            return $nome_turma;
        }

        public function busca_varios($filtro) {
            $query = "SELECT * FROM nome_turma";
            $query .= !is_null($filtro) ? " WHERE username LIKE '%${filtro}%'" : null;
            $resultado = $this->database->consulta($query, "Erro ao Buscar Nomes de Turma!");

            $nomes_turma = array();
            while ($row = $resultado->fetch_assoc())
                array_push($nomes_turma, new nome_turma($row["username"]));

            return $nomes_turma;
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