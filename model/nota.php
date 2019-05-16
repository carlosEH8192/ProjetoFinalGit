<?php 
class nota {
	private $atividade_nome;
	private $nota;
	private $cod_aluno;
	private $cod_nome_turma;

	public function __construct($atividade_nome, $nota, $cod_aluno, $cod_nome_turma) {
		$this->atividade_nome = $atividade_nome;
		$this->nota = $nota;
		$this->cod_aluno = $cod_aluno;
		$this->cod_nome_turma = $cod_nome_turma;
	}

	public function get_atividade_nome() { return $this->atividade_nome; }
	public function get_nota() { return $this->nota; }
	public function get_cod_aluno() { return $this->cod_aluno; }
	public function get_cod_nome_turma() { return $this->cod_nome_turma; }
}
?>