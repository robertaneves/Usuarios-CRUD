<?php

    //Configuração do banco de dados
    define('DB_SERVER','localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'usuarios');

    //Conexão com o banco de dados
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    //Checaando conexão
    if($conn -> connect_error) {
        die("Erro de conexão" . $conn->connect_error);
    }

    //Função de registrar logs
    function registrarLog($acao, $id_usuarios = null, $detalhes=''){
        global $conn;
        $stmt = $conn("INSERT INTO logs(acao, is_usuarios, detalhes) VALUES (?, ?, ?)");
        $stmt-> bind_param("sis", $acao, $id_usuarios, $detalhes);
        $stmt -> execute();
        $stmt -> close();
    }
?>