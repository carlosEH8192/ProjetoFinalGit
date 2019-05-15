<?php
    $para = "Carlos Eduardo <carloseh.355@gmail.com>";
    $nome_completo = $_POST["nomeCompleto"];
    $email = $_POST["email"];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST["mensagem"];

    $headers = "From: ${nome_completo} <${email}>\r\n".
        "Reply-To: ${nome_completo} <${email}>\r\n".
        "MIME-Version: 1.0\r\n".
        "Content-Type: text/plain; charset=UTF-8\r\n".
        "X-Mailer: PHP/".phpversion()."\r\n";
    
    $resultado = mail($para, $assunto, $mensagem, $headers);
    print($resultado);
?>