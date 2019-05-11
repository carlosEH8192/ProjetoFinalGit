<?php
class Deus {
    // TODOS
    private $obj_mysqli = null;

    public function conecta() {
        $this->obj_mysqli = new mysqli("localhost", "root", "", "alcidesmaya_tech");
    }

    public function consulta($query, $mensagem_or_die) {
        return $this->obj_mysqli->query($query) or die($mensagem_or_die);
    }

    public function desconecta() { $this->obj_mysqli->close(); }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: ../index.php");
    }

    // ALUNO
    public function cpf_eh_valido($cpf) {
        $this->conecta();        
        $query = "SELECT 1 FROM aluno WHERE cpf = '${cpf}' LIMIT 1";
        $resultado = $this->consulta($query, "Erro ao Verificar se o CPF é Válido!");

        $this->desconecta();
        return mysqli_num_rows($resultado) > 0;
    }

    public function get_dados_aluno($cpf) {
        $this->conecta();
        $query = "SELECT * FROM aluno WHERE cpf = '$cpf'";        
        $resultado = $this->consulta($query, "Erro ao Buscar Dados do Aluno!");
        
        $array = mysqli_fetch_assoc($resultado);
        $this->desconecta();
        return $array;
    }

    public function finaliza_cadastro($nome_completo, $sexo, $celular, $fixo, $rg, $cpf, $email, $senha) {
        $this->conecta();

        $query = "UPDATE aluno SET nome_completo = '${nome_completo}', sexo = '${sexo}', telefone_celular = '${celular}', telefone_fixo = '${fixo}', rg = '${rg}', " .
            "email = '${email}', senha = '${senha}' " .
            "WHERE cpf = '${cpf}'";
        $resultado = $this->consulta($query, "Erro ao Finalizar Cadastro!");

        $this->desconecta();
        return $resultado;
    }

    public function loga_aluno($email, $senha) {
        $this->conecta();

        $query = "SELECT * FROM aluno WHERE email = '${email}' AND senha = '${senha}'";
        $resultado = $this->consulta($query, "Erro ao Logar Aluno!");
        $array = mysqli_fetch_assoc($resultado);

        if(!is_null($array)) {
            session_id("aluno");
            session_start();
            $_SESSION["descricao"] = "aluno";
            $_SESSION["nome_completo"] = $array["nome_completo"];
            $_SESSION["sexo"] = $array["sexo"];
            $_SESSION["celular"] = $array["telefone_celular"];
            $_SESSION["fixo"] = $array["telefone_fixo"];
            $_SESSION["rg"] = $array["rg"];
            $_SESSION["cpf"] = $array["cpf"];
            $_SESSION["email"] = $array["email"];
            $_SESSION["senha"] = $array["senha"];
            session_write_close();
        }

        $this->desconecta();
        return !is_null($array);
    }
    // ==================


    // PROFESSORES
    public function loga_prof($email, $senha) {
        $this->conecta();

        $query = "SELECT * FROM professor WHERE email = '${email}' AND senha = '${senha}'";
        $resultado = $this->consulta($query, "Erro ao Logar Professor!");
        $array = mysqli_fetch_assoc($resultado);

        if(!is_null($array)) {
            session_start();
            session_destroy();

            session_id("prof");
            session_start();
            $_SESSION["validacao"] = "prof";
            $_SESSION["nome_completo"] = $array["nome_completo"];
            $_SESSION["sexo"] = $array["sexo"];
            $_SESSION["rg"] = $array["rg"];
            $_SESSION["cpf"] = $array["cpf"];
            $_SESSION["disciplina"] = $array["disciplina"];
            $_SESSION["email"] = $array["email"];
            $_SESSION["senha"] = $array["senha"];
            session_write_close();
        }

        $this->desconecta();
        return !is_null($array);
    }

    #### Funções relativas às Notas
    public function recupera_nota($codigo) {
        $this->conecta();
        $query = "SELECT * FROM nota WHERE codigo = ${codigo}";
        $resultado = $this->consulta($query, "Erro ao Buscar Nota!");

        $this->desconecta();
        return mysqli_fetch_assoc($resultado);
    }

    public function recupera_notas($filtro) {
        $this->conecta();

        $query = "SELECT n.codigo, n.atividade_nome, n.nota, a.nome_completo AS aluno_nome, n_turma.nome AS nome_turma " .
            "FROM nota as n " .
            "INNER JOIN aluno AS a ON n.cod_aluno = a.codigo " .
            "INNER JOIN nome_turma AS n_turma ON n.cod_nome_turma = nT.codigo";
        $query .= !is_null($filtro) ? " WHERE n.atividade_nome LIKE '%${filtro}%'" : null;
        $resultado = $this->consulta($query, "Erro ao Recuperar Notas!");

        $dados = array();
        while($dados_linha = mysqli_fetch_assoc($resultado))
            array_push($dados, $dados_linha);

        $this->desconecta();
        return $dados;
    }

    public function update_nota($codigo, $atividade_nome, $nota, $cod_aluno, $cod_nome_turma) {
        $this->conecta();
        
        $query = "UPDATE nota SET
                      atividade_nome = '${atividade_nome}',
                      nota = ${nota},
                      cod_aluno = ${cod_aluno},
                      cod_nome_turma = ${cod_nome_turma}
                  WHERE codigo = ${codigo}";
        $resultado = $this->consulta($query, "Erro ao Atualizar Nota!");

        $this->desconecta();
        return $resultado;
    }

    public function insere_nota($atividade_nome, $nota, $cod_aluno, $cod_nome_turma) {
        $this->conecta();

        $query = "INSERT INTO nota(atividade_nome, nota, cod_aluno, cod_nome_turma) VALUES('${atividade_nome}', ${nota}, ${cod_aluno}, ${cod_nome_turma})";
        $resultado = $this->consulta($query, "Erro ao Inserir Nota!");

        $this->desconecta();
        return $resultado;
    }

    public function delete_nota($codigo) {
        $this->conecta();
        
        $query = "DELETE FROM nota WHERE codigo = ${codigo}";        
        $resultado = $this->consulta($query, "Erro ao Deletar Nota!");
        
        $this->desconecta();
        return $resultado;
    }

    #### Funções relativas às Presenças
    public function recupera_presenca($codigo) {
        $this->conecta();
        
        $query = "SELECT * FROM presenca WHERE codigo = ${codigo}";
        $resultado = $this->consulta($query, "Erro ao Recuperar Presença!");
        $array = mysqli_fetch_assoc($resultado);

        $this->desconecta();
        return $array;
    }

    public function recupera_presencas($filtro) {
        $this->conecta();
        
        $query = "SELECT p.codigo, p.dia, a.nome_completo AS aluno_nome, nT.nome AS nome_turma " .
            "FROM presenca as p " .
            "INNER JOIN aluno AS a ON p.cod_aluno = a.codigo " .
            "INNER JOIN nome_turma AS n_turma ON p.cod_nome_turma = n_turma.codigo";
        $query .= !is_null($filtro) ? " WHERE a.nome_completo LIKE '%${filtro}%'" : null;
        $resultado = $this->consulta($query, "Erro ao Recuperar Presenças!");
        
        $dados = array();
        while($dados_linha = mysqli_fetch_assoc($resultado))
            array_push($dados, $dados_linha);

        $this->desconecta();
        return $dados;
    }

    public function update_presenca($codigo, $dia, $cod_aluno, $cod_nome_turma) {
        $this->conecta();
        
        $query = "UPDATE presenca SET dia = '${dia}', cod_aluno = ${cod_aluno}, cod_nome_turma = ${cod_nome_turma} WHERE codigo = ${codigo}";
        $resultado = $this->consulta($query, "Erro ao Atualizar Presença!");

        $this->desconecta();
        return $resultado;
    }

    public function insere_presenca($dia, $cod_aluno, $cod_nome_turma) {
        $this->conecta();
        
        $query = "INSERT INTO presenca(dia, cod_aluno, cod_nome_turma) VALUES('${dia}', ${cod_aluno}, ${cod_nome_turma})";
        $resultado = $this->consulta($query, "Erro ao Inserir Presença!");

        $this->desconecta();
        return $resultado;
    }

    public function delete_presenca($codigo) {
        $this->conecta();
        
        $query = "DELETE FROM presenca WHERE codigo = ${codigo}";        
        $resultado = $this->consulta($query, "Erro ao Deletar Presença!");
        
        $this->desconecta();
        return $resultado;
    }
    // ==================


    // ADM
    #### Funções relativas aos Administradores
    public function loga_adm($username, $senha) {
        $this->conecta();

        $query = "SELECT username FROM adm WHERE username = '${username}' AND senha = '${senha}'";        
        $resultado = $this->consulta($query, "Erro ao fazer Login do Administrador!");        
        $array = mysqli_fetch_assoc($resultado);

        if (!is_null($array)) {
            session_start();
            session_destroy();

            session_id("adm");
            session_start();
            $_SESSION["descricao"] = "adm";
            $_SESSION["username"] = $array["username"];
            session_write_close();
        }

        $this->desconecta();
        return !is_null($array);
    }

    public function recupera_adm($codigo) {
        $this->conecta();
        
        $query = "SELECT * FROM adm WHERE codigo = ${codigo}";
        $resultado =$this->consulta($query, "Erro ao Buscar Administradores!");
        $array = mysqli_fetch_assoc($resultado);

        $this->desconecta();
        return $array;
    }

    public function recupera_adms($filtro) {
        $this->conecta();
        
        $query = "SELECT * FROM adm";
        $query .= !is_null($filtro) ? " WHERE username LIKE '%${filtro}%'";
        $resultado = $this->consulta($query, "Erro ao Recuperar Administradores!");
        
        $dados = array();
        while($dados_linha = mysqli_fetch_assoc($resultado))
            array_push($dados, $dados_linha);

        $this->desconecta();
        return $dados;
    }

    public function update_adm($codigo, $username, $senha) {
        $this->conecta();

        $query = "UPDATE adm SET username = '${username}', senha = '${senha}' WHERE codigo = ${codigo}";
        $resultado = $this->consulta($query, "Erro ao Atualizar Administrador!");

        $this->desconecta();
        return $resultado;
    }

    public function insere_adm($username, $senha) {
        $this->conecta();

        $query = "INSERT INTO adm(username, senha) VALUES('${username}', '${senha}')";
        $resultado = $this->consulta($query, "Erro ao Inserir Administrador!");

        $this->desconecta();
        return $resultado;
    }

    public function delete_adm($codigo){
        $this->conecta();

        $query = "DELETE FROM adm WHERE codigo = ${codigo};";        
        $resultado = $this->consulta($query, "Erro ao Deletar Administrador!");
        
        $this->desconecta();
        return $resultado;
    }

    #### Funções relativas aos Alunos
    public function recupera_aluno($codigo) {
        $this->conecta();
        
        $query = "SELECT * FROM aluno WHERE codigo = ${codigo}";
        $resultado = $this->consulta($query, "Erro ao Recuperar Aluno!");
        $array = mysqli_fetch_assoc($resultado);

        $this->desconecta();
        return $array;
    }

    public function recupera_alunos($filtro) {
        $this->conecta();

        $query = "SELECT * FROM aluno";
        $query .= !is_null($filtro) ? " WHERE nome_completo LIKE '%${filtro}%'" : null;
        $resultado = $this->consulta($query, "Erro ao Recuperar Alunos!");

        $dados = array();
        while($dados_linha = mysqli_fetch_assoc($resultado))
            array_push($dados, $dados_linha);

        $this->desconecta();
        return $dados;
    }

    public function update_aluno($codigo, $nome_completo, $sexo, $celular, $fixo, $rg, $cpf, $email, $senha) {
        $this->conecta();
        
        $query = "UPDATE aluno SET nome_completo = '${nome_completo}', sexo = '${sexo}', telefone_celular = '${celular}', telefone_fixo = '${fixo}', rg = '${rg}', " .
            "cpf = '${cpf}', email = '${email}', senha = '${senha}' " .
            "WHERE codigo = ${codigo}";
        $resultado = $this->consulta($query, "Erro ao Atualizar Aluno!");

        $this->desconecta();
        return $resultado;
    }

    public function insere_aluno($nome_completo, $sexo, $celular, $fixo, $rg, $cpf, $email, $senha) {
        $this->conecta();
        
        $query = "INSERT INTO aluno(nome_completo, sexo, telefone_celular, telefone_fixo, rg, cpf, email, senha) " .
            "VALUES('${nome_completo}', '${sexo}', '${celular}', '${fixo}', '${rg}', '${cpf}', '${email}', '${senha}')";
        $resultado = $this->consulta($query, "Erro ao Inserir Aluno!");

        $this->desconecta();
        return $resultado;
    }

    public function delete_aluno($codigo) {
        $this->conecta();

        $query = "DELETE FROM aluno WHERE codigo = ${codigo}";
        $resultado = $this->consulta($query, "Erro ao Deletar Aluno!");
        
        $this->desconecta();
        return $resultado;
    }

    #### Funções relativas aos Cursos
    public function recupera_curso($codigo) {
        $this->conecta();
        
        $query = "SELECT * FROM curso WHERE codigo = ${codigo}";
        $resultado = $this->consulta($query, "Erro ao Recuperar Curso!");
        $array = mysqli_fetch_assoc($resultado);

        $this->desconecta();
        return $array;
    }

    public function recupera_cursos($filtro) {
        $this->conecta();
        
        $query = "SELECT * FROM curso";
        $query .= !is_null($filtro) ? " WHERE nome LIKE '%${filtro}%'" : null;
        $resultado = $this->consulta($query, "Erro ao Recuperar Cursos!");

        $dados = array();
        while($dados_linha = mysqli_fetch_assoc($resultado))
            array_push($dados, $dados_linha);

        $this->desconecta();
        return $dados;
    }

    public function update_curso($codigo, $nome, $carga_horaria) {
        $this->conecta();
        
        $query = "UPDATE curso SET nome = '${nome}', cargaHoraria = ${carga_horaria} WHERE codigo = ${codigo}";
        $resultado = $this->consulta($query, "Erro ao Atualizar Curso!");

        $this->desconecta();
        return $resultado;
    }

    public function insere_curso($nome, $carga_horaria) {
        $this->conecta();

        $query = "INSERT INTO curso(nome, cargaHoraria) VALUES('${nome}', ${carga_horaria})";
        $resultado = $this->consulta($query, "Erro ao Inserir Curso!");

        $this->desconecta();
        return $resultado;
    }

    public function delete_curso($codigo) {
        $this->conecta();
        
        $query = "DELETE FROM curso WHERE codigo = ${codigo}";        
        $resultado = $this->consulta($query, "Erro ao Deletar Curso!");
        
        $this->desconecta();
        return $resultado;
    }

    #### Funções relativas aos Professores
    public function recupera_prof($codigo) {
        $this->conecta();
        
        $query = "SELECT * FROM professor WHERE codigo = ${codigo}";
        $resultado = $this->consulta($query, "Erro ao Recuperar Professor!");
        $array = mysqli_fetch_assoc($resultado);

        $this->desconecta();
        return $array;
    }

    public function recupera_profs($filtro) {
        $this->conecta();

        $query = "SELECT * FROM professor";
        $query .= !is_null($filtro) ? " WHERE nome_completo LIKE '%${filtro}%'" : null;
        $resultado = $this->consulta($query, "Erro ao Recuperar Professores!");

        $dados = array();
        while($dados_linha = mysqli_fetch_assoc($resultado))
            array_push($dados, $dados_linha);

        $this->desconecta();
        return $dados;
    }

    public function update_prof($codigo, $nome_completo, $sexo, $rg, $cpf, $disciplina) {
        $this->conecta();
        
        $query = "UPDATE professor SET nome_completo = '${nome_completo}', sexo = '${sexo}', rg = '${rg}', cpf = '${cpf}', disciplina = '${disciplina}' " .
            "WHERE codigo = ${codigo}";
        $resultado = $this->consulta($query, "Erro ao Atualizar Professor!");

        $this->desconecta();
        return $resultado;
    }

    public function insere_prof($nome_completo, $sexo, $rg, $cpf, $disciplina) {
        $this->conecta();

        $query = "INSERT INTO professor(nome_completo, sexo, rg, cpf, disciplina) VALUES('${nome_completo}', '${sexo}', '${rg}', '${cpf}', '${disciplina}')";
        $resultado = $this->consulta($query, "Erro ao Inserir Professor!");

        $this->desconecta();
        return $resultado;
    }

    public function delete_prof($codigo) {
        $this->conecta();
        
        $query = "DELETE FROM professor WHERE codigo = ${codigo}";        
        $resultado = $this->consulta($query, "Erro ao Deletar Professor");
        
        $this->desconecta();
        return $resultado;
    }

    #### Funções relativas aos Nomes de Turma
    public function recupera_nome_turma($codigo) {
        $this->conecta();
        
        $query = "SELECT * FROM nome_turma WHERE codigo = ${codigo}";
        $resultado = $this->consulta($query, "Erro ao Recuperar Nome de Turma!");
        $array = mysqli_fetch_assoc($resultado);

        $this->desconecta();
        return $array;
    }

    public function recupera_nomes_turma($filtro) {
        $this->conecta();

        $query = "SELECT * FROM nome_turma";
        $query .= !is_null($filtro) ? " WHERE nome LIKE '%${filtro}%'" : null;
        $resultado = $this->consulta($query, "Erro ao Recuperar Nomes de Turmas!");

        $dados = array();
        while($dados_linha = mysqli_fetch_assoc($resultado))
            array_push($dados, $dados_linha);

        $this->desconecta();
        return $dados;
    }

    public function update_nome_turma($codigo, $nome) {
        $this->conecta();

        $query = "UPDATE nome_turma SET nome = '${nome}' WHERE codigo = ${codigo}";
        $resultado = $this->consulta($query, "Erro ao Atualizar Nome de Turma!");

        $this->desconecta();
        return $resultado;
    }

    public function insere_nome_turma($nome) {
        $this->conecta();

        $query = "INSERT INTO nome_turma(nome) VALUES('${nome}')";
        $resultado = $this->consulta($query, "Erro ao Inserir Nome de Turma!");

        $this->desconecta();
        return $resultado;
    }

    public function delete_nome_turma($codigo) {
        $this->conecta();
        
        $query = "DELETE FROM nome_turma WHERE codigo = ${codigo}";        
        $resultado = $this->consulta($query, "Erro ao Deletar Nome de Turma!");
        
        $this->desconecta();
        return $resultado;
    }

    #### Funções relativas às Turmas
    public function recupera_turma($codigo) {
        $this->conecta();

        $query = "SELECT * FROM turma WHERE codigo = ${codigo}";
        $resultado = $this->consulta($query, "Erro ao Recuperar Turma!");
        $array = mysqli_fetch_assoc($resultado);

        $this->desconecta();
        return $array;
    }

    public function recupera_turmas($filtro) {
        $this->conecta();
        $query = "SELECT t.codigo AS turma_codigo, nT.nome AS nome_turma, a.nome_completo AS aluno_nome, p.nome_completo AS professor_nome, c.nome AS curso_nome " .
            "FROM turma AS t " .
            "INNER JOIN nome_turma AS n_turma ON t.cod_nome_turma = n_turma.codigo " .
            "INNER JOIN aluno AS a ON t.cod_aluno = a.codigo " .
            "INNER JOIN professor AS p ON t.cod_professor = p.codigo " .
            "INNER JOIN curso AS c ON t.cod_curso = c.codigo";
        $query .= !is_null($filtro) ? " WHERE a.nome_completo LIKE '%${filtro}%'" : null;
        $resultado = $this->consulta($query, "Erro ao Recuperar Turmas!");

        $dados = array();
        while($dados_linha = mysqli_fetch_assoc($resultado))
            array_push($dados, $dados_linha);

        $this->desconecta();
        return $dados;
    }

    public function update_turma($codigo, $cod_nome_turma, $cod_aluno, $cod_professor, $cod_curso) {
        $this->conecta();
        $query = "UPDATE turma SET cod_nome_turma = ${cod_nome_turma}, cod_aluno = ${cod_aluno}, cod_professor = ${cod_professor}, cod_curso = ${cod_curso} " .
            "WHERE codigo = ${codigo}";
        $resultado = $this->consulta($query, "Erro ao Atualizar Turma");

        $this->desconecta();
        return $resultado;
    }

    public function insere_turma($cod_nome_turma, $cod_aluno, $cod_professor, $cod_curso) {
        $this->conecta();
        
        $query = "INSERT INTO turma(cod_nome_turma, cod_aluno, cod_professor, cod_curso) VALUES(${cod_nome_turma}, ${cod_aluno}, ${cod_professor}, ${cod_curso})";
        $resultado = $this->consulta($query, "Erro ao Inserir Turma!");

        $this->desconecta();
        return $resultado;
    }

    public function delete_turma($codigo) {
        $this->conecta();
        
        $query = "DELETE FROM turma WHERE codigo = ${codigo}";        
        $resultado = $this->consulta($query, "Erro ao Deletar Turma!");
        
        $this->desconecta();
        return $resultado;
    }
    // ==================
}
?>