<?php
    include_once("database.php");
    include_once("../model/curso.php");

    class curso_dao {
        private $database;

        public function __construct() { $this->database = new database(); }

        private function cria_cursos_com_mysqli_result($resultado) {
            $cursos = array();
            while ($row = $resultado->fetch_assoc())
                array_push($cursos, new curso($row["nome"], $row["carga_horaria"]))

            return $cursos;
        }

        public function busca($codigo) {
            $query = "SELECT * FROM curso WHERE codigo = ${codigo}";
            $resultado = $this->database->consulta($query, "Erro ao Buscar Curso!");
            return $this->cria_cursos_com_mysqli_result($resultado)[0];
        }

        public function busca_varios($filtro) {
            $query = "SELECT * FROM curso";
            $query .= !is_null($filtro) ? " WHERE nome LIKE '%${filtro}%'" : null;
            $resultado = $this->database->consulta($query, "Erro ao Buscar Cursos!");
            return $this->cria_cursos_com_mysqli_result($resultado);
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