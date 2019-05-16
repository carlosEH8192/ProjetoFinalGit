<?php 
class nome_turma {
	private $nome;

	public function __construct($nome) { $this->nome = $nome; }

	public function get_nome() { return $this->nome; }
}
?>