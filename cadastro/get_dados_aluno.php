<?php
    include_once("deus/Deus.php");
    $deus = new Deus();

    session_id("cpfAlunoCadastro");
    session_start();

    $cpf = $_SESSION["cpf"];
    $aluno = $deus->get_dados_aluno($cpf);

    session_destroy();
    print(json_encode($aluno));
?>