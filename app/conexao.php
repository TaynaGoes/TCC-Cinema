<?php

    $_dns = "mysql:host=localhost;dbname=cinema_atualizado";
    $_usuario = "root";
    $_senha = "";

    $conexao;

    try {
        $conexao = new PDO($_dns, $_usuario, $_senha);
    }
    catch (PDOException $erro) {
        echo 'Erro: ' . $erro->getCode() . '<br>' . 'Mensagem: ' . $erro->getMessage(); 
        
        die();
    }