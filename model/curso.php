<?php 
class curso {
	private $nome;
	private $carga_horaria;

	public function __construct($nome, $carga_horaria) {
		$this->nome = $;
		$this->carga_horaria = $carga_horaria;
	}

	public function get_nome() { return $this->nome; }
	public function get_carga_horaria() { return $this->carga_horaria; }
}
?>