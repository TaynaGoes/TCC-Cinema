<?php

    $_dns = "mysql:host=localhost;dbname=cinema";
    $_usuario = "root";
    $_senha = "dwHandle";

    $conexao;

    try {
        $conexao = new PDO($_dns, $_usuario, $_senha);
    }
    catch (PDOException $erro) {
        echo 'Erro: ' . $erro->getCode() . '<br>' . 'Mensagem: ' . $erro->getMessage(); 
        
        die();
    }