<?php 
class curso implements JsonSerializable {
    private $codigo;
    private $nome;
    private $carga_horaria;

    public function __construct($codigo, $nome, $carga_horaria) {
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->carga_horaria = $carga_horaria;
    }

    public function get_codigo() { return $this->codigo; }
    public function get_nome() { return $this->nome; }
    public function get_carga_horaria() { return $this->carga_horaria; }

    public function jsonSerialize() {
        return array(
            "codigo" => $this->codigo,
            "nome" => $this->nome,
            "cargaHoraria" => $this->carga_horaria
        );
    }
}
?>