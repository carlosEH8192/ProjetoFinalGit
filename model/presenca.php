<?php 
class presenca {
	private $dia;
	private $cod_aluno;
	private $cod_nome_turma;

	public function __construct($dia, $cod_aluno, $cod_nome_turma) {
		$this->dia = $dia;
		$this->cod_aluno = $cod_aluno;
		$this->cod_nome_turma = $cod_nome_turma;
	}

	public function get_dia() { return $this->dia; }
	public function get_cod_aluno() { return $this->cod_aluno; }
	public function get_cod_nome_turma() { return $this->cod_nome_turma; }
}
?>