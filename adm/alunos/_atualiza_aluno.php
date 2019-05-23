<?php
    include_once("../../dao/aluno_dao.php");
    $dao = new aluno_dao();

    $resultado = false;

    $codigo = $_POST["codigo"];
    $nome_completo = $_POST["nomeCompleto"];
    $sexo = $_POST["sexo"];
    $telefone_celular = $_POST["telefoneCelular"];
    $telefone_fixo = $_POST["telefoneFixo"];
    $rg = $_POST["rg"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    if (!is_null($codigo) && !is_null($nome_completo) && !is_null($sexo) &&
        !is_null($telefone_celular) && !is_null($telefone_fixo) && !is_null($rg) &&
        !is_null($cpf) && !is_null($email) && !is_null($senha))
    {
        $resultado = $dao->atualiza($codigo, $nome_completo, $sexo, $telefone_celular, $telefone_fixo, $rg, $cpf, $email, $senha);
    }

    echo($resultado);
?>