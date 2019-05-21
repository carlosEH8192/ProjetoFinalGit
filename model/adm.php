<?php 
class adm implements JsonSerializable {
    private $codigo;
    private $username;
    private $senha;

    public function __construct($codigo, $username, $senha) {
    	$this->codigo = $codigo;
        $this->username = $username;
        $this->senha = $senha;
    }

    public function get_codigo() { return $this->codigo; }
    public function get_username() { return $this->username; }
    public function get_senha() { return $this->senha; }

    public function jsonSerialize() { return get_object_vars($this); }
}
?>