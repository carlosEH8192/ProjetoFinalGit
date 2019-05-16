<?php
    include_once("database.php");
    include_once("../model/curso.php");

    class curso_dao {
        private $database;

        public function __construct() { $this->database = new database(); }

        public function busca($codigo) {
            $query = "SELECT * FROM curso WHERE codigo = ${codigo}";
            $resultado = $this->database->consulta($query, "Erro ao Buscar Curso!");
            
            $curso = null;
            if ($row = $resultado->fetch_assoc())
                $curso = new curso($row["nome"], $row["carga_horaria"]);

            return $curso;
        }

        public function busca_varios($filtro) {
            $query = "SELECT * FROM curso";
            $query .= !is_null($filtro) ? " WHERE nome LIKE '%${filtro}%'" : null;
            $resultado = $this->database->consulta($query, "Erro ao Buscar Cursos!");

            $cursos = array();
            while ($row = $resultado->fetch_assoc()) {
                $curso = new curso($row["nome"], $row["carga_horaria"]);
                array_push($cursos, $curso);
            }

            return $cursos;
        }

        public function atualiza($codigo, $nome, $carga_horaria) {
            $query = "UPDATE curso SET nome = '${nome}', carga_horaria = ${carga_horaria} WHERE codigo = ${codigo}";
            return $this->database->consulta($query, "Erro ao Atualizar Curso!");
        }

        public function insere($nome, $carga_horaria) {
            $query = "INSERT INTO curso(nome, carga_horaria) VALUES('${nome}', ${carga_horaria})";
            return $this->consulta($query, "Erro ao Inserir Curso!");
        }

        public function deleta($codigo) {
            $query = "DELETE FROM curso WHERE codigo = ${codigo}";
            return $this->consulta($query, "Erro ao Deletar Curso!");
        }
    }
?>