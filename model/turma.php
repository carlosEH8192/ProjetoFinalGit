<?php 
class turma {
	private $cod_nome_turma;
	private $cod_aluno;
	private $cod_professor;
	private $cod_curso;

	public function __construct($cod_nome_turma, $cod_aluno, $cod_professor, $cod_curso) {
		$this->cod_nome_turma = $cod_nome_turma;
		$this->cod_aluno = $cod_aluno;
		$this->cod_professor = $cod_professor;
		$this->cod_curso = $cod_curso;
	}

	public function get_cod_nome_turma() { return $this->cod_nome_turma; }
	public function get_cod_aluno() { return $this->cod_aluno; }
	public function get_cod_professor() { return $this->cod_professor; }
	public function get_cod_curso() { return $this->cod_curso; }
}
?>