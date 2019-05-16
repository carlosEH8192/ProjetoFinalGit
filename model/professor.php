<?php 
class aluno {
    private $nome_completo;
    private $sexo;
    private $rg;
    private $cpf;
    private $disciplina;
    private $email;
    private $senha;

    public function __construct($nome_completo, $sexo, $rg, $cpf, $disciplina, $email, $senha) {
        $this->nome_completo = $nome_completo;
        $this->sexo = $sexo;
        $this->rg = $rg;
        $this->cpf = $cpf;
        $this->disciplina = $disciplina;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function get_nome_completo() { return $this->nome_completo; }
    public function get_sexo() { return $this->sexo; }
    public function get_rg() { return $this->rg; }
    public function get_cpf() { return $this->cpf; }
    public function get_disciplina() { return $this->disciplina; }
    public function get_email() { return $this->email; }
    public function get_senha() { return $this->senha; }
}
?>