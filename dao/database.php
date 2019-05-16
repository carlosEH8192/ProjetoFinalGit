<?php 
class database {
    private $database;
    private $host;
    private $username;
    private $password;
    private $database_name;

    public function __construct() {
        $this->host = "localhost";
        $this->username = "root";
        $this->password = null;
        $this->database_name = "alcidesmaya_tech";
        $this->conecta();
    }

    public function __destruct() { $this->desconecta(); }

    public function conecta() {
        $this->database = new mysqli($this->host, $this->username, $this->password, $this->database_name);
    }

    public function desconecta() {
        $this->database->close();
    }

    public function consulta($query, $mensagem_or_die) {
        $resultado = $this->database->query($query) or die($mensagem_or_die);
        return $resultado;
    }
}
?>