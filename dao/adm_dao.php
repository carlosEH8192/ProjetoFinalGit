<?php 
    include_once("database.php");
    include_once("../model/adm.php");

    class adm_dao {
        private $database;

        public function __construct() { $this->database = new database(); }

        public function busca($codigo) {
            $query = "SELECT * FROM adm WHERE codigo = ${codigo}";
            $resultado = $this->database->consulta($query, "Erro ao Buscar Administrador!");

            $adm = null;
            if ($row = $resultado->fetch_assoc())
                $adm = new adm($row["username"], $row["senha"]);

            return $adm;
        }

        public function busca_por_username_e_senha($username, $senha) {
            $query = "SELECT username, senha FROM adm WHERE username = '${username}' AND senha = '${senha}'";
            $resultado = $this->database->consulta($query, "Erro ao Buscar Administrador por Username e Senha!");
            return $resultado;
        }

        public function busca_varios($filtro) {
            $query = "SELECT * FROM adm";
            $query .= !is_null($filtro) ? " WHERE username LIKE '%${filtro}%'" : null;
            $resultado = $this->database->consulta($query, "Erro ao Buscar Administradores!");

            $adms = array();
            while ($rows = $resultado->fetch_assoc())
                array_push($adms, new adm($rows["username"], $rows["senha"]));

            return $adms;
        }

        public function atualiza($codigo, $username, $senha) {
            $query = "UPDATE adm SET username = '${username}', senha = '${senha}' WHERE codigo = $codigo";
            return $this->database->consulta($query, "Erro ao Atualizar Administrador!");
        }

        public function insere($username, $senha) {
            $query = "INSERT INTO adm VALUES('${username}', '${senha}')";
            return $this->database->consulta($query, "Erro ao Inserir Administrador!");
        }

        public function deleta($codigo) {
            $query = "DELETE FROM adm WHERE codigo = $codigo";
            return $this->database->consulta($query, "Erro ao Deletar Administrador!");
        }
    }
?>