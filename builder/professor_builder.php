<?php 
    include_once("../model/professor.php");

    class aluno_builder {
        private $nome_completo;
        private $sexo;
        private $rg;
        private $cpf;
        private $disciplina;
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
        
        public function rg($rg) {
            $this->rg = $rg;
            return $this;
        }
        
        public function cpf($cpf) {
            $this->cpf = $cpf;
            return $this;
        }

        public function disciplina($disciplina) {
        	$this->disciplina = $disciplina;
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
            return new aluno($this->nome_completo, $this->sexo, $this->rg, $this->cpf, $this->disciplina, $this->email, $this->senha);
        }
    }
?>