<?php 
class adm {
    private $username;
    private $senha;

    public function __construct($username, $senha) {
        $this->username = $username;
        $this->senha = $senha;
    }

    public function get_username() { return $this->username; }
    public function get_senha() { return $this->senha; }
}
?>