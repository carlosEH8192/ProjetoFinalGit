<?php 
    include_once("../model/aluno.php");

    class aluno_builder {
        private $nome_completo;
        private $sexo;
        private $telefone_celular;
        private $telefone_fixo;
        private $rg;
        private $cpf;
        private $email;
        private $senha;

        public function nome_completo($nome_completo) {
            $this->nome_completo = $nome_completo;
            return $this;
        }
        
        public function sexo($sexo) {
            $this->sexo = $sexo;
            return $this;
        }
        
        public function telefone_celular($telefone_celular) {
            $this->telefone_celular = $telefone_celular;
            return $this;            
        }
        
        public function telefone_fixo($telefone_fixo) {
            $this->telefone_fixo = $telefone_fixo;
            return $this;
        }
        
        public function rg($rg) {
            $this->rg = $rg;
            return $this;
        }
        
        public function cpf($cpf) {
            $this->cpf = $cpf;
            return $this;
        }
        
        public function email($email) {
            $this->email = $email;
            return $this;
        }

        public function senha($senha) {
            $this->senha = $senha;
            return $this;
        }

        public function constroi() {
            return new aluno($this->nome_completo, $this->sexo, $this->telefone_celular, $this->telefone_fixo, $this->rg, $this->cpf, $this->email, $this->senha);
        }
    }
?>