<?php 
    include_once("database.php");
    include_once("../model/presenca.php");

    class presenca_dao {
        private $database;

        public function __construct() { $this->database = new database(); }

        private function cria_presenca_com_mysqli_result($resultado) {
            $presencas = array();
            while ($row = $resultado->fetch_assoc())
                array_push($presencas, new presenca($row["dia"], $row["cod_aluno"], $row["cod_nome_turma"]));

            return $presencas;
        }

        public function busca($codigo) {
            $query = "SELECT * FROM presenca WHERE codigo = ${codigo}";
            $resultado = $this->database->consulta($query, "Erro ao Buscar Presença!");
            return $this->cria_presenca_com_mysqli_result($resultado)[0];
        }

        public function busca_varios($filtro) {
            $query = "SELECT p.codigo, p.dia, a.nome_completo, n_turma.nome " .
                "FROM presenca as p " .
                "INNER JOIN aluno AS a ON p.cod_aluno = a.codigo " .
                "INNER JOIN nome_turma AS n_turma ON p.cod_nome_turma = n_turma.codigo";
            $query .= !is_null($filtro) ? " WHERE a.nome_completo LIKE '%${filtro}%'" : null;
            
            $resultado = $this->consulta($query, "Erro ao Buscar Presenças!");
            return $this->cria_presenca_com_mysqli_result($resultado);
        }

        public function atualiza($codigo, $dia, $cod_aluno, $nome_turma) {
            $query = "UPDATE presenca SET dia = '${dia}', cod_aluno = ${cod_aluno}, nome_turma = '${nome_turma}' WHERE codigo = $codigo";
            return $this->database->consulta($query, "Erro ao Atualizar Presença!");
        }

        public function insere($dia, $cod_aluno, $nome_turma) {
            $query = "INSERT INTO presenca(dia, cod_aluno, nome_turma) VALUES('${dia}', ${cod_aluno}, '${nome_turma}')";
            return $this->database->consulta($query, "Erro ao Inserir Presença!");
        }

        public function deleta($codigo) {
            $query = "DELETE FROM presenca WHERE codigo = $codigo";
            return $this->database->consulta($query, "Erro ao Deletar Presença!");
        }
    }
?>