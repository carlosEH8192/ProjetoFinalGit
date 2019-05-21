<?php
    include_once("database.php");
    include_once(__DIR__ . "/../model/adm.php");

    class adm_dao {
        private $database;

        public function __construct() { $this->database = new database(); }

        private function cria_adms_com_mysqli_result($resultado) {
            $adms = array();
            while ($row = $resultado->fetch_assoc())
                array_push($adms, new adm($row["codigo"], $row["username"], $row["senha"]));

            return $adms;
        }

        public function busca($codigo) {
            $query = "SELECT * FROM adm WHERE codigo = ${codigo}";
            $resultado = $this->database->consulta($query, "Erro ao Buscar Administrador!");
            return $this->cria_adms_com_mysqli_result($resultado)[0];
        }

        public function busca_por_username_e_senha($username, $senha) {
            $query = "SELECT username, senha FROM adm WHERE username = '${username}' AND senha = '${senha}'";
            $resultado = $this->database->consulta($query, "Erro ao Buscar Administrador por Username e Senha!");
            return $this->cria_adms_com_mysqli_result($resultado)[0];
        }

        public function busca_varios($filtro) {
            $query = "SELECT * FROM adm";
            $query .= !is_null($filtro) ? " WHERE username LIKE '%${filtro}%'" : null;
            $resultado = $this->database->consulta($query, "Erro ao Buscar Administradores!");
            return $this->cria_adms_com_mysqli_result($resultado);
        }

        public function atualiza($codigo, $username, $senha) {
            $query = "UPDATE adm SET username = '${username}', senha = '${senha}' WHERE codigo = $codigo";
            return $this->database->consulta($query, "Erro ao Atualizar Administrador!");
        }

        public function insere($username, $senha) {
            $query = "INSERT INTO adm(username, senha) VALUES('${username}', '${senha}')";
            return $this->database->consulta($query, "Erro ao Inserir Administrador!");
        }

        public function deleta($codigo) {
            $query = "DELETE FROM adm WHERE codigo = $codigo";
            return $this->database->consulta($query, "Erro ao Deletar Administrador!");
        }
    }
?>