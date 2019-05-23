<?php 
class aluno implements JsonSerializable {
    private $codigo;
    private $nome_completo;
    private $sexo;
    private $telefone_celular;
    private $telefone_fixo;
    private $rg;
    private $cpf;
    private $email;
    private $senha;

    public function __construct($codigo, $nome_completo, $sexo, $telefone_celular, $telefone_fixo, $rg, $cpf, $email, $senha) {
        $this->codigo = $codigo;
        $this->nome_completo = $nome_completo;
        $this->sexo = $sexo;
        $this->telefone_celular = $telefone_celular;
        $this->telefone_fixo = $telefone_fixo;
        $this->rg = $rg;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function get_codigo() { return $this->codigo; }
    public function get_nome_completo() { return $this->nome_completo; }
    public function get_sexo() { return $this->sexo; }
    public function get_telefone_celular() { return $this->telefone_celular; }
    public function get_telefone_fixo() { return $this->telefone_fixo; }
    public function get_rg() { return $this->rg; }
    public function get_cpf() { return $this->cpf; }
    public function get_email() { return $this->email; }
    public function get_senha() { return $this->senha; }

    public function jsonSerialize() {
        return array(
            "codigo" => $this->codigo,
            "nomeCompleto" => $this->nome_completo,
            "sexo" => $this->sexo,
            "telefoneCelular" => $this->telefone_celular,
            "telefoneFixo" => $this->telefone_fixo,
            "rg" => $this->rg,
            "cpf" => $this->cpf,
            "email" => $this->email,
            "senha" => $this->senha
        );
    }
}
?>